<?php
require("./db/conn.php");
session_start();

if (isset($_POST['submitRegister'])) {
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

  if (mysqli_query($conn, $insert)) {
    echo "<script>
                alert('Anda berhasil Registrasi')
                document.location='login.php';
            </script>";
  }
}

if (isset($_POST['submitLogin'])) {
  $username = $_POST['usernameLogin'];
  $password = $_POST['passwordLogin'];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
  if (mysqli_num_rows($result) === 1) {
    // cek password 
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      if ($row['role'] == 'admin') {
        $_SESSION['login'] = $row['username'];
        header("Location: ../admin/index.php");
        exit;
      }
      if ($row['role'] == 'user') {
        $_SESSION['login'] = $row['username'];
        header("Location: ./index.php");
        exit;
      }
    }
  }
}
?>

<?php include("./comp/header.php"); ?>
<div class="w-100 vh-100 bg-light d-flex align-items-center justify-content-center">
  <div class="containerLogin">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login</div>
          <form action="" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="usernameLogin" placeholder="Enter your username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="passwordLogin" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
              <input type="submit" name="submitLogin" value="Sumbit" class="border border-secondary rounded-pill">              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
          </form>
        </div>
        <div class="signup-form">
          <div class="title">Signup</div>
          <form action="" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="nameRegister" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="usernameRegister" placeholder="Enter your username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="passwordRegister" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" name="submitRegister" value="Sumbit" class="border border-secondary rounded-pill">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>