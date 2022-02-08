<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
<?php
$uid=$user_data['user_id'];
$sql1="SELECT * from `blood` WHERE `user_id`='$uid'";
$result1=mysqli_query($con,$sql1);
$row=mysqli_fetch_assoc($result1);
$Ap = $row['A+'];
$Bp = $row['B+'];
$ABp = $row['AB+'];
$Op = $row['O+'];
$An = $row['A-'];
$Bn = $row['B-'];
$ABn = $row['AB-'];
$On = $row['O-'];
 
if(isset($_POST['submit'])){
    $Ap = $_POST['A+'];
    $Bp = $_POST['B+'];
    $ABp = $_POST['AB+'];
    $Op = $_POST['O+'];
    $An = $_POST['A-'];
    $Bn = $_POST['B-'];
    $ABn = $_POST['AB-'];
    $On = $_POST['O-'];

    $sql= "UPDATE `blood` SET `user_id`='$uid',`A+`='$Ap',`B+`='$Bp',`O+`='$Op',`AB+`='$ABp',`A-`='$An',`B-`='$Bn',`O-`='$On',`AB-`='$ABn' WHERE `user_id`='$uid'";  
    $result=mysqli_query($con,$sql);
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
</head>


<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
<body>
	

<a href="logout.php">Logout</a>
	<br>
	Hello, <?php echo $user_data['name']; ?>.  You have been registered with ID <?php echo $user_data['user_id']; ?>
 <div class="container my-5" >
     <form method="post">
     <label for="A+" style="color: black;">A+</label>
    <select id="A+" name="A+" style="color: black; width: 120px;" required> 
      <option value="Availabe" style="color: black;">Availabe</option>
      <option value="Unavailable" style="color: black;"<?php if($Ap=='Unavailable'){echo "selected";} ?>>Unavailable</option></select><br>
      
      <label for="B+" style="color: black;">B+</label>
    <select id="B+" name="B+" style="color: black; width: 120px;" required> 
      <option value="Availabe" style="color: black;">Availabe</option>
      <option value="Unavailable" style="color: black;"<?php if($Bp=='Unavailable'){echo "selected";} ?>>Unavailable</option></select><br>
      
      <label for="AB+" style="color: black;">AB+</label>
    <select id="AB+" name="AB+" style="color: black; width: 120px;" required> 
      <option value="Availabe" style="color: black;">Availabe</option>
      <option value="Unavailable" style="color: black;" <?php if($ABp=='Unavailable'){echo "selected";} ?>>Unavailable</option></select><br>

      <label for="O+" style="color: black;">O+</label>
    <select id="O+" name="O+" style="color: black; width: 120px;" required> 
      <option value="Availabe" style="color: black;">Availabe</option>
      <option value="Unavailable" style="color: black;" <?php if($Op=='Unavailable'){echo "selected";} ?>>Unavailable</option></select><br>

      <label for="A-" style="color: black;">A-</label>
    <select id="A-" name="A-" style="color: black; width: 120px;" required> 
      <option value="Availabe" style="color: black;">Availabe</option>
      <option value="Unavailable" style="color: black;"<?php if($An=='Unavailable'){echo "selected";} ?>>Unavailable</option></select><br>

      <label for="B-" style="color: black;">B-</label>
    <select id="B-" name="B-" style="color: black; width: 120px;" required> 
      <option value="Availabe" style="color: black;">Availabe</option>
      <option value="Unavailable" style="color: black;"<?php if($Bn=='Unavailable'){echo "selected";} ?>>Unavailable</option></select><br>

      <label for="AB-" style="color: black;">AB-</label>
    <select id="AB-" name="AB-" style="color: black; width: 120px;" required> 
      <option value="Availabe" style="color: black;">Availabe</option>
      <option value="Unavailable" style="color: black;" <?php if($ABn=='Unavailable'){echo "selected";} ?>>Unavailable</option></select><br>

      <label for="O-" style="color: black;">O-</label>
    <select id="O-" name="O-" style="color: black; width: 120px;" required> 
      <option value="Availabe" style="color: black;">Availabe</option>
      <option value="Unavailable" style="color: black;" <?php if($On=='Unavailable'){echo "selected";} ?>>Unavailable</option></select><br>

      <button type="submit" class="btn-btn-primary" name="submit">Update</button>
</form> 
    </div>
</body>
</html>