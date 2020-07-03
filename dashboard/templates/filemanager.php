<?php

	$pageUrl = "FileManager";

?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>Veewo! File Manager</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" />

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
<!-- Overlay For Sidebars -->

<div id="main_content">

    <?php include 'header.php'; ?>

    <div class="page">
        <?php include 'page-top.php'; ?>
        <div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Recently Accessed Files</h3>
                                <div class="card-options">                                
                                    <a href="javascript:void(0)"><i class="fa fa-plus" data-toggle="tooltip" data-placement="right" title="Upload New"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="file_folder">
                                    <a href="javascript:void(0);">
                                        <div class="icon">
                                            <i class="fa fa-folder text-success"></i>
                                        </div>
                                        <div class="file-name">
                                            <p class="mb-0 text-muted">Family</p>
                                            <small>3 File, 1.2GB</small>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <div class="icon">
                                            <i class="fa fa-file-word-o text-primary"></i>
                                        </div>
                                        <div class="file-name">
                                            <p class="mb-0 text-muted">Report2017.doc</p>
                                            <small>Size: 68KB</small>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <div class="icon">
                                            <i class="fa fa-file-pdf-o text-danger"></i>
                                        </div>
                                        <div class="file-name">
                                            <p class="mb-0 text-muted">Report2017.pdf</p>
                                            <small>Size: 68KB</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-none b-none">
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table table-hover table-vcenter table_custom text-nowrap spacing5 text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Share With</th>
                                                <th>Owner</th>
                                                <th>Last Update</th>
                                                <th>File Size</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="width45">
                                                    <i class="fa fa-folder"></i>
                                                </td>
                                                <td>
                                                    <span class="folder-name">Work</span>
                                                </td>
                                                <td>
                                                    <div class="avatar-list avatar-list-stacked">
                                                        <img class="avatar avatar-sm" src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" title="Avatar"/>
                                                        <img class="avatar avatar-sm" src="../assets/images/xs/avatar2.jpg" data-toggle="tooltip" title="Avatar"/>
                                                        <img class="avatar avatar-sm" src="../assets/images/xs/avatar3.jpg" data-toggle="tooltip" title="Avatar"/>
                                                    </div>
                                                </td>
                                                <td class="width100">
                                                    <span>Me</span>
                                                </td>
                                                <td class="width100">
                                                    <span>Oct 7, 2019</span>
                                                </td>
                                                <td class="width100 text-center">
                                                    <span class="size"> - </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="width45">
                                                    <i class="fa fa-folder"></i>
                                                </td>
                                                <td>
                                                    <span class="folder-name">Family</span>
                                                </td>
                                                <td>
                                                    -
                                                </td>
                                                <td class="width100">
                                                    <span>Me</span>
                                                </td>
                                                <td class="width100">
                                                    <span>Oct 17, 2019</span>
                                                </td>
                                                <td class="width100 text-center">
                                                    <span class="size"> - </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="width45">
                                                    <i class="fa fa-folder text-danger"></i>
                                                </td>
                                                <td>
                                                    <span class="folder-name">Holidays</span>
                                                </td>
                                                <td>
                                                    -
                                                </td>
                                                <td class="width100">
                                                    <span>John</span>
                                                </td>
                                                <td class="width100">
                                                    <span>Oct 18, 2019</span>
                                                </td>
                                                <td class="width100 text-center">
                                                    <span class="size"> 50MB </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="width45">
                                                    <i class="fa fa-folder"></i>
                                                </td>
                                                <td>
                                                    <span class="folder-name">Mobile Work </span>
                                                </td>
                                                <td>
                                                    -
                                                </td>
                                                <td class="width100">
                                                    <span>Me</span>
                                                </td>
                                                <td class="width100">
                                                    <span>April 7, 2020</span>
                                                </td>
                                                <td class="width100 text-center">
                                                    <span class="size"> 1GB </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="width45">
                                                    <i class="fa fa-folder"></i>
                                                </td>
                                                <td>
                                                    <span class="folder-name">Photoshop Data</span>
                                                </td>
                                                <td>
                                                    <div class="avatar-list avatar-list-stacked">
                                                        <img class="avatar avatar-sm" src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" title="Avatar"/>
                                                        <img class="avatar avatar-sm" src="../assets/images/xs/avatar2.jpg" data-toggle="tooltip" title="Avatar"/>
                                                    </div>
                                                </td>
                                                <td class="width100">
                                                    <span>Andrew</span>
                                                </td>
                                                <td class="width100">
                                                    <span>Nov 23, 2020</span>
                                                </td>
                                                <td class="width100 text-center">
                                                    <span class="size"> - </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="width45">
                                                    <i class="fa fa-folder text-danger"></i>
                                                </td>
                                                <td>
                                                    <span class="folder-name">Holidays</span>
                                                </td>
                                                <td>
                                                    <div class="avatar-list avatar-list-stacked">
                                                        <img class="avatar avatar-sm" src="../assets/images/xs/avatar5.jpg" data-toggle="tooltip" title="Avatar"/>
                                                        <img class="avatar avatar-sm" src="../assets/images/xs/avatar6.jpg" data-toggle="tooltip" title="Avatar"/>
                                                        <img class="avatar avatar-sm" src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" title="Avatar"/>
                                                        <img class="avatar avatar-sm" src="../assets/images/xs/avatar4.jpg" data-toggle="tooltip" title="Avatar"/>
                                                    </div>
                                                </td>
                                                <td class="width100">
                                                    <span>Me</span>
                                                </td>
                                                <td class="width100">
                                                    <span>Dec 5, 2019</span>
                                                </td>
                                                <td class="width100 text-center">
                                                    <span class="size"> 100MB </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="width45">
                                                    <i class="fa fa-file-excel-o text-success"></i>
                                                </td>
                                                <td>
                                                    <span class="folder-name">new timesheet.xlsx</span>
                                                </td>
                                                <td>
                                                    -
                                                </td>
                                                <td class="width100">
                                                    <span>Me</span>
                                                </td>
                                                <td class="width100">
                                                    <span>Dec 5, 2019</span>
                                                </td>
                                                <td class="width100 text-center">
                                                    <span class="size"> 52KB </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="width45">
                                                    <i class="fa fa-file-word-o text-warning"></i>
                                                </td>
                                                <td>
                                                    <span class="folder-name">new project.doc</span>
                                                </td>
                                                <td>
                                                    -
                                                </td>
                                                <td class="width100">
                                                    <span>Me</span>
                                                </td>
                                                <td class="width100">
                                                    <span>May 5, 2020</span>
                                                </td>
                                                <td class="width100 text-center">
                                                    <span class="size"> 152KB </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="width45">
                                                    <i class="fa fa-file-pdf-o text-warning"></i>
                                                </td>
                                                <td>
                                                    <span class="folder-name">report.pdf</span>
                                                </td>
                                                <td>
                                                    -
                                                </td>
                                                <td class="width100">
                                                    <span>Me</span>
                                                </td>
                                                <td class="width100">
                                                    <span>May 2, 2020</span>
                                                </td>
                                                <td class="width100 text-center">
                                                    <span class="size"> 841KB </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="width45">
                                                    <i class="fa fa-file-pdf-o text-warning"></i>
                                                </td>
                                                <td>
                                                    <span class="folder-name">report-2019.pdf</span>
                                                </td>
                                                <td>
                                                    -
                                                </td>
                                                <td class="width100">
                                                    <span>Me</span>
                                                </td>
                                                <td class="width100">
                                                    <span>Oct 16, 2019</span>
                                                </td>
                                                <td class="width100 text-center">
                                                    <span class="size"> 541KB </span>
                                                </td>
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
</div>

<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<script src="../assets/js/core.js"></script>
</body>
</html>