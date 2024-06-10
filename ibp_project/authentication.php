<?php
include('connection2.php');
session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST["user"], $_POST["pass"])) {
        $username = $_POST['user'];  
        $password = $_POST["pass"];
        
        
        $username = stripcslashes($username);  
        $username = mysqli_real_escape_string($conn, $username);  

        
        if ($username == "admin" && $password == "1234") {
            $_SESSION["username"] = $username;
            header("Location: panel.php");
            exit();
        } else {

            $sql = "SELECT * FROM login WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if ($count == 1) {
                // parolayı hashliyoruz.
                if (password_verify($password, $row['password'])) {
                    $_SESSION["username"] = $username;
                    header('Location: homepage.php');
                    exit();
                } else {
                    echo "<h1>Login failed. Invalid username or password.</h1>";
                }
            } else {
                echo "<h1>Login failed. Invalid username or password.</h1>";
            }
        }
    } else {
        echo "<h1>Login failed. Username or password not set.</h1>";
    }
}
?>