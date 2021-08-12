<?php

function mySqlConnect($breakPoint){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tom-app";

    $log="";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
        $log = "Connection failed: " . $conn->connect_error . "-Failed on: " . $breakPoint;
    }

    return $conn;

}

function closeMySqlConn($conn){
    $conn->close();
}