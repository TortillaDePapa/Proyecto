

<?php
include_once 'Clases/ClasePersona.php';
include_once 'Persistencia/ClasePersonaBD.php';
include_once 'Persistencia/ClaseProductoBD.php';


if (session_status() == PHP_SESSION_NONE){
    session_start();
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Icon Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  <link rel="stylesheet" href="CSS/Tarjeta.css">



</head>

<body class="body">


  <?php
    include "navbar.php";

    ?>

    <br>


  <!-- Example Code -->

  <div class="container ">

     <div class="text-center">

          <h1>

          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
Resumen de la compra
</h1>

</div>




    <div class="row">
      <div class="col-6 ">


      <form action="#" class="form pasos">



  <!-- Progress bar -->


  <div class="progressbar ">
    <div class="progress" id="progress"></div>

    <div class="progress-step progress-step-active" data-title="Envio"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
      <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
    </svg></div>
    <div class="progress-step" data-title="Pago"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/>
    </svg></div>
    <div class="progress-step" data-title="Compra"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
      <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
    </svg></div>
  </div>

  <!-- paso Envio -->
  <div class="form-step form-step-active">

    <ul class="nav nav-pills mb-3"  id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active bg-dark" style="margin: 5px;" id="pills-envio-tab" data-bs-toggle="pill"
        data-bs-target="#pills-envio" type="button" role="tab" aria-controls="pills-envio"
        aria-selected="true">
        Envio
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link bg-dark" style="margin: 5px;" id="pills-retiro-tab" data-bs-toggle="pill" data-bs-target="#pills-retiro"
        type="button" role="tab" aria-controls="pills-retiro" aria-selected="true">
        Retiro
      </button>
    </li>
  </ul>

    <!-- Fin de paso Envio -->

<!-- Envio y Retiro -->
  <div class="tab-content " id="pills-tabContent">

<!-- Envio -->

  <div class="tab-pane fade show active" id="pills-envio" role="tabpanel"
    aria-labelledby="pills-envio-tab" tabindex="0">

    <h5> 1. Dirección de entrega </h5>

    <hr>

    <form method="post">

    <label> Calle o direccion </label>

    <br>

    <div class="">
    <a href="#" class="btn btn-next width-50 ml-auto">Siguiente</a>
  </div>
  </div>


  <!-- Retiro  -->

  <div class="tab-pane fade " id="pills-retiro" role="tabpanel" aria-labelledby="pills-retiro-tab"
    tabindex="0">

    <h5> Horarios: 08:00 - 22:00 Lunes a Sabados </h5>


    <div class="text-center">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3331.19133595375!2d-56.50789268480211!3d-33.39217208079059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a6c1ada36e59bf%3A0x9695eb4025ba7978!2sSupermercado%20Largacha!5e0!3m2!1ses!2suy!4v1666899217872!5m2!1ses!2suy" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <br>




    <p> Persona que retira:  </p>

    <div class="">
    <a href="#" class="btn btn-next width-50 ml-auto">Siguiente</a>
  </div>

  </div>
</div>

<!-- fin Envio y Retiro-->



  </div>


  <div class="form-step">
    <div class="input-group">



    <?php
    
    include_once('TarjetaForm.php');    
    ?>





    </div>

    <div class="btns-group" >
      <a href="#" class="btn btn-prev">Volver</a>
      <a href="#" class="btn btn-next">Siguiente</a>
    </div>
  </div>



  <div class="form-step">

    <div class="text-center">
<h5> Datos de compra: </h5>
<hr>

<div class="row">



  <div class="col">
  <h5> Producto: </h5>
  <?php
 if(isset($_SESSION['MostrarCarrito'])){

  for($i = 0; $i <count($_SESSION['MostrarCarrito']); $i++){

  echo "<p>".$_SESSION['MostrarCarrito'][$i]['Nombre']." x ".$_SESSION['MostrarCarrito'][$i]['Cantidad']." </p>";


  }

}


?>
  <h5> Total: </h5>



  </div>





  <div class="col">
  <h5> Precio: </h5>
  <?php

  if(isset($_SESSION['MostrarCarrito'])){

for($i = 0; $i <count($_SESSION['MostrarCarrito']); $i++){

echo "<p> ".$_SESSION['MostrarCarrito'][$i]['Precio']."</p>";


}

}

?>

<h5> <div id="mostrarprecio-div1"></div> </h5>



</div>


    </div>

  </div>


    <div class="btns-group" >
      <a href="#" class="btn btn-prev">Volver</a>
      <input type="submit" value="Confirmar compra" class="btn btn-submit" />
    </div>


  </div>
</form>
        <br>

      </div>


      <div class="col-4">

        <div class="d-flex r-compra">

<?php
 if(isset($_SESSION['MostrarCarrito'])){

  echo    " <div class='row g-0 ' >";



    for($i = 0; $i <count($_SESSION['MostrarCarrito']); $i++){
      echo    "<div class='card mb-3 d-flex flex-row' style='max-width: 370px; margin: 5px;'>";
      echo    " <div class='col-md-4' style='margin: auto !important;'>";
      echo    "<img src='imagenes/".$_SESSION['MostrarCarrito'][$i]['Imagen']."' class='img-fluid rounded-start' alt='...'>";
      echo    "</div>";
      echo    "<div class='col-md-8' style=' padding: auto !important;'>";
      echo    "<div class='card-body'>";
      echo    "<h5 class='card-title'>".$_SESSION['MostrarCarrito'][$i]['Nombre']."</h5>";
      echo    "<h6 class='card-title'>Cantidad:".$_SESSION['MostrarCarrito'][$i]['Cantidad']." </h6>";
      echo    "<h6 class='card-title' name=''>Precio $".$_SESSION['MostrarCarrito'][$i]['Precio']."</h6>";
      echo    "<h6 class='card-title' name='preciocard'>Total $".$_SESSION['MostrarCarrito'][$i]['Precio']*$_SESSION['MostrarCarrito'][$i]['Cantidad']."</h6>";

      echo    "</div>";
      echo    "</div>";
       echo    "</div>";

  }
}
?>
<!-- style="border: 1px solid rgba(0,0,0,.125);" -->

</div>

<!-- div r compra -->


  </div>

  <br>

  <!-- <div class="row row-precio">
      <div class="col">
        <h5>Precio total: </h5>

 </div>
   <div class="col">
   <?php
            if(count($_SESSION['MostrarCarrito'])==0){
            echo "<div id='mostrarprecio-div' style='display: none;'>";


           echo " </div>";

            }elseif(count($_SESSION['MostrarCarrito'])>0) {



      echo "<div id='mostrarprecio-div2'>";
      echo "</div>";



            }
            ?>


</div> -->

</div>

  </div>




  </div>


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

    const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}
document.getElementById('mostrarprecio-div1').innerHTML = '$'+preciof;
document.getElementById('mostrarprecio-div').innerHTML = '$'+preciof;
document.getElementById('mostrarprecio-div2').innerHTML = '$'+preciof;
</script>

<br>




</body>

</html>