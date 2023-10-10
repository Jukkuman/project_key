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


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Manage Keys</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style4.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

</head>

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
                <!-- <li>
                     <a href="#">
                        <i class="fas fa-home"></i>
                        หนัาหลัก
                    </a>
                </li> -->
                <li>
                    <a href="manage_keys.php">
                        <i class="fas fa-key"></i>
                        จัดการกุญแจ
                    </a>
                </li>
                <li>
                    <a href="manage_members.php">
                        <i class="fas fa-user"></i>
                        จัดการสมาชิก
                    </a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-book"></i>
                        รายงาน
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="borrowadmin_report.php">รายงานการยืมกุญแจ</a>
                        </li>
                        <li>
                            <a href="returnadmin_report.php">รายงานการคืนกุญแจ</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Are your sure you want to logout?');" class="nav_link">
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
                <div class="row">
                    <table id="myTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th name="username" scope="col">Username</th>
                                <th name="fname_lname" scope="col">ชื่อ-นามสกุล</th>
                                <th name="class" scope="col">สาขา</th>
                                <th name="line_id" scope="col">Line ID</th>
                                <th name="tel" scope="col">เบอร์โทรศัพท์</th>
                                <th name="username" scope="col">User Level</th>
                                <th name="username" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                        $query = "SELECT * FROM user_info";
                        $query_run = mysqli_query($conn, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $userall) {
                    ?>
                                <tr>
                                    <td><?= $userall['username']; ?></td>
                                    <td><?= $userall['fname_lname']; ?></td>
                                    <td><?= $userall['class']; ?></td>
                                    <td><?= $userall['line_id']; ?></td>
                                    <td><?= $userall['tel']; ?></td>
                                    <td><?= $userall['role']; ?></td>
                                    <td>
                                        <a href="edit_members.php?id=<?= $userall['id']; ?>"class="btn btn-primary">Edit</a>
                                        <form action="code.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_user" value="<?= $userall['id']; ?>"
                                                class="btn btn-danger"
                                                onclick="return confirm('Do you want to delete this record? !!!')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<h5> No Record Found </h5>";
                        }
                        ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script> -->
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
        $(document).ready(function () {
            $("#myTable").DataTable();
        });
    </script>

</body>

</html>