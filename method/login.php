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
        $_SESSION['login'] = $row['username'];
        if ($row['role'] == 'admin') {
            echo json_encode([
                'response' => 'Admin'
            ]);
            exit;
        }
        echo json_encode([
            'response' => 'True'
        ]);
        exit;
    }
}
echo json_encode([
    'response' => 'False'
]);

?>