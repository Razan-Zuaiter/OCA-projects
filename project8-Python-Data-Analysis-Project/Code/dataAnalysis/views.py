from django.shortcuts import render
from dataAnalysis.models import  DataSource,Data,FilesData
import time
from pyexcel_xls import get_data as xls_get
from pyexcel_xlsx import get_data as xlsx_get
from .validation import  validationRowXls,validationRowCSV
import pyexcel
import csv, io
import json

def addCSV(request,id):
  errors=""
  c=0
  csv_file = request.FILES['file']
  data_set = csv_file.read().decode('utf-8-sig')
  io_string = io.StringIO(data_set)
  table = csv.DictReader(io_string, delimiter=',', quotechar="|")
  for row in table:
    c += 1
    if validationRowCSV(row):
      dataRecord = Data()
      dataRecord.name = row['name']
      dataRecord.age = row['age']
      dataRecord.gender = row['gender']
      dataRecord.phone = row['phone']
      dataRecord.email = row['email']
      dataRecord.file_id = id
      dataRecord.save()
    else:
      errors += "Error in row" + str(c) + "\n"
  return errors
# =====================================
def addExcel(request,id):
  errors =""
  filename = str(request.FILES["file"])
  if filename.endswith('.xlsx'):
    data = xlsx_get(request.FILES["file"])
  else:
    data = xls_get(request.FILES["file"])
  for key, sheet in data.items():
    c=0
    for row in sheet:
      c+=1
      if sheet.index(row)==0:
        continue
      else:
        if validationRowXls(row,sheet):
          dataRecord = Data()
          dataRecord.name = row[sheet[0].index('name')]
          dataRecord.age = row[sheet[0].index('age')]
          dataRecord.gender = row[sheet[0].index('gender')]
          dataRecord.phone = row[sheet[0].index('phone')]
          dataRecord.email = row[sheet[0].index('email')]
          dataRecord.file_id = id
          dataRecord.save()
        else:
          errors += "Error in row"+str(c) + "\n"
  return errors



def addFile(request):
  errorAndTime = {"time": 0, "error":""}
  start = time.time()
  filename = str(request.FILES["file"])
  if filename.endswith('.xlsx') or filename.endswith('.csv') or filename.endswith('.xls'):
    filesData =FilesData(file_name=filename, user_name=request.POST["user_name"], data_source_id= request.POST["source"])
    filesData.save()
    id=filesData.id
    if filename.endswith('.xlsx') or filename.endswith('.xls'):
      errorAndTime["error"]=addExcel(request, id)
    else:
      errorAndTime["error"]=addCSV(request, id)
    end = time.time()
    eTime = end - start
    errorAndTime["time"]=round(eTime, 3)
    print(eTime)
    print("======")
    print(round(eTime, 3))

    FilesData.objects.filter(id = id).update(execution_time=errorAndTime["time"])
  else:
    errorAndTime["error"]= "File must be .xlsx, .xls or .csv"
  return errorAndTime
# =======================
def getTable():
  table=[]
  filesdata = FilesData.objects.raw('select * FROM dataanalysis_filesdata INNER JOIN dataanalysis_datasource ON dataanalysis_filesdata.data_source_id = dataanalysis_datasource.id ')
  print("============")

  for file in filesdata:
    data= Data.objects.filter(file_id = file.id)
    table.append({"file": file, "data":data,"len":len(data)})
  return table
# ===========
def getareaChart():
  return Data.objects.raw("SELECT id, YEAR(created_at) AS 'Year', MONTH(created_at) AS 'Month', DAY(created_at) AS 'Day', COUNT(id) AS 'count' FROM `dataanalysis_data` GROUP BY DAY(created_at), MONTH(created_at), YEAR(created_at) ORDER BY 'Year', 'Month', 'Day'")

def getGenderChart():
  return Data.objects.raw("SELECT id, gender, COUNT(id) AS 'count' FROM `dataanalysis_data` GROUP BY gender")
def index (request):
  context={}
  if request.method == 'POST':
    errorAndTime = addFile(request)
    context["error"] = errorAndTime["error"]
    context["time"] = errorAndTime["time"]
  # ======================= Chart
  context["areaChart"] = getareaChart()
  GenderChart = getGenderChart()
  total=0
  genderChartArr = []
  for genderChart in GenderChart:
    total+=genderChart.count
  for genderChart in GenderChart:
    genderChartArr.append({"gender": genderChart.gender,"count":genderChart.count/total * 100})
  context["genderChart"] = genderChartArr
  # ======================= Table

  context["table"] = getTable()
  context["source"] = DataSource.objects.all()

  return render(request, "dataAnalysis/index.html", context=context)
# =================
def register(request):
  from django.shortcuts import redirect, render
  from django.urls import reverse
  from .forms import CustomUserCreationForm
  if request.method == "GET":
    return render(
      request, "register/register.html",
      {"form": CustomUserCreationForm, "get": True}
    )
  elif request.method == "POST":
    form = CustomUserCreationForm(request.POST)
    if form.is_valid():
      user = form.save()
      return render(
        request, "register/register.html",
        {"form": CustomUserCreationForm,"isValid":True}
      )
    return render(
        request, "register/register.html",
        {"form": CustomUserCreationForm,"isValid":False}
      )

