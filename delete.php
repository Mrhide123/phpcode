<?php

include 'server.php';

$id = $_GET['id'];

$q = " DELETE FROM `reg` WHERE id = $id ";

mysqli_query($conn, $q);

header('location:index.php');

?>

