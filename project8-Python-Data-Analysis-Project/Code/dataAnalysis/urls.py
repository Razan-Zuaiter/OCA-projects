from django.urls import path
from .dataSourceController import DataSource_index , DataSource_add , DataSource_edit , DataSource_delete , DataSource_update
from .views import index,register
from .searchController import search
from django.contrib.auth import views as auth_views
from .dataController import editRecord, deleteRecord,deleteFile
urlpatterns = [
    path('', index, name="index"),
#DataSource URLs
    path('DataSource', DataSource_index, name="DataSource_index"),
    path('DataSource_edit/<id>', DataSource_edit , name="DataSource_edit"),
    path('DataSource_delete/<id>', DataSource_delete , name="DataSource_delete"),
#==============
#Data URLs
    path('editRecord/<id>', editRecord, name="editRecord"),
    path('deleteRecord/<id>', deleteRecord, name="deleteRecord"),
path('deleteFile/<id>', deleteFile, name="deleteFile"),
    # =============
    path('search', search, name="search"),
    # =============
    path('login/', auth_views.LoginView.as_view(template_name='registeration/login.html'), name='login'),
    path('logout/', auth_views.LogoutView.as_view(), name='logout'),
    path('register/', register, name='register'),

]