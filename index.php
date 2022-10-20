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
    <?php
    include "navbar.php";
    
    ?>

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
    //  echo "         <input type='number' id='cantidad' value='0'>";
     echo "       <img src='imagenes/".$ListarProductos[$i] -> getImagen()."'>";
     echo "        <div class='card-body'>";
     echo "          <h5 class='card-title'>".$ListarProductos[$i] -> getNombre()."</h5>";
     echo "          <small class='text-muted d-grid gap-2 d-md-flex justify-content-md-end'>" . $ListarProductos[$i]->getstock()."</small>";
     echo "          <hr>";
     echo "          <h4 class='card-title'>"."$".$ListarProductos[$i] -> getPrecio(). "</h4>";
     echo "          <p class='card-text'>  ".$ListarProductos[$i] -> getDescripcion()." </p>";
     echo "          <button class='btn btn-primary btn-dark bg-dark' onclick='MostrarCarrito(\"".$ListarProductos[$i] -> getIDProducto()."\",\"".$ListarProductos[$i] -> getPrecio()."\")'><i class='icon bi-cart3'></i> </button>";
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

    function MostrarCarrito(idProducto,precioP) {
        let formData = idProducto;
        let precio = precioP
        // let cantD = document.getElementById('cantidad').value;
        console.log(formData);
        var obAjax = new XMLHttpRequest();
        obAjax.open('POST', 'Persistencia/ControlCarrito.php', true);
        obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        obAjax.onreadystatechange = function() {
            console.log(this.responseText);
        }
      obAjax.send('id='+formData+'&'+'Precio='+precio ); 
    //   +'&'+'Cantidad='+cantD 
    }
    </script>

</body>



</html>




<?php 
  


?>