<?php
    $host = "localhost";
    $database = "db_ajax2";
    $username = "root";
    $password = "";

    $db1 = new mysqli($host, $username, $password, $database);

    if ($db1->connect_error) {
        die('Connection failed : ' . $conn->connect_error);
    }