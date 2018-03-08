<?php
    function connectDb(){
        $servername = "localhost";
        $username = "ischwifty";
        $password = "";
        $dbname = "Accounts";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
        }
        
        return $conn;
        
        
    }
    function closeDb($conn){
        mysqli_close($conn);
    }
    function getAccounts(){
        $conn = connectDb();
        $sql = "SELECT id_user,Name,Lastname,Email,Phone,Address FROM Personal_Info";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            echo '<table class="responsive-table striped ses" ><tr><th>Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Address</th></tr>';
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["Name"]."</td>";
                echo "<td>".$row["Lastname"]." ".$row["S_Lastname"]."</td>";
                echo "<td>".$row["Email"]."</td>";
                echo "<td>".$row["Phone"]."</td>";
                echo "<td>".$row["Address"]." <a class='right btn-flat modal-trigger' href='delete.php?id=".$row["id_user"]."'><i class='  material-icons'  >delete</i></a> <a href='add.php?id=".$row["id_user"]."'class='right btn-flat modal-trigger' id='".$row["id_user"]."' name ='".$row["id_user"]."'><i class='  material-icons' >mode_edit</i></a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_free_result($result);
        closeDb($conn);
       
    }
    function getNamesWith($letters){
        $conn = connectDb();
        $sql = "SELECT Name,Lastname,Phone,S_Lastname FROM Personal_Info WHERE Name LIKE '%".$letters."%' OR Lastname LIKE '%".$letters."%' OR S_Lastname LIKE '%".$letters."%'";
        $result = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($result) > 0){
            echo '<table class="responsive-table striped ses" ><tr><th>Name</th><th>Last Name</th><th>Phone</th></tr>';
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["Name"]."</td>";
                echo "<td>".$row["Lastname"]." ".$row["S_Lastname"]."</td>";
                echo "<td>".$row["Phone"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_free_result($result);
        closeDb($conn);
    }
    function getAccountByMail($email){
        $conn = connectDb();
        $sql = "SELECT Name,Lastname,Email FROM Personal_Info WHERE Email = '".$email."'";
        $result = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($result) > 0){
            echo '<table class="responsive-table striped ses" ><tr><th>Name</th><th>Last Name</th><th>Email</th></tr>';
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["Name"]."</td>";
                echo "<td>".$row["Lastname"]."</td>";
                echo "<td>".$row["Email"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_free_result($result);
        closeDb($conn);
    }
    
  
    
    function saveForm($Name,$Lastname,$S_Lastname,$Email,$Address,$Phone){
        $conn = connectDB();
        // insert command specification 
                $query='INSERT INTO Personal_Info(Name,Lastname,S_Lastname,Email,Address,Phone) VALUES (?,?,?,?,?,?) ';//listo
                // Preparing the statement 
                if (!($statement = $conn->prepare($query))) {
                    die("Preparation failed: (" . $conn->errno . ") " . $conn->error. '      Regresa y completa los valores correctamente');
                }
                // Binding statement params 
                  
                if (!$statement->bind_param("ssssss",$Name,$Lastname,$S_Lastname,$Email,$Address,$Phone)) {
                    die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error. '      Regresa y completa los valores correctamente'); 
                }
                 // Executing the statement
                 if (!$statement->execute()) {
                    die("Execution failed: (" . $statement->errno . ") " . $statement->error. '      Regresa y completa los valores correctamente');
                  } 
                
                        
        }
        
    function getById($conn, $id){
        //Specification of the SQL query
        $query='SELECT * FROM Personal_Info WHERE id_user="'.$id.'"';
         // Query execution; returns identifier of the result group
        $data = $conn->query($query);   
        $line = mysqli_fetch_array($data, MYSQLI_BOTH);
        return $line;
        
        
    }
    
    
     function getAll(){
         $conn = connectDb();
        //Specification of the SQL query
        $query='SELECT Address FROM Personal_Info ';
         // Query execution; returns identifier of the result group
        $data = $conn->query($query); 
        $line = array();
        $i = 0;
        while($row = mysqli_fetch_array($data, MYSQLI_BOTH)) {
          $line[$i]= $row['Address'];
          $i++;
        }
        return $line;
        
        
    }
    
    
    
    function editEntry($Name,$Lastname,$S_Lastname,$Email,$Address,$Phone,$id_user){
    $conn = connectDb();
    
    // insert command specification 
    $query='UPDATE Personal_Info SET Name=?, Lastname=?, S_Lastname=?, Email=?, Address=?, Phone=? WHERE id_user=?';
    // Preparing the statement 
    if (!($statement = $conn->prepare($query))) {
        die("Preparation failed: (" . $conn->errno . ") " . $conn->error. '      Regresa y completa los valores correctamente');
    }
    // Binding statement params 
    if (!$statement->bind_param("sssssss", $Name,$Lastname,$S_Lastname,$Email,$Address,$Phone,$id_user)) {
        die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error. '      Regresa y completa los valores correctamente'); 
    }
    // update execution
    if ($statement->execute()) {
        echo 'There were ' . mysqli_affected_rows($mysql) . ' affected rows';
    } else {
        die("Update failed: (" . $statement->errno . ") " . $statement->error. '      Regresa y completa los valores correctamente');
    }
 

    
    closeDb($conn);
}
    function deleteEntry($id_user){
    $conn = connectDb();
        // Deletion query construction
    $query= "DELETE FROM Personal_Info WHERE id_user=?";
    if (!($statement = $conn->prepare($query))) {
        die("The preparation failed: (" . $conn->errno . ") " . $conn->error. '      Regresa y completa los valores correctamente');
    }
    // Binding statement params
   
    if (!$statement->bind_param("s", $id_user)) {
        die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error. '      Regresa y completa los valores correctamente');
    } 
    // delete execution
    if ($statement->execute()) {
        echo 'There were ' . mysqli_affected_rows($conn) . ' affected rows';
    } else {
        die("Update failed: (" . $statement->errno . ") " . $statement->error. '      Regresa y completa los valores correctamente');
    }

    }
?>