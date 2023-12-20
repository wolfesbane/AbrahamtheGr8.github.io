<?php

    $servername = "localhost";
    $unmae = "root";
    $password = "";

    $db_name = "test_db";

    $conn = mysqli_connect($servername, $unmae, $password, $db_name);

    if(!$conn) {
        echo "Connection Failed";
    }