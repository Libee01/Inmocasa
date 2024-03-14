function hideLogoAndShowForm() {
    document.getElementById('logo').style.display = 'none'; // Oculta el logo
    document.getElementById('loginForm').style.display = 'block'; // Muestra el formulario de botones
}

function showRegistrationForm() {
    document.getElementById('loginForm').style.display = 'none'; // Oculta el formulario de botones
    document.getElementById('registerForm').style.display = 'block'; // Muestra el formulario de registro
}
function toggleLoginFormVisibility() {
    var loginForm = document.getElementById('loginForm2');
    loginForm.style.display = (loginForm.style.display === 'none' || loginForm.style.display === '') ? 'block' : 'none';
}
function hideLogoAndShowForm() {
    var logo = document.getElementById('logo');
    var loginForm = document.getElementById('loginForm');

    logo.style.display = 'none';
    loginForm.style.display = 'block';
}

function goBackToHome() {
    var logo = document.getElementById('logo');
    var loginForm = document.getElementById('loginForm');
    logo.style.display = 'block';
    loginForm.style.display = 'none';
}
/*-----------------------------------------------------------------------------------------------------------------------------------*/
function hideLogoAndShowForm2() {
    document.getElementById('loginForm').style.display = 'none'; // Oculta el formulario de botones
    document.getElementById('loginForm2').style.display = 'block'; // Muestra el formulario de inicio de sesión
}

function showButtons() {
    document.getElementById('loginForm').style.display = 'block'; // Muestra el formulario de botones
    document.getElementById('loginForm2').style.display = 'none'; // Oculta el formulario de inicio de sesión
    document.getElementById('registerForm').style.display = 'none'; // Oculta el formulario de registro
}

function validar1(){
    var email = document.getElementById('correo').value.trim().length;
    var passwd = document.getElementById('pass').value.trim().length;
    var mail = document.getElementById('correo').value.trim();
    var arroba = mail.indexOf('@');
    var punto = mail.indexOf('.');
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
    if (passwd < 5){
        alert("La contraseña debe tener mínimo 5 caracteres");
        document.getElementById('pass').focus();
        return false;
    }
    return true;
}
function validar2(){
    var username = document.getElementById('username').value.trim().length;
    var email = document.getElementById('correo2').value.trim().length;
    var passwd = document.getElementById('pass2').value.trim().length;
    var mail = document.getElementById('correo2').value.trim();
    var arroba = mail.indexOf('@');
    var punto = mail.indexOf('.');
    if (username == 0){
        alert("Debe introducir un nombre de usuario")
        document.getElementById('username').focus();
        return false;
    }
    if (email == 0){
        alert("Debe introducir un correo");
        document.getElementById('correo2').focus();
        return false;
    }
    if (arroba == -1 || punto == -1 || punto < arroba) {
        alert("Escriba un correo válido");
        document.getElementById('correo2').focus();
        return false;
    }
    if (passwd < 5){
        alert("La contraseña debe tener mínimo 5 caracteres");
        document.getElementById('pass2').focus();
        return false;
    }
    return true;
}

function listar(){
    window.location.href = './php/pisos/listarpisoinvitado.php';
}
function usuarios(){
    window.location.href = './usuarios.php';
}function pisos(){
    window.location.href = './pisos.php';
}