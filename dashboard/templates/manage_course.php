<?php

	$pageUrl = "MyCourses";

?>
<?php include 'includes/html_header.php'; ?>
<style type="text/css">
	table {word-break:break-all; word-wrap:break-all;}
</style>
<div id="main_content">

    <?php include 'includes/header.php'; ?>

    <div class="page">
        <?php include 'includes/page-top.php'; ?>
		<!--
        <div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <h4>Welcome <?php echo getUser()['username']; ?>!</h4>
                            <small>Study hard, for the well is deep, and our brains are shallow.</small>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
		-->
		<div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
					<div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-vcenter mb-0 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th colspan="7">Manage Courses</th>
                                            <th colspan="1">
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCourseDiv">
													<i class="fe fe-plus mr-2"></i>Add Course
												</button>
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editCourseDiv" id="editCourseDivBtn" style="display:none;">
													<i class="fe fe-plus mr-2"></i>Edit Course
												</button>
											</th>
                                        </tr>
                                        <tr>
                                            <!--<th class="w30">&nbsp;</th>-->
                                            <th>ID</th>
                                            <th>Title</th>
											<th>status</th>
											<th>Category</th>
                                            <th>Description</th>
											<th>Created By</th>
                                            <th>Created Date</th>
                                            <th>Modified By</th>
											<th>Published By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach ($courses as $course) : ?>
										<tr id="course_<?php echo $course['id']; ?>">
                                            <td><a href="/dashboard/my-videos?course=<?php echo $course['id']; ?>"><?php echo $course['id']; ?></a></td>
                                            <td><a href="/dashboard/my-videos?course=<?php echo $course['id']; ?>"><?php echo $course['title']; ?></a></td>
                                            <td>
												<?php
													if($course['deleted'] != 0) {
														$tagFlag = "tag-green";
													} else if ($course['status'] == "published") {
														$tagFlag = "tag-danger";
													} else if ($course['status'] == "pending") {
														$tagFlag = "tag-info";
													} else {
														$tagFlag = "tag-default";
													}
												?>
												<span class="tag <?php echo $tagFlag; ?> <?php echo isAdmin() || $course["created_by"] == getUser()["user_id"] ? "status" : ""; ?>"
                                                    onclick="showStatusDropDown(event, 'course', <?php echo $course['id'] ?>)">
                                                    <span id="status-<?php echo $course['id']; ?>">
                                                        <?php if($course['deleted'] != 0 || $course['status'] == 'deleted'): ?>
                                                        deleted
                                                        <?php else: ?>
                                                        <?php echo $course['status']; ?>
                                                        <?php endif; ?>
                                                    </span>
                                                    <i class="icon-right-dir"></i>
                                                </span>
											
											</td>
											
                                            <td><span><?php echo $course['name']; ?></span></td>
                                            <td style="white-space: normal;"><span><?php echo $course['description']; ?></span></td>
                                            <td><span><?php echo getUserNameByUserId($course['created_by']); ?></span></td>
											<td><span><?php echo $course['create_date']; ?></span></td>
                                            <td><span><?php echo getUserNameByUserId($course['modified_by']); ?></span></td>
                                            <td><span><?php echo getUserNameByUserId($course['published_by']); ?></span></td>
                                        </tr>
										<?php endforeach; ?>
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
<div class="modal fade" id="addCourseDiv" tabindex="-1" role="dialog" style="top:90px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Add New Course</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
					<div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" placeholder="Course Title" id="course_title">
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">
							<p>category: </p>
                            <select class="form-control show-tick" id="">
                                <option disabled selected><?php echo $category['name']; ?></option>
                            </select>
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">                                    
                            <textarea class="form-control" placeholder="Course Description" id="course_description"></textarea>
                        </div>
                    </div>
					<input type="hidden" name="user_id" id="user_id" value="<?php echo getUser()['user_id'] ?>">
					<!--
					<div class="col-12">
                        <div class="form-group">
                            <select class="form-control show-tick" id="create_teacher_duration">
                                <option disabled selected>Select Duration</option>
                                <option value="2">7 days</option>
                                <option value="1">1 year</option>
                            </select>
                        </div>
                    </div>
					-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addCourseBtn">Create</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Edit New Task -->
<div class="modal fade" id="editCourseDiv" tabindex="-1" role="dialog" style="top:90px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Edit Course</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
					<div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" placeholder="Course Title" id="edit_course_title">
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">
							<p>category: </p>
                            <select class="form-control show-tick" id="">
                                <option disabled selected><?php echo $category['name']; ?></option>
                            </select>
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">                                    
                            <textarea class="form-control" placeholder="Course Description" id="edit_course_description"></textarea>
                        </div>
                    </div>
					<input type="hidden" name="course_id" id="edit_course_id" value="">
					<input type="hidden" name="user_id" id="edit_user_id" value="<?php echo getUser()['user_id'] ?>">
					<!--
					<div class="col-12">
                        <div class="form-group">
                            <select class="form-control show-tick" id="create_teacher_duration">
                                <option disabled selected>Select Duration</option>
                                <option value="2">7 days</option>
                                <option value="1">1 year</option>
                            </select>
                        </div>
                    </div>
					-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editCourseBtn">Save</button>
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

	$("#addCourseBtn").click(function(){
		var course_title = $("#course_title").val();
		var course_description = $("#course_description").val();
		var category_id = <?php echo $category['id']; ?>;
		var user_id = $("#user_id").val();
		
		if (course_title == null || course_description == null || category_id == null || user_id == null){
			alert("error, please check all your inputs");
			return false;
		}
		
		$.post("controller", 
		{
			action: "course_course_create",
			course_title: course_title,
			course_description: course_description,
			category_id: category_id,
			user_id: user_id
		},
		function(data, status){
			//alert("Data: " + data + "\nStatus: " + status);
			if ( status === "success" && data.indexOf("success") !== -1 ){
				alert("success!");
				setTimeout(function(){ location.reload(); }, 1000);
				
			} else {
				alert("something wrong in backend");
				return false;
			}
		});
	});
	
	$("#editCourseBtn").click(function(){
		var course_title = $("#edit_course_title").val();
		var course_description = $("#edit_course_description").val();
		var category_id = <?php echo $category['id']; ?>;
		var user_id = $("#edit_user_id").val();
		var course_id = $("#edit_course_id").val();
		
		if (course_title == null || course_description == null || category_id == null || user_id == null){
			alert("error, please check all your inputs");
			return false;
		}
		
		$.post("controller", 
		{
			action: "course_course_edit",
			course_title: course_title,
			course_description: course_description,
			category_id: category_id,
			user_id: user_id,
			course_id: course_id
		},
		function(data, status){
			//alert("Data: " + data + "\nStatus: " + status);
			if ( status === "success" && data.indexOf("success") !== -1 ){
				alert("success!");
				setTimeout(function(){ location.reload(); }, 1000);
				
			} else {
				alert("something wrong in backend");
				return false;
			}
		});
	});
	
</script>
<script src="/dashboard/templates/assets/js/dashboard.js"></script>
</body>
</html>
