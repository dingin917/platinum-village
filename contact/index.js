/* index.js 
    Registers the event handlers for index.php 
    
    Get the DOM addresses of the elements and register 
    the event handlers 
*/

// Registration Validation 
var customerNode = document.getElementById("customer");
var emailNode = document.getElementById("email");

customerNode.addEventListener("change", validateName, false);
emailNode.addEventListener("change", validateEmail, false);


function infoPopup(){
    alert("Thank you for providing us feedback!");
}