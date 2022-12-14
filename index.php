<?php
include_once 'Clases/ClasePersona.php';
include_once 'Persistencia/ClasePersonaBD.php';
include_once 'Persistencia/ClaseProductoBD.php';
if (session_status() == PHP_SESSION_NONE){
    session_start();
}


?>

<!doctype html>
<html lang="es">

<head>


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
    <title>Inicio</title>


</head>

<body class="body">
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

    
<?php

include_once 'FiltrarCards.php';



        ?>

        

<?php
?>





    <script>
function FiltrarCards() {

variable = new XMLHttpRequest();
  variable.onload = function() {
    document.getElementById("idcard").innerHTML = this.responseText;
  }
  variable.open("POST", "FiltrarCards.php");
  variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  variable.send("buscar="+document.getElementById("buscarcards").value);

}



    function Cerrar() {
        var obAjax = new XMLHttpRequest();
        obAjax.open('POST', 'Persistencia/Control.php', true);
        obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        obAjax.onreadystatechange = function() {
            window.location.reload();
        }
        obAjax.send('Cerrar');
    }

    



    // function preciocarro() {
    //     var obAjax = new XMLHttpRequest();
    //     obAjax.open('POST', 'Persistencia/Control.php', true);
    //     obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //     obAjax.onreadystatechange = function() {
    //         window.location.reload();
    //     }
    //     obAjax.send('Cerrar');
    // }


    
    </script>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
      <div id="liveToast" class="toast fade  toast-carrito hide " role="alert" aria-live="assertive" aria-atomic="true" autohide="true" delay='100'> 
        <div class="toast-header">
        <img src="https://cdn-icons-png.flaticon.com/512/3361/3361585.png" width="35" height="35">    
          <strong class="me-auto">AutoService</strong>
          <small class="text-muted">justo ahora...</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
        Articulo/s agregado correctamente.
        </div>
         </div>
    
    </div>




</body>


 
<?php 
  
include_once 'Footer.php';

  ?>


</html>




<?php 
  


?>