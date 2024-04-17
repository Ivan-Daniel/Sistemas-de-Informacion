function obtenerParametro(nombre) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(nombre);
}

// Verificar si existe un mensaje en la URL y mostrarlo
document.addEventListener('DOMContentLoaded', function() {
    const mensajeExito = obtenerParametro('mensaje');
    const detalleError = obtenerParametro('detalle');

    if (mensajeExito === 'exito') {
        alert('Registro insertado correctamente');
    } else if (mensajeExito === 'error' && detalleError) {
        alert(`Error al insertar el registro: ${decodeURIComponent(detalleError)}`);
    }
});