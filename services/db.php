<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "itec101_lab";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Could not connect: ". $conn->connect_error);
}