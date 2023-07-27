<?php
session_start();
require 'function.php';
// cek cookie
if (isset($_COOKIE['username']) && isset($_COOKIE['hash'])) {
    $username = $_COOKIE['username'];
    $hash = $_COOKIE['hash'];

    // ambil username berdasarkan id
    $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($hash == hash('sha256', $row['id'], false)) {
        $_SESSION['username'] = $row['username'];
        header("Location: admin.php");
        exit;
    }
}

// melakukan pengecekan apakah user sudah melakukan login jika sudah redirect ke halaman admin
if (isset($_SESSION['username'])) {
    header("Location: admin.php");
    exit;
}
// login
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
    // mencocokan USERNAME dan PASSWORD 
    if (mysqli_num_rows($cek_user) > 0) {
        $row = mysqli_fetch_assoc($cek_user);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['hash'] = hash('sha256', $row['id'], false);
            // jika remember me dicentang
            if (isset($_POST['remember'])) {
                setcookie('username', $row['username'], time() + 60 * 60 * 24);
                $hash = hash('sha256', $row['id']);
                setcookie('hash', $hash, time() + 60 * 60 * 24);
            }

            if (hash('sha256', $row['id']) == $_SESSION['hash']) {
                header("Location: admin.php");
                die;
            }
            header("Location: ../index.php");
            die;
        }
    }
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Hacker Login Form</title>
  <link rel="stylesheet" href="login.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!doctype html>

<html lang="en"> 

 <head> 

  <meta charset="UTF-8"> 
  <title>CodePen - Animated Login Form using Html &amp; CSS Only</title> 
  <link rel="stylesheet" href="./style.css"> 
 </head> 

 <body> <!-- partial:index.partial.html --> 
 <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">Username atau Password salah</p>
    <?php endif; ?>

 <!-- Login Start -->
  <section>
   <div class="signin"> 
    <div class="content"> 
     <h2>Sign In</h2>
     <form method="post" action=""> 
     <div class="form"> 
      <div class="inputBox"> 
       <input type="text" name="username" id="username" required class="validate" autocomplete="off"><i>Username</i> 
       <label for="username" class="active"></label>
      </div> 
      <div class="inputBox"> 
       <input type="password" name="password" id="password" required class="validate" autocomplete="off"> <i>Password</i> 
       <label for="password" class="active"></label>
      </div> 
      <div class="links"> 
        <p style="color: gainsboro">Belum Punya Akun?</p> 
        <a href="registrasi.php"> Register</a>
      </div> 
      <div class="inputBox"> 
      <button class="inputBox">
       <input type="submit" name="submit" value="login">
       </button> 
      </div> 
     </div> 
     </form>
    </div> 
   </div> 
  </section> <!-- partial --> 

 </body>

</html>
<!-- partial -->
  
</body>
</html>
