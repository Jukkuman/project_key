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

    <title>User Edit</title>
</head>

<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update User
                            <a href="manage_members.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $user_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM user_info WHERE id='$user_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $user = mysqli_fetch_array($query_run);
                        ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $user['id']; ?>">

                                    <div class="mb-3">
                                        <label>Username</label>
                                        <input type="text" name="username" value="<?=$user['username'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Firstname Lastname</label>
                                        <input type="text" name="fname_lname" value="<?=$user['fname_lname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Class</label>
                                        <input type="text" name="class" value="<?=$user['class'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Line ID</label>
                                        <input type="text" name="line_id" value="<?=$user['line_id'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Tel</label>
                                        <input type="text" name="tel" value="<?=$user['tel'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_user" class="btn btn-primary">
                                            Update User
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