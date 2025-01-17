<?php   
    $url = 'http://localhost/project_uas/';

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "db_kuliner";

    $connect = new mysqli($server, $username, $password, $database);

    if ($connect->connect_errno) {
        echo "Failed to connect to MySQL: " .$connect->connect_error;
        exit();
    }

?>