<?php include('includes/header.php'); ?>
<style>
	.course_list_a {
		color:black;
	}
	.course_list_a:hover {
		color:#488dc6;
	}
</style>
	<!--
    <section id="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1>Inside Learn</h1>
                <p class="lead boxed ">Ex utamur fierent tacimates duis choro an</p>
                <p class="lead">
                    Lorem ipsum dolor sit amet, ius minim gubergren ad. At mei sumo sonet audiam, ad mutat elitr platonem vix. Ne nisl idque fierent vix. 
                </p>
            </div>
        </div>
    </div>
    <div class="divider_top"></div>
    </section>
    -->
    
    <section id="main_content" >
    	<div class="container">
        
        <ol class="breadcrumb">
			<li><a href="/">Home</a></li>
			<li class="active">Course</li>
		</ol>
        
        <div class="row">
        
			<aside class="col-lg-3 col-md-4 col-sm-4">
				<div class="box_style_1">
					<h4>Categories</h4>
					<ul class="submenu-col">
						<li><a href="#" id="active">All Courses</a></li>
						<li><a href="course_details_1.html">Biology (02)</a></li>
						<li><a href="course_details_1.html">Business (08)</a></li>
						<li><a href="course_details_1.html">Communication (05) <img src="/img/new.png" alt="New" class="hidden-"></a></li>
						<li><a href="course_details_1.html">Computing (08) </a></li>
						<li><a href="course_details_1.html">Counseling (04)</a></li>
						<li><a href="course_details_1.html">Education (06)</a></li>
						<li><a href="course_details_1.html">Engineering (08)</a></li>
					</ul>
					
					<hr>
					
					<!--
					<h5>Upcoming Courses</h5>
					<p>Suspendisse quis risus turpis, ut pharetra arcu. Donec adipiscing, quam non faucibus luctus, mi arcu blandit diam, at faucibus mi ante vel augue.</p>
				-->
				</div>
			</aside>
			
			<div class="col-lg-9 col-md-8 col-sm-8">
				<?php foreach ($courses as $course) : ?>
				<h3><a href="/course/detail?cid=<?php echo $course["id"]; ?>" class="course_list_a"><?php echo $course["title"]; ?></a></h3>
				<p><a href="/course/detail?cid=<?php echo $course["id"]; ?>" class="course_list_a"><?php echo $course["description"]; ?></a></p>
				<div class="panel panel-info filterable add_bottom_45">
					<div class="panel-heading">
						<h3 class="panel-title"><?php echo $course["name"]; ?> course</h3>
						<div class="pull-right">
							<button class="btn-filter"><span class="icon-th-list"></span> Filter</button>
						</div>
					</div>
					<table class="table table-responsive table-striped">
						<thead>
							<tr class="filters">
								<th><input type="text" class="form-control" placeholder="ID" disabled ></th>
								<th><input type="text" class="form-control" placeholder="VIDEO NAME" disabled></th>
								<th><input type="text" class="form-control" placeholder="VIDEO DESCRIPTION" disabled ></th>
								<th><input type="text" class="form-control" placeholder="TEACHER" disabled ></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($videos[$course["id"]] as $key => $video) : ?>
							<tr>
								<td><a class="course_list_a" href="/course/video?vid=<?php echo $video["id"]; ?>"><?php echo $key + 1; ?></a></td>
								<td><a class="course_list_a" href="/course/video?vid=<?php echo $video["id"]; ?>"><?php echo $video["title"]; ?></a></td>
								<td><a class="course_list_a" href="/course/video?vid=<?php echo $video["id"]; ?>"><?php echo $video["description"]; ?></a></td>
								<td><a class="course_list_a" href="/course/video?vid=<?php echo $video["id"]; ?>"><?php echo $course["username"]; ?></a></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div><!-- End filterable -->
				<?php endforeach; ?>
			</div><!-- End col-lg-9-->
        </div><!-- End row -->
        
        <hr>
        <div class="row">
        	<div class="col-md-12 text-center">
            	<ul class="pagination">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
            	
        </div><!-- End container -->
    </section><!-- End main_content -->
	
	<script src="/js/table_filter.js"></script>
<?php include('includes/footer.php'); ?>