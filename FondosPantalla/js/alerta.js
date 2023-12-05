function mostrarAlerta(mensaje, tipo) {
    const alerta = document.getElementById('alerta');
    alerta.textContent = mensaje; // Inserta el mensaje en el contenedor
    alerta.style.display = 'block'; // Muestra la alerta
  
    // Remueve clases previas y añade la clase según el tipo de alerta
    alerta.className = 'alerta-custom';
    if (tipo === 'error') {
      alerta.classList.add('alerta-error');
    } else if (tipo === 'exito') {
      alerta.classList.add('alerta-exito');
    }
  
    // Oculta la alerta después de 3 segundos
    setTimeout(() => {
      alerta.style.display = 'none';
    }, 3000);
}