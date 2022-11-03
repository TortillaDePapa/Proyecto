<?php
include_once 'Clases/ClasePersona.php';
include_once 'Persistencia/ClasePersonaBD.php';
include_once 'Persistencia/ClaseProductoBD.php';
session_start();


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

<body>


  <?php
    include "navbar.php";
    
    ?>

  <!-- Example Code -->

  <div class="container ">
  <div class="row">
        <div class="col-6 text-center">
        <h2>
        <svg xmlns="http://www.w3.org/2000/svg" style="margin: 10px !important" width="30" height="30" fill="currentColor"
        class="bi bi-bag" viewBox="0 0 16 16">
        <path
          d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
      </svg>
      Finalizar Compra
</h2>
  

        </div>

        <div class="col-4 text-center">
          <h3>

          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
Resumen de la compra
</h3>
        </div>
    <!-- <div class="col-sm">s
     <h1> - </h1> 
    </div> -->
  </div>



    <div class="row">
      <div class="col-6" >


      <form action="#" class="form">
 


  <!-- Progress bar -->


  <div class="progressbar">
    <div class="progress" id="progress"></div>
    
    <div class="progress-step progress-step-active" data-title="Envio"></div>
    <div class="progress-step" data-title="Pago"></div>
    <div class="progress-step" data-title="Compra"></div>
  </div>

  <!-- paso Envio -->
  <div class="form-step form-step-active">

    <ul class="nav nav-pills mb-3" style="" id="pills-tab" role="tablist">
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

   <input type="number" name="NROtarjeta" id=""  placeholder="Enter card number">
   <br>
    Expiry Month <input type="number" name="expiracionM" id=""  min="1" max="12" placeholder="MM"> 
    Expiry Year<input type="number" name="expiracionA" id="" min="2022" max="2030" placeholder="YY"> 
    CCV<input type="number" name="CCV" id=""  min="100" max="999" placeholder="CCV">
<br>

<input type="text" name="nomtarjeta" id="" placeholder="Name On The Card">
<br>
<input type="checkbox" name="detalles" id=""> Save details for fast payments
<br>
<input type="reset" name="cancel" id="cancel" value="CANCEL" class="cancelar"> </input>

<input type="submit" name="pagar" id=""  value="PAY NOW" class="cancelar"> </input>

      



      
    </div>
    
    <div class="btns-group">
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
  <p> Nombre: </p>
  <p> Articulo 1 </p>
  <p> Articulo 2</p>

  <p> Total: </p>
 

  </div>




  <div class="col"> 
  <p> Precio: </p>
  <p> $820 </p>
  <p> $1000 </p>
  
  <p> $1820 </p>



</div>


    </div>
    
  </div>

   
    <div class="btns-group">
      <a href="#" class="btn btn-prev">Volver</a>
      <input type="submit" value="Confirmar compra" class="btn" />
    </div>

    
  </div>
</form>
        <br>

      </div>


      <div class="col-4">

        <div class="d-flex" style="overflow: auto; width: 400px; max-width: 400px; height: 450px ;  max-height: 450px;">

<?php
 if(isset($_SESSION['MostrarCarrito'])){
        
  echo    " <div class='row g-0 ' >";



    for($i = 0; $i <count($_SESSION['MostrarCarrito']); $i++){
      echo    "<div class='card mb-3 d-flex flex-row' style='max-width: 450px;'>";
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

</script>



</body>

</html>