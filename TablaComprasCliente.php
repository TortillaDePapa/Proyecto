<?php
include_once 'Persistencia/ClaseProductoBD.php';
    
$p = new ProductoBD();
if(isset($_POST['buscar'])){
    $MostrarPedidos = $p -> Mostrarpedidoscliente($_POST['buscar']);

}else{
    $MostrarPedidos = $p -> Mostrarpedidoscliente('');
}



  echo "  <div class='tabla ' id='tablacompras'>";
  echo "  <table class='table  table-dark table-striped table-hover text-center table-sm' style='max-width: 100%; min-width: 90%;'>";
  echo "  <thead>";
  echo "  <tr>";
  echo "  <th scope='col'> Orden de compra </th>";
  echo "  <th scope='col'> Fecha </th>";
  echo "  <th scope='col'> Total </th>";
  echo "  <th scope='col'> Estado </th>";
  echo "  <th scope='col'> Metodo de entrega </th>";
  echo "  <th scope='col'> Visualizar </th>";
  echo " </tr>";
  echo "  </thead>";
  echo " <tbody>";
  for($i = 1; $i <count($MostrarPedidos); $i++){
  echo "   <tr>";
  
  
  
  echo "     <td> ".$MostrarPedidos[$i] -> getIDEnvio()." </td>";
  echo "     <td> ".$MostrarPedidos[$i] -> getFecha()." </td>";
  echo "     <td> ".$MostrarPedidos[$i] -> getPrecio()." </td>";
  if(strcmp($MostrarPedidos[$i] -> getEstadoEnvio(), "Envio a domicilio" )=== 0){
    if($MostrarPedidos[$i] -> getEstado() == 1){
    echo "     <td> <img src='imagenes/tiempo.png' width='50px' height='30px'> aca va imagen1 </td>";
    }elseif($MostrarPedidos[$i] -> getEstado()== 2){
      echo "     <td> <img src='imagenes/tiempo.png' width='50px' height='30px'> </td>";
    }elseif($MostrarPedidos[$i] -> getEstado() == 3){
      echo "     <td> <img src='imagenes/tiempo.png' width='50px' height='30px'> aca va imagen 3 </td>";
    }
  }elseif(strcmp($MostrarPedidos[$i] -> getEstadoEnvio(), "Retira en local" )=== 0){
    if($MostrarPedidos[$i] -> getEstado() == 1){
      echo "     <td> Procesando la compra </td>";
      }elseif($MostrarPedidos[$i] -> getEstado()== 2){
        echo "     <td>  Mercaderia lista </td>";
      }elseif($MostrarPedidos[$i] -> getEstado() == 3){
        echo "     <td> Compra entregada </td>";
      }
  }

  echo "     <td>".$MostrarPedidos[$i] -> getEstadoEnvio()." </td>";
  echo "     <td> <button type='button' class='btn-danger btn-visualizar'  data-bs-toggle='modal' data-bs-target='#recibo1' onclick='VerFactura(\"".$MostrarPedidos[$i] -> getIDEnvio()."\")'> <i class='bi bi-eye-fill'></i>   </button>";

  echo "    </tr>";
}  

  echo " </tbody>";
  echo " </table>";
  echo " </div>";

  
  
  ?>





