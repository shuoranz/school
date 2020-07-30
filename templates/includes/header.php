<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<html lang="en">

<head>
  	<meta charset="utf-8">
    <title>Courses, Education Website</title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- Favicons-->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" type="image/x-icon" href="/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="/img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Raleway:400,500,600,700,800" rel="stylesheet">
    
	<!-- REVOLUTION BANNER CSS SETTINGS -->
	<link href="rs-plugin/css/settings.css" media="screen" rel="stylesheet">
	
    <!-- CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/superfish.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/fontello/css/fontello.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
	 <!-- color scheme css -->
    <link href="/css/color_scheme.css" rel="stylesheet">
    
	<!-- JQUERY -->
	<script src="/js/jquery-2.2.4.min.js"></script>

	<!-- OTHER JS --> 
	<script src="/js/superfish.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/retina.min.js"></script>
	<script src="/assets/validate.js"></script>
	<script src="/js/jquery.placeholder.js"></script>
	
	<script src="/js/classie.js"></script>
	<script src="/js/uisearch.js"></script>

	
    <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <header>
  	<div class="container">
	<div class="row">
		<div class="col-md-3 col-sm-3 col-xs-3">
			<a href="/" id="logo">SPEC</a>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-9">
			<div class=" pull-right">
				<?php if(!isLoggedIn()) : ?>
				<a href="/login" class="button_top" id="login_top">Sign in</a>
				<?php endif; ?>
				<!--<a href="/apply_2.html" class="button_top hidden-xs" id="apply">Apply now</a>-->
			</div>
            <ul id="top_nav" class="hidden-xs">
				<!--
                <li><a href="/about_us.html">About</a></li>
                <li><a href="/apply.html">Wizard Apply</a></li>
				-->
				
				<?php if(isLoggedIn()) : ?>
				<li><a>Welcome <?php echo getUser()['username']; ?>!</a></li>
				<?php if(isTeacherOrAbove()) : ?>
				<li><a href="/dashboard">Dashboard</a></li>
				<?php endif; ?>
				<li><a id="top_a_tag" href="/logout">Logout</a></li>
				<?php else : ?>
                <li><a id="top_a_tag" href="/register">Register</a></li>
				<?php endif; ?>
            </ul>
		</div>
	</div>
</div>
</header><!-- End header -->

<nav>
<div class="container" style="position: relative">
	<div class="row">
		<div class="col-md-12">
			<div id="mobnav-btn"></div>
			<ul class="sf-menu">
				<li class="normal_drop_down">
					<a href="/">Home</a>
				</li>
				<li class="normal_drop_down">
					<a href="/course/">Online Courses</a>
					<div class="mobnav-subarrow"></div>
					<ul>
						<?php 
						$courseCategories = getAllCourseCategories();
						foreach($courseCategories as $courseCategory) : ?>
						<li><a href="/course/?category=<?php echo $courseCategory["id"]; ?>"><?php echo $courseCategory["name"]; ?></a></li>
						<?php endforeach ?>
						<!--
						<li><a href="/course/?id=1">Mathematic</a></li>
						<li><a href="/course/?id=2">Literature</a></li>
						<li><a href="/course/?id=3">Physics</a></li>
						<li><a href="/course/?id=4">Chemistry</a></li>
						<li><a href="/course/?id=5">SAT Preparation</a></li>
						-->
					</ul>
				</li>
				<li class="normal_drop_down">
					<a href="/team/">Counseling Team</a>
				</li>
				<li class="normal_drop_down">
					<a href="/forum/">Forum</a>
				</li>
				<!--
				<li class="normal_drop_down">
					<a href="/program/">Program Intro</a>
				</li>
				-->
				<li class="normal_drop_down">
					<a href="/news/?p=1">News</a>
					<div class="mobnav-subarrow"></div>
					<ul>
						<li><a href="/blog/?p=1">Blog</a></li>
					</ul>
				</li>
				<li class="normal_drop_down">
					<a href="/about_us/">About Us</a>
					<div class="mobnav-subarrow"></div>
					<ul>
						<li><a href="/join_us/">Join Us</a></li>
					</ul>
				</li>
			</ul>
            
            <div class="col-md-3 pull-right hidden-sm hidden-xs">
                    <div id="sb-search" class="sb-search">
						<form>
							<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"></span>
						</form>
					</div>
              </div><!-- End search -->
              
		</div>
	</div><!-- End row -->
	<div class="container" id="message" style="display:none;">
		<?php displayMessage(); ?>
	</div>
</div><!-- End container -->
</nav>
<script src="/js/messageAnimation.js"></script>
<script src="/js/functions.js"></script>

