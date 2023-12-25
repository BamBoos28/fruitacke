<?php
require("../db/conn.php");
session_start();

$username = $_POST['usernameLogin'];
$password = $_POST['passwordLogin'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
if (mysqli_num_rows($result) === 1) {
    // cek password 
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        if ($row['role'] == 'admin') {
            $_SESSION['login'] = $row['username'];
            exit;
        }
        if ($row['role'] == 'user') {
            $_SESSION['login'] = $row['username'];
            exit;
        }
    }
}

echo json_encode([
    'response' => 'True'
]);
?>