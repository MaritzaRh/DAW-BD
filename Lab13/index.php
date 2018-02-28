<?php 

    session_start();

    if (isset($_SESSION["user"])) {
        header("location:login.php");
    } else {
        include("_header.html");
        include("_body.html");
        include("_footer.html");
    }

?>
