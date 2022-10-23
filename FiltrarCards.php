
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
     echo"   <div class='row'> ";
     for($i = 1; $i < count($ListarProductos); $i++){
     echo "<input type='hidden' value='".$ListarProductos[$i] -> getIDProducto()."' name='idproducto' id='idproducto'>";
     echo "    <div class='col-lg-3 col-sd-12 col-margin' >";
     echo "     <div class='card' style='width: 100%'>";
     echo "         <input type='number' id='cantidad' value='10'   >";
     echo "       <img src='imagenes/".$ListarProductos[$i] -> getImagen()."'>";
     echo "        <div class='card-body'>";
     echo "          <h5 class='card-title'>".$ListarProductos[$i] -> getNombre()."</h5>";
     echo "          <small class='text-muted d-grid gap-2 d-md-flex justify-content-md-end'>" . $ListarProductos[$i]->getstock()."</small>";
     echo "          <hr>";
     echo "          <h4 class='card-title'>"."$".$ListarProductos[$i] -> getPrecio(). "</h4>";
     echo "          <p class='card-text'>  ".$ListarProductos[$i] -> getDescripcion()." </p>";
     
    //  echo "           <div>"; 
    //  echo "  <span  class='minus'> - </span>"; 
    //  echo "  <span  class='num' > 1 </span>"; 
    //  echo "  <span  class='plus'  > + </span>"; 

    //  echo "           </div>"; 

    //  echo "          <input type='number' value='1' class='CantidadProducto' name='Cantidad' id='CantidadProducto' disabled> ";
     echo "          <button class='btn btn-primary btn-dark bg-dark' onclick='MostrarCarrito(\"".$ListarProductos[$i] -> getIDProducto()."\",\"".$ListarProductos[$i] -> getPrecio()."\")'><i class='icon bi-cart3'></i> </button>";
     echo "       </div>";
     echo "      </div>";
     echo "   </div>";
      }

        ?>
</form>

<!-- <script>

const plus = document.querySelector(".plus"),
    minus = document.querySelector(".minus"),
    num = document.querySelector(".num");
    let a = 1;
    plus.addEventListener("click", ()=>{
      a++;
      a = (a < 10) ? "" + a : a;
      num.innerText = a;
    });

    minus.addEventListener("click", ()=>{
      if(a > 1){
        a--;
        a = (a < 10) ? "" + a : a;
        num.innerText = a;
      }
    });

</script> -->
