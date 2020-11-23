<?php

const HOST = "127.0.0.1";
const USER = "root";
const PASS = "";
const DBNAME = "StudentManagement";

$conn = mysqli_connect(HOST,USER,PASS,DBNAME);

if (!$conn) {
    die("Connection Error: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
$sql = "";

