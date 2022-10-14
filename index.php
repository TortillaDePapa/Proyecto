<?php
include_once 'Clases/ClasePersona.php';
include_once 'Persistencia/ClasePersonaBD.php';
include_once 'Persistencia/ClaseProductoBD.php';
session_start();


?>

<!doctype html>
<html lang="es">

<head>

<script src="FuncionesJS.js"> </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/principal.css">

    <!-- Icon Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>TITLE</title>


</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"> AutoServicio </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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

                <!-- pasar el id a todas las barras -->
                <input class="form-control me-3" type="search" placeholder="Buscar" aria-label="Search" id="busqueda">

                <button class="btn btn-buttom btn-custom me-1 boton" type="submit"> </button>



                <?php
             echo"<button class='btn btn-buttom btn-custom me-1'  type='submit' onclick='Cerrar()'>  <i class='bi bi-box-arrow-in-right'></i> </button>";          
           
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
            // echo "<button class='btn btn-buttom  btn-custom btn-xs'  type='submit'> <i class='icon bi-cart3'></i> </button>";
  
           ?>
                <button class="btn btn-buttom  btn-custom btn-xs" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"> <i class="icon bi-cart3"></i>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabelRight">
                            <i class="bi bi-cart2" width="16" height="16"></i>Carrito
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <hr>
                    <div class="offcanvas-body">
                        <div class="">
                            <?php
                            if(isset($_SESSION['MostrarCarrito'])){
                          echo " <p>'".$_SESSION['MostrarCarrito']['Precio']."''".$_SESSION['MostrarCarrito']['Nombre']."'</p>";
                        }  else{
                          echo "null";
                        }
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </nav>

    <!-- CARRUSEL -->

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://tatauy.vteximg.com.br/arquivos/ids/533239/PRINCIPAL-Aniversario.jpg?v=638001582923730000"
                    class="d-block " alt="...">
            </div>
            <div class="carousel-item ">
                <img src="https://tatauy.vteximg.com.br/arquivos/ids/534491/banner-Dove-promo-Tata-1920x300.jpg?v=638004862626600000"
                    class="d-block " alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://tatauy.vteximg.com.br/arquivos/ids/425475/Bimbo_1920x300.jpg?v=637950478713970000"
                    class="d-block " alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <p></p>

    <!-- CARDS -->

    <!-- <div class="container text-center">
        <div class="row">
          <div class="col-lg-3 col-sd-12 col-margin" >
            <div class="card" style="width: 100%"> -->

    <!-- CARDS -->
<form action="" method="post" id="productos-form">
<?php

$p = new ProductoBD();
$ListarProductos = $p -> Listarproductos();

     echo " <div class='container text-center'>";
     echo"   <div class='row'> ";
     for($i = 1; $i < count($ListarProductos); $i++){
     echo "<input type='hidden' value='".$ListarProductos[$i] -> getIDProducto()."' name='idproducto' id='idproducto'>";
     echo "    <div class='col-lg-3 col-sd-12 col-margin' >";
     echo "     <div class='card' style='width: 100%'>";
     echo "       <img src='imagenes/".$ListarProductos[$i] -> getImagen()."'>";
     echo "        <div class='card-body'>";
     echo "          <h5 class='card-title'>".$ListarProductos[$i] -> getNombre()."</h5>";
     echo "          <small class='text-muted d-grid gap-2 d-md-flex justify-content-md-end'>" . $ListarProductos[$i]->getstock()."</small>";
     echo "          <hr>";
     echo "          <h4 class='card-title'>"."$".$ListarProductos[$i] -> getPrecio(). "</h4>";
     echo "          <p class='card-text'>  ".$ListarProductos[$i] -> getDescripcion()." </p>";
     echo "          <button class='btn btn-primary btn-dark bg-dark' onclick='MostrarCarrito()'><i class='icon bi-cart3'></i> </button>";
     echo "       </div>";
     echo "      </div>";
     echo "   </div>";
      }

        ?>
</form>






    <script>
    function Cerrar() {
        var obAjax = new XMLHttpRequest();
        obAjax.open('POST', 'Persistencia/Control.php', true);
        obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        obAjax.onreadystatechange = function() {
            window.location.reload();
        }
        obAjax.send('Cerrar');
    }

    function MostrarCarrito() {
        console.log("ingreso");
        let formData = document.getElementById('idproducto').value;
        var obAjax = new XMLHttpRequest();
        obAjax.open('POST', 'Persistencia/ControlCarrito.php', true);
        obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        obAjax.onreadystatechange = function() {
            console.log(this.responseText);
        }
      obAjax.send('id='+formData);
    }
    </script>

</body>

</html>




<?php 
  


?>