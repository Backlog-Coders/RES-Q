<!DOCTYPE html>
<html>
<head>
 <title>Admin</title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>

 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > BLOODBANKS DATABASE </h1>
 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th> User_Id </th>
 <th> Name </th>
 <th> A+ </th>
 <th> B+ </th>
 <th> AB+</th>
 <th> O+ </th>
 <th> A- </th>
 <th> B- </th>
 <th> O- </th>
 <th> AB- </th>
 <th> Location </th>

 </tr >

 <?php

 include 'connection.php'; 
 $q = "select * from blood ";

 $query = mysqli_query($con,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['user_id'];  ?> </td>
 <td> <?php echo $res['name'];  ?> </td>
 <td> <?php if($res['A+'] == 'Availabe'){
   echo "<span style='color:green'>Available</span>";
 } 
 else{
   echo "<p style='color:red'>Unavailable</p>";
 } 
 ?> </td>
<td> <?php if($res['B+'] == 'Availabe'){
   echo "<span style='color:green'>Available</span>";
 } 
 else{
   echo "<p style='color:red'>Unavailable</p>";
 } 
 ?> </td><td> <?php if($res['AB+'] == 'Availabe'){
  echo "<span style='color:green'>Available</span>";
} 
else{
  echo "<p style='color:red'>Unavailable</p>";
} 
?> </td><td> <?php if($res['O+'] == 'Availabe'){
  echo "<span style='color:green'>Available</span>";
} 
else{
  echo "<p style='color:red'>Unavailable</p>";
} 
?> </td><td> <?php if($res['A-'] == 'Availabe'){
  echo "<span style='color:green'>Available</span>";
} 
else{
  echo "<p style='color:red'>Unavailable</p>";
} 
?> </td><td> <?php if($res['B-'] == 'Availabe'){
  echo "<span style='color:green'>Available</span>";
} 
else{
  echo "<p style='color:red'>Unavailable</p>";
} 
?> </td><td> <?php if($res['AB-'] == 'Availabe'){
  echo "<span style='color:green'>Available</span>";
} 
else{
  echo "<p style='color:red'>Unavailable</p>";
} 
?> </td><td> <?php if($res['O-'] == 'Availabe'){
  echo "<span style='color:green'>Available</span>";
} 
else{
  echo "<p style='color:red'>Unavailable</p>";
} 
?> </td>
 <td> <?php echo $res['location'];  ?> </td>
 </tr>

 <?php 
 }
  ?>
  <a href="Welcome.php">
 <button type=submit class=btn-btn-primary> Update </button>
 </table>  

 </div>
 </div>

 <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script>
</body>
</html>
</html>