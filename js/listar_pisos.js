function validar() {
    var zona = document.getElementById('zona').value.trim().length;
    var calle = document.getElementById('calle').value.trim().length;
    if (zona == 0){
        alert("Debe introducir una zona");
        document.getElementById('zona').focus();
        return false;
    }
    if (calle == 0){
        alert("Debe introducir una calle");
        document.getElementById('calle').focus();
        return false;
    }
    return true;
}
function mostrar() {
    var menu = document.querySelector('.menu');
    var opciones = document.querySelectorAll('.opcion');
    menu.style.display = 'block';
    opciones.forEach(function(opcion) {
      opcion.style.display = 'block';
    });
  }
  
  function ocultar() {
    var menu = document.querySelector('.menu');
    var opciones = document.querySelectorAll('.opcion');
    menu.style.display = 'none';
    opciones.forEach(function(opcion) {
      opcion.style.display = 'none';
    });
  }
  