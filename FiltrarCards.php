
<form action="" method="post" id="productos-form">
<?php
include_once 'Persistencia/ClaseProductoBD.php';


$p = new ProductoBD();

if(isset($_POST['buscar'])){

    $ListarProductos = $p -> Listarproductos($_POST['buscar']);

}else{

    $ListarProductos = $p -> Listarproductos('');

}



     echo " <div class='container text-center' id='idcard'>";
     echo"   <div class='row text-center'> ";
     for($i = 1; $i < count($ListarProductos); $i++){
     echo "<input type='hidden' value='".$ListarProductos[$i] -> getIDProducto()."' name='idproducto' id='idproducto'>";
     echo "    <div class='col-lg-3 col-sd-12 col-margin text-center' >";
     echo "     <div class='card' style='width: 100%'>";
     echo "       <img src='imagenes/".$ListarProductos[$i] -> getImagen()."'>";
     echo "        <div class='card-body'>";
     echo "          <h5 class='card-title'>".$ListarProductos[$i] -> getNombre()."</h5>";
     echo "          <small class='text-muted d-grid gap-2 d-md-flex justify-content-md-end'>" . $ListarProductos[$i]->getstock()."</small>";
     echo "          <hr>";
     echo "          <h4 class='card-title'>"."$".$ListarProductos[$i] -> getPrecio(). "</h4>";
     echo "         <input type='number' id='cantidad' value='1'  class='inputcant'  >";
     echo "<button id='myBtn'  onclick='contador++;myFunction()'>+</button> <button id='myBtn2' onclick='contador--;myFunction()'>-</button>";
     echo "          <p class='card-text'>  ".$ListarProductos[$i] -> getDescripcion()." </p>";
      echo "          <button class='btn btn-primary btn-dark bg-dark' onclick='MostrarCarrito(\"".$ListarProductos[$i] -> getIDProducto()."\",\"".$ListarProductos[$i] -> getPrecio()."\")'><i class='icon bi-cart3'></i> </button>";
     echo "       </div >";
    
     echo "       </div>";
     echo "       </div>";

    }
     echo "      </div>";
     echo "   </div>";


      

        ?>
    
    <script>
    var contador = 0;
    
    function myFunction() {
        var x = parseInt(document.getElementsByName("cantidad").value);
        x = x + contador;
        document.getElementsByName("cantidad").value = x;
    }
    </script>
</form>


