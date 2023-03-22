<?php
      if(isset($_POST['username']) && isset($_POST['password']))   
      {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbname";
        
        //Create Connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        
        $user = mysqli_real_escape_string($conn, $_POST['username']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM logins WHERE Username = ?";

        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)){
          echo "<br>";
          echo "<div id='message' class='alert alert-danger' role='alert'>SQL ERROR</div>";
        } else {
          mysqli_stmt_bind_param($stmt, "s", $user);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if (mysqli_num_rows($result) == 0) {
            echo "<br>";
            echo "<div id='message' class='alert alert-danger' role='alert'>Username or Password Incorrect</div>";
          } else {
            while($row = mysqli_fetch_assoc($result)) {
              if (password_verify($pass, $row['Password'])){
                $_SESSION['UserId']=$row['Id'];
                $_SESSION['Username']=$row['Username'];
                header('Location: index.php');
                exit();
              }
              else{
                echo "<br>";
                echo "<div id='message' class='alert alert-danger' role='alert'>Username or Password Incorrect</div>";
              }
            }
            
          }
        }
        $conn->close();
      }
      ?>