<!DOCTYPE html>
<head>
	<title> Smart Parking System - FAQ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Fresca" rel="stylesheet">
	<style>
	    #head
	    {
	    	color:white;
	    }
		p
		{
			font-family: 'Lato', serif;
			font-size: 25px;
			font-weight:bold;
			color:black;
		}
		h2
		{
			font-style: 'Lato';
			font-size: 30px;
			color: #141414;
			font-weight: bold;
		}
		#field
		{
			width:50%;
		}
		li
		{
			font-size: 20px;
			font-family:'Lato',Serif;
			font-weight:bold;
			background-color: white;
			text-align: center;
		}
		li .active
		{
			background-color: black;
			color:white;
		}
	</style>
</head>
<body>
	<?php
$nameErr  =  $pwdErr = $cpwdErr = $numberErr = "";
$name = $email = $number = $pwd = $cpwd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["Mobile Number"])) {
    $numberErr = "Number is required";
  } else {
    $number = test_input($_POST["Mobile Number"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/^[0-9]*$/",$number)) {
      $numberErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["pwd"])) {
    $pwdErr = "password required";
  } else {
    $pwd = test_input($_POST["pwd"]);
  }

  if ($pwd == $_POST["cpwd"]) {
      
    }
    
   else {
    $cpwdErr = "password not matching";
  }
}
if(empty($nameErr) and empty($numberErr) and empty($pwdErr) and empty($cpwdErr))
{
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $number;
echo "<br>";
echo $pwd;
echo "<br>";
echo $cpwd;
}
?>

	<div class="container-fluid text-center" style="background-color:black;height:40px;">
		<p id="head"> SMART PARKING SYSTEM </p>
	</div>
	<br>
	<br>
	<div class="container" id="field">
		<ul class="nav nav-tabs" id="tab">
		<div class="col-xs-6">
	    <li class="active"><a data-toggle="tab" data-target="#login">Login</a></li>
	    </div>
	    <div class="col-xs-6">
	    <li><a data-toggle="tab" data-target="#signup">Signup</a></li>
	    </div>
	    </ul>
	    <div class="tab-content">
	    	<br>
		<div id="login" class="tab-pane fade in active">
	       <form>
	          <div class="form-group">
	          <label for="email">Email:</label>
	          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
	          </div>
	          <div class="form-group">
	          <label for="pwd">Password:</label>
	          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
	          </div>
	          <center><input type="submit" class="btn btn-primary"></center>
            </form>
		</div>
	    <div id="signup" class="tab-pane fade">  
	    	<br>
	    	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	    	  <div class="form-group">
	          <label for="Name">Name:</label>
	          <input type="name" class="form-control" id="name" placeholder="Enter Name" name="name">
	          </div>
	          <div class="form-group">
	          <label for="email">Email:</label>
	          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
	          </div>
	          <div class="form-group">
	          <label for="number">Mobile Number:</label>
	          <input type="number" class="form-control" id="number" placeholder="Enter Mobile Number" name="Mobile Number">
	          </div>
	          <div class="form-group">
	          <label for="pwd">Password:</label>
	          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
	          </div>
	          <div class="form-group">
	          <label for="pwd">Confirm Password:</label>
	          <input type="password" class="form-control" id="cpwd" placeholder="Enter password" name="cpwd">
	          </div>
	          <center><input type="submit" class="btn btn-primary"></center>
            </form>
		    </div>
		</div>
    </div>
</body>
</html>