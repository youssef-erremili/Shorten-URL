<?php
$server_name = "localhost";
$user_server = "root";
$server_password = "";
$db_name = "shortenDB";

$connToserver = new mysqli($server_name, $user_server, $server_password, $db_name);

if ($connToserver->connect_error) {
    die("there may be a problem in connetion" . $connToserver->connect_error);
}