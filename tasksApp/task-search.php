<?php
include("database.php");
$search = $_POST["search"];
if(!empty($search)){
    try{
    $sql = "SELECT * FROM task WHERE nombre LIKE '$search%'";
    $stmt = $conn->query($sql);
    }catch(PDOException $e){
        die("Error:". $e->getMessage());
    }
    $json = array();
    foreach ($stmt as $row){
        $json[] = array(
            'nombre' => $row["nombre"],
            'descripcion' => $row["descripcion"],
            'id' => $row["id"]
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
?>