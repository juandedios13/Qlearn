class validaciones{
    validartext(cadena) {
        var valor = cadena; 
        if (!(/^[a-zA-Z]+$/.test(valor))){
            //alert("Ingrese solo letras");
            valor=valor.substr(0,valor.length-1);
            return valor;
        }else{
            return valor;
        }
    }

    validarEmail(valor) {
        if (valor.length>0){
            if (!(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/.test(valor))){
                //alert("La dirección de email no tiene el formato correcto.");
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
      }

    validarContra(valor) {
        if (valor.length > 0){
            if (!(/^(?=.*\d)(?=.*[\u0021-\u002b\u003c\u00B07-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/.test(valor))){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
}