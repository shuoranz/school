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
					<h4>Search</h4>
					<input class="form-control" type="text" name="search_title" id="search_title" placeholder="video title" style="margin-bottom: 10px;">
					<input class="form-control" type="text" name="search_teacher" id="search_teacher" placeholder="teacher" style="margin-bottom: 10px;">
					<a class="form-control button_top" style="font-size: 15px;text-align: center;padding-top: 9px;" id="search_course_videos">Search</a>
					<hr>
					<h4>Categories</h4>
					<ul class="submenu-col">
						<li><a href="/course/" id="<?php echo !isset($_GET["category"]) || $_GET["category"] == 0 ? "active" : ""; ?>">All Courses</a></li>
						<?php foreach($courseCategories as $courseCategory) : ?>
						<li><a href="/course/?category=<?php echo $courseCategory["id"]; ?>" id="<?php echo isset($_GET["category"]) && $_GET["category"] == $courseCategory["id"] ? "active" : ""; ?>"><?php echo $courseCategory["name"]; ?></a></li>
						<?php endforeach ?>
						<!--
						<li><a href="#" id="active">All Courses</a></li>
						<li><a href="course_details_1.html">Biology (02)</a></li>
						<li><a href="course_details_1.html">Business (08)</a></li>
						<li><a href="course_details_1.html">Communication (05) <img src="/img/new.png" alt="New" class="hidden-"></a></li>
						-->
					</ul>
					
					<hr>
					
					<!--
					<h5>Upcoming Courses</h5>
					<p>Suspendisse quis risus turpis, ut pharetra arcu. Donec adipiscing, quam non faucibus luctus, mi arcu blandit diam, at faucibus mi ante vel augue.</p>
				-->
				</div>
			</aside>
			
			<div class="col-lg-9 col-md-8 col-sm-8">
				<h3><a class="course_list_a">Search Results</a></h3>
				<p><a class="course_list_a"></a></p>
				<div class="panel panel-info filterable add_bottom_45">
					<div class="panel-heading">
						<h3 class="panel-title">Course Videos Search Results</h3>
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
							<?php foreach ($videos as $key => $video) : ?>
							<tr>
								<td><a class="course_list_a" href="/course/video?vid=<?php echo $video["id"]; ?>"><?php echo $key + 1; ?></a></td>
								<td><a class="course_list_a" href="/course/video?vid=<?php echo $video["id"]; ?>"><?php echo $video["title"]; ?></a></td>
								<td><a class="course_list_a" href="/course/video?vid=<?php echo $video["id"]; ?>"><?php echo $video["description"]; ?></a></td>
								<td><a class="course_list_a" href="/course/video?vid=<?php echo $video["id"]; ?>"><?php echo $video["username"]; ?></a></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div><!-- End filterable -->
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
	<script type="text/javascript">
		$("#search_course_videos").click(function(){
			var search_title = $("#search_title").val() == "" ? "na" : "title="+$("#search_title").val();
			var search_teacher = $("#search_teacher").val() == "" ? "na" : "teacher="+$("#search_teacher").val();
			if (search_title == "na" && search_teacher == "na") {
				return false;
			}
			window.location.href = "/course/search_video?"+search_title+"&"+search_teacher;
		});
	</script>
<?php include('includes/footer.php'); ?>