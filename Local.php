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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>TITLE</title>


  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="PagPrincipal.php">AutoServicio</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="#">Local</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle me-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categorias
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Limpieza</a> </li>
                  <!-- <li><hr class="dropdown-divider"></li> -->
                  <li><a class="dropdown-item" href="#">Hogar</a></li>
                  <li><a class="dropdown-item" href="#">Carniceria</a></li>
                </ul>
              </li>
            </ul>

            
            <input class="form-control me-3" type="search" placeholder="Buscar" aria-label="Search" >
            <button class="btn btn-buttom btn-custom me-1 boton"  type="submit" > </button>
            <button class="btn btn-buttom btn-custom me-1"  type="submit">  <i class="bi bi-box-arrow-in-right"></i> </button>
            <button class="btn btn-buttom btn-custom me-1"  type="submit">  <i class="bi bi-person-fill"></i> </button>
            <button class="btn btn-buttom btn-custom"  type="submit"> <i class="icon bi-cart3"></i> </button>
            
          </div>
        </div>
      </nav> 


      <center> <h1> ¿Dónde estamos? </h1>
    
      <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13324.765340870195!2d-56.505704!3d-33.3921721!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9695eb4025ba7978!2sSupermercado%20Largacha!5e0!3m2!1ses!2suy!4v1661888790605!5m2!1ses!2suy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </center>


</body>
</html>
