<?php

	$pageUrl = "News";

?>
<?php include 'includes/html_header.php'; ?>

<div id="main_content">

    <?php include 'includes/header.php'; ?>

    <div class="page">
        <?php include 'includes/page-top.php'; ?>
        <div class="section-body mt-3">
            <div class="container-fluid">
				<!--
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <h4>Welcome Xiaowen!</h4>
                            <small>Study hard, for the well is deep, and our brains are shallow.</small>
                        </div>
                    </div>
                </div>
                <div class="row clearfix row-deck">
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Total Blog</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="number mb-0 font-32 counter">31</h5>
                                <span class="font-12">Good job! ... <a href="#">More</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Active Blog</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="number mb-0 font-32 counter">25</h5>
                                <span class="font-12">Well done! ... <a href="#">More</a></span>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Inactive Blog</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="number mb-0 font-32 counter">31</h5>
                                <span class="font-12">Good job! ... <a href="#">More</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Register Blog</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="number mb-0 font-32 counter">25</h5>
                                <span class="font-12">Well done! ... <a href="#">More</a></span>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Temporary Blog</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="number mb-0 font-32 counter">25</h5>
                                <span class="font-12">Well done! ... <a href="#">More</a></span>
                            </div>
                        </div>
                    </div>
                </div>
				-->
            </div>
        </div>
        <div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
                    <!--
					<div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="id">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Username">
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <a href="javascript:void(0);" class="btn btn-primary btn-block" title="">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					-->
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-vcenter mb-0 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th colspan="1">Manage News</th>
                                            <th colspan="1">
                                                <!--
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudentDiv">
													<i class="fe fe-plus mr-2"></i>Add Student
												</button>
												-->
                                                <a type="button" class="btn btn-primary" href="/news/create">
                                                    <i class="fe fe-plus mr-2"></i>Add News
                                                </a>
                                            </th>
                                            <th colspan="9"></th>
                                        </tr>
                                        <tr>
                                            <!--<th class="w30">&nbsp;</th>-->
                                            <!--<th>ID</th>-->
                                            <th>Title</th>
                                            <th>status</th>
                                            <th>Category</th>
                                            <!--<th>Tags</th>-->
											<th>Top</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                            <th>Modified By</th>
                                            <th>Published By</th>
                                            <th>Published Date</th>
											<th>Statistics</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($all_news as $news) : ?>
                                        <tr>
											<!--
                                            <td><a
                                                    href="/news/thread/?id=<?php echo $news['id']; ?>"><?php echo $news['id']; ?></a>
                                            </td>
											-->
                                            <td style="white-space: normal;"><a
                                                    href="/news/thread/?id=<?php echo $news['id']; ?>"><?php echo mb_substr($news['title'], 0, 30); echo mb_strlen($news['title'], 'UTF-8') > 30 ? "..." : ""; ?></a>
                                            </td>
                                            <td>
												<?php
													if($news['deleted'] != 0) {
														$tagFlag = "tag-green";
													} else if ($news['status'] == "published") {
														$tagFlag = "tag-danger";
													} else if ($news['status'] == "pending") {
														$tagFlag = "tag-info";
													}
												?>
                                                <span class="tag <?php echo $tagFlag; ?> status"
                                                    onclick="showStatusDropDown(event, 'news', <?php echo $news['id'] ?>)">
                                                    <span id="status-<?php echo $news['id']; ?>">
                                                        <?php if($news['deleted'] != 0 || $news['status'] == 'deleted'): ?>
                                                        deleted
                                                        <?php else: ?>
                                                        <?php echo $news['status']; ?>
                                                        <?php endif; ?>
                                                    </span>
                                                    <i class="icon-right-dir"></i>
                                                </span>
                                            </td>
                                            <td><span><?php echo $news['category']; ?></span></td>
											<td><span><?php echo $news['top'] == "1" ? "Top" : ""; ?></span></td>
                                            <!--<td><span><?php echo $news['tag']; ?></span></td>-->
                                            <td><span><?php echo getUserNameByUserId($news['user_id']); ?></span></td>
                                            <td><span><?php echo $news['create_date']; ?></span></td>
                                            <td><span><?php echo getUserNameByUserId($news['modified_by']); ?></span></td>
                                            <td><span><?php echo getUserNameByUserId($news['published_by']); ?></span></td>
                                            <td><span><?php echo $news['last_activity']; ?></span></td>
											<td><span>
											<i class="icon-eye"></i><?php echo $news['view_count'] ?>
											<i class="icon-thumbs-up"></i><?php echo $news['like_count'] ?>
											<i class="icon-comment"></i><?php echo $news['reply_count'] ?>
											
											</span></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <!--
											<td><span class="tag tag-default">lower</span></td>
											<td><span class="tag tag-danger">High</span></td>
											<td><span class="tag tag-info">Medium</span></td>
										-->
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <ul class="pagination">
                                        <li><a <?php if($_GET['p'] > 1): ?>href="/dashboard/news?p=<?php echo $_GET['p']-1 ?>"
                                                <?php endif; ?> <?php if($_GET['p'] == 1): ?>
                                                style="background-color: #eee" <?php endif; ?>>Prev</a></li>
                                        <?php foreach($pages as $page): ?>
                                        <li <?php if($page==$_GET['p']): ?>class="active" <?php endif; ?>><a
                                                href="/dashboard/news?p=<?php echo $page ?>"><?php echo $page ?></a>
                                        </li>
                                        <?php endforeach; ?>
                                        <li><a <?php if($_GET['p'] < $pageMax): ?>href="/dashboard/news?p=<?php echo $_GET['p']+1 ?>"
                                                <?php endif; ?>
                                                <?php if($_GET['p'] == $pageMax): ?>style="background-color: #eee"
                                                <?php endif; ?>>Next</a></li>
                                    </ul><!-- end pagination-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add New Task -->
<div class="modal fade" id="addStudentDiv" tabindex="-1" role="dialog" style="top:90px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Create New Student Users</h6>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addStudentBtn">Create</button>
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
$("#addStudentBtn").click(function() {
    var code_role = $("#create_code_role").val();
    var code_duration = $("#create_code_duration").val();
    var create_code_amt = $("#create_code_amt").val();

    if (code_role == null || code_duration == null || create_code_amt == null) {
        alert("error, please check all your inputs");
        return false;
    }

    $.post("controller", {
            action: "invitation_code_create",
            role: code_role,
            type: code_duration,
            amnt: create_code_amt
        },
        function(data, status) {
            //alert("Data: " + data + "\nStatus: " + status);
            if (status === "success" && data.indexOf("success") !== -1) {
                alert("success!");
                setTimeout(function() {
                    location.reload();
                }, 1000);

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