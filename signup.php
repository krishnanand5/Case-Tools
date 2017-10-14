<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$nameErr  =  $pwdErr = $cpwdErr = $numberErr = "";
$name = $email = $number = $pwd = $cpwd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    echo " hi $nameErr";
  } else {
    $name = test_input($_POST["name"]);
    echo " hi $name";
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
?>
<?php
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

</body>
</html>