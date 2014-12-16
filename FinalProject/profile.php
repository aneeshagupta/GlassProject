<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Profile</title>
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
    <h1>Your Profile</h1>


    <div id="content">
        <p>

            <?php

            $user = $_REQUEST['userName'];


            $conn = mysqli_connect("uscitp.com", "aneeshag_final", "Final123", "aneeshag_finalproject");
            if(mysqli_connect_errno()){
                echo "Connection failed: ". mysqli_connct_error();
            }

            $sql_info = "SELECT * FROM measurements WHERE username LIKE '%" .$user ."%'";
            $results_info = mysqli_query($conn, $sql_info);
            $user_style = null;


            while($row = mysqli_fetch_array($results_info, MYSQL_ASSOC)) {
                echo "Eye Size is ".  $row["eyeSize"]; ?> <br> <?php
                echo "Face Height is ". $row["faceHeight"]; ?> <br> <?php
                echo "Face Width is ". $row ["faceWidth"];?> <br> <?php
                $user_style = $row["faceType"];

                echo "If you want to edit: ";
                echo "<a href='edit.php?userName=" . $row["userName"] . "'>[EDIT]</a> ";
            }



                    $sql_sunglasses = "SELECT sunglasses.*
          FROM sunglasses, styles, measurements, frames, brands, lenses
            WHERE sunglasses.sunglassstyle = styles.styleid
            AND sunglasses.sunglassbrand = brands.brandid
            AND sunglasses.frameMaterial = frames.framesid
            AND sunglasses.lensMaterial = lenses.lenseid
            AND (styles.style =   '" .$user_style. "')";

            $results_glasses = mysqli_query($conn, $sql_sunglasses);



            ?>


        <div class="container">
            <div class="col-md-4">
                <h3>Glasses</h3>

            </div>
            <div class="col-md-4">

            </div>
        </div>

        <div class="container">


            <table class="table">
                <thead>

                <tbody>
                <?php while ($glass_row = mysqli_fetch_array($results_glasses )) {?>
                    <tr>
                        <td><?php echo "Name: ". $glass_row["name"] . "   " ?></td>
                        <td><?php echo "URL:  ". $glass_row["url"] . "   " ?></td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>


    </div>




    <p>Please fill out the form below to email yourself these links.</p>
    <form action="email.php"  method="get">
        Name: <input type="text" name="username" />
        <br />
        Email: <input type="text" name="useremail" />
        <br />
        <input type="submit" name="submit" value="Send Email" />
        <input type = "hidden" name = "feedback" value = "<?php  foreach($stack as $key=>$value) {
            echo $value . "\r\n";
        } ?>"/>
    </form></a> </p>
</div>
</div>

</body>
</html>
