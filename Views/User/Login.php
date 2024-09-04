<?php
session_start();
include("../../Config/Database.php");
$db = new Database;
$conn = $db->connect();
if(isset($_POST['login'])){
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE Username = '$Username' AND Password = '$Password' LIMIT 1";
    
    $result = $conn->query($sql);
    $count = mysqli_num_rows($row);
    if($result->num_rows > 0){
        $row_data = $result->fetch_assoc();
        $_SESSION['Username'] = $row_data['Username'];
        $_SESSION['Password'] = $row_data['Password'];
        $_SESSION['UserID']= $row_data['Id'];
        header("Location:../../index.php?controller=product");
    }else{
        $message = "Tài khoản mật khẩu không đúng";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}  ?>
<!Doctype html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../Content/assets/css/login.css">
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Welcome to login</h2>
                                <p>Don't have an account?</p>
                                <a href="register.php" class="btn btn-white btn-outline-white">Sign Up</a>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                                <div  class="w-100">
                                    <p style="margin-top: 10px;" class="social-media d-flex justify-content-end">
                                        <a href="../../index.php?controller=home" class="d-flex align-items-center justify-content-center">Trang chủ</span></a>
                                    </p>
                                </div>
                            </div>
                            <form action="" method="post" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="login" class="form-control btn btn-primary submit px-3">Sign In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>

</html>