<?php
    $asunto = htmlspecialchars($_POST["asunto"]);
    $email = htmlspecialchars($_POST["email"]);
    $descripcion = htmlspecialchars($_POST["descripcion"]);

    if(isset($asunto) && isset($email) && isset($descripcion)){
        include("_header.html");
        include("_peticionEnviada.html");
        include("_footer.html");
    }else{
        include("_header.html");
        include("_body.html");
        include("_footer.html");
    }
?>
