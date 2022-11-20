

<?php
include_once 'Clases/ClasePersona.php';
include_once 'Persistencia/ClasePersonaBD.php';
include_once 'Persistencia/ClaseProductoBD.php';


if (session_status() == PHP_SESSION_NONE){
    session_start();
}


if(isset($_SESSION['CLIENTE']) or isset($_SESSION['ADMIN']) ){

}else{
  header('Location: index.php');
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
    <div class="col-sm-1 col-md-6">
    <form action="" method="post" class="form pasos" autocomplete="off" >  
<!-- cambiar arriba -->


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

<!-- paso Envio y Retiro -->
<div class="accordion accordion-flush" id="accordionFlushExample" style="width: 100%;">


<div class="form-step form-step-active">

        <div class="form-check">
          <input class="form-check-input" type="radio" name="envio" id="flexRadioDefault1" data-bs-target="#envio" aria-expanded="false" aria-controls="envio" data-bs-toggle="collapse" checked>
          <label class="form-check-label" for="flexRadioDefault1">
            
Envio domicilio

          </label>
        </div>
        
        
        <div class="form-check">
          <input class="form-check-input" type="radio" name="envio" id="flexRadioDefault2" 
          data-bs-toggle="collapse" data-bs-target="#retiro" aria-expanded="false" aria-controls="retiro">
          <label class="form-check-label" for="flexRadioDefault2">
  Retiro local
          </label>
          </div>

          
          <div id="envio" class="accordion-collapse collapse show active" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body"  >
    
              <h5> 1. Dirección de entrega </h5>

              <hr>
            
             
            
              <?php
              if(isset($_SESSION['CLIENTE'])){
              echo "<i class='bi bi-house-fill'></i> <input style='padding: 0px; display: inline; width: 50%;'  value='".$_SESSION['CLIENTE'] -> getNombreCalle()."  ".$_SESSION['CLIENTE'] -> getNumeroCasa()."' disabled>";
              }else{
                echo "<i class='bi bi-house-fill'></i> <input style='padding: 0px; display: inline; width: 50%;'  placeholder='Direccion'>";
              }
              ?>
           
            
          
        
         
        
              
              </div>
              
          <div class="">
            <a href="#" id="direccion-btn" class="btn btn-next width-50 ml-auto">Siguiente</a>
          </div>
          </div>

          <div id="retiro" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body"  >

              




              <h5>2. Horarios: 08:00 - 22:00 Lunes a Sabados </h5>


              <div class="text-center map-responsive">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3331.19133595375!2d-56.50789268480211!3d-33.39217208079059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a6c1ada36e59bf%3A0x9695eb4025ba7978!2sSupermercado%20Largacha!5e0!3m2!1ses!2suy!4v1666899217872!5m2!1ses!2suy" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
              <br>
            
            
            
            <?php
              echo " <h5> Persona que retira: </h5> ";
              if(isset($_SESSION['CLIENTE'])){
              echo "<i class='bi bi-person-bounding-box'> </i> <input style='padding: 0px; display: inline; width: 50%;' id='nombreCambiar' value='".$_SESSION['CLIENTE'] -> getNombre()."' disabled>";
              }else{
                echo "<i class='bi bi-person-bounding-box'> </i> <input style='padding: 0px; display: inline; width: 50%;' placeholder='NombrePersona'>";
              }
             ?>
          
        
         
        
              
              </div>
              
          <div class="">
            <a href="#" id="retiro-btn" class="btn btn-next width-50 ml-auto">Siguiente</a>
          </div>
          </div>


          <br>


      </div>
  

 

 









<div class="form-step">
  <div class="input-group">





  <div class="row">
  
  <div class="form-check">
  <input class="form-check-input" type="radio" name="pago" id="flexRadioDefault3" data-bs-target="#efectivo1" aria-expanded="false" aria-controls="efectivo1" data-bs-toggle="collapse" checked>
  <label class="form-check-label" for="flexRadioDefault1">
    Efectivo
  </label>
</div>


<div class="form-check">
  <input class="form-check-input" type="radio" name="pago" id="flexRadioDefault4" 
  data-bs-toggle="collapse" data-bs-target="#tarjeta2" aria-expanded="false" aria-controls="tarjeta2" >
  <label class="form-check-label" for="flexRadioDefault2">
    Tarjeta de credito
  </label>
  </div>

  </div>



      <div id="efectivo1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">

        </div> 
        <div class="btns-group" >
    <a href="#" class="btn btn-prev">Volver</a>
    <a class="btn btn-next" id="efectivo-btn" name="verifique" >Siguiente</a>
  </div>        
      </div>

      <div id="tarjeta2" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"  >


      <hr>
   
      <style>
        .demo-container {
            width: 100%;
            max-width: 100%;
            margin:  auto;
        }

        .input-tarjeta{
        display: inline;
        margin: 2px;
        }
        @media (min-width: 576px) {
          .col-sm-1 {
            width: 50% !important;
          }
        }
        @media (max-width: 480px) {
          .jp-card-lower {
            width: 80% !important;
            left: 10% !important;
          }
        }
        @media (max-width: 393px) {
          .jp-card-number {
            font-size: 20px !important;
          }
          .jp-card-name {
            font-size: 18px !important;
          }
        }
        @media (max-width: 346px) {
          .jp-card-number {
            font-size: 18px !important;
          }
        }
        .input-cvc{
          position: relative;
          left: 3px;
        }
        input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

input[type=number] { -moz-appearance:textfield; }



      

    </style>


    <div class="demo-container">
        <div class="card-wrapper" ></div>

        <?php
        


        ?>

        <br>

        <div class="form-container active">
                <input class="input-tarjeta"  id="numeroTarjeta" style="width: 99%;" placeholder="Numero de tarjeta" type="tel" name="number" required>
                <input class="input-tarjeta"  id="nombreTarjeta" style="width: 99%;" placeholder="Nombre titular" type="text" maxlength="25" name="name" required >
                <input class="input-tarjeta" id="venciTarjeta"  style="width: 57%;" type="month" name="expiry" requiredvalue="" required min='<?php   echo  date('Y').'-'.date('m')?>' max="<?php   echo  (date('Y')+7).'-12'?>">
                <input class="input-tarjeta input-cvc"  id="ccvTarjeta" style="width: 40%;" placeholder="CVC" type="number" name="cvc" required >
                
        
        </div>
    </div>

    <script src="http://localhost/xampp/proyecto/proyecto/Tarjeta.js/card.js"></script>

    <!-- <script src="http://localhost/Proyecto/Tarjeta.js/card.js"></script> -->
    
      </div>    
      <div class="btns-group" >
    <a href="#" class="btn btn-prev">Volver</a>
    <a class="btn btn-next" id="tarjeta-btn" name="verifique" >Siguiente</a>
  </div> 
    </div>
  </div>
<br>
 

<!-- 
  <script>
      if(document.getElementById('flexRadioDefault1').checked == true){
        document.body.innerHTML =  "<a class='btn btn-next' name='verifique'>Siguiente</a>";
      }
    else if(document.getElementById('flexRadioDefault2').checked){
      document.body.innerHTML = " <a class='btn btn-next' name='verifique' onclick='obligarotio()'>Siguiente</a>"
    }
      </script> -->
  </div>

  
</div>



<div class="form-step">

  <div class="text-center">
<h5> Datos de compra: </h5>
</div>


<table class="table">
  <thead>
    <tr>

      <th scope="col">Producto</th>
      <th scope="col">Precio</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      if(isset($_SESSION['MostrarCarrito'])){

        for($i = 0; $i <count($_SESSION['MostrarCarrito']); $i++){
          if($_SESSION['MostrarCarrito'][$i] != null){
      
    echo "  <tr><td>".$_SESSION['MostrarCarrito'][$i]['Nombre']." x ".$_SESSION['MostrarCarrito'][$i]['Cantidad']."</td>";
    echo "  <td>$".$_SESSION['MostrarCarrito'][$i]['Precio']."</td></tr>";
            
    
  }

}
echo"   </tr>";
echo"   <tr>";
echo "<td><b> Total: </b></td>";
echo "<td><b><div id='mostrarprecio-div1'></div> </b></td>";
echo"   </tr>";


}
      ?>
    </tr>

    <tr>

    
    </tr>
     
  </tbody>
</table>




 <div style="display:none;" id="sessiongetusuario">
 <?php
  echo $_SESSION['CLIENTE'] -> getIDPersona();
  ?>
  </div>
  <div class="btns-group" >
    <a href="#" class="btn btn-prev">Volver</a>
    <button class="btn btn-submit"  onclick="FinalizarCompra()" id="btn-finalizar" name="confirmarCompra"> Finalizar compra</button>
  
  


</div>

 

</div>

      
<br>


</form>
<!-- cambiar arriba -->


</div>
  
  <br>
  
  
  <div class="col-sm-1 col-md-5">
      <div class="d-flex r-compra">

      <?php

 if(isset($_SESSION['MostrarCarrito'])){

  echo    " <div class='row g-0 ' >";



    for($i = 0; $i <count($_SESSION['MostrarCarrito']); $i++){
      if($_SESSION['MostrarCarrito'][$i] != null){
      echo    "<div class='card mb-3 d-flex flex-row' style='max-width: 370px; margin: 5px;'>";
      echo    " <div class='col-md-4' style='margin: auto !important;'>";
      echo    "<img src='imagenes/".$_SESSION['MostrarCarrito'][$i]['Imagen']."' class='img-fluid rounded-start' alt='...'>";
      echo    "</div>";
      echo    "<div class='col-md-8' style=' padding: auto !important;'>";
      echo    "<div class='card-body'>";
      echo    "<h5 class='card-title'>".$_SESSION['MostrarCarrito'][$i]['Nombre']."</h5>";
      echo    "<h6 class='card-title'>Cantidad:".$_SESSION['MostrarCarrito'][$i]['Cantidad']." </h6>";
      echo    "<h6 class='card-title' name=''>Precio: $".$_SESSION['MostrarCarrito'][$i]['Precio']."</h6>";
      echo    "<h6 class='card-title' name='preciocard'>Total: $".$_SESSION['MostrarCarrito'][$i]['Precio']*$_SESSION['MostrarCarrito'][$i]['Cantidad']."</h6>";

      echo    "</div>";
      echo    "</div>";
       echo    "</div>";
      }

  }
  echo    "</div>";
}else{
      echo "<img src='https://enigma.uy/img/mini-empty-cart.png' height='150px'>";
  }

    
      ?>
   

      </div>

   




    

</div>

  <br>



</div>


  </div>

  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
      <div id="liveToast" class="toast fade  toast-tarjeta hide " role="alert" aria-live="assertive" aria-atomic="true" autohide="true" delay='300'> 
        <div class="toast-header">
        <img src="https://cdn-icons-png.flaticon.com/512/3361/3361585.png" width="35" height="35">    
          <strong class="me-auto">AutoService</strong>
          <small class="text-muted">justo ahora...</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          Recuerde rellenar todos los campos.
        </div>
         </div>
    
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
      <div id="liveToast" class="toast fade  toast-finalizar-compra hide " role="alert" aria-live="assertive" aria-atomic="true" autohide="true" delay='300'> 
        <div class="toast-header">
        <img src="https://cdn-icons-png.flaticon.com/512/3361/3361585.png" width="35" height="35">    
          <strong class="me-auto">AutoService</strong>
          <small class="text-muted">justo ahora...</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
         La compra se ha realizado con éxito.
        </div>
         </div>
    
    </div>





<script>


    function FinalizarCompra() {
      
        var obAjax = new XMLHttpRequest();
        obAjax.open('POST', 'Persistencia/ControlCompra.php', true);
        obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        obAjax.onreadystatechange = function() {
         console.log(this.responseText);
        }
        
        const  tarjeta = 'tarjeta';
        if(document.getElementById('flexRadioDefault1').checked){
          if(document.getElementById('flexRadioDefault3').checked){

        obAjax.send('FinalizarCompra='+''+'&usuario='+document.getElementById('sessiongetusuario').innerHTML+'&MetodoEnvio='+'Envio a domicilio'+'&MetodoPago='+'efectivo');
          window.location.reload();
          }else if(document.getElementById('flexRadioDefault4').checked){
            
            obAjax.send('FinalizarCompra='+''+'&usuario='+document.getElementById('sessiongetusuario').innerHTML+'&MetodoEnvio='+'Envio a domicilio'+'&MetodoPago='+'Tarjeta');
            window.location.reload();
          }
      }else if (document.getElementById('flexRadioDefault2').checked){
        if(document.getElementById('flexRadioDefault3').checked){

        obAjax.send('FinalizarCompra='+''+'&usuario='+document.getElementById('sessiongetusuario').innerHTML+'&MetodoEnvio='+'Retira en local'+'&MetodoPago='+'efectivo');
        window.location.reload();
            }else if(document.getElementById('flexRadioDefault4').checked){
    
            obAjax.send('FinalizarCompra='+''+'&usuario='+document.getElementById('sessiongetusuario').innerHTML+'&MetodoEnvio='+'Retira en local'+'&MetodoPago='+'Tarjeta');
              window.location.reload();
            }
        }
}





const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");


var retiro = 0;
var efectivo = 0;
let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    var truee = false;
   
    

    console.log(btn.id);
    if (btn.id == "direccion-btn") {

    truee = true;

    }else if (btn.id == "retiro-btn"){
      truee = true;
      retiro = 1;
    }else if (btn.id == "efectivo-btn"){
      truee = true;
      efectivo = 1;
    }else if (btn.id == "tarjeta-btn"){



    var numeroTar = document.getElementById("numeroTarjeta").value;
    var nombreTar = document.getElementById("nombreTarjeta").value;
    var venciTar = document.getElementById("venciTarjeta").value;
    var ccvTar = document.getElementById("ccvTarjeta").value;


  
      if (numeroTar != "" && nombreTar != "" && venciTar != "" && ccvTar != "") {
        truee = true;
      }else{
        var toastElList = [].slice.call(document.querySelectorAll('.toast-tarjeta'))
        var toastList = toastElList.map(function(toastEl) {
        // Creates an array of toasts (it only initializes them)
          return new bootstrap.Toast(toastEl) // No need for options; use the default options
        });
       toastList.forEach(toast => toast.show()); // This show them

        console.log(toastList); // Testing to see if it works
      }

    }
    if (truee == true) {
      formStepsNum++;
    updateFormSteps();
    updateProgressbar();}
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
// document.getElementById('mostrarprecio-div2').innerHTML = '$'+preciof;

// function  obligarotio(){
//   var numero = document.getElementById('number').value;
//   if(numero.length == 0) {
//    console.log('hola');
//   }
//   var name = document.getElementById('name').value;
//   if(name.length == 0) {
   
//   }
//   var cvc = document.getElementById('cvc').value;
//   if (cvc.length < 6) {
   
    
//   }
// }

var c = new Card({
            form: document.querySelector('form'),
            container: '.card-wrapper'
        });
</script>

<br>


</body>

</html>