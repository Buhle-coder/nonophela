<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
<style>
.check{
	transform:translateY(-33px);
	padding-left:110px;
}
.label{
	padding-left:350px;
	transform:translateY(-45px)
}
body{
	position:relative;
background-image: url('./imgs/nick-morrison-FHnnjk1Yj7Y-unsplash.jpg');
height: 100vh;
background-size: right top cover;
width:100%;
opacity: 0,5;
}
</style>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<section id="sib">

	<div id="main-wrapper">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,64L48,58.7C96,53,192,43,288,64C384,85,480,139,576,149.3C672,160,768,128,864,112C960,96,1056,96,1152,106.7C1248,117,1344,139,1392,149.3L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>

	<center><h2>Nonophelo Imfundo </h2></center>
			<div class="imgcontainer">
				<img src="imgs/unnamed.jpg" alt="Avatar" class="avatar">
			</div>
		<form action="index.php" method="post">
		
			<div class="inner_container">
				<label><b>Username</b></label><br>
				<input type="text" placeholder="Enter Username" name="username" required><br><br>
				<label><b>Password</b></label><br>
				<input type="password" placeholder="Enter Password" name="password" required>
				<p>Forgot password?</p>
				<div class="stay">
				<div class="check">
				<input type="checkbox" id="Stay_signed_in" name="stay_signed_in" value="stay">
				
			</div>
			<div class="label">
			<label for="Stay signed in">Stay signed in</label>
			</div>
				
			</div>
				<button class="login_button" name="login" type="submit">Login</button>
				<a href="register.php"><button type="button" class="register_btn">Sign Up Teachers</button></a>
				<a href="register.php"><button type="button" class="register_btn">Sign Up Students</button></a>

			</div>
		</form>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,288L60,277.3C120,267,240,245,360,240C480,235,600,245,720,245.3C840,245,960,235,1080,208C1200,181,1320,139,1380,117.3L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
		<?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				$query = "select * from student_register where username='$username' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					header( "Location: homepage.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
					
					header( "Location: main_page.html");
				}
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>