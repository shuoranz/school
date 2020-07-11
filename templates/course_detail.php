<?php include('includes/header.php'); ?>
<link href="/css/blog.css" rel="stylesheet">

<!--
<section id="sub-header" >
  	<div class="container">
    
    	<div class="row">
        	<div class="col-md-12 text-center">
            	<h1>Course details</h1>
                <p class="lead">Caulie <strong>dandelion</strong> maize lentil collard greens radish arugula sweet pepper water.</p>
            </div>
        </div>
        
        <div class="row" id="sub-header-features-2">
        	<div class="col-md-6">
            	<h2>A brief summary</h2>
                <p>Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor <strong>imperdiet deterruisset</strong>, doctus volumus explicari qui ex, appareat similique an usu. Vel an hinc putant fierent, saperet legimus offendit sed ei doctus volumus explicari qui ex, appareat similique an usu. . Dolor euripidis cum eu, ea per lucilius periculis corrumpit, ut euismod omittam ancillae his.</p>
                <p><em>John - General Manager</em></p>
            </div>
            <div class="col-md-6">
            	<h2>What you will learn</h2>
                <p>Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui.</p>
                <ul class="list_ok">
                    <li><strong>Certified</strong> and expert teachers</li>
                    <li><strong>Extensive</strong> doumentation provided</li>
                    <li><strong>Money back</strong> garantee</li>
                    <li><strong>Became an exeprt</strong> in only 6 days</li>
                </ul>
           </div>
        	
        </div>
    </div>
    <div class="divider_top"></div>
</section>
-->
  
<section id="main_content">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="/">Home</a></li>
			<li><a href="/course/">Course</a></li>
			<li class="active"><?php echo $course["title"]; ?></li>
		</ol>
		<div class="row">
     		<div class="col-md-8">
				<h2><?php echo $course["title"]; ?></h2>
				<p><?php echo $course["description"]; ?></p>
                    
                <hr class="add_bottom_30">
                
				<?php foreach ($videos as $key => $video) : ?>
                <div class="media" style="cursor: pointer;" onclick="window.location='/course/video?vid=<?php echo $video["id"]; ?>';">
					<div class="circ-wrapper course_detail pull-left"><h3 style="font-size:46px;padding: 12px 0px 0 8px;"><?php echo $key+1; ?></h3></div>
                    <div class="media-body">
						<h4 class="media-heading"><?php echo $video["title"]; ?></h4>
						<p><?php echo $video["description"]; ?></p>
						<ul class="data-lessons">
							<!--
							<li class="po-markup">
								<a class="po-link" href="javascript:void(0)" ><i class="icon-clock"></i> Duration: 6 hours</a>
								<div class="po-content hidden">
									<div class="po-title"><strong>Duration: 6 hours</strong></div>
									<div class="po-body">
										<p class="no_margin">Lorem ipsum dolor sit amet, has at illum dictas definitiones, ei primis indoctum torquatos nec. Vis te velit probatus, natum atomorum tincidunt nec an.</p>
									</div>
								</div>
							</li>
							-->
							<li class="po-markup">
								<a class="po-link" href="javascript:void(0)" ><i class="icon-video"></i> Video files</a>
								<div class="po-content hidden">
									<div class="po-title"><strong>Video files</strong></div> <!-- ./po-title -->
									<div class="po-body"><ul class="list_po_body"><li><i class="icon-ok"></i> 2 Video lessons</li><li> <i class="icon-ok"></i>1 Video for practice</li><li> <i class="icon-ok"></i>1 Video Quiz</li></ul>
									</div><!-- ./po-body -->
								</div><!-- ./po-content -->
							</li>
							<li class="po-markup">
								<a class="po-link" href="javascript:void(0)" ><i class="icon-mic"></i> <?php echo $course["username"]; ?></a>
								<div class="po-content hidden">
									<div class="po-title"><strong><?php echo $course["username"]; ?></strong></div> <!-- ./po-title -->
									<div class="po-body">
									<p class="no_margin">Lorem ipsum dolor sit amet, has at illum dictas definitiones, ei primis indoctum torquatos nec. Vis te velit probatus, natum atomorum tincidunt nec an.</p>
									</div><!-- ./po-body -->
								</div><!-- ./po-content -->
							</li>
							<li>
								<a href="javascript:void(0)" ><i class=" icon-download"></i> Download prospect</a>
							</li>
						</ul>
					</div>
				</div>
				<?php endforeach; ?>
				
					<h4><?php echo $course['reply_num'] ?> comments</h4>
					
					<div id="comments">
						<ol>
							<?php foreach($comments as $comment) : ?>
							<li>
							<div class="comment_right clearfix">
								<div class="comment-owner">
									<div class="comment-owner-avatar" style="background: url(../../images/avatars/<?php echo $comment['avatar']?>);background-size: cover;"></div>
									<div><a href="#"><?php echo $comment['username'] ?></a></div>
								</div>
								<div class="comment_info">
									<p>
										<?php echo $comment['body'] ?>
									</p>
									<div>
										<button onclick = "showCourseReplyForm(event, <?php echo $comment['id'] ?>, <?php echo $comment['id'] ?>, <?php echo $course['id']?>)" 
										class="reply-button">Reply</button>
									</div>
									<?php if(count($comment['replies']) > 0) :?>
									<div class="commentReplies">
										<?php foreach ($comment['replies'] as $reply) : ?>
											<div class="comment-reply">
												<div class="reply-avatar-container">
													<div class="reply-avatar" style="background: url(../../images/avatars/<?php echo $reply['avatar']?>);background-size: cover;">
													</div>
												</div>
												<div class="reply-content">
													<?php echo $reply['username'] ?>
													<?php if(strcmp($reply['replyee_id'], $comment['id']) != 0): ?>
														Reply <?php echo getUsernameByBlogReplyId($reply['replyee_id']) ?>
													<?php endif ?>
													: <?php echo $reply['body']?>
													<div class="dateAndReply"> 
														<?php echo $reply['create_date'] ?>
														<button onclick="showCourseReplyCommentForm(event, <?php echo $reply['id']?>, <?php echo $comment['id'] ?>, <?php echo $course['id']?>)" 
														class="replycomment">Reply</button>
													</div>
												</div>
											</div>
										<?php endforeach ?>
									</div>
									<?php endif ?>
								</div>
								
								
							</div>
							</li>
							<hr></hr>
							<?php endforeach ?>
						</ol>
					</div><!-- End Comments -->
					
					<h4>Leave a comment</h4>
					<?php if(isLoggedIn()): ?>
					<form action="/course/comment_course" method="post">
						<div class="form-group">
							<textarea name="body" class="form-control style_2" style="height:150px;" placeholder="type your comment here"></textarea>
						</div>
						<input type="hidden" name="course_id" value="<?php echo $course['id'] ?>" />
						<input type="hidden" name="replyee_id" value="-1" />
						<input type="hidden" name="comment_id" value="-1" />
						<div class="form-group">
							<input type="submit" class=" button_medium" value="Post Comment" name="post_comment"/>
						</div>
					</form>
					<?php else: ?>
					<div>Please login to leave a comment!</div>
					<?php endif;?>
				
            </div><!-- End col-md-8  -->
            
            <aside class="col-md-4">
				<div class="box_style_1">
					<h4>Lessons <span class="pull-right">17</span></h4>
					<!--<h4>Hours <span class="pull-right">12</span></h4><br>-->
					<h4>Speakers</h4>
					<div class="media">
						<div class="pull-right">
							<img src="img/avatar1.jpg" class="img-circle" alt="">
						</div>
						<div class="media-body">
							<h5 class="media-heading"><a href="#">Marc Twain</a></h5>
							<p>
								Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. 
							</p>
						</div>
					</div>
					
					<div class="media">
						<div class="pull-right">
							<img src="img/avatar1.jpg" class="img-circle" alt="">
						</div>
						<div class="media-body">
							<h5 class="media-heading"><a href="#">Marc Twain</a></h5>
							<p>
								Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in.
							</p>
						</div>
					</div>
					
					<h4>Related content</h4>
					<ul class="list_1">
						  <li><a href="#">Ceteros mediocritatem</a></li>
						  <li><a href="#">Labore nostrum</a></li>
						  <li><a href="#">Primis bonorum</a></li>
						  <li><a href="#">Ceteros mediocritatem</a></li>
					</ul>
										
				</div>
			</aside> <!-- End col-md-4 -->
     	
		</div><!-- End row -->
	</div><!-- End container -->
</section>

<section id="join">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<div class="row">
					<div class="col-md-2 hidden-sm hidden-xs"><img src="/img/arrow_hand_1.png" alt="Arrow" > </div>
					<div class="col-md-8"><a href="#" class="button_big">Start learning</a> </div>
				</div>
			</div>
		</div>
	</div>
</section>

 
 
<script type="text/javascript">
function showCourseReplyForm(event, replyee_id, comment_id, course_id) {
	$parent = $(event.target).parent();
	if($parent.children(".reply-form").length == 0) {
		$parent.append(
			"<form action='/course/reply_course' method='POST' class='reply-form' style='margin-top: 5px;'>" +
				"<textarea rows='8' cols='100' name='body' style='width:100%;'></textarea>" +
				"<input type='hidden' name='course_id' value='" + course_id + "'/>" +
				"<input type='hidden' name='replyee_id' value='" + replyee_id + "' />" +
				"<input type='hidden' name='comment_id' value='" + comment_id + "'/>" +
				"<input type='submit' style='margin-top: 5px;' name='comment_reply' value='Post' />" +
			"</form>");
	}
}	

function showCourseReplyCommentForm(event, replyee_id, comment_id, course_id) {
	$parent = $(event.target).parent().parent();
	if($parent.children(".reply-form").length == 0) {
		$parent.append(
			"<form action='/course/reply_course' method='POST' class='reply-form' style='margin-top: 5px;'>" +
				"<textarea rows='8' cols='100' name='body' style='width:100%;'></textarea>" +
				"<input type='hidden' name='course_id' value='" + course_id + "'/>" +
				"<input type='hidden' name='replyee_id' value='" + replyee_id + "' />" +
				"<input type='hidden' name='comment_id' value='" + comment_id + "'/>" +
				"<input type='submit' style='margin: 8px 0px;' name='comment_reply' value='Post' />" +
			"</form>");
	}
}

</script>
<?php include('includes/footer.php'); ?>