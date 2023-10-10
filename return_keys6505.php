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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Borrow Key</title>
</head>
<body>
  
<?php
      $select_user = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
?>

<?php
      $select_key = mysqli_query($conn, "SELECT * FROM `sci_key` WHERE id = 17") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_key = mysqli_fetch_assoc($select_key);
      };
?>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Return Key 
                            <a href="floor5.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label>Key Number</label>
                                <input type="text" name="key_num" value="<?php echo $fetch_key['key_number']; ?>" class="form-control" readonly/>
                            </div>
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="<?php echo $fetch_user['fname_lname']; ?>" class="form-control" readonly/>
                            </div>
                            <div class="mb-3">
                                <label>รูปภาพการคืนกุญแจ</label>
                                <input type="file" name="file" class="form-control streched-link" accept="image/gif, image/jpeg, image/png">
                            </div>
                            
                            <br>
                            <div class="mb-3">
                                <button type="submit" name="return_key" class="btn btn-primary">ยืนยันการคืน</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>