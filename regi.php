<?php
	
	include("header.php");
	include("conf.php");

	if(isset($_REQUEST['regisubmit']))
	{
		$name=$_REQUEST['name1'];
		$email=$_REQUEST['email1'];
		$pass=$_REQUEST['pass1'];
		$mob=$_REQUEST['mob1'];
		$zip=$_REQUEST['zip1'];
		$city1=$_REQUEST['city'];
		$bday1=$_REQUEST['bday'];
		$stud=$_REQUEST['quli'];
		$hob=$_REQUEST['ch'];
		$ss=implode(',', $hob);
		$sexx=$_REQUEST['sex1'];
		
		if($_FILES["fileuploadname"]["size"]<=1024*1024)
			{
			
			$source=$_FILES["fileuploadname"]["tmp_name"];
			$destination="docc/".rand(10000,100000000)."_".$_FILES["fileuploadname"]["name"];
			
			move_uploaded_file($source,$destination);
			}
			else
			{
				echo "image is too large";
			}

			if($name!='' and $email!='' and $pass!='' and $mob!='' and $zip!='' and $city1!='' and $bday1!='' and $stud!='' and $ss!='' and $sexx!='')
			{
				
				$conn=mysqli_connect("localhost", "rishi", "welcome123", "internal1");
				$insertqry="INSERT into `mytb` (name,email,password,mob,city,zip,dob,study,hobby,pic,gender) values('$name','$email','$pass','$mob', '$city1', '$zip','$bday1', '$stud', '$ss', '$destination','$sexx') ";
				$qry=mysqli_query($conn,$insertqry);
				echo "You have Successfully Registered"; ?>
				<a href="login.php">Back</a>
				<?php
			}
				else
				{
					echo "fields are mendotory";
				} 

			}

?>

<!DOCTYPE html>
<html>
<head><center><h3>Welcome</h3></center>
	<title>Registration</title>
</head>
<body>
	<fieldset>
		<legend>Registration</legend>
		<form action="" method="POST" enctype="multipart/form-data">
			<table style="width: 10%; padding:0px" cellpadding="0" cellspacing="0">

				<tr>
					<td width="20%">Name :</td>
					<td width="30%">
					<input type="text" name="name1">
					</td>
				</tr>

				<tr>
					<td width="20%">Email :</td>
					<td width="30%">
					<input type="text" name="email1">
					</td>
				</tr>

				<tr>
					<td width="20%">Password:</td>
					<td width="30%">
					<input type="password" name="pass1">
					</td>
				</tr>

				<tr>
					<td width="20%">Mobile :</td>
					<td width="30%">
					<input type="text" name="mob1">
					</td>
				</tr>


				<tr>
					<td width="20%">ZipCode :</td>
					<td width="30%">
					<input type="text" name="zip1">
					</td>
				</tr>

				<tr>
				<td width="30%"><lable id="city1">Current City:</lable>
						<select name="city">
							<option>--SELECT CITY--</option>
							<option>Surat</option>
							<option>Ahmedabad</option>
							<option>Vadodra</option>
						</select>
					</td>
				</tr>
	
	<tr>
		<td width="30%"><label id="sex">Select Gender :</label> <br />
				<td><input type="radio" name="sex1" value="Male">Male</td>
	    		<td><input type="radio" name="sex1" value="Female">Female</td>
	    </td>
	</tr>

		<tr>
			<td width="30%"><label id="dob1">DOB</label></td>
			<td>
			<input type="date" name="bday">
			</td>
		</tr>

			<tr>
			<td width="30%"><lable id="quli1">Quali:</lable>
						<select name="quli">
							<option>--SELECT COURSE--</option>
							<option>B.Sc IT</option>
							<option>M.Sc IT</option>
							<option>M.Sc ICT</option>
						</select>
			</td>
			</tr>

		<tr>
		<td width="30%"><label>Select Hobbie(s) :</label> <br />
			<input type="checkbox" name="ch[]" value="Dancing">Dancing
			<input type="checkbox" name="ch[]" value="Reading">Reading
			<input type="checkbox" name="ch[]" value="Playing">Playing  
		<br /><br /></td>
		</tr>

		<tr>
			<td width="30%">Select image to upload:</td>
			<td>
    		<input accept="doc/docx" type="file" name="fileuploadname">
    		</td>
		</tr>

			<tr>
				<td>
				<input type="submit" name="regisubmit" value="Submit">
				</td>
			</tr>
			
			</table>
		</form>
	</fieldset>
	
</body>
</html>