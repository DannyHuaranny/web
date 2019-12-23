
//pasar nombre
$(function() {
    $.post( 'paginas/pagInicio.php').done( function(respuesta)
    {
      $( '#pagina' ).html( respuesta );
    });
});
function inicio()
{
   $.post( 'paginas/pagInicio.php').done( function(respuesta)
    {
      $( '#pagina' ).html( respuesta );
    });
}
function credito()
{
   $.post( 'paginas/pagCredito.php').done( function(respuesta)
    {
      $( '#pagina' ).html( respuesta );
    });
}
function gestionti(){
    $.post( 'paginas/pagTi.php').done( function(respuesta)
    {
      $( '#pagina' ).html( respuesta );
    });
}
function ventas(){
  $.post( 'paginas/pagVentas.php').done( function(respuesta)
    {
      $( '#pagina' ).html( respuesta );
    });
}
function soporte(){
    $.post( 'paginas/pagSoporte.php').done( function(respuesta)
    {
      $( '#pagina' ).html( respuesta );
    });
}
function desarrollo()
{
   $.post('paginas/pagDesarrollo.php').done( function(respuesta)
    {
      $('#pagina' ).html( respuesta );
    });
}
function contacto()
{
   $.post('paginas/pagContactenos.php').done( function(respuesta)
    {
      $('#pagina' ).html( respuesta );
    });
}
function simulador()
{
   $.post('./pagSimulador.php').done( function(respuesta)
    {
      $('#pagina' ).html( respuesta );
    });
}
