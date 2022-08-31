<?php
include_once 'Persistencia/ClaseProductoBD.php';
include_once 'Clases/ClaseProducto.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<marquee><h1>hola cacho perra</h1></marquee>
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off" >



    
    </form>

    <?php
    
    if (isset($_POST['NewArticulo'])) {
      $a = new Producto();
      $a1 = new ProductoBD();

      $a -> setCodBarra($_POST['CodBarra']);
      $a -> setImagen($_FILES['Imagen']);
      $a -> setSKU($_POST['SKU']);
      $a -> setStock($_POST['Stock']);
      $a -> setNombre($_POST['NombreProducto']);
      $a -> setPrecio($_POST['PrecioProducto']);
      $a -> setFechaVencimiento($_POST['FechaVencimiento']);
      $a -> setNombreCategoria($_POST['Categoria']);
      $a -> setUnidadDeMedida($_POST['UnidadDeMedida']);

      $a1 -> CargarProducto($a);
    }
    
    ?>
</body>
</html>