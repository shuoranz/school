<?php

	$pageUrl = "Category";

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
                            <!--<h4>Welcome <?php echo getUser()['username']; ?>!</h4>-->
							<!--<h4>Manage <?php echo $categoryName; ?> Category</h4>-->
							<?php
								for ($i=1; $i<=4; $i++) {
									if ($i == $_GET["c"]) continue;
									if ($i == 1) echo "<a href='/dashboard/manage-category?c=1'>manage course category</a><br>";
									if ($i == 2) echo "<a href='/dashboard/manage-category?c=2'>manage forum category</a><br>";
									if ($i == 3) echo "<a href='/dashboard/manage-category?c=3'>manage blog category</a><br>";
									if ($i == 4) echo "<a href='/dashboard/manage-category?c=4'>manage news category</a><br>";
								}
							?>
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
                                            <th colspan="1">Manage <?php echo $categoryName; ?> Category</th>
                                            <th colspan="2">
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addVideoDiv">
													<i class="fe fe-plus mr-2"></i>Add <?php echo $categoryName; ?> Category
												</button>
											</th>
                                        </tr>
                                        <tr>
                                            <!--<th class="w30">&nbsp;</th>-->
                                            <th>Category ID</th>
                                            <th>Category Name</th>
											<th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										foreach ($categories as $category) : 
										?>
										<tr>
                                            <td><?php echo $category['id']; ?></td>
                                            <td><?php echo $category['category']; ?></td>
											<td style="width:50%">
												<?php
													if($category['deleted'] == 0) {
														$tagFlag = "tag-info";
													} else if ($category['deleted'] == 1) {
														$tagFlag = "tag-danger";
													} else if ($category['deleted'] == 2) {
														$tagFlag = "tag-default";
													}
												?>
                                                <span class="tag <?php echo $tagFlag; ?> status"
                                                    onclick="showStatusDropDownCategory(event, '<?php echo strtolower($categoryName)."_category" ?>', <?php echo $category['id'] ?>)">
                                                    <span id="status-<?php echo $category['id']; ?>">
                                                        <?php
														if($category['deleted'] == 0) {
															echo "pending";
														} else if ($category['deleted'] == 1) {
															echo "deleted";
														} else if ($category['deleted'] == 2) {
															echo "published";
														}
														?>
                                                    </span>
                                                    <i class="icon-right-dir"></i>
                                                </span>
                                            </td>
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
                <h6 class="title" id="defaultModalLabel">Add <?php echo $categoryName; ?> Category</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
					<div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" placeholder="<?php echo $categoryName; ?> Category Title" id="create_category">
							<input type="hidden" value="<?php echo strtolower($categoryName)."_category"; ?>" id="category_table">
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
			action: "category_create",
			category: category,
			table: $("#category_table").val()
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
<script src="/dashboard/templates/assets/js/dashboard.js"></script>
</body>
</html>
