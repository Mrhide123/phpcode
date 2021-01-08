<?php include 'server.php'; 
 error_reporting(0);
 include 'header.php';
?>


 <div class="col-lg-6 m-auto">
 
 <form method="post" action="" enctype="multipart/form-data">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Reg Data </h1>
 </div><br>

 <label> name: </label>
 <input type="text" name="fname" class="form-control" required=""> <br>

 <label> lastname: </label>
 <input type="text" name="lname" class="form-control" required=""> <br>
 <label> mobile: </label>
 <input type="text" name="phone" minlength="10" maxlength="10" class="form-control" required=""> <br>
 <label> email: </label>
 <input type="text" name="email" class="form-control" required=""> <br>

 <label> Password: </label>
 <input type="Password" name="password" class="form-control" required=""> <br>
 <label> Image: </label>
 <input type="file" name="uploadfile" value=""  class="form-control" required=""> <br>
 

 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>

 </div>
 <center><button> <a href="index.php"class="text-white btn-info btn">Login </a>  </button></center>
 </form>

 </div>
</body>
</html>



<?php
if (isset($_POST['submit']))
{
    $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $contact=$_POST['phone'];
  $email=$_POST['email'];
  $password=$_POST['password'];
    
 $image= addslashes(file_get_contents($_FILES['uploadfile']['tmp_name']));
$image_name= addslashes($_FILES['uploadfile']['name']);
$image_size= getimagesize($_FILES['uploadfile']['tmp_name']);
  move_uploaded_file($_FILES["uploadfile"]["tmp_name"],"image/" . $_FILES["uploadfile"]["name"]);            
        $folder="image/" . $_FILES["uploadfile"]["name"];
        
$query="INSERT INTO `reg`(`name`, `last`, `contact`, `email`, `pass`, `image`)values('$fname','$lname','$contact','$email','$password','$folder')";

    $query1=mysqli_query($conn,$query);
if ($query1) {
echo '<script>alert("Data INSERT")</script>'; 
}
else{
  echo "error";
}
}

?>
