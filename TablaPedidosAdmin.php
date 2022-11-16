<?php
include_once 'Persistencia/ClaseProductoBD.php';
    

    $p = new ProductoBD();
    $MostrarPedidos = $p -> Mostrarpedidos('');




echo "  <div class='tabla' id='tablaproductos'>";
echo "  <table class='table table-dark table-striped table-hover text-center'>";
echo "  <thead>";
echo "  <tr>";
echo "   <th scope='col'> IDEnvio </th>";
echo "   <th scope='col'> Cliente</th>";
echo "   <th scope='col'> Direccion</th>";
echo "   <th scope='col'> IDFactura </th>";
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
echo "     <td> ".$MostrarPedidos[$i] -> getIDProducto()." </td>";

if($MostrarPedidos[$i] -> getEstado() == 1){
echo "     <td> 'Esperando'  </td>";
}elseif($MostrarPedidos[$i] -> getEstado()==2){
    echo "     <td> 'En Proseso'  </td>";
}elseif($MostrarPedidos[$i] -> getEstado()==3){
    echo "     <td> 'Finalizado'  </td>";
}
echo "     <td>  <button class='btn-sm btn-warning'   onclick='MostrarProducto(".$MostrarPedidos[$i] -> getIDProducto().")'> En proceso </button> <button class='btn-sm btn-danger'  onclick='Eliminar(\"".$MostrarPedidos[$i] -> getIDProducto()."\")' > Finalizado </button> </td>";
echo "     <td> <button type='button' class='btn-danger btn-visualizar'  data-bs-toggle='modal' data-bs-target='#recibo1' onclick='VerFactura(\"".$MostrarPedidos[$i] -> getIDEnvio()."\")'> <i class='bi bi-eye-fill'></i>   </button> </td>";
echo "    </tr>";

}
echo " </tbody>";
echo " </table>";
echo " </div>";


?>