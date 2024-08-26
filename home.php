<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style3.css">
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#"><span class="title">ABC Courier System</span></a>
                </li>
                <li>
                    <a href="#"><span class="title">Dashboard</span></a>
                </li>
                <li>
                    <a href="index.php"><span class="title">Orders</span></a>
                </li>
                <li>
                    <a href="create.php"> <span class="title">Add new Order</span></a>
                </li>
                <li>
                    <a href="search.php"> <span class="title">Search Orders</span></a>
                </li>
                <br><br>
                <li>
                    <a href="login.php"><span class="title">Sign Out</span></a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
              <center> <h1>Courier Details Management System</h1></center>    
            </div>

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"> <a href="completed.php">Completed Orders</a></div>
                        <div class="cardName">Delivered to customer</div>
                       
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><a href="process.php">Processing</a></div>
                        <div class="cardName">On the way</div>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><a href="failed.php">Failed</a></div>
                        <div class="cardName">Failed to Deliver</div>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><a href="create.php">Failed</a></div>
                        <div class="cardName">Failed to Deliver</div>
                    </div>
                </div>
            </div>

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="index.php" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Customer Name</td>
                                <td>Address</td>
                                <td>Phone 01</td>
                                <td>Phone 02</td>
                                <td>Product Name</td>
                                <td>Quantity</td>
                                <td>Total Amount</td>
                                <td>Weight</td>
                                <td>Courier Charge</td>
                                <td>Date</td>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "courier";

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error){
                    die("Connection failed: " . $connection->connect_error);
                }
               
                $sql = "SELECT * FROM orders";
                $result = $connection->query($sql);

                if (!$result){
                    die("Invalid query: " . $connect->error);
                }

                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[customer_name]</td>
                    <td>$row[address]</td>
                    <td>$row[phone_01]</td>
                    <td>$row[phone_02]</td>
                    <td>$row[product_name]</td>
                    <td>$row[quantity]</td>
                    <td>$row[total_amount]</td>
                    <td>$row[weight]</td>
                    <td>$row[courier_charge]</td>
                    <td>$row[created_at]</td>
                </tr>
                ";
                }
                ?>     
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>