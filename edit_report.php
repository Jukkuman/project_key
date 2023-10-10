<?php
include 'config.php';
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Report Edit</title>
</head>

<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Report
                            <a href="borrowadmin_report.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $borrow_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM borrow_key WHERE id='$borrow_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $borrow = mysqli_fetch_array($query_run);
                        ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $borrow['id']; ?>">

                                    <div class="mb-3">
                                        <label>หมายเลขกุญแจ</label>
                                        <input type="text" name="key_num" value="<?=$borrow['key_num'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>ชื่อผู้ยืม</label>
                                        <input type="text" name="name" value="<?=$borrow['name'];?>" class="form-control">
                                    </div>
                                    <label>ยืมตั้งแต่</label>
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
                                    </select><br>
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
                                    </select><br>
                                    <div class="mb-3">
                                        <button type="submit" name="update_report" class="btn btn-primary">
                                            Update Report
                                        </button>
                                    </div>

                                </form>
                        <?php
                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>