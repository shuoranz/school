<?php

	$pageUrl = "MyVideos";

?>
<?php include 'includes/html_header.php'; ?>

<div id="main_content">

    <?php include 'includes/header.php'; ?>

    <div class="page">
        <?php include 'includes/page-top.php'; ?>
        <div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <h4>Video Search Result Page</h4>
							<span><b>video title:</b> <?php echo isset($_GET["title"]) ? $_GET["title"] : "";?></span><br>
							<span><b>teacher name:</b> <?php echo isset($_GET["teacher"]) ? $_GET["teacher"] : "";?></span><br>
							<span><b>category:</b> <?php echo isset($_GET["category"]) ? getAllCourseCategoryById((int)$_GET["category"]) : "";?></span><br>
                            <!--<small>Study hard, for the well is deep, and our brains are shallow.</small>-->
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
		<div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
					<div class="col-12">
						<div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Teacher Name" id="search_teacher">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Video Title" id="search_title">
                                        </div>
                                    </div>
									<div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-group">
                                            <select class="form-control" id="search_category">
												<option selected value="">In Any Category</option>
												<?php foreach ( getAllCourseCategories() as $category ): ?>
												<option value="<?php echo $category['id']; ?>">in <?php echo $category['name']; ?></option>
												<?php endforeach; ?>
											</select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <a id="search_course_videos" class="btn btn-primary btn-block" title="" style="color:white;">Search Video</a>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="col-12">
						
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-vcenter mb-0 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th colspan="10">Manage Videos</th>
                                            <th colspan="1">
												<?php if (isTeacherOrAbove()): ?>
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addVideoDiv">
													<i class="fe fe-plus mr-2"></i>Add Video
												</button>
												<?php endif; ?>
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editVideoDiv" style="display:none;" id="editVideoDivBtn">
													<i class="fe fe-plus mr-2"></i>Edit Video
												</button>
											</th>
                                        </tr>
                                        <tr>
                                            <!--<th class="w30">&nbsp;</th>-->
                                            <th>VID</th>
                                            <th>Title</th>
											<th>Vimeo ID</th>
											<th>Description</th>
											<th>Status</th>
											<th>Course Name</th>
											<th>Category</th>
											<th>Created By</th>
											<th>Modified By</th>
                                            <th>Update Date</th>
											<th>Published By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										//foreach ($courses as $course) : 
											foreach ($videos as $key => $video) :
										?>
										<tr id="video_<?php echo $video['id']; ?>">
                                            <td><a href="/course/video/?vid=<?php echo $video['id']; ?>"><?php echo $video['id']; ?></a></td>
                                            <td style="white-space: normal;width:150px;"><a href="/course/video/?vid=<?php echo $video['id']; ?>"><?php echo $video['title']; ?></a></td>
											<td><span><?php echo $video['url']; ?></span></td>
											<td style="white-space: normal;"><span><?php echo $video['description']; ?></span></td>
                                            <td>
												<?php
													if($video['deleted'] != 0) {
														$tagFlag = "tag-green";
													} else if ($video['status'] == "published") {
														$tagFlag = "tag-danger";
													} else if ($video['status'] == "pending") {
														$tagFlag = "tag-info";
													} else {
														$tagFlag = "tag-default";
													}
												?>
												<span class="tag <?php echo $tagFlag; ?> <?php echo isAdmin() || $video["created_by"] == getUser()["user_id"] ? "status" : ""; ?>"
                                                    onclick="showStatusDropDown(event, 'course_video', <?php echo $video['id'] ?>)">
                                                    <span id="status-<?php echo $video['id']; ?>">
                                                        <?php if($video['deleted'] != 0 || $video['status'] == 'deleted'): ?>
                                                        deleted
                                                        <?php else: ?>
                                                        <?php echo $video['status']; ?>
                                                        <?php endif; ?>
                                                    </span>
                                                    <i class="icon-right-dir"></i>
                                                </span>
											</td>
											<td style="white-space: normal;"><a href="/dashboard/my-videos-by-course?course=<?php echo $video['course_id']; ?>"><?php echo $video['course_title']; ?></a><span style="display:none;"><?php echo $video['course_id']; ?></span></td>
                                            <td style="white-space: normal;"><a href="/dashboard/my-courses-by-category?category=<?php echo $video['course_category_id']; ?>"><?php echo $video['course_category_name']; ?></a></td>
                                            <td><span><?php echo getUserNameByUserId($video['created_by']); ?></span></td>
											<td><span><?php echo getUserNameByUserId($video['modified_by']); ?></span></td>
											<td><span><?php echo $video['create_date']; ?></span></td>
                                            <td><span><?php echo getUserNameByUserId($video['published_by']); ?></span></td>
                                        </tr>
										<?php 
											endforeach; 
										//endforeach; 
										?>
										<!--
											<td><span class="tag tag-default">lower</span></td>
											<td><span class="tag tag-danger">High</span></td>
											<td><span class="tag tag-info">Medium</span></td>
										-->
                                    </tbody>
                                </table>
								<!--
								<div class="text-center">
									<ul class="pagination">
										<li><a <?php if($_GET['p'] > 1): ?>href="/dashboard/blog?p=<?php echo $_GET['p']-1 ?>" <?php endif; ?> 
												<?php if($_GET['p'] == 1): ?> style="background-color: #eee" <?php endif; ?>>Prev</a></li>
										<?php foreach($pages as $page): ?>
										<li <?php if($page==$_GET['p']): ?>class="active"<?php endif; ?>><a href="/dashboard/blog?p=<?php echo $page ?>"><?php echo $page ?></a></li>
										<?php endforeach; ?>
										<li><a <?php if($_GET['p'] < $pageMax): ?>href="/dashboard/blog?p=<?php echo $_GET['p']+1 ?>" <?php endif; ?>
											<?php if($_GET['p'] == $pageMax): ?>style="background-color: #eee" <?php endif; ?>>Next</a></li>
									</ul>
								</div>
								-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<!-- Add New Task -->
<div class="modal fade" id="addVideoDiv" tabindex="-1" role="dialog" style="top:90px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Add New Video</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
					<div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" placeholder="Video Title" id="video_title">
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">                                    
                            <input type="number" class="form-control" placeholder="Vimeo ID" id="vimeo_id">
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">                                    
                            <textarea type="text" class="form-control" placeholder="Video Description" id="video_description"></textarea>
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">
							<p>category: </p>
                            <select class="form-control show-tick" id="course_category">
								<option disabled selected value="">Select Course Category</option>
								<?php foreach ( getAllCourseCategories() as $category ): ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
								<?php endforeach; ?>
                            </select>
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">
							<p>course: </p>
                            <select class="form-control show-tick" id="course_id">
                                <option disabled selected value="">Select Course</option>
                            </select>
                        </div>
                    </div>
					<input type="hidden" value="<?php echo getUser()['user_id'] ?>" id="user_id" />
                </div>
            </div>
			<div class="modal-alert" id="modal-alert" style="padding: 14px 0px 13px 33px; background-color: lightyellow;display:none;"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addVideoBtn">Create</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editVideoDiv" tabindex="-1" role="dialog" style="top:90px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Edit Video</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
					<div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" placeholder="Video Title" id="edit_video_title">
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">                                    
                            <input type="number" class="form-control" placeholder="Vimeo ID" id="edit_vimeo_id">
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">                                    
                            <textarea type="text" class="form-control" placeholder="Video Description" id="edit_video_description"></textarea>
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">
							<p>category: </p>
                            <select class="form-control show-tick" id="edit_course_category">
                                <option disabled selected value="">Select Course Category</option>
								<?php foreach ( getAllCourseCategories() as $category ): ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
								<?php endforeach; ?>
                            </select>
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">
							<p>course: </p>
                            <select class="form-control show-tick" id="edit_course_id">
                                <option disabled selected value="">Select Course</option>
                            </select>
                        </div>
                    </div>
					<input type="hidden" value="" id="edit_video_id" />
					<input type="hidden" value="<?php echo getUser()['user_id'] ?>" id="edit_user_id" />
                </div>
            </div>
			<div class="modal-alert" id="modal-alert" style="padding: 14px 0px 13px 33px; background-color: lightyellow;display:none;"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editVideoBtn">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<script src="../assets/bundles/apexcharts.bundle.js"></script>
<script src="../assets/bundles/counterup.bundle.js"></script>
<script src="../assets/bundles/knobjs.bundle.js"></script>
<script src="../assets/bundles/c3.bundle.js"></script>

<script src="../assets/js/core.js"></script>
<script src="../assets/js/page/project-index.js"></script>

<script type="text/javascript">

	$("#addVideoBtn").click(function(){
		var video_title = $("#video_title").val();
		var vimeo_id = $("#vimeo_id").val();
		var video_description = $("#video_description").val();
		var course_id = $("#course_id").val();
		var user_id = $("#user_id").val();
		
		if (!video_title || !vimeo_id || !video_description || !course_id || !user_id ){
			$("#modal-alert").html("error, please check all your inputs");
			$("#modal-alert").show();
			return false;
		}
		
		$.post("controller", 
		{
			action: "course_video_create",
			video_title: video_title,
			vimeo_id: vimeo_id,
			video_description: video_description,
			course_id: course_id,
			user_id: user_id
		},
		function(data, status){
			//alert("Data: " + data + "\nStatus: " + status);
			if ( status === "success" && data.indexOf("success") !== -1 ){
				alert("success!");
				setTimeout(function(){ location.reload(); }, 1000);
				
			} else {
				$("#modal-alert").html(data);
				$("#modal-alert").show();
				return false;
			}
		});
	});
	
	$("#editVideoBtn").click(function(){
		var video_title = $("#edit_video_title").val();
		var vimeo_id = $("#edit_vimeo_id").val();
		var video_description = $("#edit_video_description").val();
		var course_id = $("#edit_course_id").val();
		var user_id = $("#edit_user_id").val();
		var video_id = $("#edit_video_id").val();
		
		if (!video_title || !vimeo_id || !video_description || !course_id || !user_id){
			$("#modal-alert").html("error, please check all your inputs");
			$("#modal-alert").show();
			return false;
		}
		
		$.post("controller", 
		{
			action: "course_video_edit",
			video_title: video_title,
			vimeo_id: vimeo_id,
			video_description: video_description,
			course_id: course_id,
			user_id: user_id,
			video_id: video_id
		},
		function(data, status){
			//alert("Data: " + data + "\nStatus: " + status);
			if ( status === "success" && data.indexOf("success") !== -1 ){
				alert("success!");
				setTimeout(function(){ location.reload(); }, 1000);
			} else {
				$("#modal-alert").html(data);
				$("#modal-alert").show();
				return false;
			}
		});
	});
	
	$("#course_category").change(function(){
		var category_id = $("#course_category").val();
		var user_id = <?php echo isAdmin() ? "admin" : '$("#user_id").val()' ?>;
		setCoursesSelectByCategory(category_id, user_id, "course_id")
	});
	
	$("#edit_course_category").change(function(){
		var category_id = $("#edit_course_category").val();
		var user_id = <?php echo isAdmin() ? "admin" : '$("#edit_user_id").val()' ?>;
		setCoursesSelectByCategory(category_id, user_id, "edit_course_id")
	});
	
	function setCoursesSelectByCategory(category_id, user_id, effect_select)
	{
		$.post("controller", 
		{
			action: "get_courses_by_category",
			category_id: category_id,
			user_id: user_id,
		},
		function(data, status){
			$('#'+effect_select).html('<option disabled selected value="">Select Course</option>');
			var course_obj = JSON.parse(data);
			for (var i = 0; i < course_obj.length; i++) {
				$('#'+effect_select).append(new Option(course_obj[i].course_name, course_obj[i].course_id));
			}
		});
	}
	$("#search_course_videos").click(function(){
		var search_title = $("#search_title").val() == "" ? "na" : "title="+$("#search_title").val();
		var search_teacher = $("#search_teacher").val() == "" ? "na" : "teacher="+$("#search_teacher").val();
		var search_category = $("#search_category").val() == "" ? "na" : "category="+$("#search_category").val();
		if (search_title == "na" && search_teacher == "na" && search_category == "na") {
			return false;
		}
		window.location.href = "/dashboard/search_video?"+search_title+"&"+search_teacher+"&"+search_category;
	});
	
	$("#search_course_videos").click(function(){
		var search_title = $("#search_title").val() == "" ? "na" : "title="+$("#search_title").val();
		var search_teacher = $("#search_teacher").val() == "" ? "na" : "teacher="+$("#search_teacher").val();
		var search_category = $("#search_category").val() == "" ? "na" : "category="+$("#search_category").val();
		if (search_title == "na" && search_teacher == "na" && search_category == "na") {
			return false;
		}
		window.location.href = "/dashboard/search_video?"+search_title+"&"+search_teacher+"&"+search_category;
	});
	
</script>
<script src="/dashboard/templates/assets/js/dashboard.js"></script>
</body>
</html>
