<?php include 'header.php';  ?>

 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > Display Table Data </h1>
 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 

 <?php
 session_start();
if($_SESSION["name"]) {
 include 'server.php'; 
$q = "select * from reg WHERE name='".$_SESSION['name']."'";
 $query = mysqli_query($conn,$q);





 while($row = mysqli_fetch_array($query)){
  
 ?>

 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Edit Data</h1>
 </div><br>

 <label> name: </label>
 <input type="text" name="fname" value="<?php  echo $row['name'];?>" class="form-control" required=""> <br>

 <label> lastname: </label>
 <input type="text" name="lname" value="<?php  echo $row['last'];?>" class="form-control" required=""> <br>
 <label> mobile: </label>
 <input type="text" name="phone" value="<?php  echo $row['contact'];?>" class="form-control" required=""> <br>
 <label> email: </label>
 <input type="text" name="email" value="<?php  echo $row['email'];?>" class="form-control" required=""> <br>

 <label> Password: </label>
 <input type="Password" name="password" value="<?php  echo $row['pass'];?>" class="form-control" required=""> <br>
 

 <button class="btn btn-success" type="submit" name="submit"> Update </button><br>


 </div>
 </form>
<button class="btn-primary btn"> <a href="logout.php" class="text-white"> Logout </a> </button> 
 <?php 
 }

}
  ?>
 
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
<?php
if (isset($_POST['submit']))
{
   $id=$_GET['id'];
    $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $contact=$_POST['phone'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  

$update="UPDATE `reg` SET `id`='$id',`name`='$fname',`last`='$lname',`contact`='$contact',`email`='$email',`pass`='$password',`image`='$folder' WHERE id='$id'";
    $query1=mysqli_query($conn,$update);
    }
?>