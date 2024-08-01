<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Declaring variables
    $server = 'localhost';
    $user = "root";
    $database = 'phpdemo';
    $password = '';
    session_start();
    $email = $_SESSION['uemail'];

    // Declare the connection object
    $dbcon = mysqli_connect($server, $user, $password, $database);

    if($dbcon){
        echo "<h1>Connection to the database is successful</h1>";

        $fetch_records_sql = "SELECT * FROM accounts WHERE email = '$email'";

        $execute = mysqli_query($dbcon, $fetch_records_sql);

        $results = mysqli_fetch_assoc($execute);

        ?>

        <table border=1, style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>GENDER</th>
                    <th>PASSWORD</th>
                    <th>STATUS</th>
                    <th>DATE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $results['id']; ?></td>
                    <td><?php echo $results['name']; ?></td>
                    <td><?php echo $results['email']; ?></td>
                    <td><?php echo $results['gender']; ?></td>
                    <td><?php echo $results['password']; ?></td>
                    <td><?php echo $results['status']; ?></td>
                    <td><?php echo $results['date']; ?></td>
                </tr>
            </tbody>
        </table>





        
    <?php }
    ?>
</body>
</html>