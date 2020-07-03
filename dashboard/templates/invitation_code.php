<?php

	$pageUrl = "Invitation Code";

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
					<!--
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Courses Viewed</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="number mb-0 font-32 counter">17</h5>
                                <span class="font-12">learn... <a href="#">More</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Courses Liked</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="number mb-0 font-32 counter">350</h5>
                                <span class="font-12">days left... <a href="#">More</a></span>
                            </div>
                        </div>
                    </div>
					-->
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
                                            <th colspan="8">Invitation Code</th>
                                            <th colspan="1">
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtask">
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
                                            <td><span><?php echo $code['created_by']; ?></span></td>
                                            <td><span><?php echo $code['created_date']; ?></span></td>
											<td><span><?php echo $code['activated_by']; ?></span></td>
                                            <td><span><?php echo $code['activated_time_start']; ?></span></td>
                                            <td><?php echo $code['active_duration']; ?> days</td>
                                        </tr>
										<?php endforeach; ?>
										<!--
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><a href="#">ASD-5258</a></td>
                                            <td><span>It is a long established fact that a reader</span></td>
                                            <td><span class="tag tag-default">lower</span></td>
                                            <td><span>Pre-Sales</span></td>
                                            <td><span>Archie Cantones</span></td>
                                            <td><span>6 hours ago</span></td>
                                            <td>No reply yet</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><a href="#">ASD-8793</a></td>
                                            <td><span>Measures your Current Assets / Current</span></td>
                                            <td><span class="tag tag-danger">High</span></td>
                                            <td><span>Pre-Sales</span></td>
                                            <td><span>Rose Orcullo</span></td>
                                            <td><span>9 hours ago</span></td>
                                            <td>2 reply</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><a href="#">ASD-2500</a></td>
                                            <td><span>There are many variations of passages</span></td>
                                            <td><span class="tag tag-info">Medium</span></td>
                                            <td><span>Pre-Sales</span></td>
                                            <td><span>Charize Cericoz</span></td>
                                            <td><span>10 hours ago</span></td>
                                            <td>1 reply</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><a href="#">ASD-9465</a></td>
                                            <td><span>Measures your Current Assets / Current</span></td>
                                            <td><span class="tag tag-default">lower</span></td>
                                            <td><span>Payment</span></td>
                                            <td><span>Billie Ko</span></td>
                                            <td><span>23-01-2019</span></td>
                                            <td>No reply yet</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><a href="#">ASD-1515</a></td>
                                            <td><span>Contrary to popular belief, Lorem Ipsum</span></td>
                                            <td><span class="tag tag-info">Medium</span></td>
                                            <td><span>Sales</span></td>
                                            <td><span>Hamza Macasindil</span></td>
                                            <td><span>22-01-2019</span></td>
                                            <td>No reply yet</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><a href="#">ASD-2589</a></td>
                                            <td><span>It uses a dictionary of over 200 Latin</span></td>
                                            <td><span class="tag tag-info">Medium</span></td>
                                            <td><span>Technical</span></td>
                                            <td><span>Dyanne Aceron</span></td>
                                            <td><span>28-01-2019</span></td>
                                            <td>5 reply</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><a href="#">ASD-8793</a></td>
                                            <td><span>Measures your Current Assets / Current</span></td>
                                            <td><span class="tag tag-danger">High</span></td>
                                            <td><span>Pre-Sales</span></td>
                                            <td><span>Rose Orcullo</span></td>
                                            <td><span>9 hours ago</span></td>
                                            <td>2 reply</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><a href="#">ASD-2500</a></td>
                                            <td><span>There are many variations of passages</span></td>
                                            <td><span class="tag tag-info">Medium</span></td>
                                            <td><span>Pre-Sales</span></td>
                                            <td><span>Charize Cericoz</span></td>
                                            <td><span>10 hours ago</span></td>
                                            <td>1 reply</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><a href="#">ASD-9465</a></td>
                                            <td><span>Measures your Current Assets / Current</span></td>
                                            <td><span class="tag tag-default">lower</span></td>
                                            <td><span>Payment</span></td>
                                            <td><span>Billie Ko</span></td>
                                            <td><span>23-01-2019</span></td>
                                            <td>No reply yet</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><a href="#">ASD-4569</a></td>
                                            <td><span>The standard chunk of Lorem Ipsum used</span></td>
                                            <td><span class="tag tag-danger">High</span></td>
                                            <td><span>Technical</span></td>
                                            <td><span>Dyanne Aceron</span></td>
                                            <td><span>02-02-2019</span></td>
                                            <td>3 reply</td>
                                        </tr>
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
<div class="modal fade" id="addtask" tabindex="-1" role="dialog" style="top:90px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Create New Invitation Codes</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
					<div class="col-12">
                        <div class="form-group">
                            <select class="form-control show-tick">
                                <option disabled>Select Role</option>
                                <option>Teacher</option>
                                <option>Student</option>
                            </select>
                        </div>
                    </div>
					<div class="col-12">
                        <div class="form-group">
                            <select class="form-control show-tick">
                                <option disabled>Select Duration</option>
                                <option>7 days</option>
                                <option>1 year</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">                                    
                            <input type="number" class="form-control" placeholder="number of new invitation codes needed">
                        </div>
                    </div>            
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Add</button>
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
</body>
</html>
