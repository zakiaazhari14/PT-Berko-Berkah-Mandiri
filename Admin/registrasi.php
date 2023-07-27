<?php
require 'function.php';

if (isset($_POST["registrasi"])) {

    if (registrasi($_POST) > 0) {

        echo "<script>
                alert('Registrasi berhasil');
                document.location.href = 'login.php';
            </script>";
    } else {
        echo "<script>
                alert('Registrasi Gagal');
            </script>";
    }
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

  <section>
   <div class="signin"> 
    <div class="content"> 
     <h2>Registrasi</h2>
     <form method="post" action=""> 
     <div class="form"> 
      <div class="inputBox"> 
       <input type="text" name="username" id="username" required> <i>Username</i> 
      </div> 
      <div class="inputBox"> 
       <input type="password" name="password" id="password" required> <i>Password</i> 
      </div> 
      <div class="links"> <a href="login.php">Kembali</a> 
      </div> 
      <div class="inputBox"> 
       <button class="inputBox">
       <input type="submit" name="registrasi" value="submit">
       </button> 
      </div> 
      </form> 
     </div>     
    </div> 
   </div> 
  </section> <!-- partial --> 

 </body>

</html>
<!-- partial -->
  
</body>
</html>