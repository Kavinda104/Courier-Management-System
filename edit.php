<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "courier";

//Create connection
$connection = new mysqli($servername, $username, $password, $database);


$id = "";
$customer_name="";
$address="";
$phone_01="";
$phone_02="";
$product_name="";
$quantity="";
$total_amount="";
$weight="";
$courier_charge="";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET') {


    if ( !isset($_GET["id"])) {
        header("location: /courier/index.php");
        exit;
    }

$id = $_GET["id"];


$sql = "SELECT * FROM orders WHERE id=$id";
$result = $connection->query($sql);
$row = $result->fetch_assoc();

if (!$row) {
    header("location: /courier/index.php");
    exit;
}

    $customer_name= $row["customer_name"];
    $address= $row["address"];
    $phone_01= $row["phone_01"];
    $phone_02= $row["phone_02"];
    $product_name= $row["product_name"];
    $quantity= $row["quantity"];
    $total_amount= $row["total_amount"];
    $weight= $row["weight"];
    $courier_charge= $row["courier_charge"];

}
else{


    $id = $_POST["id"];
    $customer_name = $_POST["customer_name"];
    $address = $_POST["address"];
    $phone_01 = $_POST["phone_01"];
    $phone_02 = $_POST["phone_02"];
    $product_name = $_POST["product_name"];
    $quantity = $_POST["quantity"];
    $total_amount = $_POST["total_amount"];
    $weight = $_POST["weight"];
    $courier_charge = $_POST["courier_charge"];

    do {
        if ( empty($id) || empty($customer_name) || empty($address) || empty($phone_01) || empty($phone_02) || empty($product_name) || empty($quantity) || empty($total_amount) || empty($weight) || empty($courier_charge) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE orders " .
                "SET customer_name = '$customer_name', address = '$address', phone_01 = '$phone_01', phone_02 = '$phone_02', product_name = '$product_name', quantity = '$quantity', total_amount = '$total_amount', weight = '$weight', courier_charge = '$courier_charge' " .
                "WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query:" . $connection->error;
            break;
        }

        $successMessage = "Order updated correctly";

        header("location: /courier/index.php");
        exit;

    } while (true);
}
?>

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
    <title>Courier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Edit Order</h2><br>
        <h5>Select what should be changed and then edit it...</h5><br>

        <?php
        if ( !empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Customer name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="customer_name" value="<?php echo $customer_name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone 01</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone_01" value="<?php echo $phone_01;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone 02</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone_02" value="<?php echo $phone_02;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Product name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_name" value="<?php echo $product_name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="quantity" value="<?php echo $quantity;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Total amount</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="total_amount" value="<?php echo $total_amount;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Weight</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="weight" value="<?php echo $weight;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Courier charge</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="courier_charge" value="<?php echo $courier_charge;?>">
                </div>
            </div>


            <?php
            if( !empty($successMessage)){
                echo "
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                </div>
            </div>
            </div>
            "; 
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary"> Submit</button>
                </div>    
                <div class="col-sm-6 d-grid">
                    <a type="btn btn-outline-primary" href="/courier/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>