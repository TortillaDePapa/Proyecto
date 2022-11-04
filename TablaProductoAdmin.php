<?php
include_once 'Persistencia/ClaseProductoBD.php';





$p = new ProductoBD();
if(isset($_POST['buscar'])){
    $MostrarProductos = $p -> Mostrarproductos($_POST['buscar']);

}else{

    $MostrarProductos = $p -> Mostrarproductos('');

}




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

// Agrega articulo
    
if (isset($_POST['AgregarArticulos'])) {
    $Directorio = "imagenes/";
$archivoDestino = $Directorio . basename($_FILES['Imagen']["name"]);
$subirOK = true;
$imageFileType = strtolower(pathinfo($archivoDestino,PATHINFO_EXTENSION));
// Compruebe si el archivo de imagen es una imagen real o una imagen falsa
$check = getimagesize($_FILES["Imagen"]["tmp_name"]);
if($check) {
  
  $subirOK = true;
} else {
  
  $subirOK = false;
}
//chequeamos si el archivo existe
// if (file_exists($archivoDestino)) {
//   echo "Lo sentimos, el archivo ya existe.";
//   $subirOK = false;
// }
//Comprobar el tamaño del archivo
if ($_FILES["Imagen"]["size"] > 500000) {

$subirOK = false;
}

// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
//   echo "Lo sentimos, solo se permiten archivos JPG, JPEG, PNG.";
//   $subirOK = false;
// }

// Compruebe si $subirOK está establecido en false por algun un error
// if (!$subirOK) {
//   echo "Lo sentimos, su archivo no fue subido.";
// // si todo está bien, intente cargar el archivo
// } else {

if (move_uploaded_file($_FILES["Imagen"]["tmp_name"], $archivoDestino)) {
  $a = new ProductoBD();
  $a1 = new Producto();
  $a2 = new Categoria();
  $a1 -> setCodBarra($_POST['CodBarras']);
  $a1 -> setImagen(htmlspecialchars( basename( $_FILES["Imagen"]["name"])));
  $a1 -> setDescripcion($_POST['Descripcion']);
  $a1 -> setStock($_POST['Stock']);
  $a1 -> setNombre($_POST['NombreProducto']);
  $a1 -> setPrecio($_POST['PrecioProducto']);
  $a2 -> setCategoria($_POST['Categoria']);

   $a -> CargarProducto($a1,$a2);
} else {

}
}

?>