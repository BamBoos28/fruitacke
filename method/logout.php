<?php
session_start();
$username = $_POST['usernameLogin'];
$password = $_POST['passwordLogin'];
$_SESSION = [];
session_unset();
session_destroy();

header("Location: ../index.php");
