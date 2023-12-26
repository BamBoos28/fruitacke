<?php
require("../db/conn.php");

$username = $_POST['usernameRegister'];
$password = $_POST['passwordRegister'];
$nama_lengkap = $_POST['nameRegister'];
$role = "user";

// cek apakah username sudah ada
$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
if (mysqli_fetch_assoc($result)) {
    echo json_encode([
        'response' => 'False'
    ]);
    exit;
}

// password hash
$password = password_hash($password, PASSWORD_DEFAULT);

$insert = "INSERT INTO users (username, password, nama_lengkap, role)
    VALUES ('$username', '$password', '$nama_lengkap', '$role')";

if (mysqli_query($conn, $insert)) {
    echo json_encode([
        'response' => 'True'
    ]);
}
?>