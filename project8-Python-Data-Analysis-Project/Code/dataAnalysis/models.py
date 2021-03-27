from django.db import models
from django_mysql.models import EnumField
from django.contrib.auth.models import AbstractBaseUser, BaseUserManager
# Create your models here.
# class User (models.Model):
#     name = models.CharField(max_length=50)
#     email = models.CharField(max_length=100, unique=True)
#     password = models.CharField(max_length=100)
#     created_at = models.DateTimeField(auto_now_add=True)

class DataSource (models.Model):
    name = models.CharField(max_length=100)

class FilesData (models.Model):
    file_name = models.CharField(max_length=250)
    created_at = models.DateTimeField(auto_now_add=True)
    user_name = models.CharField(max_length=50 , default="admin")
    data_source = models.ForeignKey(DataSource, on_delete=models.CASCADE)
    execution_time = models.FloatField(default=0)

class Data (models.Model):
    name = models.CharField(max_length=50)
    age = models.IntegerField()
    gender = EnumField(choices=['female', 'male'])
    phone = models.CharField(max_length=20)
    email = models.CharField(max_length=100)
    created_at = models.DateTimeField(auto_now_add=True)
    file = models.ForeignKey(FilesData, on_delete=models.CASCADE)