<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Database connection here
    $con = new mysqli("localhost","root","","university");
    if($con->connect_error){
        die("Failed to connect : ".$con->connect_error);
    }else{
        $stmt = $con->prepare("select * from student where username = ? ");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                echo "<h3>Login successfully!</h3>";
            }else{
                echo "<h3>Invalid username or password!</h3>";
            }
        }else{
            echo "<h3>Invalid username or password!</h3>";
        }
    }
?>