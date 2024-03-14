function validar(){
    var id = document.getElementById('id').value.trim().length;
    if (id == 0){
        alert("Debe introducir un id");
        document.getElementById('id').focus();
        return false;
    }
    return true;
}