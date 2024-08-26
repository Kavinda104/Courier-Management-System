<!DOCTYPE html>
<html lang="en">
<head>
        <style>
        body
        {
            background-image: url('pictures/courierpics01.jpeg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    	</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>Please type Order ID</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" name="id" value="<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form><br>
                        <a class="btn btn-primary" btn="right" href="/courier/home.php" role="button">Back</a>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php 
                                $con = mysqli_connect("localhost","root","","courier");

                                if(isset($_GET['id']))
                                {
                                    $id = $_GET['id'];

                                    $query = "SELECT * FROM orders WHERE id='$id' ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                    foreach($query_run as $row)
                                    {
                                    ?>
                                    <div class="form-group mb-3">
                                    <label for="">Customer Name</label>
                                        <input type="text" value="<?= $row['customer_name']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                    <label for="">Address</label>
                                        <input type="text" value="<?= $row['address']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                    <label for="">Phone No 01</label>
                                         <input type="text" value="<?= $row['phone_01']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                    <label for="">Phone No 02</label>
                                         <input type="text" value="<?= $row['phone_02']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                    <label for="">Product Name</label>
                                         <input type="text" value="<?= $row['product_name']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                    <label for="">Quantity</label>
                                         <input type="text" value="<?= $row['quantity']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                    <label for="">Total Amount</label>
                                         <input type="text" value="<?= $row['total_amount']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                    <label for="">Weight</label>
                                         <input type="text" value="<?= $row['weight']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                    <label for="">Courier Charge</label>
                                         <input type="text" value="<?= $row['courier_charge']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                    <label for="">Added Date and Time</label>
                                         <input type="text" value="<?= $row['created_at']; ?>" class="form-control">
                                    </div>
                                    <?php
                                    }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>