<?php
session_start();
require_once("consultasCliente.php");

include("partials/_dentroHeader.html");

$_SESSION["opcion"] = $_GET["opcion"]; 

if($_GET["opcion"] == 0)
{
    include("partials/_dentroView.html");
}
else if($_GET["opcion"] == 1)
{
    //cuenta
    include("partials/_dentroView.html");
}
else if($_GET["opcion"] == 2)
{
    //información personal
    include("partials/_dentroView.html");
}
else if($_GET["opcion"] == 3)
{
    //Transacciones
    include("partials/_dentroView.html");
}
else if($_GET["opcion"] == 4)
{
    //Nueva Transacción
}

include("partials/_footer.html");

?>