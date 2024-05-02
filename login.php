<?php
session_start();
$title = "login";
include 'includes/header.php';
include 'connect.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "<script>alert('Please enter a username and password.');</script>";
    } else {
        $stmt = $conn->prepare("SELECT * FROM account WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = $row['usertype'];

            if ($row['usertype'] == 'Admin') {
                header("location: dashboard.php");
                exit;
            }
        } else {
            echo "<script>alert('Incorrect username or password.');</script>";
        }
    }
}

if (isset($_SESSION['loggedin']) && $_SESSION['usertype'] == 'Admin') {
    header("location: login.php");
    exit;
}

?>

<body style="background: url('img/login.jpg') no-repeat center/cover;" class="vh-100 w-100">

<div class="container pt-5">
        <div class="row justify-content-center mt-3">
            <div class="col-10 col-md-10 col-lg-5">
            <div class="card o-hidden border-0 shadow-lg mt-4">
                    <div class="card-body p-3">
                <img src="img/logo.png" alt="Logo" class="w-25 d-flex m-auto mb-3">
                <form action="#" method="POST">
           
                    <h1 class="text-center mb-4 ">Login</h1>
                    <div class="form-floating mb-3">
                        <input type="username" class="form-control" name="username" id="username" placeholder="Username" required>
                        <label for="username">Enter Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <label for="password">Enter Password</label>
                    </div>

                    <div class="form-group">
                        <a href="index.php" class="btn btn-primary btn-user btn-block" name="login" id="login">Submit</a>
         
                    </form>           
            </div>
        </div>
    </div> 

</body>

</html>
   