<?php

function connectDb()
{
    $mysql = mysqli_connect("localhost","root","","rbac");
    //root si estan en windows
    $mysql->set_charset("utf8");
    
    if(!$mysql)
    {
        die("Connection failed: ". mysqli_connect_error());
    }
    
    return $mysql;
}


function disconnectDb($mysql) 
{
     mysqli_close($mysql);
}

function login($user, $password)
{
    $db = connectDb();
    
    if ($db != NULL)
    {
        //Specification of the SQL query
        $query = 'SELECT Id_Usuario, Contrasena, Nombre FROM usuario WHERE Id_Usuario="'.$user.
            '" AND Contrasena="'.$password.'"';
        //$query;
        // Query execution; returns identifier of the result group
        $results = $db->query($query);
        
        // cycle to explode every line of the results
             
        if (mysqli_num_rows($results) > 0)
        {
            // it releases the associated results
            while($fila = mysqli_fetch_array($results, MYSQLI_BOTH))
            {
                $_SESSION["nombre"] = $fila["Nombre"];
            }
            
            mysqli_free_result($results);
            disconnectDb($db);
            
            return true;
        }
        return false;
    } 
    return false;
}

function getRol($user)
{
    $db = connectDb();
    
    if ($db != NULL)
    {
        $query = 'SELECT Id_Rol FROM roles_usuario WHERE Id_Usuario = "' .$user.'"';

        $result = mysqli_query($db, $query);
         
        disconnectDb($db);
        
        while($fila = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $_SESSION["rol"] = $fila["Id_Rol"];
        }
        
        return true;
    }
    
    return false;
}
?>