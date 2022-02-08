<?php
include("connection.php");
include("functions.php");
$catid = $data['catid'];
$sql = "select * from blood where user_id = '$catid";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($con,$result);
$status = $data['A+'];

if($status == '1')
{
    $status = '0';
}
else{
    $status = '1';
}

$update = "update blood set A+ = '$status' where user_id = $catid";
$result1 = mysqli_query($con,$update);
if($result1){
echo $status;
}
?>