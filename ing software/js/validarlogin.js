

function validarEmail() {
    valor=document.getElementById("correo").value;
    if (/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/.test(valor)){
    // alert("La dirección de email " + valor + " es correcta.");
    } else {
     alert("La dirección de email es incorrecta.");
    }
  }

 