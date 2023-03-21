<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <select name="Issue">        
            <?php        
            $servername = "localhost";        
            $username = "root";        
            $password = "";        
            $dbname = "health";        
            // Create connection        
            $conn = mysqli_connect($servername, $username, $password, $dbname);        
            // Check connection       
             if (!$conn) {        
                die("Connection failed: " . mysqli_connect_error());        
            }        
            
            $sql = "SELECT Issue FROM new_table";        
            $result = mysqli_query($conn, $sql);        
            if (mysqli_num_rows($result) > 0) {        
                // output data of each row        
                while($row = mysqli_fetch_assoc($result)) {            
                    $issue = $row['Issue'];            
                    echo "<option value='$issue'>$issue</option>";        
                    }        
                }
            
            mysqli_close($conn);        
            ?>        
            </select>        
            <button type="Submit">Submit</button>        
        </form>        
        <?php        
        if(isset($_POST['Issue'])){            
            $servername = "localhost";            
            $username = "root";            
            $password = "";            
            $dbname = "health";            
            // Create connection           
            $conn = mysqli_connect($servername, $username, $password, $dbname);            
            // Check connection            
            if (!$conn) {            
                die("Connection failed: " . mysqli_connect_error());            
            }            
            $issue = $_POST['Issue'];            
            $sql = "SELECT Advice FROM new_table WHERE Issue = '$issue'";           
            $result = mysqli_query($conn, $sql);           
            if (mysqli_num_rows($result) > 0) {           
                // output data of each row           
                while($row = mysqli_fetch_assoc($result)) {               
                     $advice = $row['Advice'];                
                     echo $advice;           
                      }           
                     }
            mysqli_close($conn);            
            }        
            
        ?>
</body>
</html>