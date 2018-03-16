<?php
session_start();
require_once("util.php");
include("_header.html");
echo '<h4 id = "reg">Registered Accounts</h4>';
echo getAccounts();
include("_searchBy.html");
include("_footer.html");
 if (isset($_SESSION["mensaje"])) {
        $mensaje = $_SESSION["mensaje"];
        include("_mensaje.html");
        unset($_SESSION["mensaje"]);
    }
 ?>
