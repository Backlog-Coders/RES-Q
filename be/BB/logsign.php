
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Blood Bank</title>
  <link rel="stylesheet" href="assets/css/adminstyle.css">
  <link rel = "icon" href="assets/img/lg.png" type= "image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script>
  var variable1 = document.getElementById("loc");
  function getlocation() {
    navigator.geolocation.getCurrentPosition(showLoc);
  }
  function showLoc(pos) {
    document.getElementById("dct").style.color = 'white';
    document.getElementById('dct').value = 
      pos.coords.latitude +
      ", " +
      pos.coords.longitude;
  }
</script> 
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<p id="loc"><button class="fa fa-map-marker" style="height=500px;" onclick="getlocation()" ></button></p>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="name" placeholder="Blood Bank Name" required="">
					<input type="text" name="user_name" placeholder="Username" required="">
					<input type="text" id="dct" name="location" placeholder="click on the button" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button>Sign up</button>
				</form>
				<?php 
				/*error_reporting(0);
				ini_set('display_errors', 0);*/
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$location = $_POST['location'];
		if(!empty($name) && !empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into bb (name,user_id,user_name,password) values ('$name','$user_id','$user_name','$password')";
			$query1 = "insert into blood (name,user_id,location) values ('$name','$user_id','$location')";
			mysqli_query($con, $query);
			mysqli_query($con, $query1);
			header("Location: logsign.php");
            echo "You have been succesfully registered";
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>
			</div>

			<div class="login">
				<form method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="user_name" placeholder="Username" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button>Login</button>
				</form>
				<?php 

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from bb where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "Wrong Username or Password";
		}else
		{
			echo "Wrong Username or Password";
		}
	}

?>
			</div>
	</div>
</body>
</html>
<!-- partial -->
  
</body>
</html>
