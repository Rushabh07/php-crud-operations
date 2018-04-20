<?php

include('conf.php');
$id=$_GET['id'];
$qry="DELETE from mytb where id=$id";
$res=mysqli_query($conn,$qry);
header("Location: userpage.php");

?>