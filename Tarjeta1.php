<?php
include_once 'Clases/ClasePersona.php';
include_once 'Persistencia/ClasePersonaBD.php';
include_once 'Persistencia/ClaseProductoBD.php';
session_start();


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

 <style> 
:root {
  --primary-color: #212529;
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  font-family: Montserrat, "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  display: grid;
  place-items: center;
  min-height: 100vh;
}
/* Global Stylings */
label {
  display: block;
  margin-bottom: 0.5rem;
}

input {
  display: block;
  width: 100%;
  padding: 0.75rem;
  border: 1px solid #ccc;
  border-radius: 0.25rem;
}

.width-50 {
  width: 50%;
}

.ml-auto {
  margin-left: auto;
}

.text-center {
  text-align: center;
}

/* Progressbar */
.progressbar {
  position: relative;
  display: flex;
  justify-content: space-between;
  counter-reset: step;
  margin: 2rem 0 4rem;
}

.progressbar::before,
.progress {
  content: "";
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  height: 4px;
  width: 100%;
  background-color: #dcdcdc;
  z-index: -1;
}

.progress {
  background-color: var(--primary-color);
  width: 0%;
  transition: 0.3s;
}

.progress-step {
  width: 2.1875rem;
  height: 2.1875rem;
  background-color: #dcdcdc;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.progress-step::before {
  counter-increment: step;
  content: counter(step);
}

.progress-step::after {
  content: attr(data-title);
  position: absolute;
  top: calc(100% + 0.5rem);
  font-size: 0.85rem;
  color: #666;
}

.progress-step-active {
  background-color: var(--primary-color);
  color: #f3f3f3;
}

/* Form */
.form {
  /* width: clamp(320px, 30%, 430px); */
  margin: 0 auto;
  border: 1px solid #ccc;
  border-radius: 0.35rem;
  padding: 1.5rem;
}

.form-step {
  display: none;
  transform-origin: top;
  animation: animate 0.5s;
}

.form-step-active {
  display: block;
}

.input-group {
  margin: 2rem 0;
}

@keyframes animate {
  from {
    transform: scale(1, 0);
    opacity: 0;
  }
  to {
    transform: scale(1, 1);
    opacity: 1;
  }
}

/* Button */
.btns-group {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1.5rem;
}

.btn {
  padding: 0.75rem;
  display: block;
  text-decoration: none;
  background-color: var(--primary-color);
  color: #f3f3f3;
  text-align: center;
  border-radius: 0.25rem;
  cursor: pointer;
  transition: 0.3s;
}
.btn:hover {
  box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
}


</style>

  </head>



  <body class="p-3 m-0 border-0 bd-example">



  <form action="#" class="form">
  <h2 class="text-center"> <svg xmlns="http://www.w3.org/2000/svg" style="margin: 10px !important" width="30" height="30" fill="currentColor"
    class="bi bi-bag" viewBox="0 0 16 16">
    <path
      d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
  </svg>Finalizar compra</h2>


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
 
    </div>
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


   
    <div class="btns-group">
      <a href="#" class="btn btn-prev">Volver</a>
      <input type="submit" value="Confirmar compra" class="btn" />
    </div>

    
  </div>
</form>
    
    <!-- End Example Code -->


    <script>
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