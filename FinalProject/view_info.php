<?php
/*

Algorithm:

Calculate face dimension -> assign score

Eye size narrows down, then face height narrows, then face width narrows

*/
$conn = mysqli_connect("uscitp.com", "aneeshag_final", "Final123", "aneeshag_finalproject");
if(mysqli_connect_errno()){
    echo "Connection failed: ". mysqli_connct_error();
}

$username = $_REQUEST['user'];
$password = $_REQUEST['pass'];

$sql = "SELECT * FROM users
WHERE  username LIKE '%" . $username . "%'";

$results = mysqli_query($conn, $sql);
$num =  mysqli_num_rows($results);

while($row = mysqli_fetch_array($results, MYSQL_ASSOC)) {
    if($row["password"]!=$password) {

        header('Location: try_login.php');
        global $username;
        unset($username);
        global $password;
        unset($password);
        exit;
    }
}

$sql_info = "SELECT * FROM measurements WHERE username LIKE '%" .$username ."%'";
$results_info = mysqli_query($conn, $sql_info);
while($row = mysqli_fetch_array($results_info, MYSQL_ASSOC)) {
    echo $row["eyeSize"]; ?> <br> <?php
    echo $row["faceHeight"]; ?> <br> <?php
    echo $row ["faceWidth"];?> <br> <?php

    echo "<a href='edit.php?userName=" . $row["userName"] . "'>[EDIT]</a> ";
}

?>


