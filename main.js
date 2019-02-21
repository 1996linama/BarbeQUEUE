
function changePage(x){
    document.location.href=x;
}

function validateCustomerInfo(){
    var customerName = document.forms["customer_form"]["customer_name"].value;
    var phoneNumber = document.forms["customer_form"]["phone_number"].value;
  
    if(customerName == null || customerName == ""){
        alert("Please enter a name.");
        return false;
    }
    
    if(phoneNumber == null || phoneNumber == ""){
        alert("Please enter a phone number.");
        return false;
    }

    if(phoneNumber.length != 10){
        alert("Phone number requires 10 digits.");
        return false;
    }

    return true;
    
}

function $(id) {
    return document.getElementById(id);
}

$('assign_customer').addEventListener("click", displayAssignCustomer);
$('remove_customer').addEventListener("click", displayRemoveCustomer);
$('alter_customer').addEventListener("click", displayAlterCustomer);

function displayAssignCustomer() {
    displayContainer($('assign_container'));
    hideContainers($('remove_container'), $('alter_container'));
}

function displayRemoveCustomer() {
    displayContainer($('remove_container'));
    hideContainers($('assign_container'), $('alter_container'));
}

function displayAlterCustomer() {
    displayContainer($('alter_container'));
    hideContainers($('assign_container'), $('remove_container'));
}

function hideContainers(div1, div2) {
    div1.style.display = "none";
    div2.style.display = "none";
}
  
function displayContainer(div) {
    if (div.style.display === "inline-block") {
       div.style.display = "none";
     } else {
       div.style.display = "inline-block";
     }
   } 

function onClickForClearQueue(){
    if(confirm("Are you sure you want to clear Queue?")){
        window.location.href="restart_day.php";

    }
}