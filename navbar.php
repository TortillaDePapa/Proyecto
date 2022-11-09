
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
            <a class="navbar-brand" href="index.php"> Auto
<img src="https://svgsilh.com/svg/305728.svg" width="40" height="40">Servicio

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation" >
                <span class="navbar-toggler-icon"></span>
            </button>

          
            <div class="collapse navbar-collapse divsearch" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle me-2" style=" color: whitesmoke !important;" href="#" id="navbarDropdown" role="button"
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



<div class="usercarrito" style="padding-top: 12px;">
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
                <button class="btn btn-buttom  btn-custom btn-xs btn-carrito "  type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"> <i class="icon bi-cart3"></i> 
                    <span class="position-absolute top-45 start-80 translate-middle badge rounded-pill bg-danger " id="spancantidad" style="top: auto !important;"> 0 </span>
                </button>

                </div>

            </div>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    
       <?php
       
       include_once 'Carrito.php';
       
       
       ?>

                  
                </div>
         
            </div>
    </nav>

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
var precio = document.getElementsByName('preciocard');
   var preciof = 0;
   
   for(var i = 0; i < precio.length; i++){
       var matches = precio[i]['innerHTML'].match(/(\d+)/);
       preciof = preciof + parseInt(matches['0']);      
    }  
    document.getElementById('mostrarprecio-div').innerHTML = '$'+preciof;
     
     
     var cantidad = document.getElementsByName('cantidadspanh6');
     var cantidadspan = 0;

     for(var i = 0; i < cantidad.length; i++){
       var span = cantidad[i]['innerHTML'].match(/(\d+)/);
       cantidadspan = cantidadspan + parseInt(span['0']);      
    }  
     document.getElementById('spancantidad').innerHTML = cantidadspan;

function refrescar(){
   
   var precio = document.getElementsByName('preciocard');
   var preciof = 0;
   
   for(var i = 0; i < precio.length; i++){
       var matches = precio[i]['innerHTML'].match(/(\d+)/);
       preciof = preciof + parseInt(matches['0']);      
    }  

        document.getElementById('mostrarprecio-div').innerHTML = '$'+preciof;
        
     
     
     var cantidad = document.getElementsByName('cantidadspanh6');
     var cantidadspan = 0;

     for(var i = 0; i < cantidad.length; i++){
       var span = cantidad[i]['innerHTML'].match(/(\d+)/);
       cantidadspan = cantidadspan + parseInt(span['0']);      
    }  
     document.getElementById('spancantidad').innerHTML = cantidadspan;
     
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

   
   
    function MostrarCarrito(idProducto,precioP) {
        let formData = idProducto;
        let precio = precioP;
        let cant = document.getElementById('cantidad'+idProducto).innerHTML;
        var obAjax = new XMLHttpRequest();
        obAjax.open('POST', 'Persistencia/ControlCarrito.php', true);
        obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        obAjax.onload = function() {
            // console.log(this.responseText);
            ResfrescarCarrito();
        }
      obAjax.send('id='+formData+'&'+'Precio='+precio+'&'+'Cantidad='+cant); 


    }

    function ResfrescarCarrito(){
        var obAjax = new XMLHttpRequest();
        obAjax.open('POST', 'Carrito.php', true);
        obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        obAjax.onload = function() {
            console.log(this.responseText);
            document.getElementById('offcanvasRight').innerHTML = this.responseText;
            refrescar();
        }
      obAjax.send(); 

    }
     
   
</script>

</body>
</html>