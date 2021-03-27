from django.shortcuts import render, redirect
from django.http import HttpResponseRedirect
from dataAnalysis.models import Data,FilesData
from .validation import  validationEdite


def editRecord(request, id):
  error=""
  if request.method == 'POST':
    if validationEdite(request):
      return updateRecord(request)
    else:
        error="Not valid update"
  if id:
    data = Data.objects.get(id=id)
    return render(request, "data/edit.html", context={'data': data,"error":error})

def updateRecord(request):
    Data.objects.filter(id = request.POST['id']).update(name = request.POST['name'], email = request.POST['email'], age = request.POST['age'], phone = request.POST['phone'], gender = request.POST['gender'])
    return redirect('index')

def deleteRecord(request, id):
	Data.objects.filter(id=id).delete()
	return redirect("index")

def deleteFile(request, id):
    # while Data.objects.filter(file_id=id) :
    #   Data.objects.filter(file_id=id).delete()
    FilesData.objects.filter(id=id).delete()
    return redirect("index")




