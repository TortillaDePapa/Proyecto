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

  <title>Document</title>
</head>

<body>


  <?php
    include "navbar.php";
    
    ?>

  <!-- Example Code -->

  <br>
  <div class="container ">
  <div class="row">
        <div class="col-sm">
        <h1>
        <svg xmlns="http://www.w3.org/2000/svg" style="margin: 10px !important" width="30" height="30" fill="currentColor"
        class="bi bi-bag" viewBox="0 0 16 16">
        <path
          d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
      </svg>
      Finalizar Compra
</h1>
  

        </div>

        <div class="col-sm">
          <h1>

          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
Resumen de la compra
</h1>
        </div>
    </div>


    <div class="row">
      <div class="col-6">
        <div class="accordion" id="accordionPanelsStayOpenExample">
          <div class="accordion-item w-100">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapsetwo" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-1-circle-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd"
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z" />
                </svg>
                Envio
              </button>
            </h2>
            <div id="panelsStayOpen-collapsetwo" class="accordion-collapse collapse show"
              aria-labelledby="panelsStayOpen-headingOne" style="">
              <div class="accordion-body">
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

                <div class="tab-content " id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-envio" role="tabpanel"
                    aria-labelledby="pills-envio-tab" tabindex="0">

                    <h5> 1. Dirección de entrega </h5>

                    <hr>

                    <form method="post">

                    <label> Calle o direccion </label>
                   <?php
                  // //  echo "<input type='text' class='form-control' placeholder='".$_SESSION['CLIENTE'] -> getNombreCalle()."".$_SESSION['CLIENTE'] -> getNumeroCasa()."'>"   
                  // ?> 
                    <div class="text-center">
                    <button type="submit" class="btn btn-dark"> Continuar con el envio </button>
                    </div>
                 
                  </div>

                  <div class="tab-pane fade " id="pills-retiro" role="tabpanel" aria-labelledby="pills-retiro-tab"
                    tabindex="0">
                    
                    <h5> Horarios: 08:00 - 22:00 Lunes a Sabados </h5>
                
                      <div class="text-center"> 
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3331.19133595375!2d-56.50789268480211!3d-33.39217208079059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a6c1ada36e59bf%3A0x9695eb4025ba7978!2sSupermercado%20Largacha!5e0!3m2!1ses!2suy!4v1666899217872!5m2!1ses!2suy" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <br>

                    <p> Persona que retira:  </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <br>


        <!--  TARJETA -->

        <div class="accordion" id="accordionPanelsStayOpenExample">
          <div class="accordion-item w-100">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-2-circle-fill" viewBox="0 0 16 16">
                  <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM6.646 6.24c0-.691.493-1.306 1.336-1.306.756 0 1.313.492 1.313 1.236 0 .697-.469 1.23-.902 1.705l-2.971 3.293V12h5.344v-1.107H7.268v-.077l1.974-2.22.096-.107c.688-.763 1.287-1.428 1.287-2.43 0-1.266-1.031-2.215-2.613-2.215-1.758 0-2.637 1.19-2.637 2.402v.065h1.271v-.07Z" />
                </svg>
                Pago
              </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
              aria-labelledby="panelsStayOpen-headingOne" style="">
              <div class="accordion-body">
                <form action="#" class="credit-card-div" method="post">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-12">
                          <label class="text-muted">
                            Numero de tarjeta
                          </label>
                          <input type="number" class="form-control" placeholder="5304 0000 0000 0000" />
                        </div>
                      </div>
                      <div class="row text-center">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <span class="help-block text-muted small-font">
                            Expiry month
                          </span>
                          <input type="number" class="form-control" name="expiracionM" id="" min="1" max="12"
                            placeholder="MM" />
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <span class="help-block text-muted small-font">
                            Expiry year</span>
                          <input type="number" class="form-control" placeholder="YY" />
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <span class="help-block text-muted small-font">
                            CCV</span>
                          <input type="number" class="form-control" placeholder="CCV" />
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <img
                            src="https://www.mastercard.es/content/dam/public/mastercardcom/eu/es/images/Consumidores/escoge-tu-tarjeta/credito/credito-estandar/card-image-standard-credit-card.png"
                            class="img-rounded" width="100" height="" />
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-md-12 pad-adjust">
                          <input type="text" class="form-control" placeholder="Name On The Card" />
                        </div>
                      </div>

                      <br />
                      <div class="row">
                        <div class="col-md-12 pad-adjust">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" checked class="text-muted" />
                              Save details for fast payments
                              <a href="#"> learn how ?</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                          <input type="submit" class="btn btn-danger" value="CANCEL" />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                          <input type="submit" class="btn btn-warning btn-block" value="PAY NOW" />
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <div class="modal-footer d-flex justify-content-between"></div>
            </div>
          </div>
        </div>
      </div>
      

      <div class="col-6">

 <div class='row g-0 ' >

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
      
<!-- 
        <div class="d-flex flex-column">
          <div class="card" style="width: 18rem;">
            <img src="https://images.pexels.com/photos/2272853/pexels-photo-2272853.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text"> benja gay, despues se hace otra wea con la card pq estan re peruanas
              </p>
            </div>
          </div>
        </div> -->
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

</script>
</body>

</html>