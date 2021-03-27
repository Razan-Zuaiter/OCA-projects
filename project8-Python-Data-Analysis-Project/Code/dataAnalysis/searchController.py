from dataAnalysis.models import Data
from django.shortcuts import render

def search (request):
    data=[]
    if request.method == 'POST':
        if request.POST["searchType"] == "Name":
            data= searchByname(request)
        elif request.POST["searchType"] == "Date":
            data = searchByDate(request)
        elif request.POST["searchType"] == "Age":
            data = searchByAge(request)
        elif request.POST["searchType"] == "Gender":
            data = searchByGender(request)
    else:
        data = Data.objects.all()
    return render(request, "search/Search.html", context={'data': data})

def searchByname(request):
    data =  Data.objects.filter(name__contains=request.POST["name"])
    return data

def searchByDate(request):
    fromDate = request.POST["dateFrom"]
    toDate = request.POST["dateTo"]
    data = Data.objects.raw('select * FROM dataanalysis_data WHERE created_at BETWEEN "'+fromDate+'" and "'+toDate+'"')
    return data

def searchByAge(request):
    fromAge = request.POST["ageFrom"]
    toAge = request.POST["ageTo"]
    data = Data.objects.raw('select * FROM dataanalysis_data WHERE age BETWEEN "'+fromAge+'" and "'+toAge+'"')
    return data

def searchByGender(request):
    data = Data.objects.filter(gender=request.POST["Gender"])
    return data