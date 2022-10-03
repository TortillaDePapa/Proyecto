<?php
    session_start();
    include_once 'Persistencia/ClasePersonaBD.php';
    
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


        <input class="form-control me-3" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-buttom btn-custom me-1 boton" type="submit"> </button>
        
        <button class="btn btn-buttom btn-custom me-1" type="submit"> <i class="bi bi-box-arrow-in-right"></i> </button>
        <a href="Perfil.php"> <button class="btn btn-buttom btn-custom me-1" type="submit"> <i
              class="bi bi-person-fill"></i> </button></a>


        <button class="btn btn-buttom btn-custom" type="submit"> <i class="icon bi-cart3"></i> </button>

      </div>
    </div>
  </nav>



 <!-- Formato Perfil -->

  <div class="container">
    <div class="row">
      <div class="col-md-12 offset-md-4">
      <div class="col-12">
              <div class="col-5">

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link bg-dark" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
              type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Perfil</button>

          </li>
   
          <li class="nav-item" role="presentation">
            <button class="nav-link bg-dark" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
              type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Modificar datos</button>
          </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">

      
               <!--   Perfil -->
               
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
            tabindex="0">
            <div class="col-12">
              <div class="col-5">
                <img class="img-thumbnail"
                  src="http://pm1.narvii.com/6880/0b2cc13eba0822a642b4d82d241bc695d59e310er1-400-400v2_uhq.jpg"
                  alt="">

              </div>
              <div class="col-7">
                
                <div class="form-group row">
                  <label for="usuario" class="col-4">usuario: </label>
                  <div class="col-8">
                    <input type="text" class="form-control" value="" placeholder="Atrox123" >
                  </div>
                  <br>
                  <label for="usuario" class="col-4">Nombre: </label>
                  <div class="col-8">
                    <input type="text" class="form-control" value="" placeholder="Lucas" >
                  </div>
                  <br>
                  <label for="usuario" class="col-4">Apellido: </label>
                  <div class="col-8">
                    <input type="text" class="form-control" value="" placeholder="Leguizamón" >
                  </div>
                  <br>

                </div>
                <div class="form-group row">
                  <label for="email" class="col-4"> email: </label>
                  <div class="col-8">
                    <input type="text" class="form-control" value="" placeholder="lucas@gmail.com" >
                  </div>
                  <br>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-4"> numero: </label>
                  <div class="col-8">
                    <input type="text" class="form-control" value="" placeholder="numero" >
                  </div>
                 
                </div>
                <br>
                <div class="form-group text-center">
                  <button class="btn btn-info"  > Eliminar </button>

                </div>


              </div>



            </div>
          </div>

              <!--  Modificar -->

          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
            tabindex="0">
            <div class="col-12">
              
              <div class="col-7">
                <div class="form-group row">
                  <label for="codigo" class="col-4">Usuario  </label>
                  <div class="col-8">
                    <input type="text" class="form-control" value="">
                  </div>
                </div>

                <br>
                <div class="form-group row">
                  <label for="usuario" class="col-4">Actual contraseña </label>
                  <div class="col-8">
                    <input type="text" class="" value="">
                  </div>
                </div>

                <br>
                <div class="form-group row">
                  <label for="email" class="col-4">Nueva contraseña </label>
                  <div class="col-8">
                    <input type="text" class="form-control" value="">
                  </div>
                </div>

                <br>
                
                <div class="form-group row">
                  <label for="email" class="col-4"> Nombre </label>
                  <div class="col-8">
                    <input type="text" class="form-control" value="">
                  </div>
                </div>

                <br>

                <div class="form-group row">
                  <label for="email" class="col-4"> Apellido </label>
                  <div class="col-8">
                    <input type="text" class="form-control" value="">
                  </div>
                </div>

                <br>

                <div class="form-group row">
                  <label for="email" class="col-4"> Gmail </label>
                  <div class="col-8">
                    <input type="text" class="form-control" value="">
                  </div>
                </div>
                
                <br>

                <div class="form-group row">
                  <label for="email" class="col-4"> Telefono </label>
                  <div class="col-8">
                    <input type="text" class="form-control" value="" >
                  </div>
                </div>

                <br>

                <div class="form-group row">
                  <label for="email" class="col-4"> Calle </label>
                  <div class="col-8">
                    <input type="text" class="form-control" value="">
                  </div>
                </div>

                <br>

                <div class="form-group row">
                  <label for="email" class="col-4"> Nro Puerta</label>
                  <div class="col-8">
                    <input type="text" class="form-control" value="">
                  </div>
                </div>

                <br>

                <div class="form-group text-center">
                  <button class="btn btn-info"  >Actualizar</button>

                </div>



              </div>



            </div>
          </div>
        
        </div>


      </div>
    </div>
  </div>

  </div>
          </div>


</body>

</html>

<!--   
          <div class="col-12">
            <div class="col-5">
              <img class="img-thumbnail"
                src="https://w7.pngwing.com/pngs/811/233/png-transparent-computer-icons-user-login-desktop-others-blue-computer-prints.png"
                alt="">

            </div>
            <div class="col-7">
              <div class="form-group row">
                <label for="codigo" class="col-4">codigo: </label>
                <div class="col-8">
                  <input type="text" class="form-control" value="00054DE">
                </div>
                <br>
              </div>
              <div class="form-group row">
                <label for="usuario" class="col-4">usuario: </label>
                <div class="col-8">
                  <input type="text" class="form-control" value="Lucas">
                </div>
                <br>

              </div>
              <div class="form-group row">
                <label for="email" class="col-4">email: </label>
                <div class="col-8">
                  <input type="text" class="form-control" value="lucas@gmail.com">
                </div>
                <br>
              </div>
              <div class="form-group text-center">
                <button class="btn btn-info">Actualizar</button>
                 <button class="btn btn-danger">Actualizar</button>
            </div>
            
            </div>

          </div>

          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

          </div>
        </div> -->