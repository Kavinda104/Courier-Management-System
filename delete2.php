<?php
if ( isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "courier";

$connection = new mysqli($servername, $username, $password, $database);

$sql = "DELETE FROM completed_orders WHERE id= $id";
$connection->query($sql);
}

header("location: /courier/completed.php");
exit;
?>