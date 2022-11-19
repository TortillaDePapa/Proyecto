<?php
include_once 'Persistencia/ClaseProductoBD.php';
    
$p = new ProductoBD();
if(isset($_POST['buscar'])){
    $MostrarPedidos = $p -> Mostrarpedidoscliente($_POST['buscar']);

}else{
    $MostrarPedidos = $p -> Mostrarpedidoscliente('');
}



  echo "  <div class='tabla table-responsive' id='tablacompras'>";
  echo "  <table class='table  table-dark table-striped table-hover text-center table-sm' style='max-width: 100%; min-width: 90%;'>";
  echo "  <thead>";
  echo "  <tr>";
  echo "  <th scope='col'> Orden de compra </th>";
  echo "  <th scope='col'> Fecha </th>";
  echo "  <th scope='col'> Total </th>";
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
  echo "     <td><img src='imagenes/tiempo.png' width='50px' height='30px'> </td>";
  echo "     <td> <button type='button' class='btn-danger btn-visualizar'  data-bs-toggle='modal' data-bs-target='#recibo1' onclick='VerFactura(\"".$MostrarPedidos[$i] -> getIDEnvio()."\")'> <i class='bi bi-eye-fill'></i>   </button>";

  echo "    </tr>";
}  

  echo " </tbody>";
  echo " </table>";
  echo " </div>";

  
  
  ?>





