<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $DB = "tasks-app";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DB", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Conexion establecida";
    }catch(PDOException $e){
        die("Error:". $e->getMessage());
    }

?>