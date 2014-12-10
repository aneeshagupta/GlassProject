<head>
    <title>GLASS</title></head>

<?php
/**
 * Created by PhpStorm.
 * User: Aneesha
 * Date: 12/5/14
 * Time: 1:04 PM
 */if (!empty($_REQUEST["submit"])) {
    // there is a form field named "userfeedback" with valid data  in it

    $to = $_REQUEST["useremail"];

    // this would be the permanent address  you want all feedback to go to
    $subject = "Your sunglasses from GLASS!" ; // from form
    $message = "Hi " . $_REQUEST["username"] .  "\r\n" . "Make sure to save your sunglasses! Here are the links!" . "\r\n" . $_REQUEST["feedback"] ; // from form
    $from = "aneeshag@usc.edu"; // from form
    $headers = "From: GLASS"; // create a header entry for FROM

    $test = mail($to, $subject, $message, $headers);
    echo "Thank  You. Your email was sent.";
    echo "<a href='home.php'>Logout</a> ";
}
?>

