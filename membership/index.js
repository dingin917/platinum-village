/* index.js 
    Registers the event handlers for login.php 
    
    Get the DOM addresses of the elements and register 
    the event handlers 
*/

// Registration Validation 
var nameNode = document.getElementById("name");
var emailNode = document.getElementById("email");
var usernameNode = document.getElementById("username");
var passwordNode = document.getElementById("password");
var password2Node = document.getElementById("password2");

nameNode.addEventListener("change", validateName, false);
emailNode.addEventListener("change", validateEmail, false);
usernameNode.addEventListener("change", validateUsername, false);
passwordNode.addEventListener("change", validatePassword, false);
password2Node.addEventListener("change", validatePassword2, false);


// Sign In Validation 
var myusernameNode = document.getElementById("myusername");
var mypasswordNode = document.getElementById("mypassword");

myusernameNode.addEventListener("change", validateUsername, false);
mypasswordNode.addEventListener("change", validatePassword, false);