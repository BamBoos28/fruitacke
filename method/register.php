<?php
require("../db/conn.php");
session_start();

global $conn;
$username = stripslashes(strtolower(htmlspecialchars($_POST['usernameRegister'])));
$password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['passwordRegister']));
$nama_lengkap = htmlspecialchars($_POST['nameRegister']);
$role = "user";

// cek apakah username sudah ada
$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
if (mysqli_fetch_assoc($result)) {
    echo "<script>
                alert('Maaf username Sudah Ada');
                document.location='register.php';
            </script>";
    return false;
}

// password hash
$password = password_hash($password, PASSWORD_DEFAULT);

$insert = "INSERT INTO users (username, password, nama_lengkap, role)
    VALUES ('$username', '$password', '$nama_lengkap', '$role')";

echo json_encode([
    'response' => 'True'
]);
?>