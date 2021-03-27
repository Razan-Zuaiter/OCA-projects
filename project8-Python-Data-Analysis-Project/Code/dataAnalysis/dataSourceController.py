
from django.shortcuts import render
from dataAnalysis.models import DataSource
from django.http import HttpResponseRedirect
from django.shortcuts import redirect
# DataSource CRUD
def DataSource_index(request):
  error = ""
  if request.method == 'POST':
    if request.POST['name']:
      DataSource_add(request)
    else:
      error ="name is required"
  dataSource = DataSource.objects.all()
  return render(request, "datasource/index.html", context={'dataSources': dataSource,"error":error})

def DataSource_add(request):
  dataSource = DataSource(name=request.POST['name'])
  dataSource.save()
# =============
def DataSource_edit(request, id):
  if request.method == 'POST':
    if request.POST['name']:
      return DataSource_update(request)
  if id:
    dataSource = DataSource.objects.get(id=id)
    return render(request, "datasource/edit.html", context={'dataSource': dataSource})
def DataSource_update(request):
    DataSource.objects.filter(id=request.POST['id']).update(name=request.POST['name'])
    return redirect("DataSource_index")

def DataSource_delete(request, id):
  DataSource.objects.filter(id=id).delete()
  return redirect("DataSource_index")