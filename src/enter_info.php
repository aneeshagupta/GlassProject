<?php
$conn = mysqli_connect("uscitp.com", "aneeshag_final", "Final123", "aneeshag_finalproject");
if(mysqli_connect_errno()){
    echo "Connection failed: ". mysqli_connct_error();
}

$username = $_REQUEST['new_user'];
$password = $_REQUEST['new_pass'];


$sql = "SELECT *
          FROM users
           WHERE username LIKE '%" . $username . "%'";

$results = mysqli_query($conn, $sql);
$num =  mysqli_num_rows($results);

if($num!=0) {

    header('Location: try_again.php');
    global $username;
    unset($username);
    global $password;
    unset($password);
    exit;
}

?> <head>
    <title>GLASS</title></head>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>CSS Newbie Example: Super Simple Horizontal Navigation Bar</title>
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
    <h1>Enter your info </h1>


    <div id="content">
        <p>
            <?php

            $sql = "INSERT INTO users (username, password)
        VALUES ( '". $username ."', '" . $password ."')";

            $results = mysqli_query($conn, $sql);


            if(!$results){
                echo "Error: " . mysqli_error($conn);
            }
            ?>
            <html>
            <html>
            <head lang="en">
                <meta charset="UTF-8">
                <title></title>
            </head>
            <body>
            <form method="get" action="insert_info.php"
            <h3> Please enter your face information! </h3> <br>
            Eye Size <input type="text" name="eye_size"> <br>
            Face Height <input type = "text" name = "face_height"> <br>
            Face Width <input type = "text" name = "face_width"> <br>
            <br/>
            <input type="hidden" name="username" value="<?php echo $username; ?>"/>
            <input type="submit">
            </form>
            </body>
            </html> </p>
    </div>
</div>

</body>
</html>

