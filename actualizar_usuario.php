<?php
    // Conexión a la Base de Datos.
    require_once 'includes/conexion.php';

if(isset($_POST)){
    
    // Obtener los valores del formulario de Actualizacion de usuario
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false; 
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    
    // Array de errores
    $errores = array();
    
    // Validar los datos antes de guardar en la base de datos.
    // Validar campo nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }
    
    //Validar el campo Apellidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = "El apellido no es valido";
    }
    
    //Validar el Campo Email.
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $nombre_validado = false;
        $errores['email'] = "El Email no es valido";
    }
    
    
    $guardar_usuario = false;
    
    if(count($errores) == 0){
        $usuario = $_SESSION['usuario'];
        $guardar_usuario = true;
        
        // COMPROBAR SI EL EMAIL YA EXISTE
        $sql = "SELECT email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);
        
        //ACTUALIZAR USUARIO EN LA BASE DE DATOS.
        if($isset_user['id'] == $usuario['id'] || empty($isset_user)){
            
        
            $sql = "UPDATE usuarios SET "
                    ."nombre = '$nombre', "
                    . "apellidos = '$apellidos', "
                    . "email = '$email' "
                    . "WHERE id = ".$usuario['id'];
            $guardar = mysqli_query($db, $sql);


            if($guardar){
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;
                $_SESSION['completado'] = "Tus datos se han actualizado correctamente";
            }else{
                $_SESSION['errores']['general'] = "Fallo al actualizar tus datos";
            }
        }
    }else{
        $_SESSION['errores'] = $errores;
        
    }
}

header('Location: mis_datos.php');

