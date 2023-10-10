<?php
include 'config.php';
session_start();

if(isset($_POST['delete_user']))
{
    $user_id = mysqli_real_escape_string($conn, $_POST['delete_user']);

    $query = "DELETE FROM user_info WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: manage_members.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location: manage_members.php");
        exit(0);
    }
}

if(isset($_POST['update_user']))
{
    $user_id = mysqli_real_escape_string($conn, $_POST['id']);

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $fname_lname = mysqli_real_escape_string($conn, $_POST['fname_lname']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $line_id = mysqli_real_escape_string($conn, $_POST['line_id']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);

    $query = "UPDATE user_info SET username='$username', fname_lname='$fname_lname', class='$class', line_id='$line_id', tel='$tel' WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Updated Successfully";
        header("Location: manage_members.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Updated";
        header("Location: manage_members.php");
        exit(0);
    }

}


if(isset($_POST['save_user']))
{
    $user_id = mysqli_real_escape_string($conn, $_POST['id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $fname_lname = mysqli_real_escape_string($conn, $_POST['fname_lname']);
    $line_id = mysqli_real_escape_string($conn, $_POST['line_id']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);

    $query = "INSERT INTO user_info (id,username,fname_lname,line_id,tel) VALUES ('$user_id','$username','$fname_lname','$line_id','$tel')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "User Created Successfully";
        header("Location: manage_members.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Created";
        header("Location: manage_members.php");
        exit(0);
    }
}

if(isset($_POST['save_key']))
{
    $key_id = mysqli_real_escape_string($conn, $_POST['id']);
    $key_number = mysqli_real_escape_string($conn, $_POST['key_number']);
    $key_floor = mysqli_real_escape_string($conn, $_POST['key_floor']);
    $key_status = mysqli_real_escape_string($conn, $_POST['key_status']);

    $query = "INSERT INTO sci_key (id,key_number,key_floor,key_status) VALUES ('$key_id','$key_number','$key_floor','$key_status')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Key Created Successfully";
        header("Location: manage_keys.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Key Not Created";
        header("Location: manage_keys.php");
        exit(0);
    }
}

if(isset($_POST['update_key']))
{
    $key_id = mysqli_real_escape_string($conn, $_POST['id']);

    $key_number = mysqli_real_escape_string($conn, $_POST['key_number']);
    $key_floor = mysqli_real_escape_string($conn, $_POST['key_floor']);
    $key_status = mysqli_real_escape_string($conn, $_POST['key_status']);

    $query = "UPDATE sci_key SET key_number='$key_number', key_floor='$key_floor', key_status='$key_status' WHERE id='$key_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Key Updated Successfully";
        header("Location: manage_keys.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Key Not Updated";
        header("Location: manage_keys.php");
        exit(0);
    }

}

if(isset($_POST['delete_key']))
{
    $key_id = mysqli_real_escape_string($conn, $_POST['delete_key']);

    $query = "DELETE FROM sci_key WHERE id='$key_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Key Deleted Successfully";
        header("Location: manage_keys.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Key Not Deleted";
        header("Location: manage_keys.php");
        exit(0);
    }
}

if(isset($_POST['borrow_key']))
{
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $key_num = mysqli_real_escape_string($conn, $_POST['key_num']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);
    $time1 = mysqli_real_escape_string($conn, $_POST['time1']);
    $time2 = mysqli_real_escape_string($conn, $_POST['time2']);

    $query = "INSERT INTO borrow_key (id,key_num,name,reason,time1,time2) VALUES ('$id','$key_num','$name','$reason','$time1','$time2')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "ยืมกุญแจสำเร็จ";
        header("Location: floor3.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "ไม่สามารถยืมกุญแจได้";
        header("Location: floor3.php");
        exit(0);
    }
}

if (isset($_POST['return_key'])) 
{
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $key_num = mysqli_real_escape_string($conn, $_POST['key_num']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $fileName = mysqli_real_escape_string($conn, $_POST['file_name']);
    $targetDir = "uploads/";

    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                $insert = $conn->query("INSERT INTO return_key (id,key_num,name,file_name) VALUES ('$id','$key_num','$name', '$fileName')");
                if ($insert) {
                    $_SESSION['statusMsg'] = "The file has been uploaded successfully.";
                    header("location: floor3.php");
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: floor3.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                header("location: floor3.php");
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            header("location: floor3.php");
        }
    } else {
        $_SESSION['statusMsg'] = "Please select a file to upload.";
        header("location: floor3.php");
    }
}

if(isset($_POST['delete_report']))
{
    $borrow_id = mysqli_real_escape_string($conn, $_POST['delete_report']);

    $query = "DELETE FROM borrow_key WHERE id='$borrow_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Report Deleted Successfully";
        header("Location: borrowadmin_report.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Report Not Deleted";
        header("Location: borrowadmin_report.php");
        exit(0);
    }
}

if(isset($_POST['update_report']))
{
    $borrow_id = mysqli_real_escape_string($conn, $_POST['id']);

    $key_num = mysqli_real_escape_string($conn, $_POST['key_num']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $time1 = mysqli_real_escape_string($conn, $_POST['time1']);
    $time2 = mysqli_real_escape_string($conn, $_POST['time2']);

    $query = "UPDATE borrow_key SET key_num='$key_num', name='$name', time1='$time1', time2='$time2' WHERE id='$borrow_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Report Updated Successfully";
        header("Location: borrowadmin_report.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Report Not Updated";
        header("Location: borrowadmin_report.php");
        exit(0);
    }

}

?>

