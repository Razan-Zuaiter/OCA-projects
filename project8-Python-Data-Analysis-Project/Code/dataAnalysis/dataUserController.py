#
# from django.shortcuts import render
# from dataAnalysis.models import User, DataSource,Data,FilesData
# from django.http import HttpResponseRedirect
# from django.shortcuts import redirect
# # DataUser CRUD
#
# def DataUser_index(request):
#   dataUsers = User.objects.all()
#   return render(request, "dataUser/index.html", context={'dataUsers': dataUsers})
#
# def DataUser_add(request):
#   errorPass= ""
#   errorEmail=""
#   errorFiled=""
#   if request.method == 'POST':
#     if request.POST['name'] and request.POST['email'] :
#       if not (User.objects.filter(email=request.POST['email'])):
#         if len(str(request.POST['password'])) > 8:
#           dataUser = User(name=request.POST['name'],email=request.POST['email'],password=request.POST['password'])
#           dataUser.save()
#           return HttpResponseRedirect(request.META.get('HTTP_REFERER'))
#         else:
#           errorPass = "Wrong Password"
#       else:
#         errorEmail ="Wrong email"
#     else:
#       errorFiled = "All filed required"
#     dataUsers = User.objects.all()
#     return render(request, "dataUser/index.html", context={'dataUsers': dataUsers, 'errorFiled': errorFiled ,
#                                                              'errorEmail':errorEmail ,'errorPass': errorPass})
#   else: return redirect("DataUser_index")
#
# def DataUser_edit(request, id):
#   if id:
#     dataUser = User.objects.get(id=id)
#     return render(request, "dataUser/edit.html", context={'dataUsers': dataUser})
#
# def DataUser_update(request):
#   if request.method == 'POST':
#     if request.POST['name'] and request.POST['password'] :
#       if len(str(request.POST['password'])) > 8:
#           User.objects.filter(id=request.POST['id']).update(name=request.POST['name'],password=request.POST['password'])
#           return redirect("DataUser_index")
#       else:
#           errorPass = "Wrong Password"
#           dataUser = User.objects.get(id=request.POST['id'])
#           return render(request, "dataUser/edit.html", context={'dataUsers': dataUser ,'errorPass':errorPass})
#     else:
#       errorFiled = "All filed required"
#       dataUser = User.objects.get(id=request.POST['id'])
#       return render(request, "dataUser/edit.html", context={'dataUsers': dataUser, 'errorFiled': errorFiled})
#   else:
#     return redirect("DataUser_index")
#
#
# def DataUser_delete(request, id):
#   User.objects.filter(id=id).delete()
#   return redirect("DataUser_index")