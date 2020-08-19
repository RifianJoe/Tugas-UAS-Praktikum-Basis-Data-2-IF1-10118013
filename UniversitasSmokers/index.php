<?php
session_start();

if(isset($_SESSION['username'])){ 
  header("location: welcome.php");
}
?>
<html>
<head>
  <title>Halaman Sebelum Login</title>
  <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">
</head>
<body>
<center>
<br>
<br>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="Homer BB.png" alt="Card image cap">
  <div class="card-body">
  <h5 class="card-title">Silahkan Login</h5>
  
  <div style="color: red;margin-bottom: 15px;">
    <?php
    if(isset($_COOKIE["message"])){ 
      echo $_COOKIE["message"]; 
    }
    ?>
  </div>
  
  <form method="post" action="proses_login.php">
    <label class="card-text">Username</label><br>
    <input type="text" name="username" placeholder="Username"><br><br>
    
    <label>Password</label><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html>