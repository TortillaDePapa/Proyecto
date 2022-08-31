<?php
include_once 'Conexion.php';
include_once 'Clases/ClaseProducto.php';
include_once 'Clases/ClaseCategoria.php';
include_once 'Clases/ClaseEnvasados.php';

    Class ProductoBD extends Conexion{

        // public function CargarProducto($Producto){
        //     $this -> Conectar();
        //     $sql = "SELECT * FROM Productos WHERE CodigoBarra = '".$Producto -> getCodBarra()."'";
        //     $resultado = mysqli_query($this -> conn, $sql);
        //     if (!$result -> num_rows > 0) {
        //         $sql1 = "SELECT * FROM Productos WHERE SKU = '".$Producto -> getSKU()."'";
        //         $resultado1 = mysqli_query($this -> conn, $sql1);
        //         if (!$resultado -> num_rows > 0) {
        //             $sql2 = "INSERT INTO Envasados(UnidadMedida,Marca,Envase) VALUES('".$Producto -> getCodBarra()."',)"
        //             $resultado1 = myslqi_query($this -> conn,$sql2);
                    

        //             $resultado2 = myslqi_query($this -> conn,$sql3);
        //             $fila = fetch_assoc($resultado2);
        //             if ($resultado2) {
        //                 $sql4 =//"INSERT INTO productos(CodigoBarra,Imagen,SKU,Stock,Nombre,Precio,FechaVencimiento,Estado) VALUES('".$Producto -> getCodBarra()."','".$Producto -> getImagen()."','".$Producto -> getSKU()."','".$Producto -> getStock()."','".$Producto -> getNombre()."','".$Producto -> getPrecio()."','".$Producto -> getFechaVencimiento()."','1')";
        //             }
        //         }else {
        //             echo"<script>alert('SKU ya existente')";
        //         }
        //     }else {
        //         echo"<script>alert('Codigo de barras ya existente')";
        //     }
        



        
        
        

       public function ListarProductos(){
            
            $sql = "SELECT * FROM productos";
            $this -> Conectar();
           $result = mysqli_query($this -> conn, $sql);
            
            
            if($result -> num_rows > 0){
        
                $ListarProductos[] = new Producto();
        
                while($row = $result -> fetch_assoc()){
                    $p = new Producto(); 
                    $p1 = new Categoria();
                    $p2 = new Envasado();
                    $p -> setIDProducto($row['IDProducto']);
                    $p -> setCodBarra($row['CodigoBarra']);
                    $p -> setImagen($row['Imagen']);
                    $p -> setSKU($row['SKU']);
                    $p -> setStock($row['Stock']);
                    $p -> setNombre($row['Nombre']);
                    $p -> setPrecio($row['Precio']);
                    $p -> setFechaVencimiento($row['FechaVencimiento']);
                    $p -> setEstado($row['Estado']);
                    $p1 -> setNombreCategoria($row['NombreCategoria']);
                    $p2 -> setEnvasado($row['UnidadMedida']);
                    $ListarProductos [] = $p;
                }
                return $ListarProductos;
            }else{
                return null;
            }
        
        }
    }




?>