<?php
include_once 'Conexion.php';
include_once 'Clases/ClaseProducto.php';
include_once 'Clases/ClaseCategoria.php';
include_once 'Clases/ClaseEnvasados.php';

    Class ProductoBD extends Conexion{

         public function CargarProducto($Producto,$Producto1 ){
          
        $this -> Conectar();
        $sql = "SELECT * FROM Productos WHERE CodigoBarra = '".$Producto -> getCodBarra()."'";
        $resultado = mysqli_query($this -> conn, $sql);
            if (!$resultado -> num_rows > 0) {
                $sql2 = "INSERT INTO Productos(CodigoBarra,Imagen,Stock,Nombre,Precio,Estado,Descripcion,NombreCategoria) VALUES('".$Producto -> getCodBarra()."','".$Producto -> getImagen()."','".$Producto -> getStock()."','".$Producto -> getNombre()."','".$Producto -> getPrecio()."','1','".$Producto -> getDescripcion()."','".$Producto1 ->getCategoria()."')";
                $resultado1 = mysqli_query($this -> conn, $sql2);     
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
            
            $sql = "SELECT * FROM productos WHERE Estado ='1' ";
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
                    $p -> setEstado($row['Estado']);
                    $ListarProductos [] = $p;
                }
                return $ListarProductos;
            }else{
                return null;
            }
        
        }
        public function MostrarProductos(){
            
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
                    $p -> setDescripcion($row['Descripcion']);
                    $p -> setStock($row['Stock']);
                    $p -> setNombre($row['Nombre']);
                    $p -> setPrecio($row['Precio']);
                    $p -> setEstado($row['Estado']);
                    $ListarProductos [] = $p;
                }
                return $ListarProductos;
            }else{
                return null;
            }
        
        }

       
       public function ModificarProducto($Producto){
        $sql = "SELECT idproducto from productos WHERE IDProducto =  '".$Producto -> getIDProducto()."'";
        $this -> conectar();
        $resultado = mysqli_query($this -> conn, $sql);
        if($resultado -> num_rows > 0){
            $sql1 = "SELECT codigoBarra from productos where IDProducto =  '".$Producto -> getIDProducto()."'";
            $resultado1 = mysqli_query($this -> conn, $sql1);
            if($resultado1 -> num_rows > 0){
                $sql2 = "UPDATE productos SET CodigoBarra = '".$Producto -> getCodBarra()."', nombre ='".$Producto -> getNombre()."', imagen = '".$Producto -> getImagen()."', Stock = '".$Producto -> getStock()."', Precio = '".$Producto -> getPrecio()."', Descripcion = '".$Producto -> getDescripcion()."' where IDProducto =  '".$Producto -> getIDProducto()."' " ;
                $resultado2 = mysqli_query($this -> conn, $sql2);
                if ($resultado2) {
                    echo"<script>alert('Producto modificado correctamente')";
                }
            }
        }else {
            echo"<script>alert('No existe ningun producto con esa ID')";
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
                $p -> setCategoria($row['NombreCategoria']);
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