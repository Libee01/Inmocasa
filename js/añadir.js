function validar() {
    var user = document.getElementById('usuario').value.trim().length;
    var email = document.getElementById('correo').value.trim().length;
    var pass = document.getElementById('password').value.trim().length;
    var mail = document.getElementById('correo').value.trim();
    var arroba = mail.indexOf('@');
    var punto = mail.indexOf('.');
    if (user == 0){
        alert("Debe introducir un nombre de usuario");
        document.getElementById('nombre').focus();
        return false;
    }
    if (email == 0){
        alert("Debe introducir un correo");
        document.getElementById('correo').focus();
        return false;
    }
    if (arroba == -1){
        alert("Escriba un correo válido");
        document.getElementById('correo').focus();
        return false;
    }
    if (punto == -1){
        alert("Escriba un correo válido");
        document.getElementById('correo').focus();
        return false;
    }
    if (arroba > punto){
        alert("Escriba un correo válido");
        document.getElementById('correo').focus()
        return false;
    }
    if (pass < 5){
        alert("La contraseña debe tener mínimo 5 caracteres");
        document.getElementById('password').focus();
        return false;
    }
    return true;
}