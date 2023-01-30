<?php

use LDAP\Result;

include("database.php");
if(isset($_POST["nombre"])){
    try{
    $name = $_POST["nombre"];
    $description = $_POST["descripcion"];
    $sql = "INSERT into task(nombre, descripcion) VALUES ('$name', '$description')";
    $stmt = $conn->query($sql);
    }catch(PDOException $e){
        die("Error:". $e->getMessage());
    }
     
}
?>