const correo_electronico = document.getElementById('correo_electronico');
const correoError = document.getElementById('correo_error');
const contraseña = document.getElementById('contraseña');
const contraseñaError = document.getElementById('contraseña_error');

const emailRegex = /\w+(@)(gmail|hotmail|outlook|yahoo)(\.(com|edu|co)){1,2}/;
const passwordRegex = /^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[-+#*@.]).{8,}$/;
correo_electronico.addEventListener('input', function() {
    if (!validateEmail(correo_electronico.value)) {
        correoError.style.display = 'block';
        correo_electronico.style.border = '3px solid red'; 
    } else {
        correoError.style.display = 'none';
        correo_electronico.style.border = '3px solid green'; 
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

function validateEmail(email) {
    return emailRegex.test(email);
}
function validatePassword(contraseña) {
    return passwordRegex.test(contraseña);
} 