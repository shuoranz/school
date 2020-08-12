<?php include('includes/header.php'); ?>
	<link href="/src_course_category/site-common-libs.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--
	<link id="u-theme-google-font" rel="stylesheet" href="/src_course_category/css">
	<link id="u-page-google-font" rel="stylesheet" href="/src_course_category/css(1)">
	-->
	<link rel="stylesheet" href="/src_course_category/nicepage.css" media="screen">
	<link rel="stylesheet" href="/src_course_category/course_category.css">
	<style>
		#main, .footer > .row {
			margin-left: 0;
			margin-right: 0;
		}

		.navbar {
			margin-bottom: 0;
		}

		.navbar a, .navbar ul {
			margin: 0;
		}
		.footer ul {
			margin: 0 0 10px 0;
		}
		ul:not(.u-unstyled) {
			margin-top: 0;
			margin-bottom: 0;
		}
		ul:not(.u-unstyled) li {
			margin-bottom: 0;
		}
	</style>
		<div class="wrap wrap-fluid">
            <section id="main" class="container-fluid">
				<div class="u-body">
         
					<section class="skrollable u-clearfix u-image u-parallax u-video-contain u-section-1 lazyloaded skrollable-between" id="sec-bc44" style="background-image: url(&quot;/src_course_category/bg2.jpg&quot;); background-attachment: fixed; background-position: 50% 0.367439vh;" data-bottom-top="background-position: 50% 10vh;" data-top-bottom="background-position: 50% -10vh;">
					  <div class="u-clearfix u-sheet u-sheet-1">
						<div class="u-align-left-lg u-align-left-md u-align-left-xl u-align-left-xs u-gradient u-shape u-shape-rectangle u-shape-1"></div>
						<div class="u-align-left u-container-style u-custom-color-3 u-expanded-width-sm u-expanded-width-xs u-group u-opacity u-opacity-95 u-group-1">
						  <div class="u-container-layout u-container-layout-1">
							<img alt="" class="u-image u-image-contain u-image-default u-image-1 lazyloaded" src="/src_course_category/bars2.png">
							<h3 class="u-custom-font u-font-roboto u-text u-text-grey-10 u-text-1">Ultimate Online Courses & Consulting</h3>
							<h1 class="u-text u-text-body-alt-color u-title u-text-2">View our stunning<br>Online Course Videos
							</h1>
							<p class="u-custom-font u-font-roboto u-text u-text-grey-10 u-text-3">Free Course Demo Trail, No cost in first 7 days<br><b>Joomla,&nbsp;</b><b>SAT, Conseslor, Essay, College Application Courses Online</b>
							</p>
							<a href="/request_demo" class="u-border-radius-4 u-btn u-btn-round u-button-style u-palette-1-base u-btn-1">Free Trail</a>
						  </div>
						</div>

						<?php 
							$courseCategories = getAllCourseCategories();
						?>
						<?php foreach($courseCategories as $category_count => $courseCategory) : ?>
						<?php if ($category_count % 5 == 0): ?>
						<div class="u-clearfix u-expanded-width-lg u-expanded-width-md u-gutter-10 u-layout-wrap u-layout-wrap-1">
						  <div class="u-gutter-0 u-layout">
							<div class="u-layout-row">
						<?php endif; ?>
							  <div class="u-align-center-md u-align-center-sm u-align-center-xs u-container-style u-custom-color-4 u-layout-cell u-left-cell u-opacity u-opacity-80 u-size-12 u-size-20-md win-app u-layout-cell-1">
								
								<div class="u-container-layout u-valign-middle u-container-layout-2">
									<a href="/course/category/?category=<?php echo $courseCategory["id"]; ?>">
										<p class="u-align-center-lg u-align-center-xl u-custom-font u-font-roboto u-text u-text-body-alt-color u-text-4" style="font-size:20px;"><?php echo $courseCategory["name"]; ?> »
										</p>
									</a>
								</div>

							  </div>
							  <!--
							  <div class="mac-app u-align-center u-container-style u-custom-color-4 u-layout-cell u-opacity u-opacity-80 u-size-12 u-size-20-md u-layout-cell-2" data-href="/download-mac#">
								<div class="u-container-layout u-valign-middle">
								  <p class="u-custom-font u-font-roboto u-text u-text-body-alt-color u-text-5">Download Mac OS App »<br>
								  </p>
								</div>
							  </div>
							  <div class="u-align-center u-container-style u-custom-color-4 u-layout-cell u-opacity u-opacity-80 u-size-12 u-size-20-md wp-plugin u-layout-cell-3" data-href="/download-wordpress#">
								<div class="u-container-layout u-valign-middle">
								  <p class="u-custom-font u-font-roboto u-text u-text-body-alt-color u-text-6">Get<br>WordPress Plugin »<br>
								  </p>
								</div>
							  </div>
							  <div class="joomla-plugin u-align-center u-container-style u-custom-color-4 u-layout-cell u-opacity u-opacity-80 u-size-12 u-size-30-md u-layout-cell-4" data-href="/download-joomla#">
								<div class="u-container-layout u-valign-middle u-container-layout-5">
								  <p class="u-custom-font u-font-roboto u-text u-text-body-alt-color u-text-7">Get<br>Joomla Extension »<br>
								  </p>
								</div>
							  </div>
							  <div class="start-editor u-align-center u-container-style u-custom-color-4 u-layout-cell u-opacity u-opacity-80 u-right-cell u-size-12 u-size-30-md u-layout-cell-5" data-href="/Editor/Siteboard/#/dashboard">
								<div class="u-container-layout u-valign-middle u-container-layout-6">
								  <p class="u-custom-font u-font-roboto u-text u-text-body-alt-color u-text-8">Start<br> Online »<br>
								  </p>
								</div>
							  </div>
							  -->
						<?php if ($category_count % 5 == 4): ?>
							</div>
						  </div>
						</div>
						
						<br><br><br><br>
						<?php endif; ?>
						<?php endforeach; ?>
						<!--
						<div class="u-align-center-lg u-align-center-md u-align-center-xl u-container-style u-group u-hidden-sm u-hidden-xs u-image u-opacity u-opacity-95 u-image-2 lazyloaded" data-image-width="200" data-image-height="200" title="What Is It And What Makes It So Different" style="background-image: url(&quot;/src_course_category/boxblue.png&quot;);">
						  <div class="u-container-layout u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-valign-top-xs u-container-layout-7">
							<h2 class="u-align-center-sm u-align-center-xs u-subtitle u-text u-text-body-alt-color u-text-9">99</h2>
							<div class="u-palette-1-base u-shape u-shape-circle u-shape-2"></div>
							<h5 class="u-align-center-sm u-align-center-xs u-text u-text-body-alt-color u-text-10">Courses</h5>
						  </div>
						</div>
						-->
					  </div>
					</section>
					<br><br><br>

					<section class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-clearfix u-custom-color-3 u-section-7" id="sec-f1aa">
					  <div class="u-clearfix u-sheet u-sheet-1">
						<div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
						  <div class="u-gutter-0 u-layout">
							<div class="u-layout-row">
							  <div class="u-container-style u-expand-resize u-layout-cell u-left-cell u-size-20 u-layout-cell-1">
								<div class="u-container-layout u-container-layout-1">
								  <img class="u-absolute-hcenter-xs u-expanded-width u-image u-image-1 lazyloaded" alt="Testimonial" src="/src_course_category/testimonialresult.jpg">
								</div>
							  </div>
							  <div class="u-container-style u-layout-cell u-size-20 u-layout-cell-2">
								<div class="u-container-layout u-valign-top-sm u-container-layout-2">
								  <span class="u-icon u-icon-circle u-icon-1">
									<svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 95.333 95.332"><use xlink:href="#svg-1da3"></use></svg>
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-1da3" x="0px" y="0px" viewBox="0 0 95.333 95.332" style="enable-background:new 0 0 95.333 95.332;" xml:space="preserve" class="u-svg-content"><g><g><path d="M30.512,43.939c-2.348-0.676-4.696-1.019-6.98-1.019c-3.527,0-6.47,0.806-8.752,1.793    c2.2-8.054,7.485-21.951,18.013-23.516c0.975-0.145,1.774-0.85,2.04-1.799l2.301-8.23c0.194-0.696,0.079-1.441-0.318-2.045    s-1.035-1.007-1.75-1.105c-0.777-0.106-1.569-0.16-2.354-0.16c-12.637,0-25.152,13.19-30.433,32.076    c-3.1,11.08-4.009,27.738,3.627,38.223c4.273,5.867,10.507,9,18.529,9.313c0.033,0.001,0.065,0.002,0.098,0.002    c9.898,0,18.675-6.666,21.345-16.209c1.595-5.705,0.874-11.688-2.032-16.851C40.971,49.307,36.236,45.586,30.512,43.939z"></path><path d="M92.471,54.413c-2.875-5.106-7.61-8.827-13.334-10.474c-2.348-0.676-4.696-1.019-6.979-1.019    c-3.527,0-6.471,0.806-8.753,1.793c2.2-8.054,7.485-21.951,18.014-23.516c0.975-0.145,1.773-0.85,2.04-1.799l2.301-8.23    c0.194-0.696,0.079-1.441-0.318-2.045c-0.396-0.604-1.034-1.007-1.75-1.105c-0.776-0.106-1.568-0.16-2.354-0.16    c-12.637,0-25.152,13.19-30.434,32.076c-3.099,11.08-4.008,27.738,3.629,38.225c4.272,5.866,10.507,9,18.528,9.312    c0.033,0.001,0.065,0.002,0.099,0.002c9.897,0,18.675-6.666,21.345-16.209C96.098,65.559,95.376,59.575,92.471,54.413z"></path>
				</g>
				</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
								  </span>
								  <p class="u-large-text u-text u-text-variant u-text-1">the online courses are very very very very good good good</p>
								  <h4 class="u-text u-text-2">Davide Wang</h4>
								  <p class="u-text u-text-3">Junior Student</p>
								</div>
							  </div>
							  <div class="u-container-style u-layout-cell u-right-cell u-size-20 u-layout-cell-3">
								<div class="u-container-layout u-valign-top-md u-container-layout-3">
								  <img alt="" class="u-image u-image-contain u-image-default u-image-2 animated lazyloaded fadeOutUp" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down" style="will-change: transform, opacity; animation-duration: 1000ms;" src="/src_course_category/b2.png">
								  <h2 class="u-text u-text-4">More happy customers</h2>
								  <p class="u-text u-text-5">Create free trail account to join us</p>
								</div>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					</section>
					<section class="u-clearfix u-white u-section-8" id="carousel_dc69">
					  <div class="u-clearfix u-sheet u-sheet-1">
						<div class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-xl u-group u-group-1">
						  <div class="u-container-layout u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-container-layout-1">
							<h2 class="u-align-center u-text u-text-1">Schools That Use Our Products:</h2>
						  </div>
						</div>
						<img alt="" class="u-image u-image-contain u-image-default u-image-1 animated lazyloaded fadeOutDown" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Up" data-image-width="350" data-image-height="210" style="will-change: transform, opacity; animation-duration: 1000ms;" src="/src_course_category/bars12.png">
						<div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
						  <div class="u-gutter-0 u-layout">
							<div class="u-layout-row">
							  <div class="u-align-center u-container-style u-layout-cell u-left-cell u-size-15 u-size-30-md u-layout-cell-1">
								<div class="u-container-layout u-valign-middle" src="">
								  <img class="u-expanded-width u-image u-image-contain u-image-2 lazyloaded" alt="amazon logo" src="/src_course_category/amazon.jpg">
								</div>
							  </div>
							  <div class="u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-2">
								<div class="u-container-layout u-valign-middle" src="">
								  <img class="u-expanded-width u-image u-image-contain u-image-3 lazyloaded" alt="microsoft logo" src="/src_course_category/microsoft.jpg">
								</div>
							  </div>
							  <div class="u-align-center u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-3">
								<div class="u-container-layout u-valign-middle" src="">
								  <img class="u-expanded-width u-image u-image-contain u-image-4 lazyloaded" alt="camcast logo" src="/src_course_category/comcast.jpg">
								</div>
							  </div>
							  <div class="u-align-center u-container-style u-layout-cell u-right-cell u-size-15 u-size-30-md u-layout-cell-4">
								<div class="u-container-layout u-valign-middle" src="">
								  <img class="u-expanded-width u-image u-image-contain u-image-5 lazyloaded" alt="" src="/src_course_category/expedia.jpg">
								</div>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					</section>
					<section class="u-clearfix u-grey-5 u-section-9" id="carousel_9c6e">
					  <div class="u-clearfix u-sheet u-sheet-1">
						<img alt="" class="u-image u-image-contain u-image-default u-image-1 animated lazyloaded fadeOutUp" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down" data-image-width="350" data-image-height="210" style="will-change: transform, opacity; animation-duration: 1000ms;" src="/src_course_category/bars2.png">
						<div class="u-align-center u-container-style u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-group-1">
						  <div class="u-container-layout u-valign-middle u-container-layout-1">
							<h3 class="u-text u-text-1">Free to Trail the Courses</h3>
							<p class="u-text u-text-2">Apply the Free Trail Account, watch hundreds of course videos!</p>
							<a href="/request_demo" class="u-border-radius-4 u-btn u-btn-round u-button-style u-palette-1-base u-btn-1">Apply Trail Now</a>
						  </div>
						</div>
					  </div>
					</section>

					<section class="u-clearfix u-section-10" id="sec-546a">
					  <div class="u-clearfix u-sheet u-sheet-1">
						<div class="u-container-style u-group u-group-1">
						  <div class="u-container-layout u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-valign-middle-xs">
							<h3 class="u-text u-text-1"></h3>
						  </div>
						</div>
					  </div>
					</section>

    
  
				</div>
            </section>
        </div>

<?php include('includes/footer.php'); ?>