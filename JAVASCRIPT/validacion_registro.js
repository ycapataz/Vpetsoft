//se toman los datos de los campos input del form
const correo_electronico = document.getElementById('correo_electronico');
const contraseña = document.getElementById('contraseña');
const correoError = document.getElementById('correo_error');
const contraseñaError = document.getElementById('contraseña_error');

const nombre = document.getElementById('nombre');
const nombre_error = document.getElementById('nombre_error');

const apellido = document.getElementById('apellido');
const apellido_error = document.getElementById('apellido_error');

const cedula = document.getElementById('cedula');
const cedulaError = document.getElementById('cedula_error');

const telefono = document.getElementById('telefono');
const telefonoError = document.getElementById('telefono_error');

const contraseña_2 = document.getElementById('contraseña_2');
const contraseña2_error = document.getElementById('contraseña2_error');

const emailRegex = /\w+(@)(gmail|hotmail|outlook|yahoo)(\.(com|edu|co)){1,2}/;
const passwordRegex = /^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[-+#*@.]).{8,}$/;
const nombreRegex = /^[a-zA-Záéíóú]{3,15}$/;
const apellidoRegex = /^[a-zA-Záéíóú]{3,15}$/;
const cedulaRegex = /([0-9]){7,10}/;
const telefonoRegex = /(350|351|310|311|312|313|314|320|321|322|323|315|316|317|318|319|319|300|301|305)\d{7}/;
const validatePassword2 = /^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[-+#*]).{8,}$/;


nombre.addEventListener('input',function(){
    if (!validateNombre(nombre.value)) {
        nombre_error.style.display = 'block';
        nombre.style.border = '3px solid red';
    } else {
        nombre_error.style.display = 'none';
        nombre.style.border = '3px solid green';
    }
});

apellido.addEventListener('input', function(){
    if (!validateApellido(apellido.value)) {
        apellido_error.style.display = 'block';
        apellido.style.border = '3px solid red';
    } else {
        apellido_error.style.display = 'none';
        apellido.style.border = '3px solid green';
    }
});

cedula.addEventListener('input',function(){
    if (!validateCedula(cedula.value)) {
        cedulaError.style.display = 'block';
        cedula.style.border = '3px solid red';
    } else {
        cedulaError.style.display = 'none';
        cedula.style.border = '3px solid green';
    }
});

correo_electronico.addEventListener('input', function() {
    if (!validateEmail(correo_electronico.value)) {
        correoError.style.display = 'block';
        correo_electronico.style.border = '3px solid red'; 
    } else {
        correoError.style.display = 'none';
        correo_electronico.style.border = '3px solid green'; 
    }
});

telefono.addEventListener('input',function(){
    if (!validateCedula(telefono.value)) {
        telefonoError.style.display = 'block';
        telefono.style.border = '3px solid red';
    } else {
        telefonoError.style.display = 'none';
        telefono.style.border = '3px solid green';
    }
});

contraseña.addEventListener('input', function() {
    if (!validatePassword(contraseña.value)) {
        contraseñaError.style.display = 'block';
        contraseña.style.border = '3px solid red';
    } else {
        contraseñaError.style.display = 'none';
        contraseña.style.border = '3px solid green';
    }
});

contraseña_2.addEventListener('input', function() {
    if (contraseña.value !== contraseña_2.value) {
        contraseña2_error.style.display = 'block';
        contraseña_2.style.border = '3px solid red';
    } else {
        contraseña2_error.style.display = 'none';
        contraseña_2.style.border = '3px solid green';
    }
});
function validateEmail(email) {
    return emailRegex.test(email);
}

function validatePassword(password) {
    return passwordRegex.test(password);
}

function validateNombre(nombre) {
    return nombreRegex.test(nombre);
}

function validateApellido(apellido) {
    return apellidoRegex.test(apellido);
}

function validateCedula(cedula) {
    return cedulaRegex.test(cedula);
}
function validateTelefono(telefono) {
    return telefonoRegex.test(telefono);
}
