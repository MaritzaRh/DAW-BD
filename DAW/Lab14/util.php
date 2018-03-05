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
        $sql = "SELECT Name,Lastname,Email,Phone,Address FROM Personal_Info";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            echo '<table class="responsive-table striped ses" ><tr><th>Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Address</th></tr>';
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["Name"]."</td>";
                echo "<td>".$row["Lastname"]." ".$row["S_Lastname"]."</td>";
                echo "<td>".$row["Email"]."</td>";
                echo "<td>".$row["Phone"]."</td>";
                echo "<td>".$row["Address"]."</td>";
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
?>