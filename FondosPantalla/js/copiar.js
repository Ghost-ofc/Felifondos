var urlActual = window.location.href;

// Asignar la URL actual al elemento con id "enlaceParaCopiar"
document.getElementById("enlaceParaCopiar").textContent = urlActual;

function copiarTexto() {
    // Crea un elemento input temporal
    const inputTemp = document.createElement('input');
    // Obtiene el texto del párrafo que deseas copiar
    inputTemp.value = document.getElementById('enlaceParaCopiar').innerText;
    // Añade el input temporal al DOM
    document.body.appendChild(inputTemp);
    // Selecciona el texto dentro del input
    inputTemp.select();
    // Copia el texto seleccionado al portapapeles
    document.execCommand('copy');
    // Elimina el input temporal
    document.body.removeChild(inputTemp);

    // Muestra la notificación
    var alerta = document.getElementById('alertaCopiado');
    alerta.className = 'alerta-copiado mostrar';

    // Después de 3 segundos, oculta la notificación
    setTimeout(function () {
        alerta.className = 'alerta-copiado';
    }, 3000);
}

// Agrega el listener al botón 'Copiar'
document.getElementById('copiar').addEventListener('click', copiarTexto);

function ajustarImagen() {
    var imagen = document.getElementById('favorito');
    if (imagen.naturalWidth > imagen.naturalHeight) {
        // La imagen es más ancha que alta
        imagen.style.maxWidth = '50vw';
        imagen.style.maxHeight = '90vh';
    } else {
        // La imagen es más alta que ancha
        imagen.style.maxHeight = '50vh';
        imagen.style.maxWidth = '90vw';
    }
}