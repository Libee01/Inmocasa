function validar(){
    var cod_piso = document.getElementById('cod_piso').value.trim().length;
    var calle = document.getElementById('calle').value.trim().length;
    var num = document.getElementById('num').value.trim().length;
    var piso = document.getElementById('piso').value.trim().length;
    var puerta = document.getElementById('puerta').value.trim().length;
    var cp = document.getElementById('CP').value.trim().length;
    var metros = document.getElementById('metros').value.trim().length;
    var precio = document.getElementById('precio').value.trim().length;
    var imagen = document.getElementById('imagen').value.trim(),length;
    var user_id = document.getElementById('user_id').value.trim().length;
    if (cod_piso == 0){
        alert("Debe introducir un código de piso");
        document.getElementById('cod_piso').focus();
        return false;
    }
    if (calle == 0){
        alert("Debe introducir una calle");
        document.getElementById('calle').focus();
        return false;
    }
    if (num == 0){
        alert("Debe introducir una calle");
        document.getElementById('calle').focus();
        return false;
    }
    if (piso == 0){
        alert("Debe introducir un piso");
        document.getElementById('piso').focus();
        return false;
    }
    if (puerta == 0){
        alert("Debe introducir una puerta");
        document.getElementById('pùerta').focus();
        return false;
    }
    if (cp == 0){
        alert("Debe introducir un código postal");
        document.getElementById('CP').focus();
        return false;
    }
    if (metros == 0){
        alert("Debe introducir el número de metros");
        document.getElementById('metros').focus();
        return false;
    }
    if (precio == 0){
        alert("Debe introducir el precio");
        document.getElementById('precio').focus();
        return false;
    }
    if (user_id == 0){
        alert("Debe introducir su id");
        document.getElementById('user_id').focus();
        return false;
    }
    if (imagen == 0){
        alert("Debe introducir una imagen");
        document.getElementById('imagen').focus();
        return false;
    }
    return true;
}