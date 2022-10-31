<?php
include_once 'Persistencia/ClaseProductoBD.php';





$p = new ProductoBD();
if(isset($_POST['buscar'])){
    $MostrarProductos = $p -> Mostrarproductos($_POST['buscar']);

}else{

    $MostrarProductos = $p -> Mostrarproductos('');

}



echo "  <div class='tabla ' id='tablaproductos'>";
echo "  <table class='table table-dark table-striped table-hover text-center w-90' style='max-width: 100%; min-width: 90%;'>";
echo "  <thead>";
echo "  <tr>";
echo "   <th scope='col'> ID </th>";
echo "   <th scope='col'> Codigo Barra</th>";
echo "   <th scope='col'> Nombre</th>";
echo "   <th scope='col'> Precio</th>";
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

for($i = 1; $i < count($MostrarProductos); $i++){

echo "    <th scope='row'> ".$MostrarProductos[$i] -> getIDProducto()." </th>";
echo "     <td> ".$MostrarProductos[$i] -> getCodBarra()." </td>";
echo "     <td> ".$MostrarProductos[$i] -> getNombre()." </td>";
echo "     <td> ".$MostrarProductos[$i] -> getPrecio()." </td>";
echo "     <td> ".$MostrarProductos[$i] -> getDescripcion()."  </td>";
echo "     <td> ".$MostrarProductos[$i] -> getStock()."  </td>";
echo "     <td> ".$MostrarProductos[$i] -> getEstado()."  </td>";
echo "     <td>  <button class='btn-sm btn-warning'  data-bs-toggle='modal' data-bs-target='#ModalModificarProducto'  onclick='MostrarProducto(".$MostrarProductos[$i] -> getIDProducto().")'> Modificar </button> </td>";
echo "     <td>  <button class='btn-sm btn-danger'  onclick='Eliminar(\"".$MostrarProductos[$i] -> getIDProducto()."\")' > Eliminar </button> </td>";
echo "     <td>  <button class='btn-sm btn-success'  onclick='AgregarDenuevo(\"".$MostrarProductos[$i] -> getIDProducto()."\")' > Reincorporar </button> </td>";
echo "    </tr>";

}
echo " </tbody>";
echo " </table>";
echo " </div>";


?>