function validar() {
    var id = document.getElementById('idpiso').value.trim().length;
    if (id == 0) {
        alert("Debe introducir un id de piso");
        document.getElementById('idpiso').focus();
        return false;
    }
    return true;
}