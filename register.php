<?php
    session_start();
    include("db.php");

    if( $_SERVER['REQUEST_METHOD'] == 'POST')
     {
        $fname = $_POST['fname'];
        $address = $_POST['address'];
        $bdate = $_POST['bdate'];
        $idnumber = $_POST['idnumber'];
        $pcode = $_POST['pcode'];
        $cnumber = $_POST['cnumber'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
            if (!empty($email) && !empty($password) && !is_numeric($email)) 
            {
                $query = "insert into form (fname, address, bdate, idnumber, pcode, cnumber, email, password) values ('$fname', '$address', '$bdate', '$idnumber', '$pcode', '$cnumber', '$email', '$password')";
                
                mysqli_query($conn, $query);

                echo "<script type='text/javascript'> alert('Registered Successfully')</script>";
            }
            else
            {
                echo "<script type='text/javascript'> alert('Please Enter some valid details')</script>";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<style>
        body
        {
            background-image: url('pictures/courierpics04.jpeg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    	</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register Form</title>
</head>
<body>
<div class="container-fluid py-6 px-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="mb-4">
				<br>
				<center>
                    <h1 class="display-5 text-uppercase mb-4">User <span class="text-primary">Registration</span></h1>
                </center>
				</div>
                <center>
				<p class="mb-5">Please Enter your personal details here</p>
				<br>
                </center>
            </div>
			 <div class="container1"> 
				<div class="box form-box">
				<header><center>Create Account</center></header>
				<form action="" method="post">
				
				<div class="field input">
				<label for="fname">Full name</label>
				<input type="text" name="fname" id="fname" autocomplete="off" required>
				</div>
				<div class="field input">
				<label for="address">Home Address</label>
				<input type="text" name="address" id="address" autocomplete="off" required>
				</div>
				<div class="field input">
				<label for="bdate">Birth Date(DD/MM/YYYY)</label>
				<input type="text" name="bdate" id="bdate" autocomplete="off" required>
				</div>
				<div class="field input">
				<label for="idnumber">ID Number</label>
				<input type="text" name="idnumber" id="idnumber" autocomplete="off">
				</div>
				<div class="field input">
				<label for="pcode">Postal code</label>
				<input type="text" name="pcode" id="pcode" autocomplete="off" required>
				</div>
				<div class="field input">
				<label for="cnumber">Contact Number</label>
				<input type="text" name="cnumber" id="cnumber" autocomplete="off" required>
				</div>
				<div class="field input">
				<label for="email">E-mail</label>
				<input type="email" name="email" id="email" autocomplete="off">
				</div>
				<div class="field input">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" autocomplete="off" required>
				</div>
				<div class="field">
				<input type="submit" class="btn" name="submit" value="Register" required>
				</div>
				<div class="link">
				Already have Account? <a href="login.php">Login here</a>
				</div>
				</form>
				</div>
				</div>	
        </div>
    </div>
    
</body>
</html>