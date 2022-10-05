<?php
include_once 'Conexion.php';
include_once 'Clases/ClasePersona.php';


Class PersonaBD extends Conexion{

 public function CargarPersona($Persona){

    if($Persona -> getContraseña() == $Persona -> getCContraseña()){
        $sql = "SELECT * FROM personas WHERE Usuario = '".$Persona -> getUsuario()."'";//obtiene el usuario que ingreso el usuario 
        $this -> Conectar();
        $resultado = mysqli_query($this -> conn,$sql);
        if(!$resultado -> num_rows > 0){ // se fija que no exista  el usuario registrado en la BD
        $sql1 = "INSERT INTO personas(Usuario,Contraseña,Nombre,Apellido,Gmail,Estado) VALUES('".$Persona -> getUsuario()."','".$Persona -> getContraseña()."','".$Persona -> getNombre()."','".$Persona -> getApellido()."','".$Persona -> getGmail()."', '1')";     
        
            $resultado1 = mysqli_query($this -> conn,$sql1);
            $sql3 = "SELECT idpersona FROM personas WHERE Usuario = '".$Persona -> getUsuario()."'" ;

            $resultado3 = mysqli_query($this -> conn,$sql3);
            $fila = mysqli_fetch_assoc($resultado3);
            if ($resultado3) {
                $sql2 = "INSERT INTO Clientes(idcliente, Calle, NumeroPuerta) VALUES('".$fila['idpersona']."', '".$Persona -> getNombreCalle()."','".$Persona -> getNumeroCasa()."')";
                $sql4 = "INSERT INTO TelefonoClientes(idcliente, Numero) VALUES('".$fila['idpersona']."','".$Persona -> getTelefono()[0]."')";
                $resultado2 = mysqli_query($this -> conn,$sql2);
                mysqli_query($this -> conn,$sql4);
                if ($resultado2) {
                echo "<script> alert('Usuario registrado correctamente')</script>";
                header("Location: Login.php");
                }else{
                echo "<script> alert('Hubo un error al registrar el usuario')</script>";
            }
            }else {
                echo "<script> alert('Hubo un error al registrar la persona')</script>";
            }
        }else {
            echo "<script> alert('El Usuario ya existe')</script>";
        }
    }else {
        echo "<script> alert('Las contraseñas no coinciden ')</script>";
    }

 }

 public function LoginPersona($Persona){
    session_start();
     $sql = "SELECT * from personas where Usuario = '".$Persona -> getUsuario()."' AND Contraseña = '".$Persona -> getContraseña()."' AND Estado = '1'";
    $this -> Conectar(); 
    $resultado = mysqli_query($this -> conn, $sql);
    if($resultado -> num_rows > 0){
        $sql1 = "SELECT idpersona FROM personas WHERE Usuario = '".$Persona -> getUsuario()."'" ;
        $sql2 = "SELECT idusuario FROM usuario";

        $resultado1 = mysqli_query($this -> conn, $sql1);
        $resultado2 = mysqli_query($this -> conn, $sql2);
        $fila = mysqli_fetch_assoc($resultado1);
        $fila1 = mysqli_fetch_assoc($resultado2);
        if ($fila['idpersona'] == $fila1['idusuario']){// se fija si los id del usuario que se mando sea un usuario o un cliente 
            $sql4 = "SELECT * FROM personas WHERE Usuario = '".$Persona -> getUsuario()."'" ;
            $resultado4 = mysqli_query($this -> conn, $sql4);
            if ($resultado4) { 
            while ($row = $resultado4 -> fetch_assoc()) {
                $a = new Persona();
                $a -> setNombre($row['Nombre']);
                $a -> setApellido($row['Apellido']);
            
            }
             $_SESSION['ADMIN'] = $a;
                header("Location: PagPrincipal.php");
             }
            
        }else{ 
         $sql3 = "SELECT * from personas,telefonoclientes,clientes WHERE clientes.IDCliente = personas.IDPersona AND telefonoclientes.IDCliente = clientes.IDCliente AND personas.Usuario = '".$Persona -> getUsuario()."'" ;
            $resultado3 = mysqli_query($this -> conn, $sql3);
            if ($resultado3) {
                while ($row = $resultado3 -> fetch_assoc()) {
                    
                   $p = new Persona();
                   $p -> setNombre($row['Nombre']);
                   $p -> setApellido($row['Apellido']);
                   $p -> setUsuario($row['Usuario']);
                   $p -> setContraseña($row['Contraseña']);
                   $p -> setGmail($row['Gmail']);
                   $p -> setTelefono($row['Numero']);
                   $p -> setNombreCalle($row['Calle']);
                   $p -> setNumeroCasa($row['NumeroPuerta']);
                }
                $_SESSION['CLIENTE'] = $p;
                header("Location: PagPrincipal.php");    
            }
            
            }
    }else{
            echo "<script>alert('Correo o contraseña incorrecta') </script>";
        }
    }

    public function ModificarDatos($Persona){
        $this-> Conectar();
        $sql = "UPDATE Persona SET  Nombre = '".$Persona -> getNombre()."', Apellido ='".$Persona -> getApellido()."', ";
    }

    public function EliminarCuenta($Persona){
        $sql = "SELECT * from personas where Usuario = '".$Persona -> getUsuario()."' AND Contraseña = '".$Persona -> getContraseña()."'";
        $this -> Conectar();
        $resultado = mysqli_query($this -> conn, $sql);
        if ($resultado -> num_rows > 0 ) {
            $sql1 = "UPDATE Personas SET Estado = '0' where Usuario = '".$Persona -> getUsuario()."' AND Contraseña = '".$Persona -> getContraseña()."'";
            $resultado1 = mysqli_query($this -> conn, $sql1);
            if ($resultado1) {
                echo "<script> alert('Cuenta eliminada con exito ')</script>";
            }else{
                echo "<script> alert('Error al eliminar la cuenta ')</script>";
            }
        }else{
            echo "<script> alert('usuario o contraseña incorecta')</script>";
        }
    }

}


?>