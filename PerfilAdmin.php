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

<body class="body">

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
    <button class="nav-link  bg-dark" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#Proveedores" type="button" role="tab" aria-controls="pills-proveedores" aria-selected="false">Proveedores</button>
  </li>


  <li class="nav-item" role="presentation">
 <button class="nav-link bg-light" id="" data-bs-toggle="" data-bs-target="" type="button" role="tab" aria-controls="" aria-selected="false" disabled></button>
  </li>


  <li class="nav-item" role="presentation">
  <button class="nav-link  bg-dark" id="pills-pedidos-tab" data-bs-toggle="pill" data-bs-target="#Pedidos" type="button" role="tab" aria-controls="pills-pedidos" aria-selected="false">Pedidos</button>
  </li>
  
</ul>
<div class="tab-content" id="pills-tabContent">

<!-- TABLA DE PRODUCTOS -->

  <div class="tab-pane fade show active" id="Productos" role="tabpanel" aria-labelledby="pills-productos-tab" tabindex="0">


  <?php
echo "  <div class='row'>";
echo "  <button class='btn btn-success btn-agregar' type='submit' data-bs-toggle='modal' data-bs-target='#ModalAgregarProducto'> Agregar producto</button>";
echo "  <input class='form me-3 barra-busqueda ' type='' placeholder='Buscar' aria-label='Search' onkeyup='FiltrarProducto()' id='buscartablaproducto' style='width: 40%;'>";
echo "  <div class='tabla ' id='tablaproductos'>";
include_once 'TablaProductoAdmin.php';
echo " </div>";
echo "  </div>";

  ?>
  </div>


  
  
<!-- TABLA DE PROVEEDORES -->


  <div class="tab-pane fade" id="Proveedores" role="tabpanel" aria-labelledby="pills-proveedores-tab" tabindex="0"> 

  <?php
echo "  <div class='row'>";
echo "  <button class='btn btn-success btn-agregar' type='submit' data-bs-toggle='modal' data-bs-target='#ModalAgregarProveedor'> Agregar proveedor </button>";
echo "  <input class='form me-3 barra-busqueda ' type='' placeholder='Buscar' aria-label='Search' onkeyup='FiltrarProveedor()' id='buscartablaproveedor' style='width: 40%;'>";
include_once 'TablaProveedorAdmin.php';

echo "  </div>";

?>

</div>

 
<!-- TABLA DE Pedidos -->


  <div class="tab-pane fade" id="Pedidos" role="tabpanel" aria-labelledby="pills-Pedidos-tab" tabindex="0"> 

  <?php
echo "  <div class='row'>";
echo "  <input class='form me-3 barra-busqueda' type='' placeholder='Buscar'  id='buscartablapedido' aria-label='Search' onkeyup='FiltrarPedido()'  style='width: 40%;'>";

include_once 'TablaPedidosAdmin.php';

echo "  </div>";

?>

</div>

</div>

<!-- Modal Recibo -->
<div class="modal fade" id="recibo2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center" >
        <h5 class="modal-title text-center" id="exampleModalLabel" > Factura </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="reciboPdf">


  <div class="row">

      <div class="col-6">
        <p> </p>
        <h5>  AutoService  <br>Largacha  <img src="Imagenes/carrito.png" width="35" height="35"></h5> 
</div>

<div class="col-6" style="text-align: right;">
  
    <small> AutoService Largacha <br>
              Invencion Ocampo 1567 

    <br> Durazno-Durazno-Uruguay  

    <br>092 724 550 

   autoservice.largacha@gmail.com  </small>
</div>

</div>

<hr>

<div class="row" id="TablaF">


       
      

</div>

<div id='mostrarprecio-div2'></div>



</div>
      <div class="modal-footer">
        <button type="button" onclick="generarPdf()" class="btn btn-danger">Descargar</button>
      </div>
    </div>
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

        <form action="" method="post" enctype="multipart/form-data" id="AgregarP-form">

            <div class="mb-3">
              <label for="codigo" class="col-8"> Codigo de barra </label>
              <input type="text" class="form-control" value="" name="CodBarras" id="CodBarras">
            </div>

            <div class="mb-3">
              <label for="codigo" class="col-8"> Imagen del producto </label>
              <input type="file" class="form-control" value="" name="Imagen" id='Imagen'>
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
          echo "<select name='Categoria' id='Categoria'>";
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

            </form>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <button  onclick="ActualizarTablaProducto()" name="AgregarArticulos"  id="AgregarArticulos" class="btn btn-primary "> Agregar </button>
        </div>
      
      
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
              <label for="codigo" class="col-8"> ID Producto </label>
              <input type="text" class="form-control" value="" name="IDProductos-mos" id="IDProductos-mos" >
            </div>

            <div class="mb-3">
              <label for="codigo" class="col-8"> Codigo de barra </label>
              <input type="text" class="form-control" value="" name="CodBarras-mos" id="CodBarras-mos">
            </div>

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
 
          <button type="button " name="ModificarArticulo-mos"  id="ModificarArticulo" class="btn btn-primary" > Modificar </button>
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
              <input type="text" class="form-control" value="" name="ProveedorN" id="NombreProducto">
            </div>

            
            <div class="mb-3">
              <label for="codigo" class="col-8"> Gmail </label>
              <input type="email" class="form-control" value="" name="ProveedorG" id="NombreProducto">
            </div>

            <div class="mb-3">
              <label for="codigo" class="col-8"> Telefono </label>
              <input type="number" class="form-control" value="" name="ProveedorT" id="PrecioProducto">
            </div>

          
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <button type="button " name="AgregarProveedor"  id="AgregarProveedor" class="btn btn-primary "> Agregar </button>
        </div>
        </form>
        <div id="texto">
          
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal Modificar Proveedor -->

  <div class="modal fade" id="ModalModificarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="exampleModalLabel">Modificar Proveedor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <div class="modal-body">

        <form action="" method="post" enctype="multipart/form-data" id="Proveedores-form">

        <div class="mb-3">
              <label for="codigo" class="col-8"> ID Proveedor </label>
              <input type="text" class="form-control" value="" name="ProveedorID" id="ProveedorID">
            </div>

            <div class="mb-3">
              <label for="codigo" class="col-8"> Nombre </label>
              <input type="text" class="form-control" value="" name="ProveedorN" id="ProveedorN">
            </div>

            <div class="mb-3">
              <label for="codigo" class="col-8"> Gmail </label>
              <input type="email" class="form-control" value="" name="ProveedorG" id="ProveedorG">
            </div>

            <div class="mb-3">
              <label for="codigo" class="col-8"> Numero </label>
              <input type="number" class="form-control" value="" name="ProveedorT" id="ProveedorT">

            </div> 
        </div>

        <div class="modal-footer d-flex justify-content-between ">
 
          <button type="button " name="ModificarProveedor"  id="ModificarProveedor" class="btn btn-primary" > Modificar </button>
        </div>
        </form>
      </div>
    </div>
  </div>








  








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

if (isset($_POST['ModificarArticulo-mos'])) {
$a = new ProductoBD();
$a1 = new Producto();
$a1 -> setIDProducto($_POST['IDProductos-mos']);
$a1 -> setCodBarra($_POST['CodBarras-mos']);
$a1 -> setDescripcion($_POST['Descripcion-mos']);
$a1 -> setStock($_POST['Stock-mos']);
$a1 -> setNombre($_POST['NombreProducto-mos']);
$a1 -> setPrecio($_POST['PrecioProducto-mos']);

$a -> ModificarProducto($a1);
}

  // Elimina producto
    ?>

  <script>
function FiltrarProducto() {

  variable = new XMLHttpRequest();
    variable.onload = function() {
      document.getElementById("tablaproductos").innerHTML = this.responseText;
    }
    variable.open("POST", "TablaProductoAdmin.php");
    variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    variable.send("buscar="+document.getElementById("buscartablaproducto").value);

}

function FiltrarProveedor() {

variable = new XMLHttpRequest();
  variable.onload = function() {
    document.getElementById("tablaproveedor").innerHTML = this.responseText;
  }
  variable.open("POST", "TablaProveedorAdmin.php");
  variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  variable.send("buscar="+document.getElementById("buscartablaproveedor").value);
}

function FiltrarPedido() {

variable = new XMLHttpRequest();
  variable.onload = function() {
    document.getElementById("tablapedidos").innerHTML = this.responseText;
  }
  variable.open("POST", "TablaPedidosAdmin.php");
  variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  variable.send("buscar="+document.getElementById("buscartablapedido").value);
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
     
      var obAjax = new XMLHttpRequest();
      obAjax.onload = function () {
       var val = JSON.parse(this.responseText);
        document.getElementById('IDProductos-mos').value = val['ID'];
        document.getElementById('CodBarras-mos').value = val["CodBarra"];
        document.getElementById('Descripcion-mos').value = val["Descripcion"];
        document.getElementById('Stock-mos').value = val["Stock"];
        document.getElementById('NombreProducto-mos').value = val["NombreProducto"];
        document.getElementById('PrecioProducto-mos').value = val["Precio"];
      
      }
      obAjax.open('POST', 'Persistencia/ControlMostrar.php', true);
      obAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      var get = document.getElementById.bind(document);
      var cadena = "MostrarProducto="+IDProducto+"&IDProducto="+IDProducto;
      // formData.append('MostrarProducto', '');
      // formData.append('IDProducto', IDProducto);
      obAjax.send(cadena);
    }

    function MostrarProveedor(IDProveedor){
     
var obAjax = new XMLHttpRequest();


obAjax.onload = function () {
  var rellenar = JSON.parse(this.responseText);
  document.getElementById('ProveedorID').value = rellenar['ID'];
  document.getElementById('ProveedorN').value = rellenar['ProveedorN'];
  document.getElementById('ProveedorG').value = rellenar['ProveedorG'];
  document.getElementById('ProveedorT').value = rellenar['ProveedorT'];
}
obAjax.open('POST', 'Persistencia/ControlMostrarProveedor.php', true);
obAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
obAjax.send("MostrarProveedor="+IDProveedor+"&IDProveedor="+IDProveedor);
}

function ActualizarTablaProducto(){
  
  variable = new XMLHttpRequest();
  let formData = new formData(document.getElementById('AgregarP-form'));
    variable.onload = function() {
      document.getElementById("tablaproductos").innerHTML = this.responseText;
      console.log(this.responseText);
    }
    variable.open("POST", "TablaProductosAdmin.php");
    variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     formData.append('AgregarArticulos', '');
     formData.append('Imagen', document.getElementById('Imagen'));
    variable.send(formData);

}
  </script>
</body>




</html>