<?php
    $email  = $_POST['email'];
    $password = $_POST['password'];
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

    require('../config/db_connection.php');


    $query = "INSERT INTO users (email, password) VALUES ('$email', '$encrypted_password')";
    $result = pg_query($conn, $query);

    if($result){
        echo "User created successfully";
    }else{
        echo "Error: ".pg_last_error($conn);
    }

    pg_close($conn);



?>