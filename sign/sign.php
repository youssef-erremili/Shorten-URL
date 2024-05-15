<?php
ob_start();
// connect to database 
include("../config/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["signup"])) {
        // declare all necessary inputs
        $first_name = htmlspecialchars(trim($_POST["first_name"]));
        $last_name = htmlspecialchars(trim($_POST["last_name"]));
        $email = htmlspecialchars(trim($_POST["user_email"]));
        $password = htmlspecialchars(trim(password_hash($_POST["user_password"], PASSWORD_DEFAULT)));
        // insert the values from inputs into database if the website
        $insertData = "INSERT INTO registertable(first_name, last_name, email_address, user_password) 
                VALUES('$first_name', '$last_name', '$email', '$password')";
        // excute the connetion and redirect the user after sign up successfully
        $result = mysqli_query($connToserver, $insertData);
        if ($result) {
            header("Location: ../index.php");
            ob_end_flush();
            exit();
        }
    }
}
?>