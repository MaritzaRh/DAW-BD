<?php
    session_start();
    require_once("util.php");
    if(isset($_POST["id_user"])) {
        editEntry($_POST["Name"],$_POST["Lastname"],$_POST["S_Lastname"],$_POST["Email"],$_POST["Address"],$_POST["Phone"],$_POST["id_user"]);
        $_SESSION["mensaje"] = $_POST["Nombre"].' Se actualizó correctamente';
    } 
  header("location:index.php");
?>