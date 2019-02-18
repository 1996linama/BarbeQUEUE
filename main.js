function changePage(x){
    document.location.href=x;
}

function getWaitTime(){
    
}

function validatePartyInfo(){
    var customerName = document.forms["partyForm"]["customerName"].value;
    var phoneNumber = document.forms["partyForm"]["phoneNumber"].value;
  
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