	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-41474117-3', 'auto');
	  ga('send', 'pageview');
	</script>
	<div id="header_top" class="header_top">
        <div class="container">
            <div class="hleft">
                <a class="header-brand" href="/dashboard/"><i class="fa fa-soccer-ball-o brand-logo"></i></a>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="nav-link user_btn"><img class="avatar" src="../assets/images/user.png" alt="" data-toggle="tooltip" data-placement="right" title="User Menu"/></a>
                    <!--
					<a href="page-search.html" class="nav-link icon xs-hide"><i class="fa fa-search"></i></a>    					
                    <a href="app-calendar.html"  class="nav-link icon app_inbox xs-hide"><i class="fa fa-calendar"></i></a>
                    <a href="app-contact.html"  class="nav-link icon xs-hide"><i class="fa fa-id-card-o"></i></a>
                    <a href="app-chat.html"  class="nav-link icon xs-hide"><i class="fa fa-comments-o"></i></a>
                    <a href="app-filemanager.html"  class="nav-link icon app_file xs-hide"><i class="fa fa-folder-o"></i></a>
                    <a href="javascript:void(0)" class="nav-link icon theme_btn xs-hide"><i class="fa fa-paint-brush" data-toggle="tooltip" data-placement="right" title="Themes"></i></a>
					-->
				</div>
            </div>
            <div class="hright">
                <div class="dropdown">
					<!--
                    <a href="javascript:void(0)" class="nav-link icon settingbar"><i class="fa fa-gear fa-spin" data-toggle="tooltip" data-placement="right" title="Settings"></i></a>
                    -->
					<a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fa  fa-align-left"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div id="rightsidebar" class="right_sidebar">
        <a href="javascript:void(0)" class="p-3 settingbar float-right"><i class="fa fa-close"></i></a>
        <div class="p-4">
            <div class="mb-4">
                <h6 class="font-14 font-weight-bold text-muted">Font Style</h6>
                <div class="custom-controls-stacked font_setting">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="font" value="font-opensans">
                        <span class="custom-control-label">Open Sans Font</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="font" value="font-montserrat" checked="">
                        <span class="custom-control-label">Montserrat Google Font</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="font" value="font-roboto">
                        <span class="custom-control-label">Robot Google Font</span>
                    </label>
                </div>
            </div>
            <hr>
            <div class="mb-4">
                <h6 class="font-14 font-weight-bold text-muted">Dropdown Menu Icon</h6>
                <div class="custom-controls-stacked arrow_option">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="marrow" value="arrow-a">
                        <span class="custom-control-label">A</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="marrow" value="arrow-b">
                        <span class="custom-control-label">B</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="marrow" value="arrow-c" checked="">
                        <span class="custom-control-label">C</span>
                    </label>
                </div>
                <h6 class="font-14 font-weight-bold mt-4 text-muted">SubMenu List Icon</h6>
                <div class="custom-controls-stacked list_option">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="listicon" value="list-a" checked="">
                        <span class="custom-control-label">A</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="listicon" value="list-b">
                        <span class="custom-control-label">B</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="listicon" value="list-c">
                        <span class="custom-control-label">C</span>
                    </label>
                </div>
            </div>
            <hr>
            <div>
                <h6 class="font-14 font-weight-bold mt-4 text-muted">General Settings</h6>
                <ul class="setting-list list-unstyled mt-1 setting_switch">
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Night Mode</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-darkmode">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Fix Navbar top</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-fixnavbar">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Header Dark</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-pageheader" checked="">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Min Sidebar Dark</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-min_sidebar">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Sidebar Dark</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-sidebar">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Icon Color</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-iconcolor">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Gradient Color</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-gradient">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Box Shadow</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-boxshadow">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">RTL Support</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-rtl">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Box Layout</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-boxlayout">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                </ul>
            </div>
            <hr>
            <div class="form-group">
                <label class="d-block">Storage <span class="float-right">77%</span></label>
                <div class="progress progress-sm">
                    <div class="progress-bar" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                </div>
                <button type="button" class="btn btn-primary btn-block mt-3">Upgrade Storage</button>
            </div>
        </div>
    </div>

    <div class="theme_div">
        <div class="card">
            <div class="card-body">
                <ul class="list-group list-unstyled">
                    <li class="list-group-item mb-2">
                        <p>Default Theme</p>
                        <a href="../project/index.html"><img src="../assets/images/themes/default.png" class="img-fluid" /></a>
                    </li>
                    <li class="list-group-item mb-2">
                        <p>Night Mode Theme</p>
                        <a href="../project-dark/index.html"><img src="../assets/images/themes/dark.png" class="img-fluid" /></a>
                    </li>                    
                    <li class="list-group-item mb-2">
                        <p>RTL Version</p>
                        <a href="../project-rtl/index.html"><img src="../assets/images/themes/rtl.png" class="img-fluid" /></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="user_div">
        <h5 class="brand-name mb-4">Admin Panel<a href="javascript:void(0)" class="user_btn"><i class="icon-logout"></i></a></h5>
        <div class="card-body">
            <a href="page-profile.html"><img class="card-profile-img" src="../assets/images/sm/avatar1.jpg" alt=""></a>
            <h6 class="mb-0">Xiao Wen</h6>
            <span>xiaowen@gmail.com</span>
            <div class="d-flex align-items-baseline mt-3">
                <h3 class="mb-0 mr-2">4.75</h3>
                <p class="mb-0"><span class="text-success">1.6% <i class="fa fa-arrow-up"></i></span></p>
            </div>
            <div class="progress progress-xs">
                <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-orange" role="progressbar" style="width: 5%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-indigo" role="progressbar" style="width: 13%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h6 class="text-uppercase font-10 mt-1">Performance Score</h6>
            <hr>
            <p>Activity</p>
            <ul class="new_timeline">
                <li>
                    <div class="bullet pink"></div>
                    <div class="time">11:00am</div>
                    <div class="desc">
                        <h3>Attendance</h3>
                        <h4>Computer Class</h4>
                    </div>
                </li>
                <li>
                    <div class="bullet pink"></div>
                    <div class="time">11:30am</div>
                    <div class="desc">
                        <h3>Added an interest</h3>
                        <h4>“Volunteer Activities”</h4>
                    </div>
                </li>
                <li>
                    <div class="bullet green"></div>
                    <div class="time">12:00pm</div>
                    <div class="desc">
                        <h3>School Team</h3>
                        <h4>Hangouts</h4>
                        <ul class="list-unstyled team-info margin-0 p-t-5">                                            
                            <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                            <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                            <li><img src="../assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                            <li><img src="../assets/images/xs/avatar4.jpg" alt="Avatar"></li>                                            
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="bullet green"></div>
                    <div class="time">2:00pm</div>
                    <div class="desc">
                        <h3>Responded to counselor</h3>
                        <a href="javascript:void(0)">“In-Kind Opportunity”</a>
                    </div>
                </li>
                <li>
                    <div class="bullet orange"></div>
                    <div class="time">1:30pm</div>
                    <div class="desc">
                        <h3>Lunch Break</h3>
                    </div>
                </li>
                <li>
                    <div class="bullet green"></div>
                    <div class="time">2:38pm</div>
                    <div class="desc">
                        <h3>Finish</h3>
                        <h4>Go to Home</h4>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div id="left-sidebar" class="sidebar ">
        <h5 class="brand-name">Admin Panel<a href="javascript:void(0)" class="icon menu_toggle mr-3"><i class="fa  fa-align-left float-right"></i></a>  <!--<a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a>--></h5>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul class="metismenu">
				<!--
                <li class="g_heading">Project</li>
                <li class="active"><a href="index.html"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>                        
                <li><a href="project-list.html"><i class="fa fa-list-ol"></i><span>Project list</span></a></li>
                <li><a href="project-taskboard.html"><i class="fa fa-calendar-check-o"></i><span>Taskboard</span></a></li>
                <li><a href="project-ticket.html"><i class="fa fa-list-ul"></i><span>Ticket List</span></a></li>
                <li><a href="project-ticket-details.html"><i class="icon-tag"></i><span>Ticket Details</span></a></li>
                <li><a href="project-clients.html"><i class="fa fa-user"></i><span>Clients</span></a></li>
                <li><a href="project-todo.html"><i class="fa fa-check-square-o"></i><span>Todo List</span></a></li>
                <li class="g_heading">App</li>
                <li><a href="app-calendar.html"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
                <li><a href="app-chat.html"><i class="fa fa-comments"></i><span>Chat</span></a></li>
                <li><a href="app-contact.html"><i class="fa fa-address-book"></i><span>Contact</span></a></li>
                <li><a href="app-filemanager.html"><i class="fa fa-folder"></i><span>FileManager</span></a></li>
                <li><a href="app-setting.html"><i class="fa fa-gear"></i><span>Setting</span></a></li>
                <li><a href="page-gallery.html"><i class="fa fa-photo"></i><span>Gallery</span></a></li>
                <li>
                    <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-lock"></i><span>Authentication</span></a>
                    <ul>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="forgot-password.html">Forgot password</a></li>
                        <li><a href="404.html">404 error</a></li>
                        <li><a href="500.html">500 error</a></li>   
                    </ul>
                </li>
                <li class="g_heading">Support</li>
				<li><a href="javascript:void(0)"><i class="fa fa-support"></i><span>Need Help?</span></a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-tag"></i><span>ContactUs</span></a></li>
				-->
				<li class="g_heading">Teacher</li>
				<li class="<?php echo $pageUrl=='Dashboard' ? 'active' : ''; ?>"><a href="/dashboard/"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
				<li class="<?php echo $pageUrl=='MyCourses' ? 'active' : ''; ?>"><a href="/dashboard/my-category"><i class="fa fa-book"></i><span>My Courses</span></a></li>
				<!--<li class="<?php echo $pageUrl=='MyVideos' ? 'active' : ''; ?>"><a href="/dashboard/my-videos"><i class="fa fa-youtube-play"></i><span>My Videos</span></a></li>
				<li class="<?php echo $pageUrl=='Calendar' ? 'active' : ''; ?>"><a href="calendar.php"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
				<li class="<?php echo $pageUrl=='TodoList' ? 'active' : ''; ?>"><a href="todo-list.php"><i class="fa fa-check-square-o"></i><span>Todo List</span></a></li>
				<li class="<?php echo $pageUrl=='Video' ? 'active' : ''; ?>"><a href="video-course.php"><i class="fa fa-photo"></i><span>Video Courses</span></a></li>
				-->
				
				<li class="g_heading">Business Administrator</li>
				<li class="<?php echo $pageUrl=='Forum' ? 'active' : ''; ?>"><a href="/dashboard/"><i class="fa fa-comments-o"></i><span>Audit Forums</span></a></li>
				<li class="<?php echo $pageUrl=='Courses' ? 'active' : ''; ?>"><a href="/dashboard/my-category"><i class="fa fa-book"></i><span>Manage Courses</span></a></li>
				<li class="<?php echo $pageUrl=='Blog' ? 'active' : ''; ?>"><a href="/dashboard/blog"><i class="fa fa-bold"></i><span>Blog</span></a></li>
				<li class="<?php echo $pageUrl=='News' ? 'active' : ''; ?>"><a href="/dashboard/news"><i class="fa fa-newspaper-o"></i><span>News</span></a></li>
				
				<li class="g_heading">System Administrator</li>
				<li class="<?php echo $pageUrl=='Students' ? 'active' : ''; ?>"><a href="/dashboard/student"><i class="fa fa-user"></i><span>Manage Students</span></a></li>
				<li class="<?php echo $pageUrl=='Teachers' ? 'active' : ''; ?>"><a href="/dashboard/teacher"><i class="fa fa-user-plus"></i><span>Manage Teachers</span></a></li>
				<li class="<?php echo $pageUrl=='Invitation Code' ? 'active' : ''; ?>"><a href="/dashboard/invitation-code"><i class="fa fa-ticket"></i><span>Invitation Code</span></a></li>
				<!--
				<li>
                    <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-lock"></i><span>Authentication</span></a>
                    <ul>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="forgot-password.html">Forgot password</a></li>
                        <li><a href="404.html">404 error</a></li>
                        <li><a href="500.html">500 error</a></li>   
                    </ul>
                </li>
				-->
            </ul>
        </nav>        
    </div>