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

$face_height = $_REQUEST['faceHeight'];
$face_width = $_REQUEST['faceWidth'];
$face_score = $face_height/$face_width; //bigger the number, bigger the sunglasses
$face_constant = 1;
$face_type = null;
if($face_score > 1) {
    $face_type = "Oval";
}
else if ($face_score < 1) {
    $face_type = "Round";
}
else
    $face_type = "Square";

$update_sql = "UPDATE measurements
                SET eyeSize = '" . $_REQUEST['eyeSize'] . "', faceWidth = '" . $_REQUEST['faceWidth'] .
    " ', faceHeight = '". $_REQUEST['faceHeight'] . "' , faceType = '". $face_type ."' WHERE username LIKE '%" .$user ."%'";

$update_results = mysqli_query($conn, $update_sql);
$userName = $user;
if(!$update_results){
    exit("Update SQL Error: " . mysqli_error($conn));
} else  {
    header("Location: profile.php?userName=".$userName);
}


?>