<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $un = mysqli_real_escape_string($con, $_POST["un"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $pass = mysqli_real_escape_string($con, $_POST["pass"]);
    $confirm = $_POST["confirm"];

   
    if ($pass !== $confirm) {
        echo "Passwords do not match!";
        exit;
    }

    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

   
    $query = "INSERT INTO info(username, email, phone, password)
              VALUES('$un', '$email', '$phone', '$hashedPass')";

    $run = mysqli_query($con, $query);

    if (!$run) {
        echo "Submission failed: " . mysqli_error($con);
    } else {
        echo "Submission successful!";
    }
}
?>
