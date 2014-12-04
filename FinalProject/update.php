<?php
/**
 * Created by PhpStorm.
 * User: Aneesha
 * Date: 12/3/14
 * Time: 2:34 AM
 */

if(empty($_REQUEST['userName'])){
    header("Location: view_info.php");
}

$user = $_REQUEST['userName'];
$conn = mysqli_connect("uscitp.com", "aneeshag_final", "Final123", "aneeshag_finalproject");
if(mysqli_connect_errno()){
    echo "Connection failed: ". mysqli_connct_error();
}


$update_sql = "UPDATE measurements
                SET eyeSize = '" . $_REQUEST['eyeSize'] . "', faceWidth = '" . $_REQUEST['faceWidth'] .
    " ', faceHeight = '". $_REQUEST['faceHeight'] . "' WHERE username LIKE '%" .$user ."%'";

$update_results = mysqli_query($conn, $update_sql);

if(!$update_results){
    exit("Update SQL Error: " . mysqli_error($conn));
} else  {
   header("Location: profile.php?user=".$user);
}


?>