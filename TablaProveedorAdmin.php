<?php

include_once 'Persistencia/ClaseProveedorBD.php';


$p = new ProveedorBD();
if(isset($_POST['buscar'])){
    $MostrarProveedor = $p -> MostrarProveedor($_POST['buscar']);


}else{

    $MostrarProveedor = $p -> MostrarProveedor('');

}


echo "  <div class='tabla' id='tablaproveedor'>";
echo "  <table class='table table-dark table-striped table-hover text-center' >";
echo "  <thead>";
echo "  <tr>";
echo "  <th scope='col'> ID </th>";
echo "  <th scope='col'> Nombre </th>";
echo "  <th scope='col'> Gmail </th>";
echo "  <th scope='col'> Telefono </th>";
echo "  <th scope='col'> Estado </th>";
echo "  <th scope='col'> Modificar </th>";
echo "  <th scope='col'> Eliminar </th>";
echo "  <th scope='col'> Incorporar </th>";
echo " </tr>";
echo "  </thead>";
echo " <tbody>";
echo "   <tr>";

for($i = 1; $i < count($MostrarProveedor); $i++){

echo "    <th scope='row'> ".$MostrarProveedor[$i] -> getIDProveedor()." </th>";
echo "     <td> ".$MostrarProveedor[$i] -> getNombreProveedor()." </td>";
echo "     <td> ".$MostrarProveedor[$i] -> getGmail()." </td>";
echo "     <td> ".$MostrarProveedor[$i] -> getTelefonoProveedor()." </td>";
echo "     <td> ".$MostrarProveedor[$i] -> getEstado()."  </td>";
echo "     <td>  <button class='btn-sm btn-warning'  type='submit' data-bs-toggle='modal' data-bs-target='#ModalModificarProveedor'> Modificar </button> </td>";
echo "     <td>  <button class='btn-sm btn-danger'  onclick='Eliminar(\"".$MostrarProveedor[$i] -> getIDProveedor()."\")' > Eliminar </button> </td>";
echo "     <td>  <button class='btn-sm btn-success'  onclick='AgregarDenuevo(\"".$MostrarProveedor[$i] -> getIDProveedor()."\")' > Reincorporar </button> </td>";
echo "    </tr>";

}
echo " </tbody>";
echo " </table>";
echo " </div>";







?>