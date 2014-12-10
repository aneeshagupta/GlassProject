<?php

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
$back = false;

while($row = mysqli_fetch_array($results, MYSQL_ASSOC)) {
    if($row["password"]==$password) {
        $back = true;
    }
}
if(!$back) {
    header('Location: try_login.php');
    global $username;
    unset($username);
    global $password;
    unset($password);
    exit;
}
?>

<head>
    <title>GLASS</title></head>

<?php
$sql_info = "SELECT * FROM measurements WHERE username LIKE '%" .$username ."%'";
$results_info = mysqli_query($conn, $sql_info);
$num_info = mysqli_num_rows($results_info);
while($row = mysqli_fetch_array($results_info, MYSQL_ASSOC)) {
    echo "Eye size is " . $row["eyeSize"]; ?> <br> <?php
    echo "Face Height is ". $row["faceHeight"]; ?> <br> <?php
    echo "Face Width is ". $row ["faceWidth"];?> <br> <?php

    echo "<a href='edit.php?userName=" . $row["userName"] . "'>[EDIT]</a> ";

    echo "<a href='profile.php?userName=" . $row["userName"] . "'>View yo Results</a> ";
}
?> <br> <?php

echo "<a href='home.php'>Logout</a> ";

?>

</div>
</div>


