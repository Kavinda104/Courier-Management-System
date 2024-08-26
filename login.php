<?php
    session_start();
    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password) && !is_numeric($email)) 
        {
            $query = "select * from form where email = '$email' limit 1";
            $result = mysqli_query($conn, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] == $password)
                    {
                        header("location: home.php");
                        die;
                    }
                       
                }
            }
            echo "<script type='text/javascript'> alert('Username or password is incorrect...')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Username or password is incorrect...')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body
        {
            background-image: url('pictures/courierpics02.jpeg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>

<center><h1 class="display-5 text-uppercase mb-4">Courier Details Management System </h1></center>
   
   
    <div class="container1"> 
        
				<div class="box form-box">
                <header><center>User Login</center></header>
				    <form action="" method="post">
				
				        <div class="field input">
				            <label for="username">Username (Email)</label>
				            <input type="email" name="email" id="email" autocomplete="off" required>
				        </div>
				        <div class="field input">
				            <label for="password">Password</label>
				            <input type="password" name="password" id="password" autocomplete="off" required>
				        </div>
				        <div class="field">
				            <input type="submit" class="btn" name="submit" value="Login" required>
				        </div>
				        <div class="link">Don't have Account? <a href="register.php">Create Account</a>
				        </div>
				    </form>
                </div>
				
     </div>

</body>
</html>