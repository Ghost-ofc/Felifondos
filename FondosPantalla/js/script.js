function togglePasswordVisibility() {
    var passwordInput = document.getElementById("contrasena");
    var eyeIcon = document.getElementById("eye-icon");
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeIcon.src = "./imagenes/ocultar.png";
    } else {
      passwordInput.type = "password";
      eyeIcon.src = "./imagenes/mostrar.png";
    }
  }

  function validatePassword() {
    var passwordInput = document.getElementById('contrasena');
    var password = passwordInput.value;

    // Expresiones regulares para verificar mayúsculas, números y símbolos
    var uppercaseRegex = /[A-Z]/;
    var numberRegex = /[0-9]/;
    var symbolRegex = /[!@#$%^&*(),.?":{}|<>]/;

    // Validar cada condición
    var isUppercase = uppercaseRegex.test(password);
    var isNumber = numberRegex.test(password);
    var isSymbol = symbolRegex.test(password);

    // Construir el mensaje de error
    var errorMessage = "";
    errorMessage += password.length >= 8 ? "" : "Debe tener al menos 8 caracteres. ";
    errorMessage += isUppercase ? "" : "Debe tener al menos una mayúscula.";
    errorMessage += isNumber ? "" : "Debe incluir al menos un número.";
    errorMessage += isSymbol ? "" : "Debe contener al menos un símbolo."; 

    // Mostrar el mensaje de error si alguna condición no se cumple
    var passwordHelp = document.getElementById('passwordHelp');
    passwordHelp.textContent = errorMessage.trim();
  }
   
  function validateForm() {
    // Validar la contraseña antes de enviar el formulario
    var passwordInput = document.getElementById('contrasena');
    var password = passwordInput.value;

    // Expresiones regulares para verificar mayúsculas, números y símbolos
    var uppercaseRegex = /[A-Z]/;
    var numberRegex = /[0-9]/;
    var symbolRegex = /[!@#$%^&*(),.?":{}|<>]/;

    // Validar cada condición
    var isUppercase = uppercaseRegex.test(password);
    var isNumber = numberRegex.test(password);
    var isSymbol = symbolRegex.test(password);

    // Si alguna condición no se cumple, mostrar mensaje de error
    if (!(isUppercase && isNumber && isSymbol)) {
      return false;
    }
    // En este punto, la contraseña cumple con los requisitos, y puedes agregar más validaciones si es necesario 

    return true;  
  }

 
  

 