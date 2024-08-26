<?php
if ( isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "courier";

$connection = new mysqli($servername, $username, $password, $database);

$sql = "DELETE FROM orders WHERE id= $id";
$connection->query($sql);
}

header("location: /courier/index.php");
exit;
?>