// Esperar a que la ventana se cargue antes de ejecutar las funciones
window.onload = function () {
    const imagen = document.getElementById('imagenKirby');
    obtenerResolucion(imagen);
    obtenerTamanoArchivo(imagen.src);
}


window.onload = ajustarImagen;
window.onresize = ajustarImagen;

function ajustarImagen() {
    var imagen = document.getElementById('imagenKirby');
    if (imagen.naturalWidth > imagen.naturalHeight) {
        // La imagen es más ancha que alta
        imagen.style.maxWidth = '40vw';
        imagen.style.maxHeight = '70vh';
    } else {
        // La imagen es más alta que ancha
        imagen.style.maxHeight = '67vh';
        imagen.style.maxWidth = '110vw';
    }
}
