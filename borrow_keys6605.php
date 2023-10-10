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
      $select_key = mysqli_query($conn, "SELECT * FROM `sci_key` WHERE id = 23") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_key = mysqli_fetch_assoc($select_key);
      };
?>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Borrow Key 
                            <a href="floor6.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label>Key Number</label>
                                <input type="text" name="key_num" value="<?php echo $fetch_key['key_number']; ?>" class="form-control" readonly/>
                            </div>
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="<?php echo $fetch_user['fname_lname']; ?>" class="form-control" readonly/>
                            </div>
                            <div class="mb-3">
                                <label>เหตุผลการยืม</label>
                                <input type="text" name="reason" class="form-control">
                            </div>

                            <label>เลือกเวลายืม</label>
                            <select class="form-select" name="time1">
                                    <option value="8.00 น.">8.00 น.</option>
                                    <option value="9.00 น.">9.00 น.</option>
                                    <option value="10.00 น.">10.00 น.</option>
                                    <option value="11.00 น.">11.00 น.</option>
                                    <option value="12.00 น.">12.00 น.</option>
                                    <option value="13.00 น.">13.00 น.</option>
                                    <option value="14.00 น">14.00 น.</option>
                                    <option value="15.00 น.">15.00 น.</option>
                                    <option value="16.00 น.">16.00 น.</option>
                                    <option value="17.00 น.">17.00 น.</option>
                                    <option value="18.00 น.">18.00 น.</option>
                            </select>
                            <label>ถึง</label>
                            <select class="form-select" name="time2">
                                    <option value="8.00 น.">8.00 น.</option>
                                    <option value="9.00 น.">9.00 น.</option>
                                    <option value="10.00 น.">10.00 น.</option>
                                    <option value="11.00 น.">11.00 น.</option>
                                    <option value="12.00 น.">12.00 น.</option>
                                    <option value="13.00 น.">13.00 น.</option>
                                    <option value="14.00 น">14.00 น.</option>
                                    <option value="15.00 น.">15.00 น.</option>
                                    <option value="16.00 น.">16.00 น.</option>
                                    <option value="17.00 น.">17.00 น.</option>
                                    <option value="18.00 น.">18.00 น.</option>
                            </select> <br>
                            <div class="mb-3">
                                <button type="submit" name="borrow_key" class="btn btn-primary">ยืนยันการยืม</button>
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