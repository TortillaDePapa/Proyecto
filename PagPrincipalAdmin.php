<?php
include_once 'Persistencia/ClaseProductoBD.php';
include_once 'Clases/ClaseProducto.php';
include_once 'Clases/ClaseCategoria.php';
include_once 'Clases/ClaseEnvasados.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Modal</title>
  <link href="CSS/EstiloAdmin.css" rel="stylesheet">
  <script defer src="js/AbrirPopup.js"></script>
</head>
<body>
  <h1>PAGINA ADMIN</h1>
  <div>
  <button data-modal-target="#modal" class="botonArticulo">Agregar articulo</button>
  </div>
  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title">Nuevo articulo</div>
      <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
      <form action="" method="post"  enctype="multipart/formdata">
        <div class="contenedor-inputs">
          <h4>Codigo de barras</h4>
         <input type="number" name="CodBarra">
         <h4>Imagen del producto</h4>
         <input type="file" name="Imagen">
         <h4>Descripcion del producto</h4>
         <input type="text" name="Descripcion">
         <h4>Stock del producto</h4>
         <input type="number" name="Stock">
         <h4>Nombre del producto</h4>
         <input type="text" name="NombreProducto">
         <h4>Precio del producto</h4>
         <input type="number" name="PrecioProducto">
         <?php    
          $p = new ProductoBD();
          $ListarCategorias = $p -> ObtenerCategorias();
          echo "<h4>Categorias</h4>";
          echo "<select name='' id=''>";
          for($i = 1; $i < count($ListarCategorias); $i++){
          
            echo " <option value='' name='Categoria'>".$ListarCategorias[$i] -> getNombreCategoria()."</option>";
            
          }
          echo "</select>";
        ?>
         <?php    
          $p = new ProductoBD();
          $ListarMedidas= $p -> ObtenerMedida();
          echo "<h4>Unidad de medida</h4>";
          echo "<select name='' id=''>";
          for($i = 1; $i < count($ListarMedidas); $i++){
          
            echo " <option value='' name='UnidadDeMedida'>".$ListarMedidas[$i] -> getEnvasado()."</option>";
            
          }
          echo "</select>";
        ?>
         </div>
         <div class="contenedor">
         <input type="submit" name="NewArticulo" value="Agregar" class="btn-submit" >
         </div>
       </form>
  </div>
  </div>
  <div id="overlay"></div>


   
    <?php
    
    if (isset($_POST['NewArticulo'])) {
      $a = new Producto();
      $a1 = new ProductoBD();
      $a2 = new Categoria();
      $a3 = new Envasado();
      $a -> setCodBarra($_POST['CodBarra']);
      $a -> setImagen($_POST['Imagen']);
      $a -> setDescripcion($_POST['Descripcion']);
      $a -> setStock($_POST['Stock']);
      $a -> setNombre($_POST['NombreProducto']);
      $a -> setPrecio($_POST['PrecioProducto']);
      $a2 -> setNombreCategoria($_POST['Categoria']);
      $a3 -> setTipoEnvase($_POST['UnidadDeMedida']);

      $a1 -> CargarProducto($a,$a2,$a3);
    }
    
    if(isset($_POST['EliminarProducto'])){
        $a = new Producto();
        $a1 = new ProductoBD();
        $a -> setCodBarra($_POST['CodBarraEliminar']);        
        $a1 -> EliminarProducto($a);
      }
    ?>

   
</body>
</html>