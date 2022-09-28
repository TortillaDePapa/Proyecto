<?php
include_once 'Conexion.php';
include_once 'Clases/ClaseProducto.php';
include_once 'Clases/ClaseCategoria.php';
include_once 'Clases/ClaseEnvasados.php';

    Class ProductoBD extends Conexion{

         public function CargarProducto($Producto){
        $this -> Conectar();
        $sql = "SELECT * FROM Productos WHERE CodigoBarra = '".$Producto -> getCodBarra()."'";
        $resultado = mysqli_query($this -> conn, $sql);
            if (!$result -> num_rows > 0) {
                $sql2 = "INSERT INTO Productos(CodigoBarra,Imagen,Stock,Nombre,Precio,FechaVencimiento,Estado,NombreCategoria,UnidadMedida) VALUES('".$Producto -> getCodBarra()."','".$Producto -> getImagen()."','".$Producto -> getStock()."','".$Producto -> getNombre()."','".$Producto -> getPrecio()."','".$Producto -> getDescripcion()."','".$Producto -> getFechaVencimiento()."','1','".$Producto -> getNombreCategoria()."','".$Producto -> getTipoEnvase()."')";
                $resultado1 = myslqi_query($this -> conn,$sql2);
                    if ($resultado1){
                        echo"<script>alert('Nuevo articulo registrado correctamente')";
                    }else{
                        echo"<script>alert('Error al registrar el nuevo articulo')";
                    }
             }else {
                echo"<script>alert('Codigo de barras ya existente')";
             }
            }
       public function ListarProductos(){
            
            $sql = "SELECT * FROM productos WHERE Estado ='1'";
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
                    $p -> setDescripcion($row['Descripcion']);
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
        public function EliminarProducto(){
            $sql = "UPDATE Producto SET Estado = '0' where Codigobarra = '".$Producto -> getCodBarra()."'";
            $this -> Conectar();
            $resultado = mysqli_query($this -> conn, $sql);
            if($resultado){
               echo"<script>alert('Articulo eliminado con exito')";
            }else{
               echo"<script>alert('Error al eliminar el articulo')";
            }
       }




       public function ObtenerCategorias(){
        $sql = "SELECT * from categorias";
        $this -> Conectar();
        $resultado = mysqli_query($this -> conn, $sql);

        if($resultado -> num_rows > 0){
            $ListarCategorias[] = new Categoria();
            while($row = $resultado -> fetch_assoc()){
                $p = new Categoria();
                $p -> setNombreCategoria($row['NombreCategoria']);
                $ListarCategorias [] = $p;
            }
            return $ListarCategorias;
        }else{
            return null;
        }
       }
   
       public function ObtenerMedida(){
        $sql = "SELECT UnidadMedida from envasados";
        $this -> Conectar();
        $resultado = mysqli_query($this -> conn, $sql);

        if($resultado -> num_rows > 0){
            $ListarMedidas[] = new Envasado();
            while($row = $resultado -> fetch_assoc()){
                $p = new Envasado();
                $p -> setEnvasado($row['UnidadMedida']);
                $ListarMedidas [] = $p;
            }
            return $ListarMedidas;
        }else{
            return null;
        }
       }
    }

 

?>