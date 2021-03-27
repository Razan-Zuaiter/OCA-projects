from django import forms

class  FileForm(forms.Form):
    file = forms.FileField()
    # def clean(self):
    #     cleaned_data = super(FileForm, self).clean()
    #     file = cleaned_data.get('file')
    #
    #     if file:
    #         filename = file.name
    #         if filename.endswith('.xlsx'):
    #             print('File is a xlsx')
    #         else:
    #             print('File is NOT a xlsx')
    #             raise forms.ValidationError("File is not a xlsx. Please upload only mp3 files")
    #
    #     return file