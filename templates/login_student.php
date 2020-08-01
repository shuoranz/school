<?php include('includes/header.php'); ?>
<section id="login_bg">
<div  class="container">
<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
		<div id="login">
			<p class="text-center">
				<img src="img/login_logo.png" alt="">
			</p>
			<h4 style="padding:13px 0;">Login</h4>
			<?php
				$returnFormUrl = isset($_GET['url']) ? $_GET['url'] : "";
				if($returnFormUrl != "") {
					$returnFormUrl = "?url=".$returnFormUrl;
				}
			?>
			<form action="/login<?php echo $returnFormUrl; ?>" method="POST">
			<!--
            <div class="row">
				<div class="col-md-6 col-sm-6 login_social">
					<a href="#" class="btn btn-primary btn-block"><i class="icon-facebook"></i> Facebook</a>
				</div>
				<div class="col-md-6 col-sm-6 login_social">
					<a href="#" class="btn btn-info btn-block "><i class="icon-twitter"></i>Twitter</a>
				</div>
			</div>
			-->
				
				<!--
				<hr class="hr-or"><span class="span-or">or</span></div>
				-->
				<div class="form-group">
					<input type="text" name="emailaddress" class=" form-control " placeholder="Email Address">
					<span class="input-icon"><i class=" icon-user"></i></span>
				</div>
				<div class="form-group" style="margin-bottom:5px;">
					<input type="password" name="password" class=" form-control" placeholder="Password" style="margin-bottom:5px;">
					<span class="input-icon"><i class="icon-lock"></i></span>
				</div>
				
				<p class="small">
					<a href="#">Forgot Password?</a>
				</p>
				<input type="submit" class="button_fullwidth" name="do_login" />
				<a href="/register " class="button_fullwidth-2">Register</a>
			</form>
		</div>
	</div>
</div>
</div>
</section> <!-- End login -->

<?php include('includes/footer.php'); ?>