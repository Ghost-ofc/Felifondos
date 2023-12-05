function agregarFavorito(nombreImagen, usuario) {
    // Realiza una petición AJAX para agregar/quitar de favoritos
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "PHP/Logica/AgregarFavorito.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Actualiza la apariencia según la respuesta del servidor
            if (xhr.responseText == "agregado") {
                document.querySelector(".icono-favorito").classList.add("favorito-activo");
            } else if (xhr.responseText == "eliminado") {
                document.querySelector(".icono-favorito").classList.remove("favorito-activo");
            }
        }
    };
    xhr.send("imagen=" + nombreImagen + "&usuario=" + usuario);
}

function redirigir(){
    window.location.href = "iniciar_sesion.php";
}