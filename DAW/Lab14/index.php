<?php 

    session_start();

    if (isset($_SESSION["user"])) {
        header("location:login.php");
    } else {
        include("_header.html");
        include("_body.html");
        include("_footer.html");
    }

	require_once "util.php";
	$result = getFruits();

	if(mysqli_num_rows($result)>0){
		while($row = musqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>" . $row ["name"] . "</td>";
			echo "<td>" . $row ["units"] . "</td>";;
			echo "<td>" . $row ["quantity"] . "</td>";;
			echo "<td>" . $row ["price"] . "</td>";;
			echo "<td>" . $row ["country"] . "</td>";;
			echo "<tr>";
		}	
	}

?>
