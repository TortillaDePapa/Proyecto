<?php
include_once 'Persistencia/ClaseProductoBD.php';


echo "  <div class='tabla' id='tablaproductos'>";
echo "  <table class='table table-dark table-striped table-hover text-center'>";
echo "  <thead>";
echo "  <tr>";
echo "   <th scope='col'> IDEnvio </th>";
echo "   <th scope='col'> Direccion</th>";
echo "   <th scope='col'> IDProductos</th>";
echo "   <th scope='col'> </th>";
echo "   <th scope='col'> Descripcion</th>";
echo "   <th scope='col'> Stock </th>";
echo "   <th scope='col'> Estado </th>";
echo "   <th scope='col'> Modificar </th>";
echo "   <th scope='col'> Eliminar </th>";
echo "   <th scope='col'> Incorporar </th>";
echo " </tr>";
echo "  </thead>";
echo " <tbody>";
echo "   <tr>";

for($i = 1; $i < count($MostrarPedidos); $i++){

echo "    <th scope='row'> ".$Mostrar[$i] -> getIDProducto()." </th>";
echo "     <td> ".$MostrarPedidos[$i] -> getCodBarra()." </td>";
echo "     <td> ".$MostrarPedidos[$i] -> getNombre()." </td>";
echo "     <td> ".$MostrarPedidos[$i] -> getPrecio()." </td>";
echo "     <td> ".$MostrarPedidos[$i] -> getDescripcion()."  </td>";
echo "     <td> ".$MostrarPedidos[$i] -> getStock()."  </td>";
echo "     <td> ".$MostrarPedidos[$i] -> getEstado()."  </td>";
echo "     <td>  <button class='btn-sm btn-warning'  data-bs-toggle='modal' data-bs-target='#ModalModificarProducto'  onclick='MostrarProducto(".$MostrarPedidos[$i] -> getIDProducto().")'> Modificar </button> </td>";
echo "     <td>  <button class='btn-sm btn-danger'  onclick='Eliminar(\"".$MostrarPedidos[$i] -> getIDProducto()."\")' > Eliminar </button> </td>";
echo "     <td>  <button class='btn-sm btn-success'  onclick='AgregarDenuevo(\"".$MostrarPedidos[$i] -> getIDProducto()."\")' > Incorporar </button> </td>";
echo "    </tr>";

}
echo " </tbody>";
echo " </table>";
echo " </div>";


?>