<?php
/*

Algorithm: 

Calculate face dimesnion -> assign score 

Eye size narrows down, then face height narrows, then face width narrows 

*/
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

$sql = "INSERT INTO users (username, password)
        VALUES ( '". $username ."', '" . $password ."')";

$results = mysqli_query($conn, $sql);


if(!$results){
    echo "Error: " . mysqli_error($conn);
}
session_start();
$_SESSION['username'] = $username;

?>
<html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="get" action="insert_info.php">
    <h3> Please enter your face information! </h3>
    Eye Size <input type="text" name="eye_size"> <br>
    Face Height <input type = "text" name = "face_height"> <br>
    Face Width <input type = "text" name = "face_width"> <br>
    <br/>
    <input type="submit">

</form>
</body>
</html> 