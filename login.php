<?php
session_start();
include('../db.php');

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM admin WHERE email=? AND password=?");
    $query->bind_param("ss", $email, $password);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows == 1){
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid login details";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center" style="height:100vh;">

<div class="card p-4" style="width:350px;">
    <h4 class="text-center mb-3">Admin Login</h4>

    <?php if(isset($error)) echo "<p class='text-danger text-center'>$error</p>"; ?>

    <form method="POST">
        <input type="email" name="email" class="form-control mb-3" placeholder="Admin Email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <button name="login" class="btn btn-primary w-100">Login</button>
    </form>
</div>

</body>
</html>

