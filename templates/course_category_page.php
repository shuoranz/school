<?php include('includes/header.php'); ?>
	<link href="/css/homepage.css" rel="stylesheet">
    <section class="tp-banner-container">
		<div class="tp-banner" >
			<ul class="sliderwrapper">	<!-- SLIDE  -->
				<li>
					<!-- MAIN IMAGE -->
					<img src="/sliderimages/slide_5.jpg" alt="slidebg1">
					<!-- LAYERS -->
				</li>
				
			</ul>
			<div class="tp-bannertimer"></div>
		</div>
	</section><!-- End slider -->
    
	
	
   
				
				
				
    <section id="main_content_gray">
    	<div class="container">
        	<div class="row">
				<div class="col-md-12 text-center">

					<h2>Latest Featured Courses </h2>
					<br>
					<br>
					<!--<p class="lead">Lorem ipsum dolor sit amet, ius minim gubergren ad.</p>-->
				</div>
			</div><!-- End row -->
        
			<div class="row">
				<?php $courseCategories = getAllCourseCategories(); ?>
				<?php foreach($courseCategories as $category_count => $courseCategory) : ?>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="col-item course-grid">
						<a href="/course/category/?category=<?php echo $courseCategory["id"]; ?>">
						<div class="photo">
							<div style="text-align: center;padding:5px 0;background-color:#1cbbb4;height:200px;line-height: 200px;display:table;width:100.7%;opacity: 0.85;">
								
								<h4 style="display: table-cell;vertical-align: middle;color:white;"><?php echo $courseCategory["name"]; ?></h4>
								
							</div>

							<div class="cat_row"><a href="/course/category/?category=<?php echo $courseCategory["id"]; ?>">View</a><span class="pull-right"><i class=" icon-mic"></i><?php echo $courseCategory["course_cnt"]; ?> courses</span></div>

						</div>
						</a>
						<div class="info">
							<div class="row">
								<div class="course_info col-md-12 col-sm-12">
									<p> Lorem psum dol psum dol psum dol psum dol psum dol psum dol psum dol psum dol psum dol p</p>
									<!--
									<div class="rating">
										<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>
									</div>
									<div class="price pull-right">199$</div>
									-->
								</div>
							</div>
							<!--
							<div class="separator clearfix">
								<p class="btn-add"> <a href="apply_2.html"><i class="icon-export-4"></i> Subscribe</a></p>
								<p class="btn-details"> <a href="course_details_1.html"><i class=" icon-list"></i> Details</a></p>
							</div>
							-->
						</div>
					</div>
				</div>
				<?php endforeach; ?>      
							
	   
			</div><!-- End row -->
			<!--
			<div class="row">
				<div class="col-md-12">
					 <a href="/course/" class="button_medium_outline pull-right">View all courses</a>
				</div>
			</div>
			-->
        </div>   <!-- End container -->
    </section><!-- End section gray -->
	
    <section id="main_content">
		<div class="divider_top_black"></div>
		<div class="container">
			<div class="row">
				<div class=" col-md-10 col-md-offset-1 text-center">
					<h2>Join Us</h2>
				</div>
			</div>
			<div class="row">
				
				<div class="col-md-6">
					<div class="feature">
						<i class="icon-mic"></i>
						<h3>High School Counselors</h3>
						<p>Please complete the registration form, someone will contact you shortly.</p>
						<br>
						<a href="/contact_us" class="button_medium_outline">Contact Us</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="feature">
						<i class="icon-user"></i>
						<h3>Individual students</h3>
						<p>Please reach out to your high school counselor to join us through your school. You may also contact us to share your interest, so we can invite your high school to participate in our program.</p>
						<a href="/request_demo" class="button_medium_outline">Request Demo</a>
					</div>
				</div>
			</div><!-- End row -->
        </div><!-- End container-->
    </section><!-- End main-features -->

    
    <section id="testimonials">
        <div class="container">
            <div class="row">
                <div class='col-md-offset-2 col-md-8 text-center'>
                    <h2>What they say</h2>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-offset-2 col-md-8'>
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#quote-carousel" data-slide-to="1"></li>
                            <li data-target="#quote-carousel" data-slide-to="2"></li>
                        </ol>
                        <!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner">
                            <!-- Quote 1 -->
                            <div class="item active">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-circle" src="/img/testimonial_1.jpg" alt="">
                                        </div>
                                        <div class="col-sm-9">
                                            <p>
                                                Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!
                                            </p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 2 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-circle" src="/img/testimonial_2.jpg" alt="">
                                        </div>
                                        <div class="col-sm-9">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.
                                            </p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 3 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-circle" src="/img/testimonial_1.jpg" alt="">
                                        </div>
                                        <div class="col-sm-9">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.
                                            </p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End testimonials -->
	
	
<?php include('includes/footer.php'); ?>