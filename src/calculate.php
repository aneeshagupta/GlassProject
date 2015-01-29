<?php

if(empty($_REQUEST['userName'])){
    header("Location: profile.php");
}

$conn = mysqli_connect("uscitp.com", "aneeshag_final", "Final123", "aneeshag_finalproject");
if(mysqli_connect_errno()){
    echo "Connection failed: ". mysqli_connct_error();
}



?>