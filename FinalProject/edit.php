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
<input type="submit" value="Update Record"/>
</form>


