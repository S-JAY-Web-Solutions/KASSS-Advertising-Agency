<?php
session_start();
if (empty($_SESSION['userid']) || empty($_SESSION['email'])) {
    header('location:../signin.php');
}

$id = $_SESSION['userid'];
$email = $_SESSION['email'];

require_once('../config.php');


$feedback = mysqli_query($conn,"SELECT * FROM feedback WHERE email = '$email' AND userID = '$id';");
$result = mysqli_fetch_assoc($feedback);

date_default_timezone_set('Asia/colombo');

if (isset($_POST['submit'])) {
    $userID = $_POST['id'];
    $useremail = $_POST['email'];
    $feedback = addslashes($_POST['feedback']);
    $date = date("Y-m-d");

    $insert = mysqli_query($conn,"INSERT INTO feedback(userID,email,feedback,date) VALUES('$userID','$useremail','$feedback','$date');");

    if ($insert == TRUE) {
        $update = mysqli_query($conn,"UPDATE users SET feedback = 1 WHERE id ='$id' AND email = '$useremail';");

        if ($update == TRUE) {
            echo "<script>alert('Feedback Submited Successfully!!!');window.location='feedback.php';</script>";
        }else{
            echo "<script>alert('Feedback Submit Failed!!!');window.location='feedback.php';</script>";
        }
    }else{
        echo "<script>alert('Feedback Submit Failed!!!');window.location='feedback.php';</script>";
    }
}

if (isset($_POST['update'])) {
    $feedbackid = $result['id'];
    $userID = $_POST['id'];
    $feedback = $_POST['feedback'];

    $update = mysqli_query($conn,"UPDATE feedback SET feedback='$feedback' WHERE id = '$feedbackid' AND userID= '$userID';");

    if ($update == TRUE) {
        echo "<script>alert('Feedback Edited Successfully!!!');window.location='feedback.php';</script>";
    }else{
        echo "<script>alert('Feedback Edit Failed!!!');window.location='feedback.php';</script>";
    }
}
?>