<?php
    session_start();

    if (isset($_SESSION["user"])) {
        include("_header.html");
        include("_preguntas.html");
        include("_footer.html");
        
    }else if(isset($_POST["user"]) && isset($_POST["age"]) && isset($_POST["pass"]) && isset($_POST["passconfirm"])){
        
        $_SESSION["user"] = $_POST["user"];
        $_SESSION["age"] = $_POST["age"];
        $_SESSION["pass"] = $_POST["pass"];
        $_SESSION["passconfirm"] = $_POST["passconfirm"];
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["picture"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["picture"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        
        $_SESSION["picture"] = $target_file;
        
        if($_POST["age"] > 17 && $_POST["pass"] == $_POST["passconfirm"]) {    
            $_SESSION["preguntas"] = true;  
        } else {
            $_SESSION["preguntas"] = false;
        }
        
        include("_header.html");
        include("_preguntas.html");
        include("_footer.html");
        
    }else{
        header("location:index.php");
    }
?>
