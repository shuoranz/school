<?php

	$pageUrl = "MyCourses";

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
                            <h4>Welcome Xiaowen!</h4>
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
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-vcenter mb-0 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th colspan="8">Manage Videos</th>
                                            <th colspan="1">
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addVideoDiv">
													<i class="fe fe-plus mr-2"></i>Add Video
												</button>
											</th>
                                        </tr>
                                        <tr>
                                            <!--<th class="w30">&nbsp;</th>-->
                                            <th>VID</th>
                                            <th>Title</th>
											<th>Description</th>
											<th>Status</th>
											<th>Course Category</th>
											<th>Course Category</th>
											<th>Created By</th>
                                            <th>Created Date</th>
											<th>Published By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										//foreach ($courses as $course) : 
											foreach ($videos[$course["id"]] as $key => $video) :
										?>
										<tr>
                                            <td><a href="/course/video/?vid=<?php echo $video['id']; ?>"><?php echo $video['id']; ?></a></td>
                                            <td><a href="/course/video/?vid=<?php echo $video['id']; ?>"><?php echo mb_substr($video['title'], 0, 30); echo mb_strlen($video['title'], 'UTF-8') > 30 ? "..." : ""; ?></a></td>
											<td><span><?php echo ""; //$course['description']; ?></span></td>
                                            <td>
												<span class="tag tag-default status"
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
											<td><span><?php echo $course['title']; ?></span></td>
                                            <td><span><?php echo $course['name']; ?></span></td>
                                            <td><span><?php echo getUserNameByUserId($video['created_by']); ?></span></td>
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
                            <select class="form-control show-tick" id="">
                                <option disabled selected><?php echo $course['name']; ?></option>
                            </select>
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">
							<p>course: </p>
                            <select class="form-control show-tick" id="course_id">
                                <option disabled selected value="<?php echo $course['id']; ?>"><?php echo $course['title']; ?></option>
                            </select>
                        </div>
                    </div>
					<input type="hidden" value="<?php echo getUser()['user_id'] ?>" id="user_id" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addVideoBtn">Create</button>
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
		var course_id = <?php echo $course['id']; ?>;
		var user_id = $("#user_id").val();
		
		if (video_title == null || vimeo_id ==  null || video_description == null || course_id == null || user_id == null){
			alert("error, please check all your inputs");
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
				alert("something wrong in backend");
				return false;
			}
		});
	});
	
</script>
<script src="/dashboard/templates/assets/js/dashboard.js"></script>
</body>
</html>
