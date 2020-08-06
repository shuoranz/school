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
			<form action="/reset_password" method="POST">
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

<?php include('includes/footer.php'); ?>