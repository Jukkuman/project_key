<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $sql = "SELECT * FROM `user_info` WHERE username = '$username' AND password = '$pass'" or die('query failed');

   $result = mysqli_query($conn,$sql);

   if(mysqli_num_rows($result) == 1){

      $row = mysqli_fetch_assoc($result);

      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_role'] = $row['role'];

      if($_SESSION["user_role"]=="admin"){ 
         Header("Location: manage_keys.php");
       }
       else if ($_SESSION["user_role"]=="user"){ 
         Header("Location: floor3.php");
       }
   }else{
      $message[] = 'incorrect password or username!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Login now</h3>
      <input type="text" name="username" required placeholder="กรอกชื่อผู้ใช้" class="box">
      <input type="password" name="password" required placeholder="กรอกรหัสผ่าน" class="box">
      <input type="submit" name="submit" class="btn" value="Login now">
      <p>don't have an account? <a href="register.php">Register now</a></p>
   </form>

</div>

</body>
</html>