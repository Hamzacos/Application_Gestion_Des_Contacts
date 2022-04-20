function validateform(){
    let username = document.myform.Fname.value;
    let email    = document.myform.email.value;
    let phone    = document.myform.phone.value;
    let adresse  = document.myform.adresse.value;

    if(!(/^[a-z]{3,}$/gi.test(username))){
        document.getElementById("nom").setAttribute("style","display:bloc;color:red");  
        return false;
    }else if(!(/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/gi.test(email))){ 
        document.getElementById("mail").setAttribute("style","display:block;color:red");  
        return false;  
    }else if(!(/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/gi.test(phone))){
        document.getElementById("phone").setAttribute("style","display:block;color:red");
    }
    else if(!(/[0-9]{5}/, gi.test(adresse))){
        document.getElementById("adresse").setAttribute("style","display:block;color:red");
        return false;
    }
}