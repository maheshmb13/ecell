<!DOCTYPE HTML>
<html>
<head>
    
    <link rel="stylesheet" href="y.css">
</head> 
<?php

    if(isset($_POST['subData'])){
		require('../config.php');
		echo "hi".$_POST['subData']." kk";

        if($_POST['subData']==="Sign Up"){
			echo $_POST['Name']." --- ".$_POST['CPassword'];
            if($_POST['Password']===$_POST['CPassword']){
				echo $_POST['Password']." --- ".$_POST['CPassword'];
				//require('./config.php');
				$name=$_POST['Name'];
				echo $_POST['Password']." --- ".$_POST['CPassword'];
				$college=$_POST['College'];
				//echo $_POST['Password']." --- ".$_POST['CPassword'];
				$email=$_POST['Email'];				
				$code=$_POST['Password'];
				// echo $_POST['Password']." --- ".$_POST['CPassword'];
				//echo "hi";
				$hash = md5(md5($code));
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
				$randomString = ''; 
				for ($i = 0; $i<6; $i++) { 
					$index = rand(0, strlen($characters) - 1); 
					$randomString .= $characters[$index]; 
				}
				$sql ="INSERT INTO ambassador (`id`,`name`,`college`, `webmail`,`password`,`hash`,`refcode`) VALUES ('$name','$name', '$college', '$email', '$code','$hash','$randomString')" ;
				//$sql1 ="INSERT INTO users (`name`,`college`, `webmail`,`code`) VALUES ('$name', '$college', '$email', '$randomString')" ;
				//echo $sql;
				$res=$mysqli->query($sql);
				if(! $res){
					echo $mysqli->error;
					// echo query($sql);
				}
				else{
					echo  "succesful";
					$message="Thank you for applying with us as cammpus ambassador. Please click here to activate your account http://localhost/ecell/verfication.php?hash=".$hash."&email=".$email.". Invite more of your friends to win exciting goodies from e-club iitp";
					require('../mail.php');
				}
			}
			else
			echo "password and confirm password do not match";
        }
        else{
			//require('./config.php');
			$email=$_POST['UserEmail'];
			$password=$_POST['PassCode'];
			$sql="SELECT * FROM ambassador WHERE webmail= '".$email."'";
			$res=$mysqli->query($sql);
			if($res->num_rows > 0){
				$row = $res->fetch_assoc();
				if($row['password']==$password){
					echo "meow";
					session_start();
					echo "there";
					$_SESSION['login_user']=$email;
					header("Location: /ecell/profile.php");
					echo "bal";
					echo $_SESSION['login_user'];
				}
				else{
					echo "password is incorrect";
				}
			}
			else{
				echo $mysqli->error;
				echo "Given user does not exist";
			}
		}       
    }
    
?>   
    
    
<body>
<div class="login-wrap">
	<div class="login-html">
		<form action="" method="post" > 
		<input id="tab-1" type="radio" name="tab" class="sign-in" name="sign" value ="in"><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up" name="sign" checked value="up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">E-Mail</label>
					<input id="user" type="email" class="input" name="UserEmail">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name= "PassCode">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In" name="subData">
				</div>
				<div class="hr"></div>
			</div>
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Name</label>
					<input id="user" type="text" class="input" name="Name">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="Password">
				</div>
				<div class="group">
					<label for="cpass" class="label">Confirm Password</label>
					<input id="cpass" type="password" class="input" data-type="password" name="CPassword">
				</div>
				<div class="group">
					<label for="email" class="label">Email Address</label>
					<input id="email" type="text" class="input" name="Email">
				</div>
				<div class="group">
					<label for="college" class="label">College</label>
					<input id="college" type="text" class="input" name="College">
				</div>				
				<div class="group">
					<input type="submit" class="button" value="Sign Up" name="subData">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
                    <label for="tab-1">Register as CA</label>
                </div>
			</div>
		</div>
		</form>
	</div>
</div>
    
</body>
</html>