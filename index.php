<?php include 'server.php';
  include 'header.php';
  error_reporting(0);
	?>

<form action="" name="frmUser" method="POST">
  <div class="message"><?php if($message!="") { echo $message; } ?></div>
  <div class="col-lg-6 m-auto">
 
 <form method="post" action="">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  LogIn </h1>
 </div><br>

 <label> Email: </label>
 <input type="text" name="user_name" class="form-control" required=""> <br>

 <label> password: </label>
 <input type="password" name="password" class="form-control" required=""> <br>
 <button class="btn btn-success" type="submit" name="submit" value="submit"> Submit </button><br>

</form>
<center><button > <a href="reg.php"class="text-white btn-info btn"> Reg </a>  </button> </center>
</body>
</html>
<?php
session_start();
$message="";
if(count($_POST)>0) {
include 'server.php';

$email=$_POST['user_name'];
$password=$_POST['password'];

$result = "SELECT * FROM reg WHERE email = '$email' AND pass = '$password'";


$data = mysqli_query($conn,$result);
// print_r($result);
// exit;
$row  = mysqli_fetch_array($data);
if(is_array($row)) {
$_SESSION["id"] = $row['id'];
$_SESSION["name"] = $row['name'];
} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["id"])) {
header("Location:data_display.php");
}
?>