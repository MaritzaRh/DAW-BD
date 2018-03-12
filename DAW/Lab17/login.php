<?php
    session_start();
    require_once("modelo.php");
    require_once("consultasCliente.php");

    $noIniciar = 1;
    
    if(isset($_SESSION["usuario"]) ) 
    {
        $nombre = $_SESSION["usuario"];
        $_SESSION["opcion"] = 0;
        getRol($_SESSION["usuario"]);
        
        include("partials/_dentroHeader.html");
        include("partials/_dentroView.html");
        include("partials/_footer.html"); 
        
    }
    else if (login($_POST["usuario"], $_POST["password"])) 
    {
        
        unset($_SESSION["error"]);
        
        $_SESSION["usuario"] = $_POST["usuario"];
        $_SESSION["opcion"] = 0;
        
        $nombre = $_SESSION["usuario"];
        
        getRol($_SESSION["usuario"]);
        
        include("partials/_dentroHeader.html");
        include("partials/_dentroView.html");
        include("partials/_footer.html"); 
        
    }
    else 
    {    
        $_SESSION["error"] = "Usuario y/o contraseña incorrectos";
        header("location: iniciarSesion.php");
    }

?>