//numeros
function numero(e) {
    key = e.keyCode || e.whick;
    teclado = String.fromCharCode(key);
    numeros = "0123456789";
    especiales = "8-46";
    teclado_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
        }
    }
    if (numeros.indexOf(teclado) == -1 && !teclado_especial) {
        return false;
    }
}

    $("#logeando").click(function( ){
      envioInfo();
    });
    function envioInfo()
    {
      $.post("modal/logi.php", {"txtusuario":$("#txtusuario").val(),"txtpassword":$("#txtpassword").val()}, function(data){
        if(data.resultado)
        {
          if(data.resultado==1)
          {
            location.href='admin/iniOperaciones.php'
          }
          else if(data.resultado==2)
          {
            swal("Lo sentimos ya no tiene acceso al sistema, comuniquese con el Administrador","","info");
          }
        }else{
          swal("Hola!! algo anda mal con sus credenciales, verifique su información!", "...", "error");
        /*  ({
                type: 'error',
                title: 'La contraseña es incorrecta',
                showConfirmButton: false,
                timer: 3000 // es ms (mili-segundos)
            })*/
        }
      },"json");

    }
function tecleo(event)
{
  var codigo = event.which || event.keyCode;
  //console.log("Presionada: " + codigo);
  if(codigo === 13)
  {
    envioInfo();
  }
}
