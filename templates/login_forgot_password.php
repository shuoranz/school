<?php include('includes/header.php'); ?>
<section id="login_bg">
<div  class="container">
<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
		<div id="login">
			<p class="text-center">
				<img src="/img/login_logo.png" alt="">
			</p>
			<h4 style="padding:13px 0;">Forgot Password</h4>
			<form action="/forgot_password" method="POST">
				<div class="form-group">
					<input type="text" name="emailaddress" class=" form-control " placeholder="Email Address">
					<span class="input-icon"><i class=" icon-email"></i></span>
				</div>
				<!--
				<div class="form-group" style="margin-bottom:5px;">
					<input type="password" name="password" class=" form-control" placeholder="Password" style="margin-bottom:5px;">
					<span class="input-icon"><i class="icon-lock"></i></span>
				</div>
				-->
				<input type="submit" class="button_fullwidth" name="do_forgot_password" />
				<!--
				<p class="small">
					<a href="#">Forgot Password?</a>
				</p>
				<input type="submit" class="button_fullwidth" name="do_login" />
				<a href="/register " class="button_fullwidth-2">Register</a>
				-->
			</form>
		</div>
	</div>
</div>
</div>
</section> <!-- End login -->

<?php include('includes/footer.php'); ?>