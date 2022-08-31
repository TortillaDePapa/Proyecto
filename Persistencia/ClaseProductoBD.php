<?php
include_once 'Conexion.php';
include_once 'Clases/ClaseProducto.php';

    Class ProductoBD extends Conexion{
        public function CargarProducto($Producto){
            $this -> Conectar();
            $sql = "SELECT * FROM Productos WHERE CodigoBarra = '".$Producto -> getCodBarra()."'";
            $resultado = mysqli_query($this -> conn, $sql);
            if (!$result -> num_rows > 0) {
                $sql1 = = "SELECT * FROM Productos WHERE SKU = '".$Producto -> getSKU()."'";
                $resultado1 = mysqli_query($this -> conn, $sql1);
                if (!$resultado -> num_rows > 0) {
                    $sql2 = "INSERT INTO Envasados(UnidadMedida,Marca,Envase) VALUES('".$Producto -> getCodBarra()."',)"
                    $resultado1 = myslqi_query($this -> conn,$sql2);
                    

                    $resultado2 = myslqi_query($this -> conn,$sql3);
                    $fila = fetch_assoc($resultado2);
                    if ($resultado2) {
                        $sql4 =//"INSERT INTO productos(CodigoBarra,Imagen,SKU,Stock,Nombre,Precio,FechaVencimiento,Estado) VALUES('".$Producto -> getCodBarra()."','".$Producto -> getImagen()."','".$Producto -> getSKU()."','".$Producto -> getStock()."','".$Producto -> getNombre()."','".$Producto -> getPrecio()."','".$Producto -> getFechaVencimiento()."','1')";
                    }
                }else {
                    echo"<script>alert('SKU ya existente')";
                }
            }else {
                echo"<script>alert('Codigo de barras ya existente')";
            }
        



        
        
        }

        public function ListarProductos(){
            
            $sql = "SELECT * FROM productos";
            $this -> Conectar();
           $result = mysqli_query($this -> conn, $sql);
            
            
            if($result -> num_rows > 0){
        
                $ListarProductos[] = new Productos();
        
                while($row = $result -> fetch_assoc()){
                    $p = new Productos(); 
                    $p -> setID($row['id']);
                    $p -> setCodBarra($row['CodBarras']);
                    $p -> setImagen($row['Imagen']);
                    $p -> setSKU($row['SKU']);
                    $p -> setStock($row['Stock']);
                    $p -> setNombre($row['NombreProducto']);
                    $p -> setPrecio($row['PrecioProducto']);
                    $p -> setFechaVencimiento($row['FechaVencimiento']);
                    $p -> setEstado($row['Estado']);
                    $p -> setNombreCategoria($row['Categoria']);
                    $p -> setUnidadDeMedida($row['UnidadDEMedida']);
                    $ListarProductos [] = $p;
                }
                return $ListarProductos;
            }else{
                return null;
            }
        
        }
}




?>