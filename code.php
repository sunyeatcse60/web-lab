<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $un = mysqli_real_escape_string($con, $_POST["un"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $pass = mysqli_real_escape_string($con, $_POST["pass"]);
    $confirm = mysqli_real_escape_string($con, $_POST["confirm"]);

    // Check if passwords match
    if ($pass !== $confirm) {
        echo "Passwords do not match!";
        exit;
    }

    // Save as plain text (NOT RECOMMENDED for production)
    $query = "INSERT INTO info (username, email, phone, password, confirm_password)
              VALUES ('$un', '$email', '$phone', '$pass', '$confirm')";

    $run = mysqli_query($con, $query);

    if (!$run) {
        echo "Submission failed: " . mysqli_error($con);
    } else {
        echo "Submission successful!";
    }
}
?>
