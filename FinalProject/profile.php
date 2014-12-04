<?php

$user = $_REQUEST['user'];

$conn = mysqli_connect("uscitp.com", "aneeshag_final", "Final123", "aneeshag_finalproject");
if(mysqli_connect_errno()){
    echo "Connection failed: ". mysqli_connct_error();
}

$sql_info = "SELECT * FROM measurements WHERE username LIKE '%" .$user ."%'";
$results_info = mysqli_query($conn, $sql_info);
while($row = mysqli_fetch_array($results_info, MYSQL_ASSOC)) {
    echo $row["eyeSize"]; ?> <br> <?php
    echo $row["faceHeight"]; ?> <br> <?php
    echo $row ["faceWidth"];?> <br> <?php

    echo "<a href='edit.php?userName=" . $row["userName"] . "'>[EDIT]</a> ";
}
?>