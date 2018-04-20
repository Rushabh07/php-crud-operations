<?php

session_start();
include("header.php");
include("conf.php");
//$connection=mysqli_connect("localhost","rishi","welcome123","internal1");
if (isset($_GET['rid']))
{
		$_SESSION['rid'] = $_GET['rid'];
		$zz="SELECT * from mytb where id=".$_GET['rid']." ";
		$r=mysqli_query($conn, $zz);

		while($rr = mysqli_fetch_array($r))
		{
			$nm = $rr['name'];
			$email = $rr['email'];
			$mob = $rr['mob'];
			//$pict = $rr['pic'];
		}
}

if(isset($_POST['update1']))
	{
		$qry="UPDATE mytb set name='".$_POST['name1']."', email='".$_POST['email1']."', mob='".$_POST['mob1']."' WHERE id= ".$_SESSION['rid']." ";
		$r=mysqli_query($conn, $qry);
		header("Location: userpage.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<input type="text" name="name1" value="<?php echo $nm; ?>">Name
	<input type="text" name="email1" value="<?php echo $email; ?>">Email
	<input type="text" name="mob1" value="<?php echo $mob; ?>">Mobile

	<!-- <input type="file" name="fileuploadname" value="<?php echo $pict; ?>">Pic -->
	<input type="submit" name="update1" value="Update">
	</form>
</body>
</html>