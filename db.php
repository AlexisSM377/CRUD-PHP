<?php

session_start();

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'php';


$conn = new mysqli($servername, $username, $password, $database);

