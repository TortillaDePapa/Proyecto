<?php
include_once 'Clases/ClasePersona.php';
include_once 'Clases/ClaseProveedor.php';
include_once 'Clases/ClaseCategoria.php';
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

<?php


    include "navbar.php";
    
    ?>


  <ul class="nav nav-pills mb-3 " style="margin: 20px !important;" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active bg-dark" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#Productos" type="button" role="tab" aria-controls="pills-productos" aria-selected="true"> Productos </button>
  </li>

  
  <li class="nav-item" role="presentation">
 <button class="nav-link bg-light" id="" data-bs-toggle="" data-bs-target="" type="button" role="tab" aria-controls="" aria-selected="false" disabled></button>
  </li>


  <li class="nav-item" role="presentation">
    <button class="nav-link  bg-dark" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#Proveedores" type="button" role="tab" aria-controls="pills-proveedores" aria-selected="false">Provoeedores</button>
  </li>
  
</ul>
<div class="tab-content" id="pills-tabContent">

<!-- TABLA DE PRODUCTOS -->

  <div class="tab-pane fade show active" id="Productos" role="tabpanel" aria-labelledby="pills-productos-tab" tabindex="0">


  <?php
echo "  <div class='row'>";
echo "  <button class='btn btn-success' type='submit' data-bs-toggle='modal' style='margin: 10px !important;' data-bs-target='#ModalAgregarProducto'> Agregar producto</button>";
echo "  <input class='form me-3 ' type='' placeholder='Buscar' aria-label='Search' onkeyup='FiltrarDatos()' id='buscartabla' style='width: 40%;'>";

include_once 'TablaAdmin.php';

echo "  </div>";

  ?>
  </div>


  
  
<!-- TABLA DE PROVEEDORES -->


  <div class="tab-pane fade" id="Proveedores" role="tabpanel" aria-labelledby="pills-proveedores-tab" tabindex="0"> 

  <?php
  $p = new ProveedorBD();
$MostrarProveedor = $p -> MostrarProveedor();


echo "  <button class='btn btn-success' type='submit' data-bs-toggle='modal' style='margin: 10px !important;' data-bs-target='#ModalAgregarProveedor'> Agregar proveedor </button>";
echo "  <div class='tabla'>";
echo "  <table class='table table-dark table-striped table-hover text-center'>";
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
echo "     <td>  <button class='btn-sm btn-warning'  type='submit' data-bs-toggle='modal' data-bs-target='#ModalModificarProducto'> Modificar </button> </td>";
echo "     <td>  <button class='btn-sm btn-danger'  onclick='Eliminar(\"".$MostrarProveedor[$i] -> getIDProveedor()."\")' > Eliminar </button> </td>";
echo "     <td>  <button class='btn-sm btn-success'  onclick='AgregarDenuevo(\"".$MostrarProveedor[$i] -> getIDProveedor()."\")' > Incorporar </button> </td>";
echo "    </tr>";

}
echo " </tbody>";
echo " </table>";
echo " </div>";


?>

  </div>
</div>

 


<!-- Modal agregar productos -->

  <div class="modal fade" id="ModalAgregarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="exampleModalLabel">Agregar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <div class="modal-body">

        <form action="" method="post" enctype="multipart/form-data" >

            <div class="mb-3">
              <label for="codigo" class="col-8"> Codigo de barra </label>
              <input type="text" class="form-control" value="" name="CodBarras" id="NombreProducto">
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
     
            <?php    
          $p = new ProductoBD();
          $ListarCategorias = $p -> ObtenerCategorias();
          echo "<label for='codigo' class='col-8'> Categorias </label><br />";
          echo "<select name='Categoria' id=''>";
          for($i = 1; $i < count($ListarCategorias); $i++){
          
            echo " <option value='".$ListarCategorias[$i] -> getCategoria()."' >".$ListarCategorias[$i] -> getCategoria()."</option>";
            
          }
          echo "</select>";
        ?>

            <div class="mb-3">
              <label for="codigo" class="col-8"> Nombre del producto </label>
              <input type="text" class="form-control" value="" name="NombreProducto" id="NombreProducto">
            </div>

            <div class="mb-3">
              <label for="codigo" class="col-8"> Precio </label>
              <input type="number" class="form-control" value="" name="PrecioProducto" id="PrecioProducto">
            </div>

          
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <button type="button " name="AgregarArticulos"  id="AgregarArticulos" class="btn btn-primary "> Agregar </button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Modificar Producto -->

  <div class="modal fade" id="ModalModificarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="exampleModalLabel">Modificar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <div class="modal-body">

        <form action="" method="post" enctype="multipart/form-data" id="Productos-form">

            <div class="mb-3">
              <label for="codigo" class="col-8"> Codigo de barra </label>
              <input type="text" class="form-control" value="" name="CodBarras-mos" id="CodBarras-mos">
            </div>

            <!-- <div class="mb-3">
              <label for="codigo" class="col-8"> Imagen del producto </label>
              <input type="file" class="form-control" value="" name="Imagen">
            </div> -->

            <div class="mb-3">
              <label for="codigo" class="col-8"> Descripcion </label>
              <textarea class="textarea" name="Descripcion-mos" maxlength="200" minlength="10" cols="65" id="Descripcion-mos"
                rows="5"> </textarea>
            </div>


            <div class="mb-3">
              <label for="codigo" class="col-8"> Stock </label>
              <input type="number" class="form-control" value="" name="Stock-mos" id="Stock-mos">
            </div>
     
            <?php    
          // $p = new ProductoBD();
          // $ListarCategorias = $p -> ObtenerCategorias();
          // echo "<label for='codigo' class='col-8'> Categorias </label><br />";
          // echo "<select name='Categoria' id=''>";
          // for($i = 1; $i < count($ListarCategorias); $i++){
          
          //   echo " <option value='".$ListarCategorias[$i] -> getCategoria()."' >".$ListarCategorias[$i] -> getCategoria()."</option>";
            
          // }
          // echo "</select>";
        ?>

            <div class="mb-3">
              <label for="codigo" class="col-8"> Nombre del producto </label>
              <input type="text" class="form-control" value="" name="NombreProducto-mos" id="NombreProducto-mos">
            </div>

            <div class="mb-3">
              <label for="codigo" class="col-8"> Precio </label>
              <input type="number" class="form-control" value="" name="PrecioProducto-mos" id="PrecioProducto-mos">
            </div>

          
        </div>

        <div class="modal-footer d-flex justify-content-between ">
 
          <button type="button " name="ModificarArticulo"  id="ModificarArticulo" class="btn btn-primary" > Modificar </button>
        </div>
        </form>
      </div>
    </div>
  </div>


 <!-- Modal agregar proveedores -->
  

  <div class="modal fade" id="ModalAgregarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="exampleModalLabel">Agregar Proveedor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <div class="modal-body">

        <form action="" method="post" enctype="multipart/form-data" >

        


            <div class="mb-3">
              <label for="codigo" class="col-8"> Nombre </label>
              <input type="text" class="form-control" value="" name="NombreProducto" id="NombreProducto">
            </div>

            
            <div class="mb-3">
              <label for="codigo" class="col-8"> Gmail </label>
              <input type="emailw" class="form-control" value="" name="NombreProducto" id="NombreProducto">
            </div>

            <div class="mb-3">
              <label for="codigo" class="col-8"> Telefono </label>
              <input type="number" class="form-control" value="" name="PrecioProducto" id="PrecioProducto">
            </div>

          
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <button type="button " name="AgregarArticulos"  id="AgregarArticulos" class="btn btn-primary "> Agregar </button>
        </div>
        </form>
        <div id="texto">
          
        </div>
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
    echo "Lo sentimos, hubo un error al cargar su archivo.";
  }
}


if (isset($_POST['ModificarArticulo'])) {
$a = new ProductoBD();
$a1 = new Producto();

$a1 -> setCodBarra($_POST['CodBarra']);
$a1 -> setImagen(htmlspecialchars(basename( $_FILES["Imagen"]["name"])));
$a1 -> setDescripcion($_POST['Descripcion']);
$a1 -> setStock($_POST['Stock']);
$a1 -> setNombre($_POST['NombreProducto']);
$a1 -> setPrecio($_POST['PrecioProducto']);

$a -> ModificarProducto($a1);
}

  // Elimina producto
    ?>

  <script>
function FiltrarDatos() {

  variable = new XMLHttpRequest();
    variable.onload = function() {
      document.getElementById("tablaproductos").innerHTML = this.responseText;
    }
    variable.open("POST", "TablaAdmin.php");
    variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    variable.send("buscar="+document.getElementById("buscartabla").value);

}






    function Eliminar($IDProducto) {
      let formData = $IDProducto;
      var obAjax = new XMLHttpRequest();
      obAjax.open('POST', 'Persistencia/ControlMostrar.php', true);
      obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      obAjax.onreadystatechange = function () {
        console.log(this.responseText);
        window.location.reload();
      }
      obAjax.send('EliminarA='+formData);
    }
    function AgregarDenuevo($IDProducto) {
      let formData = $IDProducto;
      var obAjax = new XMLHttpRequest();
      obAjax.open('POST', 'Persistencia/ControlMostrar.php', true);
      obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      obAjax.onreadystatechange = function () {
        console.log(this.responseText);
        window.location.reload();
      }
      obAjax.send('AgregarA='+formData);
    }
    function Cerrar() {
      var obAjax = new XMLHttpRequest();
      obAjax.open('POST', 'Persistencia/Control.php', true);
      obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      obAjax.onreadystatechange = function () {
        window.location.reload();
      }
      obAjax.send('Cerrar');
    }

    function MostrarProducto(IDProducto){
      // let formData = new FormData(document.getElementById('Productos-form'));
      var obAjax = new XMLHttpRequest();
      obAjax.onload = function () {
        
        // document.getElementById('CodBarras-mos').value = JSON.parse(this.responseText)["CodBarra"];
        // document.getElementById('Descripcion-mos').value = JSON.parse(this.responseText)["Descripcion"];
        // document.getElementById('Stock-mos').value = JSON.parse(this.responseText)["Stock"];
        // document.getElementById('NombreProducto-mos').value = JSON.parse(this.responseText)["NombreProducto"];
        // document.getElementById('PrecioProducto-mos').value = JSON.parse(this.responseText)["Precio"];
        
        console.log(this.responseText);
      }
      obAjax.open('POST', 'Persistencia/ControlMostrar.php', true);
      obAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      var get = document.getElementById.bind(document);
      var cadena = "MostrarProducto"+IDProducto+"IDProducto="+IDProducto;
      // formData.append('MostrarProducto', '');
      // formData.append('IDProducto', IDProducto);
      obAjax.send(cadena);
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