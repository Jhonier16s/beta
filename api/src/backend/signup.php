<?php
    $email  = $_POST['email'];
    $password = $_POST['password'];
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    require('../../config/db_connection.php');

    //validate if email already exists
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = pg_query($conn, $query);
    $row = pg_fetch_assoc($result);
    if($row){
        echo "<script> alert('Email already exists!') </script>";
        header('refresh:0; url=http://127.0.0.1/beta/api/src/register_form.html');
        exit();
    }
    $query = "INSERT INTO users (email, password) VALUES ('$email', '$encrypted_password')";
    $result = pg_query($conn, $query);

    if($result){
        echo "<script> alert('Registration successful !') </script>";
        header('refresh:0; url=http://127.0.0.1/beta/api/src/login_form.html');
    }else{
        echo "Error: ".pg_last_error($conn);
    }




    
    pg_close($conn);



?>