<!DOCTYPE html>
<html>
<head>
 <title></title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
</head>
<body>

 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > Display Table Data </h1>
 <br>


 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th> Id </th>
 <th> name </th>
 <th> lastname </th>
 <th> contact </th>
 <th> email </th>
 <th> password </th>
  <th> image </th>

 <th> Delete </th>
 <th>Edit</th>

 </tr >
<?php
session_start();
?>
 <?php
 
  if($_SESSION["name"]) {

 include 'server.php'; 
 $q = "select * from reg WHERE name='".$_SESSION['name']."'";

 $query = mysqli_query($conn,$q);

 while($row = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td><?php  echo $row['id'];?> </td>
                        <td><?php  echo $row['name'];?> </td>
                        <td><?php  echo $row['last'];?></td>
                        <td><?php  echo $row['contact'];?></td>                   
                        <td><?php  echo $row['email'];?></td>
                        <td><?php  echo $row['pass'];?></td>
      <td ><?php  echo "<img src=".$row['image']." >";?></td>
 <td> <button class="btn-danger btn"> <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete">Delete</a> </button> </td>

  <td> <button class="btn-primary btn"> <a href="userdata.php?id=<?php echo $row['id']; ?>" class="text-white"> Edit </a> </button> </td>

 </tr>

 <?php 
 }
}
  ?>
 
 </table>  
<button class="btn-primary btn"> <a href="logout.php" class="text-white"> Logout </a> </button> </div>
 </div>

 <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script>

</body>
</html>
