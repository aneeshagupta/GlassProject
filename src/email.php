<head>
    <title>GLASS</title></head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>GLASS </title>
    <style>
        /* Begin Navigation Bar Styling */
        #nav {
            width: 100%;
            float: left;
            margin: 0 0 3em 0;
            padding: 0;
            list-style: none;
            background-color: #f2f2f2;
            border-bottom: 1px solid #ccc;
            border-top: 1px solid #ccc; }
        #nav li {
            float: left; }
        #nav li a {
            display: block;
            padding: 8px 15px;
            text-decoration: none;
            font-weight: bold;
            color: #069;
            border-right: 1px solid #ccc; }
        #nav li a:hover {
            color: #c00;
            background-color: #fff; }
        /* End navigation bar styling. */

        /* This is just styling for this specific page. */
        body {
            background-color: #555;
            font: small/1.3 Arial, Helvetica, sans-serif; }
        #wrap {
            width: 750px;
            margin: 0 auto;
            background-color: #fff; }
        h1 {
            font-size: 1.5em;
            padding: 1em 8px;
            color: #333;
            background-color: #069;
            margin: 0; }
        #content {
            padding: 0 50px 50px; }
    </style>
</head>

<body>
<div id="wrap">
    <h1> Your Email </h1>


    <div id="content">
        <p>
            <?php

            if (!empty($_REQUEST["submit"])) {
                // there is a form field named "userfeedback" with valid data  in it

                $to = $_REQUEST["useremail"];

                // this would be the permanent address  you want all feedback to go to
                $subject = "Your sunglasses from GLASS!" ; // from form
                $message = "Hi " . $_REQUEST["username"] .  "\r\n" . "Make sure to save your sunglasses! Here are the links!" . "\r\n" . $_REQUEST["feedback"] ; // from form
                $from = "aneeshag@usc.edu"; // from form
                $headers = "From: GLASS"; // create a header entry for FROM

                $test = mail($to, $subject, $message, $headers);
                echo "Thank  You. Your email was sent."; ?> <br>  <?php
                echo "<a href='home.php'>Logout</a> ";
            }
            ?>

        </p>
    </div>
</div>

</body>
</html>
