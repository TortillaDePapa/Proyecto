<?php
include_once 'Persistencia/ClaseProductoBD.php';
    


$p = new ProductoBD();
if(isset($_POST['buscar'])){
    $MostrarPedidos = $p -> Mostrarpedidos($_POST['buscar']);


}else{

    $MostrarPedidos = $p -> Mostrarpedidos('');

}





echo "  <div class='tabla' id='tablapedidos'>";
echo "  <table class='table table-dark table-striped table-hover text-center'>";
echo "  <thead>";
echo "  <tr>";
echo "   <th scope='col'> IDEnvio </th>";
echo "   <th scope='col'> Cliente</th>";
echo "   <th scope='col'> Direccion</th>";
echo "   <th scope='col'> Metodo de pago </th>";
echo "   <th scope='col'> Metodo de entrega </th>";
echo "   <th scope='col'> Estado  </th>";
echo "   <th scope='col'> Control  </th>";
echo "   <th scope='col'> Factura </th>";

echo " </tr>";
echo "  </thead>";
echo " <tbody>";
echo "   <tr>";

for($i = 1; $i < count($MostrarPedidos); $i++){

echo "    <th scope='row'> ".$MostrarPedidos[$i] -> getIDEnvio()." </th>";
echo "     <td> ".$MostrarPedidos[$i] -> getNombre()." </td>";
echo "     <td> ".$MostrarPedidos[$i] -> getDireccion()." </td>";
echo "     <td> ".$MostrarPedidos[$i] -> getMetodoPago()." </td>";
echo "     <td> ".$MostrarPedidos[$i] -> getEstadoEnvio()." </td>";

if($MostrarPedidos[$i] -> getEstado() == 1){
echo "     <td> Esperando  </td>";
}elseif($MostrarPedidos[$i] -> getEstado()==2){
    echo "     <td> En Proseso </td>";
}elseif($MostrarPedidos[$i] -> getEstado()==3){
    echo "     <td> Finalizado  </td>";
}
echo "     <td>  <button class='btn-sm btn-warning'   onclick='Procesando(".$MostrarPedidos[$i] -> getIDEnvio().")'> En proceso </button> <button class='btn-sm btn-danger'  onclick='FinalizarC(\"".$MostrarPedidos[$i] -> getIDEnvio()."\")' > Finalizado </button> </td>";
echo "     <td> <button type='button' class='btn-danger btn-visualizar'  data-bs-toggle='modal' data-bs-target='#recibo2' onclick='VerFacturaA(\"".$MostrarPedidos[$i] -> getIDEnvio()."\")'> <i class='bi bi-eye-fill'></i>   </button> </td>";
echo "    </tr>";

}
echo " </tbody>";
echo " </table>";
echo " </div>";


?>


<script>
    function VerFacturaA(id){
      var idenvio = id;
      var obAjax = new XMLHttpRequest();
      obAjax.onload = function () {
        document.getElementById('TablaF').innerHTML = this.responseText;
        console.log(this.responseText);       
   
      }
      obAjax.open('POST', 'Persistencia/Aumentartabla.php', true);
      obAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      obAjax.send("MostrarFactura="+idenvio);
    }

    function Procesando(id){
        
      let formData = id;
      var obAjax = new XMLHttpRequest();
      obAjax.open('POST', 'Persistencia/ControlPedido.php', true);
      obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      obAjax.onreadystatechange = function () {
        console.log(this.responseText);
        window.location.reload();
      }
      obAjax.send('ActualizarC1='+formData);
    }
    
    function FinalizarC(id){
        
      let formData = id;
      var obAjax = new XMLHttpRequest();
      obAjax.open('POST', 'Persistencia/ControlPedido.php', true);
      obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      obAjax.onreadystatechange = function () {
        console.log(this.responseText);
        window.location.reload();
      }
      obAjax.send('ActualizarC2='+formData);
    
    }
</script>