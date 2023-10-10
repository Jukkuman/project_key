<?php

include 'config.php';

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $fname_lname = mysqli_real_escape_string($conn, $_POST['fname_lname']);
   $class = mysqli_real_escape_string($conn, $_POST['class']);
   $line_id = mysqli_real_escape_string($conn, $_POST['line_id']);
   $tel = mysqli_real_escape_string($conn, $_POST['tel']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   

   $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE username = '$username' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'มี Username นี้อยู่แล้ว กรุณาเปลี่ยน Username!';
   }else{
      mysqli_query($conn, "INSERT INTO `user_info`(username, fname_lname,class, line_id, tel, role, password) VALUES('$username', '$fname_lname','$class', '$line_id', '$tel', 'user', '$pass')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:index.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

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
      <h3>Register now</h3>
      <input type="text" name="username" required placeholder="กรอกชื่อผู้ใช้" class="box">
      <input type="text" name="fname_lname" required placeholder="กรอกชื่อ - นามสกุล" class="box">
      <input type="text" name="class" required placeholder="กรอกสาขาที่เรียน" class="box">
      <input type="text" name="line_id" required placeholder="กรอก ID Line" class="box">
      <input type="text" name="tel" required placeholder="กรอกเบอร์โทรศัพท์" class="box">
      <input type="password" name="password" required placeholder="กรอกรหัสผ่าน" class="box">
      <input type="password" name="cpassword" required placeholder="ยืนยันรหัสผ่าน" class="box">
      <input type="submit" name="submit" class="btn" value="register now">
      <p>already have an account? <a href="index.php">login now</a></p>
   </form>

</div>

</body>
</html>