function validar() {
    var user = document.getElementById('usuario').value.trim().length;
    if (user == 0){
        alert("Debe introducir un nombre de usuario");
        document.getElementById('usuario').focus();
        return false;
    }
    return true;
}