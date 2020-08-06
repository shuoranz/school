<?php include('includes/header.php'); ?>
<section id="login_bg">
<div  class="container">
<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
		<div id="login">
			<p class="text-center">
				<img src="/img/login_logo.png" alt="">
			</p>
			<?php if(isset($token)): ?>
			<h4 style="padding:13px 0;">Reset Password</h4>
			<form action="/reset_password" method="POST" onsubmit="return validResetSubmit();">
				<div class="form-group">
					<input type="text" name="emailaddress" class=" form-control " placeholder="Email Address">
					<span class="input-icon"><i class=" icon-email"></i></span>
				</div>
				<div class="form-group" style="margin-bottom:5px;">
					<input type="password" name="password" class=" form-control" placeholder="Password" style="margin-bottom:5px;">
					<span class="input-icon"><i class="icon-lock"></i></span>
				</div>
				<div class="form-group" style="margin-bottom:5px;">
					<input type="password" name="password2" class=" form-control" placeholder="Re-enter Password" style="margin-bottom:5px;">
					<span class="input-icon"><i class="icon-lock"></i></span>
				</div>
				<input type="hidden" name="token" value="<?php echo $token; ?>">
				<input type="submit" class="button_fullwidth" name="do_reset_password" value="reset" />
			</form>
			<?php else: ?>
			
				<p><?php echo $error_msg;?></p>
				
			<?php endif; ?>
		</div>
	</div>
</div>
</div>
</section> <!-- End login -->
<script "text/javascript">
	function validResetSubmit()
	{
		var email = $('input[name ="email"]').val();
		var password = $('input[name ="password"]').val();
		var password2 = $('input[name ="password2"]').val();
		
		if(!email || !password || !password2) {
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