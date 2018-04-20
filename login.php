<?php
	
	include("header.php");
	include("conf.php");
	session_start();
	$error='';
		if(isset($_REQUEST['loginsubmit']))
		{
			$email=$_REQUEST['email1'];
			$pass=$_REQUEST['pass1'];

			if(empty($email))
			{
				$error .= "fill the email <br />";
			}
			if(empty($pass))
			{
				$error .= "fill the pass <br />";
			}

			if(!empty($email) and !empty($pass))
			{
				$chk=mysqli_query($conn, "SELECT * from mytb where email='$email' and password='$pass'");
				if(mysqli_num_rows($chk)>=1)
				{
					$result=mysqli_fetch_array($chk);
					$_SESSION['mem_id']=$result['id'];
					header("Location: userpage.php");
				}
				else
				{
					$error .="wrong uname and password";
				}
			}

		}

?>

<!DOCTYPE html>
<html>
<head><center><h1>Welcome</h1></center>
	<title>Login</title>
</head>
<body>
	<fieldset>
		<legend>Login</legend>

		<?php echo $error; ?>

		<form action="" method="POST">
			<table style="width: 10%; padding:0px" cellpadding="0" cellspacing="0">

				<tr>
					<td width="20%">Email :</td>
					<td width="30%">
					<input type="text" name="email1" value="<?=((isset($email))?$email:'')?>">
					</td>
				</tr>

				<tr>
					<td width="20%">Password:</td>
					<td width="30%">
					<input type="password" name="pass1" value="<?=((isset($pass))?$pass:'')?>">
					</td>
				</tr>

				<tr>
					<td width="30%">
						<input type="submit" name="loginsubmit" value="Submit">
					</td>
				</tr>
			</table>
		</form>
	</fieldset>
	<center><a href="regi.php">New User? Click here</a></center>
</body>
</html>