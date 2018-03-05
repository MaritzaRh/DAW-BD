<?php

require_once("util.php");
include("_header.html");
echo '<h4 id = "reg">Results: </h4>';


if(isset($_POST["submit"])){
   echo getNamesWith($_POST["letters"]);
}else{
  echo getAccountByMail($_POST["email"]);
}

include("_searchBy.html");
include("_footer.html");

 ?>
