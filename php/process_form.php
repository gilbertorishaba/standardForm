<?php

// 1. Establis a connection

// Declaring variables
$server = 'localhost';
$user = "root";
$database = 'phpdemo';
$password = '';

// Declare the connection object
$dbcon = mysqli_connect($server, $user, $password, $database);

if($dbcon){
    echo "<h1>Connection to the database is successful</h1>";

    // Insert values into the database
    $username = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = md5($_POST['password']);
    
    session_start();
    $_SESSION['uemail'] = $email;

    echo "Usernmae: " . $username . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Gender: " . $gender . "<br>";
    echo "Password: " . $password . "<br>";

    $insert_sql = "INSERT INTO accounts(name, email, gender, password)VALUES('$username', '$email', '$gender', '$password')";

    $execute = mysqli_query($dbcon, $insert_sql);

    if($execute){
        echo "<h1>Data has been successfully inserted</h1>";

        header('Location: profile.php');
    }else{
        echo "<h1>Error while submitting data</h1>";
    }

}else{
    echo "<h1>Failed to connect to the database</h1>";
}


?>