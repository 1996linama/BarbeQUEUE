
function changePage(x){
    document.location.href=x;
}

function validateCustomerInfo(){
    var customerName = document.forms["customerForm"]["customerName"].value;
    var phoneNumber = document.forms["customerForm"]["phoneNumber"].value;
  
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


function changeInputs(){
    var element = document.querySelector('div.input_container');
    document.getElementById("header");

}