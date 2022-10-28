<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/principal.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"> AutoServicio </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse divsearch" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
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
                <input class="form-control me-3 w-50" type="search" placeholder="Buscar"  onkeyup="FiltrarCards()" aria-label="Search" id="buscarcards">



<div class="usercarrito" >
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
                <button class="btn btn-buttom  btn-custom btn-xs btn-carrito" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"> <i class="icon bi-cart3"></i>
                </button>
                </div>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabelRight">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg>Carrito
                        </h5>
                        <button type='button' class='btn  boton-basura' style="padding-left: 150px !important;"  onclick='EliminarCarro()'><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg> </button>

                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <hr>
                    <div class="offcanvas-body">

                        <?php
                        
      if(isset($_SESSION['MostrarCarrito'])){
        
        echo    " <div class='row g-0 ' >";


          for($i = 0; $i <count($_SESSION['MostrarCarrito']); $i++){
            echo    "<div class='card mb-3 d-flex flex-row' style='max-width: 540px;'>";
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
       
        }  else{
            echo "<img src='https://editorialparalelo28.es/images/cartEmpty.png' alt='https://editorialparalelo28.es/images/cartEmpty.png' height='250px'>";
        }

            echo    "</div>";
            ?>

        </div>

        <!-- <div class="offcanvas-footer"> -->
            <?php
            if(!isset($_SESSION['MostrarCarrito'])){
            echo "<div id='mostrarprecio-div' style='display: none;'><input type='text' value='0' id='preciof-input'>";

            
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
      echo "<div id='mostrarprecio-div'>"; 

      echo "<input type='text' value='1' id='preciof-input'>";
     echo " </div>";

     
     
      echo "</div>";
      echo "</div>";
      echo "<hr>";
     echo "<a class='btn btn-primary bg-dark w-100' style='border-color: #212529 !important;' href='Tarjeta.php' role'button' onclick='ConfirmarCompra()'> Comprar </a>";

echo "</div>";
echo "<br>";
             

            }
            ?>
        <!-- </div> -->
<script>
   
        var precio = document.getElementsByName('preciocard');
        var preciof = 0;
        
        for(var i = 0; i < precio.length; i++){
            var matches = precio[i]['innerHTML'].match(/(\d+)/);
            preciof = preciof + parseInt(matches['0']);      
         }  
          if(document.getElementById('preciof-input').value = 1){
          document.getElementById('mostrarprecio-div').innerHTML = preciof;
          }else if(document.getElementById('preciof-input').value = 0){
            document.getElementById('mostrarprecio-div').style.visibility = collapse;
            document.getElementById('preciof-input').style.visibility = collapse;
          }
          
          function EliminarCarro(){
            var obAjax = new XMLHttpRequest();
        obAjax.open('POST', 'Persistencia/Control.php', true);
        obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        obAjax.onreadystatechange = function() {
            window.location.reload();
        }
        obAjax.send('EliminarCarro');
    }
        function ConfirmarCompra(){
            window.location.assign('Tarjeta.php');
        }
          
        
</script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </nav>
</body>
</html>