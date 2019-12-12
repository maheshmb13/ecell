<!DOCTYPE HTML>
<html>
<head>
    
    <link rel="stylesheet" href="y.css">
</head> 
<?php

    if(isset($_POST['subData'])){
		require('../config.php');
        if($_POST['signin']){
            require('../form.php');
        }
        else
        require('../login.php');       
    }
    
?>   
    
    
<body>
<div class="login-wrap">
	<div class="login-html">
		<form action="" method="post" > 
		<!-- <input id="tab-1" type="radio" name="tab" class="sign-in" name="signin"><label for="tab-1" class="tab">Sign In</label> -->
		<input id="tab-2" type="radio" name="tab" class="sign-up" checked name="signup"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label" name="Name">Name</label>
					<input id="user" type="text" class="input" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Referral Code</label>
					<input id="pass" type="password" class="input" data-type="password" required name="Code">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" class="input" required name="Email">
				</div>
				<div class="group">
					<label for="pass" class="label">College</label>
					<input id="pass" type="text" class="input" required name="College">
				</div>				
				<div class="group">
					<input type="submit" class="button" value="Sign Up" name="subData">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
                    <label for="tab-1"><a href="./signup_ca.php">Register as CA?</a></label>
                </div>
			</div>
		</div>
		</form>
	</div>
</div>
    
</body>
</html>