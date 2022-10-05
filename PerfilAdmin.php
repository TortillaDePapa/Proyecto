<?php
include_once 'Clases/ClasePersona.php';
include_once 'Persistencia/ClasePersonaBD.php';
include_once 'Persistencia/ClaseProductoBD.php';
include_once 'Clases/ClaseCliente.php';



session_start();

  if(!isset($_SESSION['ADMIN'])){
     header("Location: PagPrincipal.php");
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
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <title>TITLE</title>


</head>

<body>

  <!-- Navbar -->

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="PagPrincipal.php">AutoServicio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active " aria-current="page" href="Local.php">Local</a>
          </li>
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
        <input class="form-control me-3" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-buttom btn-custom me-1 boton" type="submit"> </button>

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
               echo "<button class='btn btn-buttom btn-custom'  type='submit'> <i class='icon bi-cart3'></i> </button>";
  //           echo " <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>";
  //           echo "  99+ ";
  //           echo" <span class='visually-hidden'>unread messages</span>";
  //           echo"</span>";
           ?>
      </div>
    </div>
  </nav>

  



  <!-- Formato Perfil -->

  <div class="container">
    <div class="row">
      <div class="col-md-12 offset-md-4">
        <div class="col-12">
          <div class="col-5">

             <!--   boton de perfil -->

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link bg-dark" id="pills-profile-tab" data-bs-toggle="pill"
                  data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                  aria-selected="false">Perfil</button>

              </li>

                 <!--   espacio en blanco -->


              <li class="nav-item" role="presentation">
                <button class="nav-link bg-light" id="" data-bs-toggle=""
                  data-bs-target="" type="button" role="tab" aria-controls=""
                  aria-selected="false" disabled></button>

              </li>

                 <!--   boton de modificar -->


              <li class="nav-item" role="presentation">
                <button class="nav-link bg-dark" id="pills-contact-tab" data-bs-toggle="pill"
                  data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="pills-contact"
                  aria-selected="false">Modificar datos</button>
              </li>

                 <!--   espacio en blanco -->

              <li class="nav-item" role="presentation">
                <button class="nav-link bg-light" id="" data-bs-toggle=""
                  data-bs-target="" type="button" role="tab" aria-controls=""
                  aria-selected="false" disabled></button>

              </li>
                 <!--   boton de eliminar -->

                 <li class="nav-item" role="presentation">
                 <button class="nav-link bg-dark" id="pills-home-tab" 
                 data-bs-toggle="pill" data-bs-target="#pills-home1" type="button" 
                 role="tab" aria-controls="pills-home" aria-selected="false"> Eliminar cuenta</button>
                </li>




        <h1>Agregar articulo</h1>
        <form action="" method="post"  enctype="multipart/form-data">
        <div class="contenedor-inputs">
        <h4>Codigo de barras</h4>
        <input type="number" name="CodBarra">
        <h4>Imagen del producto</h4>
        <input type="file" name="Imagen">
        <h4>Descripcion del producto</h4>
        <input type="text" name="Descripcion" maxlength="200" minlength="10">
        <h4>Stock del producto</h4>
        <input type="number" name="Stock">
        <h4>Nombre del producto</h4>
        <input type="text" name="NombreProducto">
        <h4>Precio del producto</h4>
        <input type="number" name="PrecioProducto">
        
        <p>
        <input type="Submit" value="Agregar" name="AgregarArticulo">
        </p>
      </ul>
      <?php
    
    if (isset($_POST['AgregarArticulo'])) {
      $Directorio = "imagenes/";
$archivoDestino = $Directorio . basename($_FILES['Imagen']["name"]);
$subirOK = true;
$imageFileType = strtolower(pathinfo($archivoDestino,PATHINFO_EXTENSION));

// Compruebe si el archivo de imagen es una imagen real o una imagen falsa
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["Imagen"]["tmp_name"]);
  if($check) {
    echo "El archivo es una imagen - " . $check["mime"] . ".";
    $subirOK = true;
  } else {
    echo "el archivo no es una imagen.";
    $subirOK = false;
  }
}

//chequeamos si el archivo existe
// if (file_exists($archivoDestino)) {
//   echo "Lo sentimos, el archivo ya existe.";
//   $subirOK = false;
// }

//Comprobar el tamaño del archivo
if ($_FILES["Imagen"]["size"] > 500000) {
  echo "Lo sentimos, su archivo es demasiado grande.";
  $subirOK = false;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
  echo "Lo sentimos, solo se permiten archivos JPG, JPEG, PNG.";
  $subirOK = false;
}

// Compruebe si $subirOK está establecido en false por algun un error
// if (!$subirOK) {
//   echo "Lo sentimos, su archivo no fue subido.";
// // si todo está bien, intente cargar el archivo
// } else {
  if (move_uploaded_file($_FILES["Imagen"]["tmp_name"], $archivoDestino)) {
    $a = new ProductoBD();
    $a1 = new Producto();
    $a1 -> setCodBarra($_POST['CodBarra']);
    $a1 -> setImagen(htmlspecialchars( basename( $_FILES["Imagen"]["name"])));
    $a1 -> setDescripcion($_POST['Descripcion']);
    $a1 -> setStock($_POST['Stock']);
    $a1 -> setNombre($_POST['NombreProducto']);
    $a1 -> setPrecio($_POST['PrecioProducto']);

  $a -> CargarProducto($a1);
  } else {
    echo "Lo sentimos, hubo un error al cargar su archivo.";
  }
}
 
      
    // }
    ?>
</body>
</html>
