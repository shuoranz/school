<?php

	$pageUrl = "Dashboard";

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
                                <h3 class="card-title">Active Tasks</h3>
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
                                <h3 class="card-title">Tasks Done</h3>
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
                                <h3 class="card-title">Video Viewed</h3>
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
                                <h3 class="card-title">Application Deadline</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="number mb-0 font-32 counter">350</h5>
                                <span class="font-12">days left... <a href="#">More</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">SAT Date</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="number mb-0 font-32 counter">230</h5>
                                <span class="font-12">days left...  <a href="#">More</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ACT Date</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="number mb-0 font-32 counter">35</h5>
                                <span class="font-12">days left...  <a href="#">More</a></span>
                            </div>
                        </div>
                    </div>
                </div>
				<!--
                <div class="row clearfix row-deck">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sales Analytics</h3>
                                <div class="card-options">
                                    <button class="btn btn-sm btn-outline-secondary mr-1" id="one_month">1M</button>
                                    <button class="btn btn-sm btn-outline-secondary mr-1" id="six_months">6M</button>
                                    <button class="btn btn-sm btn-outline-secondary mr-1" id="one_year" class="active">1Y</button>
                                    <button class="btn btn-sm btn-outline-secondary mr-1" id="ytd">YTD</button>
                                    <button class="btn btn-sm btn-outline-secondary" id="all">ALL</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="apex-timeline-chart"></div>
                            </div>
                        </div>                
                    </div>
                    <div class="col-xl-8 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Current Ticket Status</h3>
                                <div class="card-options">
                                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between">
                                    <div class="font-12">as of 10th to 17th of Jun 2019</div>
                                    <div class="selectgroup w250">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="intensity" value="Day" class="selectgroup-input" checked="">
                                            <span class="selectgroup-button">1D</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="intensity" value="Week" class="selectgroup-input">
                                            <span class="selectgroup-button">1W</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="intensity" value="Month" class="selectgroup-input">
                                            <span class="selectgroup-button">1M</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="intensity" value="Year" class="selectgroup-input">
                                            <span class="selectgroup-button">1Y</span>
                                        </label>
                                    </div>
                                </div>
                                <div id="chart-combination" style="height: 205px"></div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6 col-xl-3 col-md-6">
                                        <h5>05</h5>
                                        <div class="clearfix">
                                            <div class="float-left"><strong>35%</strong></div>
                                            <div class="float-right"><small class="text-muted">Yesterday</small></div>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-gray" role="progressbar" style="width: 35%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="text-uppercase font-10">New Tickets</span>
                                    </div>
                                    <div class="col-6 col-xl-3 col-md-6">
                                        <h5>18</h5>
                                        <div class="clearfix">
                                            <div class="float-left"><strong>61%</strong></div>
                                            <div class="float-right"><small class="text-muted">Yesterday</small></div>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-gray" role="progressbar" style="width: 61%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="text-uppercase font-10">Open Tickets</span>
                                    </div> 
                                    <div class="col-6 col-xl-3 col-md-6">
                                        <h5>06</h5>
                                        <div class="clearfix">
                                            <div class="float-left"><strong>100%</strong></div>
                                            <div class="float-right"><small class="text-muted">Yesterday</small></div>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-gray" role="progressbar" style="width: 100%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="text-uppercase font-10">Solved Tickets</span>
                                    </div>
                                    <div class="col-6 col-xl-3 col-md-6">
                                        <h5>11</h5>
                                        <div class="clearfix">
                                            <div class="float-left"><strong>87%</strong></div>
                                            <div class="float-right"><small class="text-muted">Yesterday</small></div>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-gray" role="progressbar" style="width: 87%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="text-uppercase font-10">Unresolved</span>
                                    </div>                                                                       
                                </div>
                            </div>
                        </div>                
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Project Statistics</h3>
                                <div class="card-options">
                                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-4 border-right pb-4 pt-4">
                                        <label class="mb-0 font-13">Total Project</label>
                                        <h4 class="font-30 font-weight-bold text-col-blue counter">42</h4>
                                    </div>
                                    <div class="col-4 border-right pb-4 pt-4">
                                        <label class="mb-0 font-13">On Going</label>
                                        <h4 class="font-30 font-weight-bold text-col-blue counter">23</h4>
                                    </div>
                                    <div class="col-4 pb-4 pt-4">
                                        <label class="mb-0 font-13">Pending</label>
                                        <h4 class="font-30 font-weight-bold text-col-blue counter">8</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-vcenter mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>35%</strong></div>
                                                    <div class="float-right"><small class="text-muted">Design Team</small></div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-azure" role="progressbar" style="width: 35%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>25%</strong></div>
                                                    <div class="float-right"><small class="text-muted">Developer Team</small></div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-green" role="progressbar" style="width: 25%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>15%</strong></div>
                                                    <div class="float-right"><small class="text-muted">Marketing</small></div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-orange" role="progressbar" style="width: 15%" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>20%</strong></div>
                                                    <div class="float-right"><small class="text-muted">Management</small></div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-indigo" role="progressbar" style="width: 20%" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>11%</strong></div>
                                                    <div class="float-right"><small class="text-muted">Other</small></div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-pink" role="progressbar" style="width: 11%" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				-->
            </div>
        </div>
        <div class="section-body">
            <div class="container-fluid">
                <div class="row clearfix row-deck">
                    <div class="col-xl-4 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">TODO List</h3>
                                <div class="card-options">
                                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                    <div class="item-action dropdown ml-2">
                                        <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-174px, 25px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table card-table mt-2">
                                <tbody>
                                    <tr>
                                        <td class="w60"><img class="avatar" src="../assets/images/xs/avatar1.jpg" alt="Avatar"></td>
                                        <td>
                                            <p class="mb-0 d-flex justify-content-between"><span>Task Number #2583</span> <strong>Due in 10 days</strong></p>
                                            <span class="text-muted font-13">Feb 21, 2019</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w60"><img class="avatar" src="../assets/images/xs/avatar2.jpg" alt="Avatar"></td>
                                        <td>
                                            <p class="mb-0 d-flex justify-content-between"><span>Task Number #1245</span> <strong>Due in 20 days</strong></p>
                                            <span class="text-muted font-13">March 14, 2019</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w60"><img class="avatar" src="../assets/images/xs/avatar3.jpg" alt="Avatar"></td>
                                        <td>
                                            <p class="mb-0 d-flex justify-content-between"><span>Task Number #8596</span> <strong>Due in 3 days</strong></p>
                                            <span class="text-muted font-13">March 18, 2019</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w60"><img class="avatar" src="../assets/images/xs/avatar4.jpg" alt="Avatar"></td>
                                        <td>
                                            <p class="mb-0 d-flex justify-content-between"><span>Task Number #1526</span> <strong>Pass Due</strong></p>
                                            <span class="text-muted font-13">April 27, 2019</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w60"><img class="avatar" src="../assets/images/xs/avatar5.jpg" alt="Avatar"></td>
                                        <td>
                                            <p class="mb-0 d-flex justify-content-between"><span>Task Number #4859</span> <strong>No Due Date</strong></p>
                                            <span class="text-muted font-13">March 18, 2019</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>                        
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Your Task Rating</h3>
                                <div class="card-options">
                                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                    <div class="item-action dropdown ml-2">
                                        <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-174px, 25px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-baseline">
                                    <h1 class="mb-0 mr-2">4.75</h1>
                                    <p class="mb-0"><span class="text-success">100% <i class="fa fa-arrow-up"></i></span></p>
                                </div>
                                <h6 class="text-uppercase font-10">Performance Score</h6>
                                <div class="progress progress-xs">
                                    <div class="progress-bar" role="progressbar" style="width: 73%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 21%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 2%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-orange" role="progressbar" style="width: 2%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-indigo" role="progressbar" style="width: 2%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-vcenter mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="tx-medium"><i class="fa fa-circle text-blue"></i> Excellent</td>
                                            <td class="text-right">5.0</td>
                                            <td class="text-right">75</td>
                                        </tr>
                                        <tr>
                                            <td class="tx-medium"><i class="fa fa-circle text-success"></i> Very Good</td>
                                            <td class="text-right">4.0</td>
                                            <td class="text-right">25</td>
                                        </tr>
                                        <tr>
                                            <td class="tx-medium"><i class="fa fa-circle text-info"></i> Good</td>
                                            <td class="text-right">3.0</td>
                                            <td class="text-right">0</td>
                                        </tr>
                                        <tr>
                                            <td class="tx-medium"><i class="fa fa-circle text-orange"></i> Fair</td>
                                            <td class="text-right">2.0</td>
                                            <td class="text-right">0</td>
                                        </tr>
                                        <tr>
                                            <td class="tx-medium"><i class="fa fa-circle text-indigo"></i> Poor</td>
                                            <td class="text-right">1.0</td>
                                            <td class="text-right">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Overall Rating</h3>
                                <div class="card-options">
                                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                    <div class="item-action dropdown ml-2">
                                        <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-174px, 25px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-baseline">
                                    <h2 class="font-28 mr-2">4.75</h2>
                                    <div class="font-14">
                                        <i class="fa fa-star text-orange"></i>
                                        <i class="fa fa-star text-orange"></i>
                                        <i class="fa fa-star text-orange"></i>
                                        <i class="fa fa-star text-orange"></i>
                                        <i class="fa fa-star"></i>
                                    </div>                                    
                                </div>
                                <p class="mb-0 font-12">Overall the quality or your task Rating.</p>                                
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-vcenter mb-0">
                                    <tbody>
                                        <tr>
                                            <td><strong>5.0</strong></td>
                                            <td>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td class="text-right">432</td>
                                            <td class="text-right">58%</td>
                                        </tr>
                                        <tr>
                                            <td><strong>4.0</strong></td>
                                            <td>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>
                                            <td class="text-right">189</td>
                                            <td class="text-right">42%</td>
                                        </tr>
                                        <tr>
                                            <td><strong>3.0</strong></td>
                                            <td>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>
                                            <td class="text-right">125</td>
                                            <td class="text-right">23%</td>
                                        </tr>
                                        <tr>
                                            <td><strong>2.0</strong></td>
                                            <td>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>
                                            <td class="text-right">89</td>
                                            <td class="text-right">18%</td>
                                        </tr>
                                        <tr>
                                            <td><strong>1.0</strong></td>
                                            <td>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>
                                            <td class="text-right">18</td>
                                            <td class="text-right">11%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>  
				<!--
                <div class="row clearfix">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Project Summary</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped text-nowrap table-vcenter mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Team</th>
                                                <th>Project</th>
                                                <th>Project Cost</th>
                                                <th>Payment</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#AD1245</td>
                                                <td>Sean Black</td>
                                                <td>
                                                    <ul class="list-unstyled team-info sm margin-0 w150">
                                                        <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                                        <li class="ml-2"><span>2+</span></li>
                                                    </ul>
                                                </td>
                                                <td>Angular Admin</td>
                                                <td>$14,500</td>
                                                <td>Done</td>
                                                <td><span class="tag tag-success">Delivered</span></td>
                                            </tr>
                                            <tr>
                                                <td>#DF1937</td>
                                                <td>Sean Black</td>
                                                <td>
                                                    <ul class="list-unstyled team-info sm margin-0 w150">
                                                        <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                                        <li class="ml-2"><span>2+</span></li>
                                                    </ul>
                                                </td>
                                                <td>Angular Admin</td>
                                                <td>$14,500</td>
                                                <td>Pending</td>
                                                <td><span class="tag tag-success">Delivered</span></td>
                                            </tr>
                                            <tr>
                                                <td>#YU8585</td>
                                                <td>Merri Diamond</td>
                                                <td>
                                                    <ul class="list-unstyled team-info sm margin-0 w150">
                                                        <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                    </ul>
                                                </td>
                                                <td>One page html Admin</td>
                                                <td>$500</td>
                                                <td>Done</td>
                                                <td><span class="tag tag-orange">Submit</span></td>
                                            </tr>
                                            <tr>
                                                <td>#AD1245</td>
                                                <td>Sean Black</td>
                                                <td>
                                                    <ul class="list-unstyled team-info sm margin-0 w150">
                                                        <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                                    </ul>
                                                </td>
                                                <td>Wordpress One page</td>
                                                <td>$1,500</td>
                                                <td>Done</td>
                                                <td><span class="tag tag-success">Delivered</span></td>
                                            </tr>
                                            <tr>
                                                <td>#GH8596</td>
                                                <td>Allen Collins</td>
                                                <td>
                                                    <ul class="list-unstyled team-info sm margin-0 w150">
                                                        <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                        <li><img src="../assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                                        <li class="ml-2"><span>2+</span></li>
                                                    </ul>
                                                </td>
                                                <td>VueJs Application</td>
                                                <td>$9,500</td>
                                                <td>Done</td>
                                                <td><span class="tag tag-success">Delivered</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				-->
            </div>
        </div>       
        <div class="section-body">
            
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
