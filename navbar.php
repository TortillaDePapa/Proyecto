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
                            <i class="bi bi-cart2" width="16" height="16"></i>Carrito
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <hr>
                    <div class="offcanvas-body">

                        <?php
      if(isset($_SESSION['MostrarCarrito'])){
        echo    " <div class='row g-0'>";


          for($i = 0; $i <count($_SESSION['MostrarCarrito']); $i++){
            echo    "<div class='card mb-3' style='max-width: 540px;'>";
            echo    " <div class='col-md-4'>";
            echo    "<img src='imagenes/".$_SESSION['MostrarCarrito'][$i]['Imagen']."' class='img-fluid rounded-start' alt='...'>";
            echo    "</div>";
            echo    "<div class='col-md-8'>";
            echo    "<div class='card-body'>";
            echo    "<h5 class='card-title'>".$_SESSION['MostrarCarrito'][$i]['Nombre']."</h5>";
            echo    "<h5 class='card-title' name='preciocard'>$".$_SESSION['MostrarCarrito'][$i]['Precio']*$_SESSION['MostrarCarrito'][$i]['Cantidad']."</h5>";
            echo    "<h6 class='card-title'>Cantidad:".$_SESSION['MostrarCarrito'][$i]['Cantidad']." </h6>";
            echo    "</div>";
            echo    "</div>";
             echo    "</div>";
        }
        }  else{
            echo "<img src='https://editorialparalelo28.es/images/cartEmpty.png' alt='https://editorialparalelo28.es/images/cartEmpty.png' height='250px'>";
        }

            echo    "</div>";
            ?>
            <?php
            if (isset($_SESSION['MostrarCarrito'])) {
            
            

                
            }

            
            
            ?>

<script>
    var precio = document.getElementsByName('preciocard');
           console.log(precio);
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