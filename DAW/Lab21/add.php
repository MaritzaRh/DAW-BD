<?php
    require_once("biblbiotec.php");
    include("_header.html");
    
    $data = getById(connectDb(), $_GET["id"]); 
    include("_main.html");
    
    include("_footer.html");
?>