<?php 

session_start();
require_once("modelo.php");

function inicial() 
{
    $today = getdate();
    $html = '<p>Fecha '.$today["mday"].' de '. $today["month"] .' del '. $today["year"].'</p>
             <p>Hora '.$today["hours"].' : '. $today["minutes"] .' : '. $today["seconds"].'</p>
             <p> ¡Gracias por entrar a nuestra página! </p>
             <p>Tu rol es '.$_SESSION["rol"].' </p>';
             
    
    return $html;
}


function getInfoCliente($user)
{ 
    $db = connectDb();
    
    if ($db != NULL)
    {
        $query = 'SELECT Id_Usuario, Fecha_Creacion, Nombre, Apellidos, Fecha_Nacimiento, Balance FROM usuario WHERE Id_Usuario = "'.$user.'"';
        // Query execution; returns identifier of the result group
        $results = $db->query($query);
        $mostrar = mysqli_fetch_array($results, MYSQLI_BOTH);
        $html = '<p>ID: '.$mostrar[Id_Usuario].'</p>
             <p>Nombre: '.$mostrar[Id_Usuario].'</p>
             <p>Apellido: '.$mostrar[Id_Usuario].'</p>
             <p>Fecha de Nacimiento: '.$mostrar[Id_Usuario].'</p>
             <p>Tu cuenta fue creada el: '.$mostrar[Fecha_Creacion].'</p>';
        disconnectDb($db);
        return $html;
    }
    
    return '';
}
    
function getTransaccion($user)
{
    $db = connectDb();
    
    if ($db != NULL)
    {
        $query = 'SELECT * FROM usuario_transaccion WHERE Id_Usuario = "'.$user.'"';
        $results = mysqli_query($db, $query);
        
        $htmlt = "<table>
                    <thead>
                    <tr>
                        <th> ID de transaccion </th>
                        <th> Seccion </th>
                        <th> Fecha</th>
                        <th> Tipo de transaccion</th>
                        <th> Monto total</th>
                    </tr>
                    </thead>
                    <tbody>";
                    
        while ($mostrar = mysqli_fetch_array($results, MYSQLI_BOTH))
        {
            $htmlt .= '<tr>
                         <td> '.$mostrar["Id_Us-Trans"].' </td>
                         <td> '.$mostrar["Id_Seccion"].' </td>
                         <td> '.$mostrar["Fecha"].' </td>
                         <td> '.$mostrar["Tipo"].' </td>
                         <td> '.$mostrar["Monto"].' </td>
                         </tr>';
        }
        $htmlt .= '</tbody>
                   </table>';
                   
        disconnectDb($db);
        
        return $htmlt;
    }
}

function nuevaTransaccion()
{
    
}

function getAreaTrabajo($user)
{
    $db = connectDb();
    if ($db != NULL)
    {
        $query = 'SELECT * FROM usuario WHERE Id_Usuario = "'.$user.'"';
        // Query execution; returns identifier of the result group
        $results = $db->query($query);
        $mostrar = mysqli_fetch_array($results, MYSQLI_BOTH);
        $html = '<p>Area de Trabajo: '.$mostrar[Id_AreaTrabajo].'</p>
             <p>Fuiste asiganado el: '.$mostrar[Fecha].'</p>';
        disconnectDb($db);
        return $html;
    }
    
    return '';
    
}


function getUsuarios()
{
    $db = connectDb();
    if ($db != NULL)
    {
        $query = 'SELECT * FROM usuario';
        $results = $db->query($query);
        $mostrar = mysql_fetch_array($results, MYSQLI_BOTH);
        $htmlt = "<table>
                    <thead>
                    <tr>
                        <th> ID: </th>
                        <th> Nombre: </th>
                        <th> Apellidos: </th>
                        <th> Fecha de nacimiento: </th>
                        <th> Balance: </th>
                        <th> Fecha de registro: </th>
                    </tr>
                    </thead>
                    <tbody>";
                    
        while ($mostrar = mysqli_fetch_array($results, MYSQLI_BOTH))
        {
            $htmlt .= '<tr>
                         <td> '.$mostrar["Id_Usuario"].' </td>
                         <td> '.$mostrar["Nombre"].' </td>
                         <td> '.$mostrar["Apellidos"].' </td>
                         <td> '.$mostrar["Fecha_Nacimiento"].' </td>
                         <td> '.$mostrar["Fecha_Creacion"].' </td>
                         <td> '.$mostrar["Balance"].' </td>
                         </tr>';
        }
        $htmlt .= '</tbody>
                   </table>';
                   
        disconnectDb($db);
        
        return $htmlt;
    }
}

?>