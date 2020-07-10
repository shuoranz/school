<?php include('includes/header.php'); ?>

<!--
<section id="sub-header" >
  	<div class="container">
    
    	<div class="row">
        	<div class="col-md-12 text-center">
            	<h1>Course details</h1>
                <p class="lead">Caulie <strong>dandelion</strong> maize lentil collard greens radish arugula sweet pepper water.</p>
            </div>
        </div>
        
        <div class="row" id="sub-header-features-2">
        	<div class="col-md-6">
            	<h2>A brief summary</h2>
                <p>Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor <strong>imperdiet deterruisset</strong>, doctus volumus explicari qui ex, appareat similique an usu. Vel an hinc putant fierent, saperet legimus offendit sed ei doctus volumus explicari qui ex, appareat similique an usu. . Dolor euripidis cum eu, ea per lucilius periculis corrumpit, ut euismod omittam ancillae his.</p>
                <p><em>John - General Manager</em></p>
            </div>
            <div class="col-md-6">
            	<h2>What you will learn</h2>
                <p>Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui.</p>
                <ul class="list_ok">
                    <li><strong>Certified</strong> and expert teachers</li>
                    <li><strong>Extensive</strong> doumentation provided</li>
                    <li><strong>Money back</strong> garantee</li>
                    <li><strong>Became an exeprt</strong> in only 6 days</li>
                </ul>
           </div>
        	
        </div>
    </div>
    <div class="divider_top"></div>
</section>
-->
  
<section id="main_content">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="/">Home</a></li>
			<li><a href="/course/">Course</a></li>
			<li class="active"><?php echo $course["title"]; ?></li>
		</ol>
		<div class="row">
     		<div class="col-md-8">
				<h2><?php echo $course["title"]; ?></h2>
				<p><?php echo $course["description"]; ?></p>
                    
                <hr class="add_bottom_30">
                
				<?php foreach ($videos as $key => $video) : ?>
                <div class="media" style="cursor: pointer;" onclick="window.location='/course/video?vid=<?php echo $video["id"]; ?>';">
					<div class="circ-wrapper course_detail pull-left"><h3 style="font-size:46px;padding: 12px 0px 0 8px;"><?php echo $key+1; ?></h3></div>
                    <div class="media-body">
						<h4 class="media-heading"><?php echo $video["title"]; ?></h4>
						<p><?php echo $video["description"]; ?></p>
						<ul class="data-lessons">
							<!--
							<li class="po-markup">
								<a class="po-link" href="javascript:void(0)" ><i class="icon-clock"></i> Duration: 6 hours</a>
								<div class="po-content hidden">
									<div class="po-title"><strong>Duration: 6 hours</strong></div>
									<div class="po-body">
										<p class="no_margin">Lorem ipsum dolor sit amet, has at illum dictas definitiones, ei primis indoctum torquatos nec. Vis te velit probatus, natum atomorum tincidunt nec an.</p>
									</div>
								</div>
							</li>
							-->
							<li class="po-markup">
								<a class="po-link" href="javascript:void(0)" ><i class="icon-video"></i> Video files</a>
								<div class="po-content hidden">
									<div class="po-title"><strong>Video files</strong></div> <!-- ./po-title -->
									<div class="po-body"><ul class="list_po_body"><li><i class="icon-ok"></i> 2 Video lessons</li><li> <i class="icon-ok"></i>1 Video for practice</li><li> <i class="icon-ok"></i>1 Video Quiz</li></ul>
									</div><!-- ./po-body -->
								</div><!-- ./po-content -->
							</li>
							<li class="po-markup">
								<a class="po-link" href="javascript:void(0)" ><i class="icon-mic"></i> <?php echo $course["username"]; ?></a>
								<div class="po-content hidden">
									<div class="po-title"><strong><?php echo $course["username"]; ?></strong></div> <!-- ./po-title -->
									<div class="po-body">
									<p class="no_margin">Lorem ipsum dolor sit amet, has at illum dictas definitiones, ei primis indoctum torquatos nec. Vis te velit probatus, natum atomorum tincidunt nec an.</p>
									</div><!-- ./po-body -->
								</div><!-- ./po-content -->
							</li>
							<li>
								<a href="javascript:void(0)" ><i class=" icon-download"></i> Download prospect</a>
							</li>
						</ul>
					</div>
				</div>
				<?php endforeach; ?>
            </div><!-- End col-md-8  -->
            
            <aside class="col-md-4">
				<div class="box_style_1">
					<h4>Lessons <span class="pull-right">17</span></h4>
					<!--<h4>Hours <span class="pull-right">12</span></h4><br>-->
					<h4>Speakers</h4>
					<div class="media">
						<div class="pull-right">
							<img src="img/avatar1.jpg" class="img-circle" alt="">
						</div>
						<div class="media-body">
							<h5 class="media-heading"><a href="#">Marc Twain</a></h5>
							<p>
								Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. 
							</p>
						</div>
					</div>
					
					<div class="media">
						<div class="pull-right">
							<img src="img/avatar1.jpg" class="img-circle" alt="">
						</div>
						<div class="media-body">
							<h5 class="media-heading"><a href="#">Marc Twain</a></h5>
							<p>
								Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in.
							</p>
						</div>
					</div>
					
					<h4>Related content</h4>
					<ul class="list_1">
						  <li><a href="#">Ceteros mediocritatem</a></li>
						  <li><a href="#">Labore nostrum</a></li>
						  <li><a href="#">Primis bonorum</a></li>
						  <li><a href="#">Ceteros mediocritatem</a></li>
					</ul>
										
				</div>
			</aside> <!-- End col-md-4 -->
     	
		</div><!-- End row -->
	</div><!-- End container -->
</section>

<section id="join">
   <div class="container">
 	<div class="row">
    	<div class="col-md-8 col-md-offset-2 text-center">
        <div class="row">
        <div class="col-md-2 hidden-sm hidden-xs"><img src="/img/arrow_hand_1.png" alt="Arrow" > </div>
        <div class="col-md-8"><a href="#" class="button_big">Start learning</a> </div>
        </div>
         </div>
 </div>
  </div>
 </section>

<?php include('includes/footer.php'); ?>