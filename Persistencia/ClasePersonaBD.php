<?php
include_once 'Conexion.php';
include_once 'Clases/ClasePersona.php';

Class PersonaBD extends Conexion{

 public function CargarPersona($Persona){

    if($Persona -> getContraseña() == $Persona -> getCContraseña()){
        $sql = "SELECT * FROM personas WHERE Usuario = '".$Persona -> getUsuario()."'" ;//obtiene el usuario que ingreso el usuario 
        $this -> Conectar();
        $resultado = mysqli_query($this -> conn,$sql);
        if(!$resultado -> num_rows > 0){ // se fija que no exista ya en la base de datos el usuario registrado en la BD
            $sql1 = "INSERT INTO personas(Usuario,Contraseña,Nombre,Apellido,Gmail) VALUES('".$Persona -> getUsuario()."','".$Persona -> getContraseña()."','".$Persona -> getNombre()."','".$Persona -> getApellido()."','".$Persona -> getGmail()."')";
            $resultado1 = mysqli_query($this -> conn,$sql1);
            $sql3 = "SELECT idpersona FROM personas WHERE Usuario = '".$Persona -> getUsuario()."'" ;

            $resultado3 = mysqli_query($this -> conn,$sql3);
            $fila = mysqli_fetch_assoc($resultado3);
            if ($resultado3) { // valida resultado3
                $sql2 = "INSERT INTO Clientes(idcliente, Calle, NumeroPuerta, Estado) VALUES('".$fila['idpersona']."', '".$Persona -> getNombreCalle()."','".$Persona -> getNumeroCasa()."', '1')";
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
     $sql = "SELECT * from personas where Usuario = '".$Persona -> getUsuario()."' AND Contraseña = '".$Persona -> getContraseña()."'";
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
            $_SESSION['Usuario'] = $fila1['idusuario'];
            if ($_SESSION['Usuario'] =  true) {
                header("Location: PagPrincipalAdmin.php");
            }
           
        }else{ 
            $fila2 = mysqli_fetch_assoc($resultado);
            $_SESSION["'".$Persona -> getUsuario()."'"] = $fila2["'".$Persona -> getUsuario()."'"];
            header("Location: PagPrincipal.php");
            }
    }else{
            echo "<script>alert('Correo o contraseña incorrecta') </script>";
        }
    }

    
    public function CerrarPersona(){
        session_unset();
        session_destroy();
    }  
}


?>