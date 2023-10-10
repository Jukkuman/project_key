<?php
include 'config.php';

session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location: ../index.php');
};

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

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style4.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
</head>

<body>

    <?php
      $select_user = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>RusKey</h3>
                <strong>RK</strong>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-building"></i>
                        ชั้น
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="floor3.php">ชั้น 3 </a>
                        </li>
                        <li>
                            <a href="floor4.php">ชั้น 4 </a>
                        </li>
                        <li>
                            <a href="floor5.php">ชั้น 5</a>
                        </li>
                        <li>
                            <a href="floor6.php">ชั้น 6</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-book"></i>
                        รายงาน
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="borrowuser_report.php">รายงานการยืมกุญแจ</a>
                        </li>
                        <li>
                            <a href="returnuser_report.php">รายงานการคืนกุญแจ</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        วิธีการใช้งาน
                    </a>
                </li>
                <li>
                    <a href="index.php?logout=<?php echo $user_id; ?>"
                        onclick="return confirm('Are your sure you want to logout?');" class="nav_link">
                        <i class="fas fa-sign-out-alt"></i>
                        ออกจากระบบ
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <span><?php echo $fetch_user['fname_lname']; ?></span>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">
                <center><h1>ชั้น 3 </h1></center>
                <div class="row gy-3">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://static.vecteezy.com/system/resources/previews/019/907/697/non_2x/key-graphic-clipart-design-free-png.png"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h1 class="card-title">6301</h1>
                                <a href="borrow_keys6301.php" class="btn btn-success">ยืม</a>
                                <a href="return_keys6301.php" class="btn btn-danger">คืน</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://static.vecteezy.com/system/resources/previews/019/907/697/non_2x/key-graphic-clipart-design-free-png.png"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h1 class="card-title">6302</h1>
                                <a href="borrow_keys6302.php" class="btn btn-success">ยืม</a>
                                <a href="return_keys6302.php" class="btn btn-danger">คืน</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://static.vecteezy.com/system/resources/previews/019/907/697/non_2x/key-graphic-clipart-design-free-png.png"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h1 class="card-title">6303</h1>
                                <a href="borrow_keys6303.php" class="btn btn-success">ยืม</a>
                                <a href="return_keys6303.php" class="btn btn-danger">คืน</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="container">
                <div class="row gy-3">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://static.vecteezy.com/system/resources/previews/019/907/697/non_2x/key-graphic-clipart-design-free-png.png"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h1 class="card-title">6304</h1>
                                <a href="borrow_keys6304.php" class="btn btn-success">ยืม</a>
                                <a href="return_keys6304.php" class="btn btn-danger">คืน</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://static.vecteezy.com/system/resources/previews/019/907/697/non_2x/key-graphic-clipart-design-free-png.png"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h1 class="card-title">6305</h1>
                                <a href="borrow_keys6305.php" class="btn btn-success">ยืม</a>
                                <a href="return_keys6305.php" class="btn btn-danger">คืน</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://static.vecteezy.com/system/resources/previews/019/907/697/non_2x/key-graphic-clipart-design-free-png.png"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h1 class="card-title">6306</h1>
                                <a href="borrow_keys6306.php" class="btn btn-success">ยืม</a>
                                <a href="return_keys6306.php" class="btn btn-danger">คืน</a>
                            </div>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>