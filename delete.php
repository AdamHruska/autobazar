<?php 
    if( isset($_GET["id"]) ) {
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "autobazar";
    
        //vytvorenie spojenia s Databazou
        $connection = new mysqli($servername, $username, $password, $database);

        $sql = "DELETE FROM cars WHERE id=$id";
        $connection->query($sql);
    }

    header("location: /autobazar/index.php");
    exit;
?>