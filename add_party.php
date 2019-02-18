<?php

$host = "localhost";
$user = "root";
$password = "password";
$db = "barbequeuedb";


$dbc = mysqli_connect("localhost", "root", "password", "barbequeuedb");

if(!$dbc){
    die("Connection failed:". mysqli_connect_error());
    echo ' not connected';
} else 'connected';

?>
