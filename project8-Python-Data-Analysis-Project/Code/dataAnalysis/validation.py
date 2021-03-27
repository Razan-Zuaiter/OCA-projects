import re

regexEmail = '^[a-z0-9]+[\._]?[a-z0-9]+[@]\w+[.]\w{2,3}$'
regexPhone = '^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$'


def validationRowXls(row, sheet):
    if row[sheet[0].index('name')]:

        if row[sheet[0].index('gender')].lower() == "female" or row[sheet[0].index('gender')].lower() == "male":

            if row[sheet[0].index('age')] >= 18:

                if re.search(regexEmail, row[sheet[0].index('email')]):

                    if re.search(regexPhone, row[sheet[0].index('phone')]):
                        return 1

    return 0

def validationRowCSV(row):
    if row['name']:

        if row['gender'].lower() == "female" or row['gender'].lower() == "male":

            if int(row['age']) >= 18:

                if re.search(regexEmail, row['email']):

                    if re.search(regexPhone, row['phone']):
                        return 1

    return 0

def validationEdite(request):
    if request.POST['name']:
        if request.POST['gender'].lower() == "female" or request.POST['gender'].lower() == "male":
            if int(request.POST['age']) >= 18:
                if re.search(regexPhone, request.POST['phone']):
                    if re.search(regexEmail, request.POST['email']):
                        return 1
    return 0