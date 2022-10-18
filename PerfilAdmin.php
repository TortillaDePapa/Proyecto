<?php
include_once 'Clases/ClasePersona.php';
include_once 'Clases/ClaseProveedor.php';
include_once 'Persistencia/ClasePersonaBD.php';
include_once 'Persistencia/ClaseProductoBD.php';
include_once 'Persistencia/ClaseProveedorBD.php';



session_start();

  if(!isset($_SESSION['ADMIN'])){
     header("Location: index.php");
  }
  
  
?>
<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="CSS/principal.css">
  <link rel="stylesheet" href="CSS/admin.css">


  <!-- Icon Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <title>TITLE</title>


</head>

<body>

  <!-- Navbar -->

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">AutoServicio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle me-2" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Categorias <i class="bi bi-list"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Limpieza</a> </li>
              <!-- <li><hr class="dropdown-divider"></li> -->
              <li><a class="dropdown-item" href="#">Hogar</a></li>
              <li><a class="dropdown-item" href="#">Carniceria</a></li>
            </ul>
          </li>
        </ul>
        <input class="form-control me-3" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-buttom btn-custom me-1 boton" type="submit"> </button>

        <?php
            echo"<button class='btn btn-buttom btn-custom me-1'  onclick='Cerrar()'>  <i class='bi bi-box-arrow-in-right'></i> </button>";          
           
            if(isset($_SESSION['CLIENTE'])){
            echo "<div class='dropdown'>";
            echo "<button class='btn btn-buttom btn-secondary dropdown-toggle bg-dark' type='button' data-bs-toggle='dropdown' aria-expanded='false'>";
            echo "<i class='icon bi-person-fill'></i>";
            echo "<span class='position-absolute top-1 start-95 translate-middle p-1 bg-success border border-light rounded-circle'>";
            echo" <span class='visually-hidden'>New alerts</span> ";
            echo" </span>";
            echo " </button>";
            echo "<ul class='dropdown-menu'>";
            echo "<li><a class='dropdown-item NoSelect' href='Perfil.php'>".$_SESSION['CLIENTE']-> getNombre()."</a></li>";
            echo "</ul>";
            echo "</div>";
            }else{
              if(isset($_SESSION['ADMIN'])){
              echo "<div class='dropdown'>";
              echo "<button class='btn btn-buttom btn-secondary dropdown-toggle bg-dark' type='button' data-bs-toggle='dropdown' aria-expanded='false'>";
              echo "<i class='icon bi-person-fill'></i>";
              echo "<span class='position-absolute top-1 start-95 translate-middle p-1 bg-success border border-light rounded-circle'>";
              echo" <span class='visually-hidden'>New alerts</span> ";
              echo" </span>";
              echo " </button>";
              echo "<ul class='dropdown-menu'>";
              echo "<li><a class='dropdown-item NoSelect' href='PerfilAdmin.php'>".$_SESSION['ADMIN']-> getNombre()."</a></li>";
              echo "</ul>";
              echo "</div>";
            }else{
              echo"<a href='Login.php'> <button class='btn btn-buttom btn-custom me-1'  type='submit'>  <i class='bi bi-person-fill'></i> </button></a>";
            }
          }
               echo "<button class='btn btn-buttom btn-custom'  type='submit'> <i class='icon bi-cart3'></i> </button>";
           ?>
      </div>
    </div>
  </nav>


  <!--  

                      <input type="Submit" value="Agregar" name="AgregarProveedor">
                      <input type="Submit" value="Modificar" name="ModificarProveedor">
                      <input type="Submit" value="Eliminar" name="EliminarProveedor">
                      <input type="Submit" value="Mostrar" name="MostrarProveedor">
                      <br>
                      </form>
                      <button onclick="MostrarProveedor()" name="MostrarProveedor" id="MostrarProveedor">Buscar</button>

                  -->

  <?php


$p = new ProductoBD();
$ListarProductos = $p -> Listarproductos();


echo "  <button class='btn btn-success' type='submit' data-bs-toggle='modal' data-bs-target='#ModalAgregarProducto'> Agregar producto</button>";
echo "  <div class='tabla'>";
echo "  <table class='table table-dark table-striped table-hover'>";
echo "  <thead>";
echo "  <tr>";
echo "   <th scope='col'> ID </th>";
echo "   <th scope='col'> Codigo Barra</th>";
echo "   <th scope='col'> Nombre</th>";
echo "   <th scope='col'> Precio</th>";
echo "   <th scope='col'> Descripcion</th>";
echo "   <th scope='col'> Stock </th>";
echo "   <th scope='col'> Modificar </th>";
echo "    <th scope='col'> Eliminar </th>";
echo " </tr>";
echo "  </thead>";
echo " <tbody>";
echo "   <tr>";

for($i = 1; $i < count($ListarProductos); $i++){

echo "    <th scope='row'> ".$ListarProductos[$i] -> getIDProducto()." </th>";
echo "     <td> ".$ListarProductos[$i] -> getCodBarra()." </td>";
echo "     <td> ".$ListarProductos[$i] -> getNombre()." </td>";
echo "     <td> ".$ListarProductos[$i] -> getPrecio()." </td>";
echo "     <td> ".$ListarProductos[$i] -> getDescripcion()."  </td>";
echo "     <td> ".$ListarProductos[$i] -> getStock()."  </td>";
echo "     <td>  <button class='btn-sm btn-success'  type='submit' data-toggle='modal' data-target='#ModalModificar'> Modificar </button> </td>";
echo "     <td>  <button class='btn-sm btn-danger'  type='submit' name='' > Eliminar </button> </td>";
echo "    </tr>";

}
echo " </tbody>";
echo " </table>";
echo " </div>";

?>



  <div class="modal fade" id="ModalAgregarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="exampleModalLabel">Agregar Productos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <div class="modal-body">

        <form action="" method="post" enctype="multipart/form-data" id="Productos-form">

            <div class="mb-3">
              <label for="codigo" class="col-8"> Codigo de barra </label>
              <input type="text" class="form-control" value="" name="CodBarra" id="NombreProducto">
            </div>

            <div class="mb-3">
              <label for="codigo" class="col-8"> Imagen del producto </label>
              <input type="file" class="form-control" value="" name="Imagen">
            </div>

            <div class="mb-3">
              <label for="codigo" class="col-8"> Descripcion </label>
              <textarea class="textarea" name="Descripcion" maxlength="200" minlength="10" cols="65" id="Descripcion"
                rows="5"> </textarea>
            </div>


            <div class="mb-3">
              <label for="codigo" class="col-8"> Stock </label>
              <input type="number" class="form-control" value="" name="Stock" id="Stock">
            </div>


            <div class="mb-3">
              <label for="codigo" class="col-8"> Nombre del producto </label>
              <input type="text" class="form-control" value="" name="NombreProducto" id="NombreProducto">
            </div>

            <div class="mb-3">
              <label for="codigo" class="col-8"> Precio </label>
              <input type="number" class="form-control" value="" name="PrecioProducto" id="PrecioProducto">
            </div>

          
        </div>

        <div class="modal-footer">
        <!-- <input type="submit" name="AgregarArticulos" id="AgregarArticulo" value="Agregar"> -->

          <button type="button " name="AgregarArticulos"  id="AgregarArticulos" class="btn btn-primary"> Agregar </button>
        </div>
        </form>
      </div>
    </div>
  </div>





<!-- <div class="col form-group text-center"> -->

<!-- <input type="submit" name="AgregarArticulos" id="AgregarArticulo" value="Agregar">
<input type="submit" name="ModificarArticulo" id="ModificarArticulo" value="Modificar">
<input type="submit" name="EliminarArticulo" id="EliminarArticulo" value="Eliminar">
<input type="Submit" value="Mostrar Articulos" name="MostrarArticulos">
 -->




  <?php
  if(isset($_POST['AgregarProveedor'])){
  $p1 = new ProveedorBD();
  $p2 = new Proveedor();  
  $p2 -> setNombreProveedor($_POST['ProveedorN']);
  $p2 -> setGmail($_POST['ProveedorG']);
  $p2 -> setTelefonoProveedor($_POST['ProveedorT']);
  $p1 -> AgregarProveedor($p2);
}
if(isset($_POST['ModificarProveedor'])){
  $p1 = new ProveedorBD();
  $p2 = new Proveedor();  
  $p2 -> setIDProveedor($_POST['ProveedorID']);
  $p2 -> setNombreProveedor($_POST['ProveedorN']);
  $p2 -> setGmail($_POST['ProveedorG']);
  $p2 -> setTelefonoProveedor($_POST['ProveedorT']);

  $p1 -> ModificarProveedor($p2);

}

if(isset($_POST['EliminarProveedor'])){
  $p1 = new ProveedorBD();
  $p2 = new Proveedor(); 

  $p2 -> setIDProveedor($_POST['ProveedorID']);

  $p1 -> EliminarProveedores($p2);

  }

// Agrega articulo
    
    if (isset($_POST['AgregarArticulos'])) {
      $Directorio = "imagenes/";
$archivoDestino = $Directorio . basename($_FILES['Imagen']["name"]);
$subirOK = true;
$imageFileType = strtolower(pathinfo($archivoDestino,PATHINFO_EXTENSION));

// Compruebe si el archivo de imagen es una imagen real o una imagen falsa
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["Imagen"]["tmp_name"]);
  if($check) {
    echo "El archivo es una imagen - " . $check["mime"] . ".";
    $subirOK = true;
  } else {
    echo "el archivo no es una imagen.";
    $subirOK = false;
  }
}

// //chequeamos si el archivo existe
// if (file_exists($archivoDestino)) {
//   echo "Lo sentimos, el archivo ya existe.";
//   $subirOK = false;
// }

//Comprobar el tamaño del archivo
if ($_FILES["Imagen"]["size"] > 500000) {
  echo "Lo sentimos, su archivo es demasiado grande.";
  $subirOK = false;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
  echo "Lo sentimos, solo se permiten archivos JPG, JPEG, PNG.";
  $subirOK = false;
}

// Compruebe si $subirOK está establecido en false por algun un error
// if (!$subirOK) {
//   echo "Lo sentimos, su archivo no fue subido.";
// // si todo está bien, intente cargar el archivo
// } else {

  if (move_uploaded_file($_FILES["Imagen"]["tmp_name"], $archivoDestino)) {
    $a = new ProductoBD();
    $a1 = new Producto();
    $a1 -> setCodBarra($_POST['CodBarra']);
    $a1 -> setImagen(htmlspecialchars( basename( $_FILES["Imagen"]["name"])));
    $a1 -> setDescripcion($_POST['Descripcion']);
    $a1 -> setStock($_POST['Stock']);
    $a1 -> setNombre($_POST['NombreProducto']);
    $a1 -> setPrecio($_POST['PrecioProducto']);

  $a -> CargarProducto($a1);
  } else {
    echo "Lo sentimos, hubo un error al cargar su archivo.";
  }
}


if (isset($_POST['ModificarArticulo'])) {
$a = new ProductoBD();
$a1 = new Producto();
$a1 -> setIDProducto($_POST['IDProducto']);
$a1 -> setCodBarra($_POST['CodBarra']);
$a1 -> setImagen(htmlspecialchars(basename( $_FILES["Imagen"]["name"])));
$a1 -> setDescripcion($_POST['Descripcion']);
$a1 -> setStock($_POST['Stock']);
$a1 -> setNombre($_POST['NombreProducto']);
$a1 -> setPrecio($_POST['PrecioProducto']);
$a -> ModificarProducto($a1);
}

  // Elimina producto

if (isset($_POST['EliminarArticulo'])) {
  $a = new ProductoBD();
  $a1 = new Producto();
  $a1 -> setIDProducto($_POST['IDProducto']);

  $a -> EliminarProducto($a1);

  }

  if(isset($_POST['MostrarArticulos'])){
    $p = new ProductoBD();
  $ListarProductos = $p -> Listarproductos();


  echo "<table class='table table-dark table-striped'> ";
  echo "<thead> ";
  echo " <tr> ";
  echo "    <th scope='col'> ID </th> ";
  echo "    <th scope='col'>Codigo Barras</th> ";
  echo "    <th scope='col'>Nombre</th> ";
  echo "   <th scope='col'>Precio</th>";
  echo "   <th scope='col'>Descripcion</th>";
  echo "   <th scope='col'>Stock</th>";
  echo "  </tr> ";
  echo " </thead> ";
  echo " <tbody> ";
  echo " <tr> ";
  for($i = 1; $i < count($ListarProductos); $i++){

  echo "  <th scope='row'> ".$ListarProductos[$i] -> getIDProducto()." </th> ";
  echo "  <td> ".$ListarProductos[$i] -> getCodBarra()."  </td> ";
  echo "   <td> ".$ListarProductos[$i] -> getNombre()."</td> ";
  echo "   <td> ".$ListarProductos[$i] -> getPrecio()."</td> ";
  echo "   <td> ".$ListarProductos[$i] -> getDescripcion()."  </td> ";
  echo "   <td> ".$ListarProductos[$i] -> getStock()."  </td> ";
  echo "  </tr>";
}
  echo " </tbody> ";
  echo "</table> ";
}




//   echo "<table>";
//   echo "<tr><th>Codigo de barras</th><th>Descripcion</th><th>Stock</th><th>Nombre</th><th>Precio</th></tr>";
//   for($i = 1; $i < count($ListarProductos); $i++){
//   echo "<tr><td>".$ListarProductos[$i] -> getCodBarra()."</td><td>".$ListarProductos[$i] -> getDescripcion()."</td><td>".$ListarProductos[$i] -> getStock()."</td><td>".$ListarProductos[$i] -> getNombre()."</td><td>".$ListarProductos[$i] -> getPrecio()."</td></tr>";
// }
// echo "</table>";
//   }



    ?>

  <script>
    function Cerrar() {
      var obAjax = new XMLHttpRequest();
      obAjax.open('POST', 'Persistencia/Control.php', true);
      obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      obAjax.onreadystatechange = function () {
        window.location.reload();
      }
      obAjax.send('Cerrar');
    }

    function MostrarProducto(){

      let formData = new FormData(document.getElementById('Productos-form'));
      var obAjax = new XMLHttpRequest();
      obAjax.open('POST', 'Persistencia/ControlMostrar.php', true);
      obAjax.onreadystatechange = function () {
        var Rellenar = JSON.parse(this.responseText);
        document.getElementById('CodBarra').value = Rellenar['CodBarra'];
        document.getElementById('Descripcion').value = Rellenar['Descripcion'];
        document.getElementById('Stock').value = Rellenar['Stock'];
        document.getElementById('NombreProducto').value = Rellenar['NombreProducto'];
        document.getElementById('PrecioProducto').value = Rellenar['Precio'];
      }
      formData.append('MostrarProducto', '');
      obAjax.send(formData);
    }

    function MostrarProveedor(){
     
let formData = new FormData(document.getElementById('Proveedor-form'));
var obAjax = new XMLHttpRequest();
obAjax.open('POST', 'Persistencia/ControlMostrarProveedor.php', true);
obAjax.onreadystatechange = function () {
  var Rellenar = JSON.parse(this.responseText);
  document.getElementById('ProveedorN').value = Rellenar['ProveedorN'];
  document.getElementById('ProveedorG').value = Rellenar['ProveedorG'];
  document.getElementById('ProveedorT').value = Rellenar['ProveedorT'];
}
formData.append('ControlMostrarProveedor.php', '');
obAjax.send(formData);
}
  </script>
</body>

</html>