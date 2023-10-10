<?php include 'config.php' ?>

<?php

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:index.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/nav.css">

    <!-- ===== Boxicons CSS ===== -->
    <<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>

<?php
      $select_user = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>

<!-- navbar -->
<nav class="navbar">
      <div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        RusKey
      </div>


      <div class="navbar_content">
        <i class="bi bi-grid"></i>

        <span><?php echo $fetch_user['fname_lname']; ?></span>
        <i class='bx bx-sun' id="darkLight"></i>
      </div>
    </nav>

    <!-- sidebar -->
    <nav class="sidebar">
      <div class="menu_content">
        <ul class="menu_items">
            <div class="menu_title menu_dahsboard"></div>

         <!-- start -->
         <li class="item">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-building"></i>
              </span>
              <span class="navlink">ชั้น</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>

            <ul class="menu_items submenu">
              <a href="floor3.php" class="nav_link sublink">ชั้น 3</a>
              <a href="floor4.php" class="nav_link sublink">ชั้น 4</a>
              <a href="floor5.php" class="nav_link sublink">ชั้น 5</a>
              <a href="floor6.php" class="nav_link sublink">ชั้น 6</a>
            </ul>
          </li>
          <!-- end -->

         <!-- start -->
         <li class="item">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-book"></i>
              </span>
              <span class="navlink">รายงาน</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>

            <ul class="menu_items submenu">
              <a href="borrowuser_report.php" class="nav_link sublink">รายงานการยืมกุญแจ</a>
              <a href="returnuser_report.php" class="nav_link sublink">รายงานการคืนกุญแจ</a>
            </ul>
          </li>
          <!-- end -->  

         <!-- Start -->
         <li class="item">
            <a href="#"class="nav_link">
              <span class="navlink_icon">
                <i class='bx bx-cog'></i>
              </span>
              <span class="navlink">วิธีการใช้งาน</span>
            </a>
          </li>
          <!-- End -->            

          <!-- Start -->
          <li class="item">
            <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Are your sure you want to logout?');" class="nav_link">
              <span class="navlink_icon">
                <i class='bx bx-log-out'></i>
              </span>
              <span class="navlink">ออกจากระบบ</span>
            </a>
          </li>
          <!-- End -->  
          


        <!-- Sidebar Open / Close -->
        <div class="bottom_content">
          <div class="bottom expand_sidebar">
            <span> Expand</span>
            <i class='bx bx-log-in' ></i>
          </div>
          <div class="bottom collapse_sidebar">
            <span> Collapse</span>
            <i class='bx bx-log-out'></i>
          </div>
        </div>
      </div>
    </nav>
    
    <!-- JavaScript -->
    <script src="js/script.js"></script>
</body>
</html>