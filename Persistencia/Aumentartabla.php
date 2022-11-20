<?php
include_once 'conexion.php';
if (session_status() == PHP_SESSION_NONE){
    session_start();
}


$newConn = new Conexion();
$newConn -> Conectar();
$sql = "SELECT envios.IDEnvio, compras.IDCompra, compras.IDProducto,compras.Fecha, compras.CantidadProducto, compras.Total, productos.Precio, productos.Nombre as NombreP, personas.Nombre FROM envios, compras, productos, personas WHERE envios.IDCompra = compras.IDCompra AND compras.IDProducto = productos.IDProducto AND compras.IDCliente = personas.IDPersona AND envios.IDEnvio = ".$_POST['MostrarFactura']." ORDER BY envios.IDEnvio DESC, compras.IDProducto DESC";
$resultado = mysqli_query($newConn ->conn, $sql);
if($fila = mysqli_fetch_all( $resultado,MYSQLI_ASSOC)):
    
    $fechaV = date('Y-m-d H:i:s', strtotime($fila[0]['Fecha']."+ 1 month"));


?>
<div class="col-6"  >
  Numero de factura: <?php echo $fila[0]['IDEnvio']; ?> <br>
 Cliente:  <?php echo $fila[0]['Nombre']; ?>
</div>

<div class="col-6"  style="text-align: right;">

<small > Fecha: <?php echo $fila[0]['Fecha']; ?> <small id="FechaF"></small>
  <br>Vencimiento: <?php echo $fechaV; ?><small id="FechaV"></small> 
</small>

</div>



<hr>

<table class="table table-striped w-100">
      <thead>
        <tr>
          <th scope="col"> ID </th>
          <th scope="col" >Articulo</th>
          <th scope="col">Precio</th>
          <th scope="col">Unidad</th>
          <th scope="col">Total </th>
        </tr>
      </thead>
      <tbody class="table-group-divider" >
<?php
        foreach ($fila as $key ): 
    echo "<tr>";


?>

 
          <td scope="row" ><?php echo $key['IDProducto']; ?></td>
          <td scope="row" ><?php echo $key['NombreP']; ?></td>
          <td scope="row" ><?php echo $key['Precio']; ?></td>
          <td scope="row" ><?php echo $key['CantidadProducto']; ?></td>
          <td scope="row" ><?php echo $key['Total']; ?></td>  
        </tr>
          <?php 
          endforeach;
            endif;
          ?>
           </tbody>
    </table>
