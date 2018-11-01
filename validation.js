function validateName(event){
    var name = event.currentTarget;
    var valid = name.value.search(/^[a-zA-Z ]+$/);
    if (valid!= 0) {
        alert("The name you provided [" + name.value + "] is not in the valid form.\nPlease try again with only alphabets.");
        name.focus();
        name.select();
        return false;
    }  
}

function validateEmail(event){
    var email = event.currentTarget;
    var valid = email.value.search(/^[\w.-]+@([\w]+\.){1,3}[A-Za-z]{2,3}$/);
    if (valid!= 0) {
        alert("The email you provided [" + email.value + "] is not in the valid form.\nPlease note that the domain name contains two to four address extensions only.");
        email.focus();
        email.select();
        return false;
  }   
}

function validateUsername(event){
    var username = event.currentTarget;
    var valid = username.value.search(/^[\w]+$/);
    if (valid!= 0) {
        alert("The username you provided [" + username.value + "] is not in the valid form.\nPlease try again with only digits and alphabets and no space in between.");
        username.focus();
        username.select();
        return false;
    }  
}

function validatePassword(event){
    var passwordObject = event.currentTarget;
    var password = passwordObject.value;
    if (password.length < 5 || password.search(/[A-Za-z]/)==-1 || password.search(/\d/)==-1) {
        alert("The password you provided is not in the valid form.\nPlease try again with both digits and alphabets to enhance your password security.");
        passwordObject.focus();
        passwordObject.select();
        password = "";
        return false;
    }
}

function validatePassword2(event) {
    var password = document.getElementById("password").value;
    var password2Object = event.currentTarget;
    var password2 = password2Object.value;
    if (password2 != password) {
        alert("The password you provided is not matching with the previous one.\nPlease try again.");
        password2Object.focus();
        password2Object.select();
        password2 = "";
        return false;
    }
}
