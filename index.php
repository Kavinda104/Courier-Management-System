<?php
include('db.php');
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
    <br><br><h2>List of Orders</h2><br>

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
     
        $sql = "SELECT * FROM orders";
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
          
            <form method='post' action='/courier/process.php'>
            <input type='hidden' name='id' value='{$row['id']}'>
            <input type='hidden' name='customer_name' value='{$row['customer_name']}'>
            <input type='hidden' name='address' value='{$row['address']}'>
            <input type='hidden' name='phone_01' value='{$row['phone_01']}'>
            <input type='hidden' name='phone_02' value='{$row['phone_02']}'>
            <input type='hidden' name='product_name' value='{$row['product_name']}'>
            <input type='hidden' name='quantity' value='{$row['quantity']}'>
            <input type='hidden' name='total_amount' value='{$row['total_amount']}'>
            <input type='hidden' name='weight' value='{$row['weight']}'>
            <input type='hidden' name='courier_charge' value='{$row['courier_charge']}'>
            <input type='hidden' name='created_at' value='{$row['created_at']}'>
            <button type='submit' class='btn btn-success btn-sm'>Processing</button>
        </form>

        
            <a class='btn btn-primary btn-sm' href='/courier/edit.php?id={$row['id']}'>Edit</a>
            <a class='btn btn-danger btn-sm' href='/courier/delete.php?id={$row['id']}'>Delete</a>
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