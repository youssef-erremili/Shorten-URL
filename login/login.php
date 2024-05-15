<?php
ob_start();
session_start();
// create connection with database
include ("../config/config.php");
$errorER = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        $user_Email = htmlspecialchars(trim($_POST["email_login"]));
        $user_Password = htmlspecialchars(trim($_POST["password_login"]));
        $loginExce = "SELECT * FROM registertable  WHERE email_address = '$user_Email' LIMIT 1";
        $result_login = mysqli_query($connToserver, $loginExce);
        if (mysqli_num_rows($result_login) > 0) {
            $row = mysqli_fetch_assoc($result_login);
            $hashed_password = $row["user_password"];
            $user_Name = $row["first_name"];
            if (password_verify($user_Password, $hashed_password)) {
                header("Location: ../index.php");
                $_SESSION["userName"] = $user_Name;
                header("Location: ../index.php?status=welcome");
                exit();
            } else {
                header("Location: ../index.php?status=Incorrect Password or Email");
                exit();
            }
        } else {
            header("Location: ../index.php?status=User not found");
            exit();
        }
        ob_end_flush();
    }
    mysqli_close($connToserver);
}
