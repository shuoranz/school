<?php include('includes/header.php'); ?>
<section id="login_bg">
<div  class="container">
<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
		<div id="login">
			<p class="text-center">
				<img src="img/login_logo.png" alt="">
			</p>
			<h4 style="padding:13px 0;">Register</h4>
			<form method="POST" onsubmit="return validRegisterSubmit()">
				<div class="form-group">
					<input type="text" name="username" class=" form-control required"  placeholder="Username">
					<span class="input-icon"><i class=" icon-user"></i></span>
				</div>
				<div class="form-group">
					<input type="text" name="email" class=" form-control required" placeholder="Email">
					<select name="role" id="register_role" class=" form-control required">
					  <option value="" selected disabled hidden>Register as</option>
					  <option value="student">student</option>
					  <option value="teacher">teacher</option>
					</select>
					<span class="input-icon"><i class="icon-user"></i></span>
				</div>
				<div class="form-group">
					<input type="text" name="invitation_code" class=" form-control required" id="invitation_code" placeholder="Invitation code (not required)">
					<span class="input-icon"><i class=" icon-lock"></i></span>
				</div>
				<div class="row">
					<div class=" col-sm-6">
						<input type="text" name="first_name" class=" form-control required"  placeholder="First name">
					</div>
					<div class=" col-sm-6">
						<input type="text" name="last_name" class=" form-control required"  placeholder="Last name">
					</div>
				</div>
				<div class="form-group">
					<input type="text" name="password" class=" form-control required" id="password1" placeholder="Password">
					<span class="input-icon"><i class=" icon-lock"></i></span>
				</div>
				<div class="form-group">
					<input type="text" name="password2" class=" form-control required" id="password2" placeholder="Confirm password">
					<span class="input-icon"><i class=" icon-lock"></i></span>
				</div>
                <div id="pass-info" class="clearfix"></div>
				<input type="submit" name="register" class="button_fullwidth" value="Create an account">
			</form>
		</div>
	</div>
</div>
</div>
</section><!-- End register -->
<script type="text/javascript">
	function validRegisterSubmit()
	{
		var username = $('input[name ="username"]').val();
		var email = $('input[name ="email"]').val();
		var first_name = $('input[name ="first_name"]').val();
		var last_name = $('input[name ="last_name"]').val();
		var password = $('input[name ="password"]').val();
		var password2 = $('input[name ="password2"]').val();
		var role = $('select[name ="role"]').val();
		
		if(!username || !email || !first_name || !last_name || !password || !password2 || !role) {
			alert("you need to fill out all feilds");
			return false;
		}
		if (password != password2) {
			alert("password does not match");
			return false;
		}
		if ( !checkPasswordStrength(password)){
			alert("Password must have 7 to 15 characters which contain at least one numeric digit and a special character");
			return false;
		}
		if ( !validateEmail(email) ) {
			alert("invalid email, please change a new email");
			return false;
		}
		
		return true;
	}
	function validateEmail(email) {
		const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(String(email).toLowerCase());
	}
	function checkPasswordStrength(password) {
		const re = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
		return re.test(String(password));
	}
</script>
<?php include('includes/footer.php'); ?>