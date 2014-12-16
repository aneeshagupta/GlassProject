
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
    <h1>Edit </h1>



    <div id="content">
        <p>

            <?php
            /**
             * Created by PhpStorm.
             * User: Aneesha
             * Date: 12/2/14
             * Time: 11:18 AM
             */

            if(empty($_REQUEST['userName'])){
                exit("We encountered a problem.");
            }

            $user = $_REQUEST['userName'];

            $conn = mysqli_connect("uscitp.com", "aneeshag_final", "Final123", "aneeshag_finalproject");
            if(mysqli_connect_errno()){
                echo "Connection failed: ". mysqli_connct_error();
            }

            $sql = "SELECT * FROM measurements WHERE username LIKE '%" .$user ."%'";
            $results = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($results, MYSQL_ASSOC);

            ?>

        <form method="get" action="update.php">
            Eye Size: <input class="title_input" type="text" name="eyeSize" value="<?php echo $row['eyeSize']; ?>" />
            <br/>
            Face Height: <input class="title_input" type="text" name="faceHeight" value="<?php echo $row['faceHeight']; ?>" />
            <br/>
            Face Width: <input class="title_input" type="text" name="faceWidth" value="<?php echo $row['faceWidth']; ?>" />
            <br/>

            </select>
            <input type="hidden" name="userName" value="<?php echo $_REQUEST['userName']; ?>"/>
            <br/>
            <input type="submit" value="Update Info"/>
        </form>

        </p>
    </div>
</div>

</body>
</html>



