<?php
include 'databaseconnection.php';
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    $query = "SELECT * FROM Account WHERE username = '$username' AND pword = '$password'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;

        header('Location: home.php');
        exit;
    } else {
        echo "Invalid username or password";
    }
}
?>