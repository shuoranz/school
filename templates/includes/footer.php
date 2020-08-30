<footer>
<!--
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3>Subscribe to our Newsletter for latest news.</h3>
			<div id="message-newsletter">
			</div>
			<form method="post" action="assets/newsletter.php" name="newsletter" id="newsletter" class="form-inline">
				<input name="email_newsletter" id="email_newsletter" type="email" value="" placeholder="Your Email" class="form-control">
				<button id="submit-newsletter" class="button_outline"> Subscribe</button>
			</form>
		</div>
	</div>
</div>
-->


<div class="container" id="nav-footer">
	<div class="row text-left">
		<div class="col-md-3 col-sm-3">
			<h4>Courses</h4>
			<ul>
				<?php $courseCategories = getAllCourseCategories(); ?>
				<?php foreach($courseCategories as $category_count => $courseCategory) : ?>
				<li><a href="/course/category/?category=<?php echo $courseCategory["id"]."&p=1"; ?>"><?php echo $courseCategory["name"]; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div><!-- End col-md-4 -->
		<div class="col-md-3 col-sm-3">
			<h4>Community</h4>
			<ul>
				<li><a href="/forum?p=1">Forum</a></li>
				<li><a href="/news?p=1">News</a></li>
				<li><a href="/blog?p=1">Stories</a></li>
			</ul>
		</div><!-- End col-md-4 -->
		<div class="col-md-3 col-sm-3">
			<h4>About Us</h4>
			<ul>
				<li><a href="/about_us">Who We Are</a></li>
				<li><a href="/join_us">Join Us</a></li>
				<li><a href="/contact_us">Contact Us</a></li>
			</ul>
		</div><!-- End col-md-4 -->
		<div class="col-md-3 col-sm-3">
			<ul id="follow_us">
				<li><a href="#"><i class="icon-facebook"></i></a></li>
				<li><a href="#"><i class="icon-twitter"></i></a></li>
				<li><a href="#"><i class=" icon-google"></i></a></li>
			</ul>
			<ul>
				<li><strong class="phone">+0034 43244 44</strong><br><small>Mon - Fri / 9.00AM - 06.00PM</small></li>
				<li>Questions? <a href="#">questions@domain.com</a></li>
			</ul>
		</div><!-- End col-md-4 -->
	</div><!-- End row -->
</div>
<div id="copy_right">© 2020</div>
</footer>

<div id="toTop">Back to top</div>

	<script>new UISearch( document.getElementById( 'sb-search' ) );</script>
	<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
	<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript">

		var revapi;

		jQuery(document).ready(function() {

			   revapi = jQuery('.tp-banner').revolution(
				{
					delay:9000,
					startwidth:1700,
					startheight:600,
					hideThumbs:true,
					navigationType:"none",
					fullWidth:"on",
					forceFullWidth:"on"
				});

		});	//ready

	</script>
  </body>
</html>