<?php
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Database connection here
    $con = new mysqli("localhost","root","","userinfo");
    if($con->connect_error) {
        die("Fail to connect : ".$con->connect_error);
    } else {
        $stmt = $con->prepare("select * from userinfo where phone = ?");
        $stmt->bind_param("i", $phone);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_row = 1) {
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password) {
                echo "<h1>Login successfully</h1>";
            } else {
                echo "<h1>Invalid phone number or password</h1>";
            }
        } else {
            echo "<h1>Invalid phone number or password</h1>";
        }
    }
?>