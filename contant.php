<?php

require 'database.php';

if (isset($_POST['contact_btn'])) {

    //secure the special charactors
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
        
    $query = "INSERT INTO customer_contacts (`fullname`, `email_address`, `subject`, `message`) VALUES ('$fullname', '$email', '$subject', '$message')";
    
    $conn->query($query);
    
    #echo "<script>alert('happy or not');</script>";
    header("Location: index.php");
}

?>