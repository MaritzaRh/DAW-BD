<?php
    require_once('util.php');
saveForm($_POST["Name"],$_POST["Lastname"],$_POST["S_Lastname"],$_POST["Email"],$_POST["Address"],$_POST["Phone"]);
    header('location:index.php');
?>