function saveLocalData() {
  var Name = document.getElementById("name");
  localStorage.setItem("name", Name.value);

  var Email = document.getElementById("email");
  localStorage.setItem("email", Email.value);

  var Date = document.getElementById("date");
  localStorage.setItem("date", Date.value);

  var Phone = document.getElementById("phone");
  localStorage.setItem("phone", Phone.value);

  var Password = document.getElementById("password");
  localStorage.setItem("password", Password.value);

  var confirm_password = document.getElementById("confirm-password");
  localStorage.setItem("confirm-password", confirm_password.value);



}

function saveSessionData() {
  var Name = document.getElementById("name");
  sessionStorage.setItem("name", Name.value);

  var Email = document.getElementById("email");
  sessionStorage.setItem("email", Email.value);

  var Date = document.getElementById("date");
  sessionStorage.setItem("date", Date.value);

  var Phone = document.getElementById("phone");
  sessionStorage.setItem("phone", Phone.value);

  var Password = document.getElementById("password");
  sessionStorage.setItem("password", Password.value);

  var confirm_password = document.getElementById("confirm-password");
  sessionStorage.setItem("confirm-password", confirm_password.value);


}

// function clearData() {
  //  localStorage.clear();
  //  sessionStorage.clear();
  // }




function CheckForm() {

  var txt_name = document.getElementById("name").value;
  var txt_email = document.getElementById("email").value;
  var txt_phone = document.getElementById("phone").value;
  var txt_password = document.getElementById("password").value;
  var txt_confirm_password = document.getElementById("confirm-password").value;
 
  var txt_error_message = document.getElementById("error_message");
  var txt_success_message = document.getElementById("success_message");
  var text;


  txt_error_message.style.padding = "1rem";
 

  var regexName = new RegExp(/([^\s])/);
  var regexPhone = new RegExp(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/);;
  var regexEmail = new RegExp(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/);
  var regexPassword = new RegExp(/^[A-Za-z]\w{7,14}$/);



  if (regexName.test(txt_name) != true) {

    text = "Name must be filled correctly";
    txt_error_message.innerHTML = text;

    return false;

  } else if (regexEmail.test(txt_email) != true) {

    text = "Email must be filled correctly";
    txt_error_message.innerHTML = text;
    return false;


  }
  
  else if (regexPhone.test(txt_phone) != true) {

    text = "phone must be filled correctly";
    txt_error_message.innerHTML = text;
    return false;

  }
 
  else if (regexPassword.test(txt_password) != true) {

    text = "Password must be filled correctly";
    txt_error_message.innerHTML = text;

    return false;

  } else if (txt_password != txt_confirm_password) {

    text = "Error in confirmation Password";
    txt_error_message.innerHTML = text;

    return false;

  } else if (txt_password != txt_confirm_password) {

    text = "Error in confirmation Password";
    txt_error_message.innerHTML = text;

    return false;

  } 

  
  else return true;
}



form.addEventListener('submit', (e) => {

  if (CheckForm()) {
    return true;
  } 
  
  else e.preventDefault()

})

function CheckThenDo() {
  saveLocalData();
  CheckForm();
 
}


function allow() {
  var check_box = document.getElementById("check");
  var submit_box = document.getElementById("create");
  if (check_box .checked) {
    submit_box.disabled=false;
  }
  else{
    submit_box.disabled=true;
  }
  }