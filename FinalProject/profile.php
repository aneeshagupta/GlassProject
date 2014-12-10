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
    echo $user_style;

    echo "<a href='edit.php?userName=" . $row["userName"] . "'>[EDIT]</a> ";
}

echo "Time to see your sunglasses!";

echo $user_style;

$sql_sunglasses = "SELECT sunglasses.*
  FROM sunglasses, styles, measurements, frames, brands, lenses
    WHERE sunglasses.sunglassstyle = styles.styleid
    AND sunglasses.sunglassbrand = brands.brandid
    AND sunglasses.frameMaterial = frames.framesid
    AND sunglasses.lensMaterial = lenses.lenseid
    AND (styles.style =   '" .$user_style. "')";

$results_glasses = mysqli_query($conn, $sql_sunglasses);


$num_glasses = mysqli_num_rows($results_glasses);?> <br> <?php


$data = array();
while($glass_row = mysqli_fetch_assoc($results_glasses)) {

    $data[] = $glass_row;
}
$colNames = array_keys(reset($data));

?>


<table border="1">
    <tr>
        <?php
        //print the header
        foreach($colNames as $colName)
        {
            if($colName!="faceType") {  echo "<th>$colName</th>";}

        }
        ?>
    </tr>

    <?php
    $stack = array();
    //print the rows
    foreach($data as $row)
    {
        echo "<tr>";
        foreach($colNames as $colName)
        {
            if($colName!="faceType") {echo "<td>".$row[$colName]."</td>";}

            if($colName == "url") {
                array_push($stack,$row[$colName] );
            }
        }
        echo "</tr>";
    }


    ?>
</table>

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
</form>