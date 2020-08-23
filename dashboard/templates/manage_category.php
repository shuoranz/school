<?php

	$pageUrl = "MyCourses";

?>
<?php include 'includes/html_header.php'; ?>

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
					<div class="col-6">
						<?php if( isAdmin() ) : ?>
						<div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Teacher Name" id="search_teacher">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Video Title" id="search_title">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <a id="search_course_videos" class="btn btn-primary btn-block" title="" style="color:white;">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php endif; ?>
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-vcenter mb-0 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Manage Category</th>
                                        </tr>
                                        <tr>
                                            <!--<th class="w30">&nbsp;</th>-->
                                            <th>Category ID</th>
                                            <th>Category Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										foreach ($categories as $category) : 
										?>
										<tr>
                                            <td><a href="/dashboard/my-courses?category=<?php echo $category['id']; ?>"><?php echo $category['id']; ?></a></td>
                                            <td><a href="/dashboard/my-courses?category=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></td>
                                        </tr>
										<?php 
										endforeach; 
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
                <h6 class="title" id="defaultModalLabel">Add New Category</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
					<div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" placeholder="Category Title" id="create_category">
                        </div>
                    </div>
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
                <button type="button" class="btn btn-primary" id="addCategoryBtn">Create</button>
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

	$("#addCategoryBtn").click(function(){
		var category = $("#create_category").val();
		
		if (category == null || category ==  ""){
			alert("error, please check all your inputs");
			return false;
		}
		
		$.post("controller", 
		{
			action: "course_category_create",
			category: category
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
	

	$("#search_course_videos").click(function(){
		var search_title = $("#search_title").val() == "" ? "na" : "title="+$("#search_title").val();
		var search_teacher = $("#search_teacher").val() == "" ? "na" : "teacher="+$("#search_teacher").val();
		if (search_title == "na" && search_teacher == "na") {
			return false;
		}
		window.location.href = "/dashboard/search_video?"+search_title+"&"+search_teacher;
	});
</script>
</body>
</html>
