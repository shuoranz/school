<?php

	$pageUrl = "TodoList";

?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>Veewo! TODO List</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">

<!-- Core css -->
<link rel="stylesheet" href="../assets/css/main.css"/>
<link rel="stylesheet" href="../assets/css/theme1.css"/>
</head>

<body class="font-montserrat">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<div id="main_content">

    <?php include 'header.php'; ?>

    <div class="page">
        <?php include 'page-top.php'; ?>
        <div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
									<div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="button" value='Add Task' class="form-control" placeholder="id" style="color: #fff; background-color: #0069d9; border-color: #0062cc;">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="button" value='Delete Task' class="form-control" placeholder="Priority" style="color: #fff; background-color: #0069d9; border-color: #0062cc;">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="button" value='Done Task' class="form-control" placeholder="id" style="color: #fff; background-color: #0069d9; border-color: #0062cc;">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        
                                    </div>
									<!--
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="id">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Priority">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Department">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Agent">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" data-provide="datepicker" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <a href="javascript:void(0);" class="btn btn-primary btn-block" title="">Search</a>
                                    </div>
									-->
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
                                            <th colspan="5">TODO List</th>
                                            <th colspan="3">Activity</th>
                                        </tr>
                                        <tr>
                                            <th class="w30">&nbsp;</th>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Priority</th>
                                            <th>Category</th>
                                            <th>Counselor</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><a href="#">ASD-5258</a></td>
                                            <td><span>View the video and learn balabala</span></td>
                                            <td><span class="tag tag-default">lower</span></td>
                                            <td><span>Learn</span></td>
                                            <td><span>Archie Cantones</span></td>
                                            <td><span>06/05/2020</span></td>
                                            <td>active</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><a href="#">ASD-8793</a></td>
                                            <td><span>Submit document to balabala</span></td>
                                            <td><span class="tag tag-danger">High</span></td>
                                            <td><span>Document</span></td>
                                            <td><span>Rose Orcullo</span></td>
                                            <td><span>08/11/2020</span></td>
                                            <td>active</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><a href="#">ASD-2500</a></td>
                                            <td><span>Go to food bank to do the volunteer</span></td>
                                            <td><span class="tag tag-info">Medium</span></td>
                                            <td><span>Volunteer</span></td>
                                            <td><span>Charize Cericoz</span></td>
                                            <td><span>09/05/2020</span></td>
                                            <td>pending</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><a href="#">ASD-9465</a></td>
                                            <td><span>Pay the tuition to blablabla</span></td>
                                            <td><span class="tag tag-default">lower</span></td>
                                            <td><span>Payment</span></td>
                                            <td><span>Billie Ko</span></td>
                                            <td><span>06/25/2020</span></td>
                                            <td>done</td>
                                        </tr>
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

<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script src="../assets/js/core.js"></script>
</body>
</html>