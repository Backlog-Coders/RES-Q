<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
<!DOCTYPE html>
<html>
  <title>Welcome BB</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
<link rel = "icon" href="assets/pic/lg.png" type= "image/png">
<link rel=stylesheet href="assets/css/samplestyle.css">
</head>
<body>
<a href="logout.php">Logout</a>
	<br>
	Hello, <?php echo $user_data['name']; ?>.  You have been registered with ID <?php echo $user_data['user_id']; ?>
    <br><br>
<div class="container">
        
        <div class="switch-holder">
            <div class="switch-label">
             <span>A+</span>
            </div>
            <div class="switch-toggle">
                <input type="checkbox" <?php if($user_data['A+'] == ''){echo "checked";}?> onclick="toggleStatus(<?php echo $user_data['user_id']?>)" id="A+">
                <label for="A+"></label>

            </div>
        </div>

        <div class="switch-holder">
            <div class="switch-label">
            <span>B+</span>
            </div>
            <div class="switch-toggle">
                <input type="checkbox" id="B+">
                <label for="B+"></label>
            </div>
        </div>

        <div class="switch-holder">
            <div class="switch-label">
            </i><span>AB+</span>
            </div>
            <div class="switch-toggle">
                <input type="checkbox" id="AB+">
                <label for="AB+"></label>
            </div>
        </div>
        <div class="switch-holder">
            <div class="switch-label">
            <span>O+</span>
            </div>
            <div class="switch-toggle">
                <input type="checkbox" id="O+">
                <label for="O+"></label>
            </div>
        </div>
        <div class="switch-holder">
            <div class="switch-label">
            <span>A-</span>
            </div>
            <div class="switch-toggle">
                <input type="checkbox" id="A-">
                <label for="A-"></label>
            </div>
        </div>
        <div class="switch-holder">
            <div class="switch-label">
            <span>B-</span>
            </div>
            <div class="switch-toggle">
                <input type="checkbox" id="B-">
                <label for="B-"></label>
            </div>
        </div>
        <div class="switch-holder">
            <div class="switch-label">
             <span>AB-</span>
            </div>
            <div class="switch-toggle">
                <input type="checkbox" id="AB-">
                <label for="AB-"></label>
            </div>
        </div>
        <div class="switch-holder">
            <div class="switch-label">
             <span>O-</span>
            </div>
            <div class="switch-toggle">
                <input type="checkbox" id="O-">
                <label for="O-"></label>
            </div>
        </div>

    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.3/jquery.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js "></script>
    <script>
        function toggleStatus(user_id){
            var id = user_id;
            $.ajax({
                url:"toggle.php",
                type:"post",
                data:{catId: id},
                success: function(result){
                    if(result == '1'){
                        swal("ON");                       
                    }
                    else{
                        swal("OFF");
                    }
                }
            });
        }
    </script> 
</body>
</html>