function duplicarCampos() {
    // Obtener referencia al campo de cantidad existente
    const campoCantidad = document.getElementById('cantidad');

    // Clonar el campo de cantidad
    const nuevoCampoCantidad = campoCantidad.cloneNode(true);

    // Establecer el valor en blanco para el campo clonado
    nuevoCampoCantidad.querySelector('input').value = '';

    // Obtener referencia al campo de medicamento existente
    const campoMedicamento = document.getElementById('medicamento');

    // Clonar el campo de medicamento
    const nuevoCampoMedicamento = campoMedicamento.cloneNode(true);

    // Establecer la opción seleccionada en blanco para el campo clonado
    nuevoCampoMedicamento.querySelector('select').selectedIndex = 0;

    // Obtener referencia al campo de observaciones existente
    const campoObservaciones = document.getElementById('grupo__Observaciones');

    // Clonar el campo de observaciones
    const nuevoCampoObservaciones = campoObservaciones.cloneNode(true);

    // Establecer el valor en blanco para el campo clonado
    nuevoCampoObservaciones.querySelector('textarea').value = '';

    // Obtener referencia al contenedor del formulario
    const contenedor = document.getElementById('formulario');

    // Obtener referencia al botón de enviar
    const botonEnviar = document.getElementById('btn');


    // Agregar los campos clonados y el botón de enviar al contenedor
    contenedor.appendChild(nuevoCampoCantidad);
    contenedor.appendChild(nuevoCampoMedicamento);
    contenedor.appendChild(nuevoCampoObservaciones);
    contenedor.appendChild(botonEnviar);

    // Establecer el ancho del botón de enviar
    botonEnviar.style.width = "200px";

}


