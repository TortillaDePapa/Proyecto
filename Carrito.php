<?php

if (session_status() == PHP_SESSION_NONE){
    session_start();
}

?>

                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabelRight">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg> Carrito
                        </h5>
                        <button type='button' class='btn boton-basura'  onclick='EliminarCarro()'><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg> </button>

                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <hr>
                    <div class="offcanvas-body body">

                    



                        <?php
                        
      if(isset($_SESSION['MostrarCarrito'])){
        
        echo    " <div class='row g-0 ' >";


          for($i = 0; $i <count($_SESSION['MostrarCarrito']); $i++){
            if($_SESSION['MostrarCarrito'][$i] != null){
            echo    "<div class='card mb-3 d-flex flex-row' style='max-width: 540px;'>";
            echo    " <div class='col-md-4' style='margin: auto !important;'>";
            echo    "<img src='imagenes/".$_SESSION['MostrarCarrito'][$i]['Imagen']."' class='img-fluid rounded-start' alt='...'>";
            echo    "</div>";
            echo    "<div class='col-md-8' style=' padding: auto !important;'>";
            echo    "<div class='card-body'>";
            echo    "<h5 class='card-title'>".$_SESSION['MostrarCarrito'][$i]['Nombre']."</h5>";
            echo    "<h6 class='card-title' name='cantidadspanh6'>Cantidad:".$_SESSION['MostrarCarrito'][$i]['Cantidad']." </h6>";
            echo    "<h6 class='card-title' name=''>Precio $".$_SESSION['MostrarCarrito'][$i]['Precio']."</h6>";
            echo    "<h6 class='card-title' name='preciocard'>Total $".$_SESSION['MostrarCarrito'][$i]['Precio']*$_SESSION['MostrarCarrito'][$i]['Cantidad']."</h6>";
            // echo "    <button type='button' class='btn boton-basura ' onclick='EliminarCarro()'>     <i class='bi bi-trash'></i> ";

            echo    "</div>";
            echo    "</div>";
             echo    "</div>";
            }
        }
        }  else{
            echo "<img class='img-carrito' src='https://editorialparalelo28.es/images/cartEmpty.png' alt='https://editorialparalelo28.es/images/cartEmpty.png' height='250px'>";
        }

            echo    "</div>";
            ?>

        </div>

        <!-- <div class="offcanvas-footer"> -->
            <?php
            if(!isset($_SESSION['MostrarCarrito'])){
            echo "<div id='mostrarprecio-div' style='display: none;'> 0";

            
           echo " </div>";
            
            }elseif(isset($_SESSION['MostrarCarrito'])) {
                

                echo "<div class='container '>";
 
                echo "<hr>";

      echo " <div class='row'>";
       echo " <div class='col-sm'> ";
       echo "<p> </p>";
      echo " <h5>  Total:   </h5>";  
       echo "</div>";


      echo "  <div class='col-sm'>  ";
      echo "<p> </p>";
      echo "<div  id='mostrarprecio-div' style=''>"; 

     echo " </div>";

     
     
      echo "</div>";
      echo "</div>";
      echo "<hr>";
      if(isset($_SESSION['CLIENTE']) or isset($_SESSION['ADMIN'])){
     echo "<a class='btn btn-primary bg-dark w-100' style='border-color: #212529 !important;' href='Tarjeta.php' role'button' onclick='ConfirmarCompra()'> Comprar </a>";
}else{
    echo "<a class='btn btn-primary bg-dark w-100' style='border-color: #212529 !important;' href='Login.php' role'button' > Comprar </a>";
}
echo "</div>";
echo "<br>";
             

            }
            ?>