function validar() {
    var cod_piso = document.getElementById('codpiso').value.trim().length;
    if (cod_piso == 0){
        alert("Debe introducir un código de piso");
        document.getElementById('codpiso').focus();
        return false;
    }
    return true;
}