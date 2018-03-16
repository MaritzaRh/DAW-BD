<?php
    session_start();
    require_once("util.php");
    if(isset($_GET["id"])) {
        deleteEntry($_GET["id"]);
        $_SESSION["mensaje"] = 'Se eliminó correctamente';
    } 
  header("location:index.php");

?>