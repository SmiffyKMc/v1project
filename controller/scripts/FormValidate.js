function validateOwnerForm(){
    var fName = document.getElementById('fName');
    var lName = document.getElementById('lName');
    var username = document.getElementById('username');
    var email = document.getElementById('email');
    var password = document.getElementById('password');
    var cpassword = document.getElementById('cpassword');
    var address = document.getElementById('address');
    var error_par = document.getElementById('error_par');
    var error_div = document.getElementById('error_par');
    
    
    if(fName.value == ""){
        error_div.className += "alert alert-danger";
        error_par.textContent = "Need a Name!";
        return false;
    } else if (lName.value == ""){
        error_div.className += "alert alert-danger";
        error_par.textContent = "Need a Last Name!";
        return false;
    } else if (username.value == ""){
        error_div.className += "alert alert-danger";
        error_par.textContent = "Need a Username!";
        return false;
    } else if (password.value == ""){
        error_div.className += "alert alert-danger";
        error_par.textContent = "Need a Password";
        return false;
    } else if (password.value != cpassword.value){
        error_div.className += "alert alert-danger";
        error_par.textContent = "The passwords don't match!";
        return false;
    } else if (email.value == ""){
        error_div.className += "alert alert-danger";
        error_par.textContent = "Need a Email!";
        return false;
    } else if (address.value == ""){
        error_div.className += "alert alert-danger";
        error_par.textContent = "Need a Address!";
        return false;
    } else {
        return true;
    }
    
}

function validateLogin(){
    var username = document.getElementById('ulogin');
    var password = document.getElementById('plogin');
    var error_par = document.getElementById('error_par_login');
    var error_div = document.getElementById('error_div_login');
    //var dataString = 'username=' username.value + '&password=' + password.value;
    
    if(username.value == "" || password.value == ""){
        error_div.className += "alert alert-danger";
        error_par.textContent = "You need to input a Username and a Password!";
        return false;
    } else {
        // AJAX Code here
        
    }
}