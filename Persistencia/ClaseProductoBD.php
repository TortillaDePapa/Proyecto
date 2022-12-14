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
                    // echo"<script type='text/javascript'>
                    // (() => {
                    //     if (window.localStorage) {
              
                    //         // If there is no item as 'reload'
                    //         // in localstorage then create one &
                    //         // reload the page
                    //         if (!localStorage.getItem('reload')) {
                    //             localStorage['reload'] = true;
                    //             window.location.reload();
                    //         } else {
              
                    //             // If there exists a 'reload' item
                    //             // then clear the 'reload' item in
                    //             // local storage
                    //             localStorage.removeItem('reload');
                    //         }
                    //     }
                    // })();</script>";
                    }else{
                        
                    }
             }else {
            
             }
            }
       public function ListarProductos($Buscar){

        if($Buscar != ''){
            
            $sql = "SELECT * FROM productos WHERE Estado ='1' AND Nombre like '%".$Buscar."%'";

        }else {

            $sql = "SELECT * FROM productos WHERE Estado ='1' ";

        }
            
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
                return array();
            }
        
        }
        public function MostrarProductos($Buscar){

            if($Buscar != ''){
                $sql = "SELECT * FROM productos WHERE Nombre like '%".$Buscar."%'";
            }else{

                $sql = "SELECT * FROM productos";

            }
            
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
                return array();
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
                $sql2 = "UPDATE productos SET CodigoBarra = '".$Producto -> getCodBarra()."', nombre ='".$Producto -> getNombre()."', Stock = '".$Producto -> getStock()."', Precio = '".$Producto -> getPrecio()."', Descripcion = '".$Producto -> getDescripcion()."' where IDProducto =  '".$Producto -> getIDProducto()."' " ;
                $resultado2 = mysqli_query($this -> conn, $sql2);
                if ($resultado2) {
                    echo"<script type='text/javascript'>
                    (() => {
                        if (window.localStorage) {
              
                            // If there is no item as 'reload'
                            // in localstorage then create one &
                            // reload the page
                            if (!localStorage.getItem('reload')) {
                                localStorage['reload'] = true;
                                window.location.reload();
                            } else {
              
                                // If there exists a 'reload' item
                                // then clear the 'reload' item in
                                // local storage
                                localStorage.removeItem('reload');
                            }
                        }
                    })();</script>";
                }
            }
        }else {
            echo"<script>alert('No existe ningun producto con esa ID')</script>";
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

       public function Mostrarpedidos($Buscar){
        
        if($Buscar != ''){
            $sql = "SELECT envios.Estados, envios.IDEnvio,envios.Direccion, envios.MetodoEnvio, selecciona.MetodoDePago,compras.Fecha, compras.IDCompra,compras.IDProducto,personas.Usuario,SUM( DISTINCT compras.Total) AS Total FROM envios, compras, selecciona, clientes, productos, personas WHERE envios.idenvio like '%".$Buscar."%' and envios.IDCompra = compras.IDCompra AND compras.idcliente = selecciona.idcliente  AND selecciona.idcliente = clientes.idcliente AND clientes.IDCliente = personas.IDPersona AND compras.IDProducto = selecciona.IDProducto AND selecciona.IDProducto = productos.IDProducto    GROUP BY compras.IDCompra ORDER by envios.IDEnvio desc";
        }else{

            $sql = "SELECT envios.Estados, selecciona.MetodoDePago,envios.MetodoEnvio,envios.IDEnvio,envios.Direccion, compras.Fecha, compras.IDCompra,compras.IDProducto,personas.Usuario,SUM( DISTINCT compras.Total) AS Total FROM envios, compras, selecciona, clientes, productos, personas WHERE envios.IDCompra = compras.IDCompra AND  compras.idcliente = selecciona.idcliente  AND selecciona.idcliente = clientes.idcliente AND clientes.IDCliente = personas.IDPersona AND compras.IDProducto = selecciona.IDProducto AND selecciona.IDProducto = productos.IDProducto    GROUP BY compras.IDCompra ORDER by envios.IDEnvio desc";

        }

        
        
        $this -> Conectar();
       $result = mysqli_query($this -> conn, $sql);
        
        
        if($result -> num_rows > 0){
            $ListarProductos[] = new Producto();
    
            while($row = $result -> fetch_assoc()){
                $p = new Producto(); 
                $p -> setIDEnvio($row['IDEnvio']);
                $p -> setIDProducto($row['IDProducto']);
                $p -> setDireccion($row['Direccion']);
                $p -> setNombre($row['Usuario']);
                $p -> setIDProducto($row['IDCompra']);
                $p -> setEstado($row['Estados']);
                $p -> setEstadoEnvio($row['MetodoEnvio']);
                $p -> setMetodoPago($row['MetodoDePago']);
                $ListarProductos [] = $p;
            }
            return $ListarProductos;
        }else{
            return array();
        }
       }


       public function Mostrarpedidoscliente($Buscar){
        
        if($Buscar != ''){
            $sql = "SELECT envios.Estados, envios.MetodoEnvio,envios.IDEnvio,envios.Direccion, compras.Fecha, compras.IDCompra,compras.IDProducto,personas.Usuario,SUM( DISTINCT compras.Total) AS Total FROM envios, compras, selecciona, clientes, productos, personas WHERE envios.idenvio like '%".$Buscar."%' and envios.IDCompra = compras.IDCompra AND compras.idcliente = selecciona.idcliente  AND selecciona.idcliente = clientes.idcliente AND clientes.IDCliente = personas.IDPersona AND compras.IDProducto = selecciona.IDProducto AND selecciona.IDProducto = productos.IDProducto    GROUP BY compras.IDCompra ORDER by envios.IDEnvio desc";
        }else{

            $sql = "SELECT envios.Estados, envios.MetodoEnvio, envios.IDEnvio,envios.Direccion, compras.Fecha, compras.IDCompra,compras.IDProducto,personas.Usuario,SUM( DISTINCT compras.Total) AS Total FROM envios, compras, selecciona, clientes, productos, personas WHERE envios.IDCompra = compras.IDCompra AND compras.idcliente = selecciona.idcliente  AND selecciona.idcliente = clientes.idcliente AND clientes.IDCliente = personas.IDPersona AND compras.IDProducto = selecciona.IDProducto AND selecciona.IDProducto = productos.IDProducto    GROUP BY compras.IDCompra ORDER by envios.IDEnvio desc";

        }
        
        $this -> Conectar();
       $result = mysqli_query($this -> conn, $sql);
        
        
        if($result -> num_rows > 0){
            $ListarProductos[] = new Producto();
    
            while($row = $result -> fetch_assoc()){
                $p = new Producto(); 
                $p -> setIDEnvio($row['IDEnvio']);
                $p -> setIDProducto($row['IDProducto']);
                $p -> setDireccion($row['Direccion']);
                $p -> setNombre($row['Usuario']);
                $p -> setIDProducto($row['IDCompra']);
                $p -> setEstado($row['Estados']);
                $p -> setFecha($row['Fecha']);
                $p -> setPrecio($row['Total']);
                $p -> setEstadoEnvio($row['MetodoEnvio']);
                $ListarProductos [] = $p;
            }
            return $ListarProductos;
        }else{
            return array();
        }
       }
    }

 

?>