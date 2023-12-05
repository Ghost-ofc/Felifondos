function cerrarSesion() {
    // Realiza una llamada a tu archivo CerrarSesion.php
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "PHP/Logica/CerrarSesion.php", true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            // Puedes realizar alguna acción con la respuesta del servidor aquí
            console.log(xhr.responseText);
            // Redirige a la página de inicio de sesión o a donde desees
            window.location.href = "index.php";
        }
    };
    xhr.send();
}