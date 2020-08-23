<?php

	$pageUrl = "Students";

?>
<?php include 'includes/html_header.php'; ?>

<div id="main_content">

    <?php include 'includes/header.php'; ?>

    <div class="page">
        <?php include 'includes/page-top.php'; ?>
		<div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
					<div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="id" id="search_id" value="<?php echo isset($id)?$id:""; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Username" id="search_username" value="<?php echo isset($username)?$username:""; ?>">
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Email Address" id="search_email" value="<?php echo isset($email)?$email:""; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="First Name" id="search_fname" value="<?php echo isset($first_name)?$first_name:""; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Last Name" id="search_lname" value="<?php echo isset($last_name)?$last_name:""; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <a href="#" class="btn btn-primary btn-block" title="" id="search_user">Search</a>
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
                                            <th colspan="8">Manage Students</th>
                                            <th colspan="1">
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudentDiv">
													<i class="fe fe-plus mr-2"></i>Add Student
												</button>
											</th>
                                        </tr>
                                        <tr>
                                            <!--<th class="w30">&nbsp;</th>-->
                                            <th>ID</th>
                                            <th>Username</th>
											<th>Status</th>
											<th>First Name</th>
											<th>Last Name</th>
                                            <th>Email Address</th>
                                            <th>Created Date</th>
											<th>Last Activity</th>
											<th>Valid Through</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach ($students as $student) : ?>
										<tr>
                                            <td><a href="#"><?php echo $student['id']; ?></a></td>
                                            <td><span><?php echo $student['username']; ?></span></td>
                                            <td>
												<?php
													if($student['deleted'] != 0) {
														$tagFlag = "tag-green";
													} else if ($student['role'] == "student") {
														$tagFlag = "tag-danger";
													} else {
														$tagFlag = "tag-default";
													}
												?>
                                                <span class="tag <?php echo $tagFlag; ?> status" onclick="showStatusDropDown(event, 'users', <?php echo $student['id'] ?>)">
                                                    <span id="status-<?php echo $student['id']; ?>">
                                                    <?php if($student['deleted'] != 0 ): ?>
                                                    deleted
                                                    <?php else: ?>
                                                    <?php echo $student['role']; ?>
                                                    <?php endif; ?>
                                                    </span>
                                                    <i class="icon-right-dir"></i>
                                                </span>
                                                <span style="display: none" id="hidden-role-<?php echo $student['id']; ?>">
                                                    <?php echo $student['role'];?>
                                                </span>
                                            </td>
                                            <td><span><?php echo $student['first_name']; ?></span></td>
                                            <td><span><?php echo $student['last_name']; ?></span></td>
                                            <td><span><?php echo $student['email']; ?></span></td>
											<td><span><?php echo $student['join_date']; ?></span></td>
                                            <td><span><?php echo $student['last_activity']; ?></span></td>
                                            <td><?php echo $student['expiration_date']; ?></td>
                                        </tr>
										<?php endforeach; ?>
										<!--
											<td><span class="tag tag-default">lower</span></td>
											<td><span class="tag tag-danger">High</span></td>
											<td><span class="tag tag-info">Medium</span></td>
										-->
                                    </tbody>
                                </table>
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
                <h6 class="title" id="defaultModalLabel">Create New Student User</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
					<div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" placeholder="Username" id="create_teacher_username">
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" placeholder="Email Address" id="create_teacher_emailaddress">
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" placeholder="Password" id="create_teacher_password">
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" placeholder="Confirm Password" id="create_teacher_password_confirm">
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" placeholder="First Name" id="create_teacher_firstname">
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" placeholder="Last Name" id="create_teacher_lastname">
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">
                            <select class="form-control show-tick" id="create_teacher_duration">
                                <option disabled selected>Select Duration</option>
                                <option value="14">14 days</option>
                                <option value="365">1 year</option>
                            </select>
                        </div>
                    </div>        
                </div>
            </div>
			<div class="modal-alert" id="modal-alert" style="padding: 14px 0px 13px 33px; background-color: lightyellow;display:none;"></div>
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

	$("#addStudentBtn").click(function(){
		var create_teacher_username = $("#create_teacher_username").val();
		var create_teacher_emailaddress = $("#create_teacher_emailaddress").val();
		var create_teacher_password = $("#create_teacher_password").val();
		var create_teacher_password_confirm = $("#create_teacher_password_confirm").val();
		var create_teacher_firstname = $("#create_teacher_firstname").val();
		var create_teacher_lastname = $("#create_teacher_lastname").val();
		var create_teacher_duration = $("#create_teacher_duration").val();


		if (!create_teacher_username
		 || !create_teacher_emailaddress
		 || !create_teacher_password
		 || !create_teacher_password_confirm
		 || !create_teacher_firstname
		 || !create_teacher_lastname
		 || !create_teacher_duration){
			$("#modal-alert").html("error, please check all your inputs");
			$("#modal-alert").show();
			return false;
		}
		if (create_teacher_password != create_teacher_password_confirm || create_teacher_password == "") {
			$("#modal-alert").html("password has issue, please check");
			$("#modal-alert").show();
			return false;
		}
		$.post("controller", 
		{
			action: "manage_student_create",
			create_teacher_username : create_teacher_username,
			create_teacher_emailaddress : create_teacher_emailaddress,
			create_teacher_password : create_teacher_password,
			create_teacher_password_confirm : create_teacher_password_confirm,
			create_teacher_firstname : create_teacher_firstname,
			create_teacher_lastname : create_teacher_lastname,
			create_teacher_duration : create_teacher_duration
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
	
	$("#search_user").click(function(){
		var searchQuery = "";
		var e1, e2, e3, e4, e5;
		e1 = $("#search_id").val().replace(/[^0-9]/g, '');
		e2 = $("#search_username").val().replace(/[^a-zA-Z0-9]/g, '');
		e3 = $("#search_email").val().replace(/[^a-zA-Z0-9@]/g, '');
		e4 = $("#search_fname").val().replace(/[^a-zA-Z0-9]/g, '');
		e5 = $("#search_lname").val().replace(/[^a-zA-Z0-9]/g, '');
		searchQuery += e1 ? '"id":"'+ e1 + '",' : "";
		searchQuery += e2 ? '"username":"' + e2 + '",' : "";
		searchQuery += e3 ? '"email":"' + e3 + '",' : "";
		searchQuery += e4 ? '"first_name":"' + e4 + '",' : "";
		searchQuery += e5 ? '"last_name":"' + e5 + '",' : "";
		if (searchQuery == "") {
			return false;
		} else {
			searchQuery = "{"+searchQuery.replace(/,\s*$/, "")+"}";
		}
		//alert(searchQuery);
		window.location.href = "/dashboard/student?search=" + searchQuery;
	});
</script>
<script src="/dashboard/templates/assets/js/dashboard.js"></script>
<script src="/js/messageAnimation.js"></script>
</body>
</html>
