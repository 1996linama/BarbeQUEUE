<?php

$dbc = mysqli_connect("localhost", "root", "password", "barbequeuedb");

if(!$dbc){
    die("Connection has failed: " . mysqli_connect_error());
} 

$createTable = "CREATE TABLE customers (
    customer_name VARCHAR(30) NOT NULL,
    party_size TINYINT NOT NULL,
    phone_number VARCHAR(10) NOT NULL,
    seating_choice ENUM('T','B','E') DEFAULT 'E',
    date DATE NOT NULL,
    time TIME NOT NUL,
    customer_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    );
"

?>
