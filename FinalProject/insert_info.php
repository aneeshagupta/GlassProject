<?php

$conn = mysqli_connect("uscitp.com", "aneeshag_final", "Final123", "aneeshag_finalproject");
if(mysqli_connect_errno()){
    echo "Connection failed: ". mysqli_connct_error();
}


$username = $_REQUEST['username'];
$eye_size = $_REQUEST['eye_size'];
$face_height = $_REQUEST['face_height'];
$face_width = $_REQUEST['face_width'];

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

$sql = "INSERT INTO measurements (userName, eyeSize, faceHeight, faceWidth, faceType)
        VALUES ( '". $username ."', " . $eye_size .", ".$face_height.", ".$face_width.", '".$face_type ."')";


$results = mysqli_query($conn, $sql);

if(!$results){
    echo "Error: " . mysqli_error($conn);
}

else  {

    header("Location: profile.php?userName=".$username);
}



?>

