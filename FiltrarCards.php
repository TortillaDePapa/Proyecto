
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
     echo "<input type='hidden' value='".$ListarProductos[$i] -> getIDProducto()."' name='idproducto' id='idproducto '>";
     echo "    <div class='col-lg-3 col-sd-12 col-margin text-center' >";
     echo "     <div class='card' style='width: 100%'>";
     echo "       <img src='imagenes/".$ListarProductos[$i] -> getImagen()."'>";
     echo "        <div class='card-body'>";
     echo "          <h5 class='card-title'>".$ListarProductos[$i] -> getNombre()."</h5>";
     echo "          <small class='text-muted d-grid gap-2 d-md-flex justify-content-md-end'>" . $ListarProductos[$i]->getstock()."</small>";
     echo "          <hr>";
     echo "          <h4 class='card-title'>"."$".$ListarProductos[$i] -> getPrecio(). "</h4>";
     echo "           <div class='contador'>";
     echo "           <button class='btn' style='width: 60px !important; border-radius: 20px !important;  background: rgb(191, 190, 191);' id='myBtn' name='myBtn'  onclick=\"spanCantidad('menos',".$ListarProductos[$i] -> getIDProducto().")\">-</button> ";
     echo "           <span id='cantidad".$ListarProductos[$i] -> getIDProducto()."' class='inputcant' style='  font-size: 20px; pointer-events: none;'>  1 </span> ";
     echo "         <button class='btn' style='width: 60px !important; border-radius: 20px !important; background: rgb(158, 158, 158);' id='myBtn2' name='myBtn2' onclick=\"spanCantidad('mas',".$ListarProductos[$i] -> getIDProducto().")\">+</button>";
     echo "       </div>";
     //  echo "        <p class='card-text'>  ".$ListarProductos[$i] -> getDescripcion()." </p>";
     echo "          <button class='btn btn-primary btn-dark bg-dark' onclick='MostrarCarrito(\"".$ListarProductos[$i] -> getIDProducto()."\",\"".$ListarProductos[$i] -> getPrecio()."\")'><i class='icon bi-cart3'></i> </button>";
     echo "       </div >";
    
     echo "       </div>";
     echo "       </div>";

    }
     echo "      </div>";
     echo "   </div>";


      

        ?>
    
    <script>



function spanCantidad(param, id) {
        span = document.querySelector('span[id=cantidad'+id+']');
        if (param == "menos") {
          if(span.innerHTML > 1){
          span.innerHTML = parseInt(span.innerHTML)-1
          }
        }
        else if(param == "mas"){
          if(span.innerHTML < 20){
          span.innerHTML = parseInt(span.innerHTML)+1
          }
        }
        
      }
 





    </script>




