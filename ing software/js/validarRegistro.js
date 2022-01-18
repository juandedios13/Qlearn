
function validartext(cadena) {
    var valor=document.getElementById(cadena).value; 
    if (!(/^[a-zA-Z]+$/.test(valor))){
        //alert("Ingrese solo letras");
        valor=valor.substr(0,valor.length-1);
        document.getElementById(cadena).value=valor;
    }
  }

  
function validarEmail() {
    valor=document.getElementById("correo").value;
    if (valor.length>0){
        if (!(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/.test(valor))){
            //alert("La dirección de email no tiene el formato correcto.");
        }
    }
  }

  function validarContra() {
    valor=document.getElementById("contrasena").value;
    if (valor.length>0){
        if (!(/^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/.test(valor))){
            //alert("la contraseña no tiene el formato requerido.");
        }
    }
  }