<?php

	$pageUrl = "Invitation Code";

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
                            <h4>Welcome Xiaowen!</h4>
                            <small>Study hard, for the well is deep, and our brains are shallow.</small>
                        </div>                        
                    </div>
                </div>
                <div class="row clearfix row-deck">
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Vacant 1y Invitation Code</h3>
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
                                <h3 class="card-title">Used 1y Invitation Code</h3>
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
                                <h3 class="card-title">Vacant 7d Invitation Code</h3>
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
                                <h3 class="card-title">Used 7d Invitation Code</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="number mb-0 font-32 counter">25</h5>
                                <span class="font-12">Well done! ... <a href="#">More</a></span>
                            </div>
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
                                            <th colspan="8">Invitation Code</th>
                                            <th colspan="1">
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createInvitationCode">
													<i class="fe fe-plus mr-2"></i>Create Code
												</button>
											</th>
                                        </tr>
                                        <tr>
                                            <!--<th class="w30">&nbsp;</th>-->
                                            <th>ID</th>
                                            <th>Code</th>
											<th>Status</th>
											<th>Type</th>
                                            <th>Created by</th>
                                            <th>Created date</th>
                                            <th>Actived by</th>
                                            <th>Actived date</th>
											<th>Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach ($invitationCodes as $code) : ?>
										<tr>
                                            <td><a href="#"><?php echo $code['id']; ?></a></td>
                                            <td><span><?php echo $code['code']; ?></span></td>
                                            <td><span class="tag tag-default"><?php echo $code['status']; ?></span></td>
                                            <td><span><?php echo $code['code_type']; ?></span></td>
                                            <td><span><?php echo getUserNameByUserId($code['created_by']); ?></span></td>
                                            <td><span><?php echo $code['created_date']; ?></span></td>
											<td><span><?php echo getUserNameByUserId($code['activated_by']); ?></span></td>
                                            <td><span><?php echo $code['activated_time_start']; ?></span></td>
                                            <td><?php echo $code['active_duration']; ?> days</td>
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
<div class="modal fade" id="createInvitationCode" tabindex="-1" role="dialog" style="top:90px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Create New Invitation Codes</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
					<div class="col-12">
                        <div class="form-group">
                            <select class="form-control show-tick" id="create_code_role">
                                <option disabled selected>Select Role</option>
                                <option value="2">Teacher</option>
                                <option value="1">Student</option>
                            </select>
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">
                            <select class="form-control show-tick" id="create_code_duration">
                                <option disabled selected>Select Duration</option>
                                <option value="2">7 days</option>
                                <option value="1">1 year</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">                                    
                            <input type="number" class="form-control" placeholder="number of new invitation codes needed" id="create_code_amt">
                        </div>
                    </div>   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="createInvitationCodeBtn">Create</button>
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

	$("#createInvitationCodeBtn").click(function(){
		var code_role = $("#create_code_role").val();
		var code_duration = $("#create_code_duration").val();
		var create_code_amt = $("#create_code_amt").val();
		
		if (code_role == null || code_duration ==  null || create_code_amt == null){
			alert("error, please check all your inputs");
			return false;
		}
		
		$.post("controller", 
		{
			action: "invitation_code_create",
			role: code_role,
			type: code_duration,
			amnt: create_code_amt
		},
		function(data, status){
			//alert("Data: " + data + "\nStatus: " + status);
			if ( status === "success" && data.indexOf("success") !== -1 ){
				alert("success!");
				setTimeout(function(){ location.reload(); }, 1000);
				
			} else {
				alert("error： " + data);
				return false;
			}
		});
	});
	
</script>
</body>
</html>
