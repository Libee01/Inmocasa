function validar(){
    var id = document.getElementById('id').value.trim().length;
    var num = document.getElementById('id').value.trim();
    if (id == 0){
        alert("Debe introducir un id");
        document.getElementById('id').focus();
        return false;
    }
    if (isNaN(num)){
        alert("El id de usuario debe ser un número");
        document.getElementById('id').focus();
        return false;
    }
    return true;
}