<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
	
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<link rel="stylesheet" href="css/style copy.css">
<style>
	body{
	position:relative;
background-image: url('./imgs/nick-morrison-FHnnjk1Yj7Y-unsplash.jpg');
height: 100vh;
background-size: right top cover;
width:100%;
opacity: 0,5;
}
</style>
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<div class="wave-container">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,64L48,58.7C96,53,192,43,288,64C384,85,480,139,576,149.3C672,160,768,128,864,112C960,96,1056,96,1152,106.7C1248,117,1344,139,1392,149.3L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>

		<center><h2>Nonophela Imfundo</h2></center>
		<form action="register.php" method="post">
			<div class="imgcontainer">
				<img src="imgs/unnamed.jpg" alt="Avatar" class="avatar">
	
			</div>
			</div>
			<div class="inner_container">
		
				<input type="text" placeholder="First_Name" name="firstname" required>
		
				<input type="text" placeholder="Last_Name" name="lastname" required>
			<br>
			<br>
			<select name="Gender" id="gender">
			<option value="" disabled selected hidden>Gender</option>
				<option value="Female">Female</option>
				<option value="Male">Male</option>
			</select><br><br>
				<input type="text" placeholder="Identity_Number" name="id.no" required>
				<input type="text" placeholder="Phone_Number" name="phone_number" required>
				<br>
				<br>
				<input type="text" placeholder="School_Name" name="school_name" required><br>
			    <br>
				
				<select name="Grade" id="grade">
				<option value="" disabled selected hidden>Grade</option>
				<option value="Gr1">Gr1</option>
				<option value="Gr2">Gr2</option>
				<option value="Gr3">Gr3</option>
				<option value="Gr4">Gr4</option>
				<option value="Gr5">Gr5</option>
				<option value="Gr6">Gr6</option>
				<option value="Gr7">Gr7</option>
				<option value="Gr8">Gr8</option>
				<option value="Gr9">Gr9</option>
				<option value="Gr10">Gr10</option>
				<option value="Gr11">Gr11</option>
				<option value="Gr12">Gr12</option>
</select>
<br>
<br>

<input type="text" placeholder="User_Name" name="user" required>
<br>
<br>
<input type="password" placeholder="Password" name="password" required>
<input type="password" placeholder="Comfirm Password" name="comfirm_password" required>
<br>
<br>
<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
<a href="index.php"><button type="button" class="back_btn"> Back to Login</button></a>
			</div>
		</form>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,288L60,277.3C120,267,240,245,360,240C480,235,600,245,720,245.3C840,245,960,235,1080,208C1200,181,1320,139,1380,117.3L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
		<?php
			if(isset($_POST['register']))
			{
				
				
				@$firstname = $_POST['firstname'];
				@$lastname = $_POST['lastname'];
				@$gender = $_POST['Gender'];
				@$id=$_POST['id.no'];
				@$phone_number=$_POST['phone_number'];
				@$school_name=$_POST['school_name'];
				@$grade=$_POST['Grade'];
			
				@$username=$_POST['user'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['connfirm_password'];
				
				if($password==$cpassword)
				{
					$query = "select * from student where AND student='yes'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into student values('$username','$password')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								header( "Location: homepage.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
	</div>
</body>
</html>