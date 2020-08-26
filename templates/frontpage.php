<?php include('includes/header.php'); ?>
	<link href="/css/homepage.css" rel="stylesheet">
    <section class="tp-banner-container">
		<div class="tp-banner" >
			<ul class="sliderwrapper">	<!-- SLIDE  -->
				<li>
					<!-- MAIN IMAGE -->
					<img src="sliderimages/slide_5.jpg" alt="slidebg1">
					<!-- LAYERS -->
				</li>
				
			</ul>
			<div class="tp-bannertimer"></div>
		</div>
	</section><!-- End slider -->
    
	
	
    <section id="main-features">
    <div class="divider_top_black"></div>
    <div class="container">
        <div class="row">
            <div class=" col-md-10 col-md-offset-1 text-center">
				<h2>Why Us?</h2>
            </div>
        </div>
        <div class="row">
			<div class="col-md-3">
                <div class="feature">
                    <i class="icon-video"></i>
                    <h3>100+ Video lessons and counting</h3>
					<p></p>
                </div>
            </div>
			<div class="col-md-3">
                <div class="feature">
                    <i class="icon-trophy"></i>
                    <h3>Expert Counseling Team</h3>
					<p></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature">
                    <i class="icon-mic"></i>
                    <h3>One-Stop College Counseling</h3>
					<p></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature">
                    <i class=" icon-ok-4"></i>
                    <h3>Track progress and stimulate motivation</h3>
					<p></p>
                </div>
            </div>
        </div><!-- End row -->
        </div><!-- End container-->
    </section><!-- End main-features -->
    				<h2></h2>
                
				
                
                
	<section id="main_content">
		<div class="divider_top_black"></div>
		<div class="container">
			<!--
			<div class="row">
				<div class=" col-md-10 col-md-offset-1 text-center">
					<h2>Join Us</h2>
				</div>
			</div>
			-->
			<div class="row">
				<div class="col-md-3">
					<div class="feature feature-1">
						<img src="/img/teacher_video.svg" alt="collge counseling">
					</div>
				</div>
				<div class="col-md-9">
					<div class="feature feature-1">
						<h3>College Counseling made Easy for High School Counselors and students</h3>
						<p class="lead">
							This platform is dedicated to college success for college bound students by offering them support and coaching through a series of free videos offered by professional and certified college counselors.  The videos cover all the topics students should know about, from how to apply for college, financial aid and scholarships, to summer programs and college life.  The step by step recommendations help students and parents gain knowledge to navigate the college preparation and application process, as well as lightens the burden on high school counselors by streamlining the entire college counseling and college application process with innovative tools.
						</p>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-9">
					<div class="feature feature-1">
						<h3>Premium Videos with Extensive College Counseling Content made by Professional and Certified College Counselors</h3>
						<p class="lead">
							We are a team of College Counseling experts with extensive knowledge on the ever-evolving admissions landscape. We know what the students need, thought hard about the need, and designed a program specifically for it to include cutting-edge educational best practices to help students break down their goals and make them painlessly achievable and fun!
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="feature feature-1">
						<img src="/img/teacher_book.svg" alt="collge counseling">
					</div>
				</div>
			</div><!-- End row -->
        </div><!-- End container-->
    </section><!-- End main-features -->	
				
				
				
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
				<?php if ($category_count >= 4) break; ?>
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
									<!--<h4>Impressionist</h4>-->
									<p > Lorem ipsum dolor sit amet, no sit sonet corpora indoctum, quo ad fierent insolens. Duo aeterno ancillae ei. </p>
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
			<div class="row">
				<div class="col-md-12">
					 <a href="/course/" class="button_medium_outline pull-right">View all courses</a>
				</div>
			</div>
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
                                            <img class="img-circle" src="img/testimonial_1.jpg" alt="">
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
                                            <img class="img-circle" src="img/testimonial_2.jpg" alt="">
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
                                            <img class="img-circle" src="img/testimonial_1.jpg" alt="">
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
	
	
	
	<section id="main_content">
    	<div class="container">
        	<div class="row">
				<div class="col-md-12 text-center">
					<h2>Community </h2>
					<br>
					<br>
					<!--<p class="lead">Lorem ipsum dolor sit amet, ius minim gubergren ad.</p>-->
				</div>
			</div><!-- End row -->
        
			<div class="row">
			
				<div class="col-md-4 homepage_community">
					<div class="homepage_forum">
						<div class="head-info row homepage-news-container" style="padding-bottom:0;">
							<div style="float:left;padding:8px 0 2px 5px;">
								<b style="font-size:18px;">News</b>
							</div>
							
							<div style="float:right;padding:9px 6px 0 0">
								<a href="/news?p=1">read more</a>
							</div>
						</div>
						<?php $top_news = $all_news[0]; ?>
						<div class="title-info row homepage-news-container">
							<div class="homepage-news-cover col-sm-12">
								<a href="/news/thread/?id=<?php echo $top_news['id']; ?>"><img src="<?php echo $top_news['cover'] ?>" style="width:100%;height:100%;"></a>
								<div class="bottom-left">
									<div class="homepage_top_img_title">
										<a href="/news/thread/?id=<?php echo $top_news['id']; ?>"><?php echo $top_news['title'] ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php foreach($all_news as $news): ?>
						<div class="homepage-news-container row">
							<div class="homepage-news-cover col-sm-4">
								<a href="/news/thread/?id=<?php echo $news['id']; ?>"><img src="<?php echo $news['cover'] ?>" style="max-width:100%;max-height:60px;"></a>
							</div>
							<div class="homepage-news-body col-sm-8">
								<div class="tags-and-title">
									<div class="homepage-title-container">
										<a href="/news/thread/?id=<?php echo $news['id']; ?>" class="news-heading-link">
											<p><?php echo $news['title'] ?></p>
										</a>
									</div>
								</div>
								<div class="news-info">
									<!--
									<div class="publisher">
										<div class="avatar" style="background: url(../images/avatars/<?php echo $news['avatar']?>);
																   background-size: cover; ">
										</div>
										<?php echo $news['username']?>
									</div>
									-->
									<div class="other-info">
										<div style="float:left">
											<div style="margin-top:2px;float:left;"><i class="icon-eye"></i></div><span style="font-size:13px"><?php echo $news['view_count'] ?></span>
										</div>
										
										<div class="date-container" style="float:right;">
											<span style="font-size:13px"><?php echo date("m-d", strtotime($news["create_date"]) ); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="col-md-4 homepage_community">
					<div class="homepage_forum">
						<div class="head-info row homepage-news-container" style="padding-bottom:0;">
							<div style="float:left;padding:8px 0 2px 5px;">
								<b style="font-size:18px;">News</b>
							</div>
							
							<div style="float:right;padding:9px 6px 0 0">
								<a href="/news?p=1">read more</a>
							</div>
						</div>
						<?php $top_news = $all_news[0]; ?>
						<div class="title-info row homepage-news-container">
							<div class="homepage-news-cover col-sm-12">
								<a href="/news/thread/?id=<?php echo $top_news['id']; ?>"><img src="<?php echo $top_news['cover'] ?>" style="width:100%;height:100%;"></a>
								<div class="bottom-left">
									<div class="homepage_top_img_title">
										<a href="/news/thread/?id=<?php echo $top_news['id']; ?>"><?php echo $top_news['title'] ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php foreach($all_news as $count_news => $news): ?>
						<?php if ($count_news == 0) continue; ?>
						<div class="homepage-news-container row">
							<div class="homepage-news-cover col-sm-4">
								<a href="/news/thread/?id=<?php echo $news['id']; ?>"><img src="<?php echo $news['cover'] ?>" style="max-width:100%;max-height:60px;"></a>
							</div>
							<div class="homepage-news-body col-sm-8">
								<div class="tags-and-title">
									<div class="homepage-title-container">
										<a href="/news/thread/?id=<?php echo $news['id']; ?>" class="news-heading-link">
											<p><?php echo $news['title'] ?></p>
										</a>
									</div>
								</div>
								<div class="news-info">
									<!--
									<div class="publisher">
										<div class="avatar" style="background: url(../images/avatars/<?php echo $news['avatar']?>);
																   background-size: cover; ">
										</div>
										<?php echo $news['username']?>
									</div>
									-->
									<div class="other-info">
										<div style="float:left">
											<div style="margin-top:2px;float:left;"><i class="icon-eye"></i></div><span style="font-size:13px"><?php echo $news['view_count'] ?></span>
										</div>
										
										<div class="date-container" style="float:right;">
											<span style="font-size:13px"><?php echo date("m-d", strtotime($news["create_date"]) ); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="col-md-4 homepage_community">
					<div class="homepage_forum">
						<div class="head-info row homepage-news-container" style="padding-bottom:0;">
							<div style="float:left;padding:8px 0 2px 5px;">
								<b style="font-size:18px;">Stories</b>
							</div>
							
							<div style="float:right;padding:9px 6px 0 0">
								<a href="/news?p=1">read more</a>
							</div>
						</div>
						<?php $top_blog = $all_blog[0]; ?>
						<div class="title-info row homepage-news-container">
							<div class="homepage-news-cover col-sm-12">
								<a href="/news/thread/?id=<?php echo $top_blog['id']; ?>"><img src="<?php echo $top_blog['cover'] ?>" style="width:100%;height:100%;"></a>
								<div class="bottom-left">
									<div class="homepage_top_img_title">
										<a href="/news/thread/?id=<?php echo $top_blog['id']; ?>"><?php echo $top_blog['title'] ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php foreach($all_blog as $count_blog => $blog): ?>
						<?php if ($count_blog == 0) continue; ?>
						<div class="homepage-news-container row">
							<div class="homepage-news-cover col-sm-4">
								<a href="/news/thread/?id=<?php echo $blog['id']; ?>"><img src="<?php echo $blog['cover'] ?>" style="max-width:100%;max-height:60px;"></a>
							</div>
							<div class="homepage-news-body col-sm-8">
								<div class="tags-and-title">
									<div class="homepage-title-container">
										<a href="/news/thread/?id=<?php echo $blog['id']; ?>" class="news-heading-link">
											<p><?php echo $blog['title'] ?></p>
										</a>
									</div>
								</div>
								<div class="news-info">
									<!--
									<div class="publisher">
										<div class="avatar" style="background: url(../images/avatars/<?php echo $blog['avatar']?>);
																   background-size: cover; ">
										</div>
										<?php echo $blog['username']?>
									</div>
									-->
									<div class="other-info">
										<div style="float:left">
											<div style="margin-top:2px;float:left;"><i class="icon-eye"></i></div><span style="font-size:13px"><?php echo $blog['view_count'] ?></span>
										</div>
										
										<div class="date-container" style="float:right;">
											<span style="font-size:13px"><?php echo date("m-d", strtotime($blog["create_date"]) ); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div><!-- End row -->
        </div>   <!-- End container -->
    </section><!-- End section gray -->
	
	<!--
	<section id="testimonials_2">
        <div class="container">
            <div class="row">
                <div class='col-md-offset-2 col-md-8 text-center'>
                    <h2 style="font-size:40px;">Participating High Schools</h2>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-offset-2 col-md-8'>
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#quote-carousel" data-slide-to="1"></li>
                            <li data-target="#quote-carousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-circle" src="img/testimonial_1.jpg" alt="">
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
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-circle" src="img/testimonial_2.jpg" alt="">
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
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-circle" src="img/testimonial_1.jpg" alt="">
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
    </section>
	-->

<?php include('includes/footer.php'); ?>