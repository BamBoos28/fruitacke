<?php
require("./db/conn.php");
session_start();

?>

<!-- style="background : url(./img/hero-img.jpg); background-size : cover;" -->

<?php include("./comp/header.php"); ?>
<div class="w-100 vh-100 bg-light d-flex align-items-center justify-content-center">
  <div class="containerLogin">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="./img/hero-img-1.jpg" alt="">
        <div class="text">
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="./img/hero-img-1.jpg" alt="">
        <div class="text">
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login</div>
          <form>
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" id="usernameLogin" placeholder="Enter your username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="passwordLogin" placeholder="Enter your password" required>
              </div>
              <div id="submitLogin" class="buttonOnLogin mt-4 w-100 input-box border border-secondary rounded-pill"
                style="">
                Login
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
          </form>
        </div>
        <div class="signup-form">
          <div class="title">Signup</div>
          <form>
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" id="nameRegister" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" id="usernameRegister" placeholder="Enter your username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="passwordRegister" placeholder="Enter your password" required>
              </div>
              <div id="submitRegister" class="buttonOnLogin mt-4 w-100 input-box border border-secondary rounded-pill"
                style="">
                Registrasi
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $("#submitLogin").click(function () {
    console.log($("#usernameLogin").val());
    console.log($("#passwordLogin").val());
    $.ajax({
      type: "POST",
      url: "method/login.php",
      data: {
        usernameLogin: $("#usernameLogin").val(),
        passwordLogin: $("#passwordLogin").val()
      },
      dataType: "json",
      cache: false,
      success: function (data) {
        if (data.response == "True") {
          Swal.fire({
            icon: "success",
            title: "Login Berhasil",
            text: "Menuju beranda dan lanjutkan berbelanja",
          }).then(function () {
            location.replace("./index.php");
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Login Gagal",
            text: "Username atau password salah",
          })
        }
      }
    });
  });

  $("#submitRegister").click(function () {
    if ($("#nameRegister").val() != "" && $("#usernameRegister").val() != "" && $("#passwordRegister").val() != "") {
      $.ajax({
        type: "POST",
        url: "method/register.php",
        data: {
          nameRegister: $("#nameRegister").val(),
          usernameRegister: $("#usernameRegister").val(),
          passwordRegister: $("#passwordRegister").val()
        },
        dataType: "json",
        cache: false,
        success: function (data) {
          if (data.response == "True") {
            Swal.fire({
              icon: "success",
              title: "Registrasi Berhasil",
              text: "Lanjutankan login untuk masuk",
            }).then(function () {
              location.reload();
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Registrasi Gagal",
              text: "Username telah ada,gunakan username lain",
            })
          }
        }
      });
    }
  });
</script>

</body>

</html>