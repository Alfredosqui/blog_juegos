<?php

// Iniciar la sesión y la conexión a la bd
require_once 'includes/conexion.php';;

// Recoger datos del formulario
if(isset($_POST)){
    //Borrar Errores de Sesion Antigua
    if(isset($_SESSION['error_login'])){
        session_unset($_SESSION['error_login']);
    }
    
    // Recoger datos del Formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    // Consulta para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);
    
    if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
        
        // Comprobar la contraseña
        $verify = password_verify($password, $usuario['password']);
        
        if($verify){
            // Utilizar Una sesión para guardar los datos del usuario logueado
            $_SESSION['usuario'] = $usuario;
            
            
        }else{
            // Si algo falla, enviar una sesión con el fallo
            $_SESSION['error_login'] = "Usuario o Password Incorrecto";
        }

        
    }else{
        // Mensaje de Error
        $_SESSION['error_login'] = "Usuario o Password invalido";
    }
}

// Redirigir al index.php
header('Location: index.php');