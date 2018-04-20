<?php
	session_start();
	
	include("header.php");
	include("conf.php");

$qry="SELECT * FROM mytb where id=".$_SESSION['mem_id']."";
$results=mysqli_query($conn,$qry) or die("qry failed" . mysql_error());

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST">
		<table border=1 align="center" cellpadding="7">

			<tr>
				<th> Name </th>
				<th> Email </th>
				<th> Mobile </th>
				<th> City </th>
				<th> Zip </th>
				<th> Gender </th>
				<th> DOB </th>
				<th> Course </th>
				<th> Hobby </th>
				<th> Pic </th>
			</tr>

			<?php
				while($res=mysqli_fetch_array($results))
				{
					
					?>
					
					<tr>
					<td><?php echo $res['name']; ?></td>
					<td><?php echo $res['email']; ?></td>
					<td><?php echo $res['mob']; ?></td>
					<td><?php echo $res['city']; ?></td>
					<td><?php echo $res['zip']; ?></td>
					<td><?php echo $res['gender']; ?></td>
					<td><?php echo $res['dob']; ?></td>
					<td><?php echo $res['study']; ?></td>
					<td><?php echo $res['hobby']; ?></td>
					

					
					<td><img src="<?php echo $res['pic']; ?>" height="100" width="100"></td>


		<td>
		<a href="newedit.php?rid=<?php echo $res['id']; ?>">Edit</a>
		</td><br>
		<td>
		<a href="delete.php?id=<?php echo $res['id']; ?>">Delete</a>
		</td>
				</tr>
				<?php
			}
			?>

		</table>
	</form>
	
	<a href="logout.php">Logout</a>
	
</body>
</html>