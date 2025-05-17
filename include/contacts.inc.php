<?php
if(isset($_POST['submit'])){
	require_once('../config.php');

    date_default_timezone_set('Asia/Colombo');

    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg =  addslashes($_POST['message']);
    $date = date("Y-m-d");    


    $sql = "INSERT INTO contacts(`name`, `email`, `subject`,`message`,`date`) VALUES ('$name', '$email', '$subject', '$msg','$date');";

    $result = mysqli_query($conn,$sql);
    
    if(!$result){
        echo "<script>alert(\"Error on sent form\");window.location='../contacts.php?notify=failed';</script>";
    }else{
         echo "<script>alert(\"Contact form Sent Successfully\");window.location='../contacts.php?notify=success';</script>";
    }
    mysqli_close($conn);
}
?>