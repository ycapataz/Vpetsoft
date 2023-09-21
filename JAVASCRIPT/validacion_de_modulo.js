const correo_electronico = document.getElementById('correo_electronico');
const correoError = document.getElementById('correo_error');

const telefono = document.getElementById('telefono_1');
const telefonoError = document.getElementById('telefono_error');

const emailRegex = /\w+(@)(gmail|hotmail|outlook|yahoo)(\.(com|edu|co)){1,2}/;
const telefonoRegex = /(350|324|351|310|311|312|313|314|320|321|322|323|315|316|317|318|319|319|300|301|305)\d{7}/;

correo_electronico.addEventListener('input', function() {
    if (!validateEmail(correo_electronico.value)) {
        correoError.style.display = 'block';
        correo_electronico.style.border = '3px solid red';
        document.getElementById('submit_button').disabled = true;
    } else {
        correoError.style.display = 'none';
        correo_electronico.style.border = '3px solid green'; 
        validateForm();
    }
});

telefono.addEventListener('input',function(){
    if (!validateTelefono(telefono.value)) {
        telefonoError.style.display = 'block';
        telefono.style.border = '3px solid red';
        document.getElementById('submit_button').disabled = true;
    } else {
        telefonoError.style.display = 'none';
        telefono.style.border = '3px solid green';
        validateForm();
    }
});


function validateForm() {
    if (validateEmail(correo_electronico.value) && validateTelefono(telefono.value)) {
        document.getElementById('submit_button').disabled = false;
    } else {
        document.getElementById('submit_button').disabled = true;
    }
}

function validateCedulaForm() {
    const submitButton = document.getElementById('submit_button_1');
    const cedulaValue = cedula.value;

    if (!validateCedula(cedulaValue)) {
        submitButton.disabled = true;
    }
    else {
        submitButton.disabled = false;
    }
}

function validateEmail(email) {
    return emailRegex.test(email);
}

function validateTelefono(telefono) {
    return telefonoRegex.test(telefono);
}