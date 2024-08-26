<?php
include('db.php');
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $customer_name = $_POST['customer_name'];
    $address = $_POST['address'];
    $phone_01 = $_POST['phone_01'];
    $phone_02 = $_POST['phone_02'];
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $total_amount = $_POST['total_amount'];
    $weight = $_POST['weight'];
    $courier_charge = $_POST['courier_charge'];
    $created_at = $_POST['created_at'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "courier";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "INSERT INTO completed_orders (id, customer_name, address, phone_01, phone_02, product_name, quantity, total_amount, weight, courier_charge, created_at) 
            VALUES ('$id', '$customer_name', '$address', '$phone_01', '$phone_02', '$product_name', '$quantity', '$total_amount', '$weight', '$courier_charge', '$created_at')";

    if ($connection->query($sql) === true) {
        echo "Data sent and stored successfully in the processing_orders table.";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            background-image: url('pictures/courierpics03.jpeg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container my-5">
    <h1><center>Courier Details Management System</center></h1>
    <br><br>
    <a class="btn btn-primary" btn="right" href="/courier/home.php" role="button">Back</a>
    <br><br><h2>Completed Orders</h2><br>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Phone 01</th>
            <th>Phone 02</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            <th>Weight</th>
            <th>Courier Charge</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "courier";

        $connection = new mysqli($servername, $username, $password, $database);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
     
        $sql = "SELECT * FROM completed_orders";
        $result = $connection->query($sql);

        if (!$result) {
            die("Invalid query: " . $connection->error);
        }

        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
            <td>{$row['id']}</td>
            <td>{$row['customer_name']}</td>
            <td>{$row['address']}</td>
            <td>{$row['phone_01']}</td>
            <td>{$row['phone_02']}</td>
            <td>{$row['product_name']}</td>
            <td>{$row['quantity']}</td>
            <td>{$row['total_amount']}</td>
            <td>{$row['weight']}</td>
            <td>{$row['courier_charge']}</td>
            <td>{$row['created_at']}</td>
            <td>
          
            <a class='btn btn-danger btn-sm' href='/courier/delete2.php?id={$row['id']}'>Delete</a>
            </td>
            </tr>
            ";
        }
        ?>

        </tbody>
    </table>
</div>
</body>
</html>
