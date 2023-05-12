<?php
session_start();
error_reporting(0);
include("config.php");
if(isset($_POST['submit']))
{
$uname=$_POST['username'];
$upassword=$_POST['password'];

$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$uname' and password='$upassword'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
header("location:manage-buku.php");

}
else
{
$_SESSION['errmsg']="Invalid username or password";

}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin-Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<style>
body {
    background-image: url("buku.jpg");
}

.card-header {
    background-color: black;
}

.login {
    margin-top: 5%;
}

h2, h3, legend, p, a{
    color: white;
}
</style>

<body>
    <nav class="navbar navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand"><h3>DATA BUKU</h3></a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">SEARCH</button>
            </form>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <div class="login">
        <div class="container mt-3">
            <div class="row justify-content-md-center">
                <!-- col -->
                <div class="col-6">
                    <!-- card -->
                    <div class="card">
                        <!-- card header -->
                        <div class="card-header" align="center">
                            <br>
                            <h2>ADMIN LOGIN</h2>
                            <div class="card-body">
                                <form method="post" style="justify-content:center; display: flex;">
                                    <fieldset>
                                        <legend>
                                            Sign in to your account
                                        </legend>
                                        <p>
                                            Please enter your username and password to login
											<br>
                                            <span
                                                style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
                                        </p>
                                        <br>
                                        <div class="form-floating mb-1">
                                            <input style="margin-bottom:10px;" type="text" class="form-control"
                                                name="username" placeholder="Username" required>
                                            <label for="">Username</label>
                                        </div>

                                        <div class="form-floating mb-2">
                                            <input style="margin-bottom:10px;" type="password" class="form-control"
                                                name="password" placeholder="Password" required>
                                            <label for="">Password</label>
                                        </div>
                                        <br>
                                        <p>
                                            Didn't have an account? Please <a href="#">Sign up or Click here</a>
                                        </p>
										<p>
                                            Forgot password? <a href="#">Click here</a>
                                        </p>
										<br>
                                        <button type="submit" class="btn btn-primary" name="submit">
                                            LOGIN
                                        </button>
                                    </fieldset>
									<br>
                                </form>

                            </div>
                        </div>
                    </div>
</body>

</html>