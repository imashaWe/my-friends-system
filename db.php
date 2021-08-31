<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "my-friends-system";

// create database connection
$conn = new mysqli($servername, $username, $password, $database);

// check database connection errors
if ($conn->connect_errno) die("Database connection error:".$conn->connect_error);

