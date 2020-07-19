<?php include('includes/header.php'); ?>
<link href="/css/blog.css" rel="stylesheet">

<!--
<section id="sub-header" >
  	<div class="container">
    
    	<div class="row">
        	<div class="col-md-12 text-center">
            	<h1>Course title</h1>
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
			<li><a href="/course/detail?cid=<?php echo $course["id"]; ?>"><?php echo $course["title"]; ?></a></li>
			<li class="active"><?php echo $video["title"]; ?></li>
		</ol>
		<div class="row">
     		<div class="col-md-8">
				<iframe src="https://player.vimeo.com/video/438633048" width="750" height="420" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
				<!-- width="640" height="360" -->
				<!--<iframe src="http://www.youtube.com/embed/pgk-719mTxM?wmode=transparent" style="border:0;height:650px;" class="video_course"></iframe>-->
				<h3><?php echo $video["title"]; ?></h3>
				<p><?php echo $video["description"]; ?></p>
				<!--
				<blockquote class="styled">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
					<small>Someone famous in <cite title="">Body of work</cite></small>
				</blockquote>
				-->
				<hr>
				<!--
				<div class="clearfix text-center">
					<a href="#" class="pull-left button_medium_outline"> <i class="icon-left-open"></i></a>
					<a href="#" class="button_medium_outline">Mark as complete</a>
					<a href="#" class="pull-right button_medium_outline"><i class="icon-right-open"></i></a>
				</div>
				-->
				
				
				
					<h4><?php echo $video['reply_num'] ?> comments</h4>
					
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
										<button onclick = "showVideoReplyForm(event, <?php echo $comment['id'] ?>, <?php echo $comment['id'] ?>, <?php echo $video['id']?>)" 
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
														<button onclick="showVideoReplyCommentForm(event, <?php echo $reply['id']?>, <?php echo $comment['id'] ?>, <?php echo $video['id']?>)" 
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
					<form action="/course/comment_video" method="post">
						<div class="form-group">
							<textarea name="body" class="form-control style_2" style="height:150px;" placeholder="type your comment here"></textarea>
						</div>
						<input type="hidden" name="video_id" value="<?php echo $video['id'] ?>" />
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
					<h4><a href="#">Download files <i class="icon-download pull-right"></i></a></h4><br>
					<h4>Instructor</h4>
					<div class="media">
						<div class="pull-right">
							<img src="/img/avatar1.jpg" class="img-circle" alt="">
						</div>
						<div class="media-body">
							<h5 class="media-heading"><a href="#"><?php echo $course["username"]; ?></a></h5>
							<p>Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. </p>
						</div>
					</div>
				</div>

				<div class="box_style_1">
					<h4>Related Videos</h4>
					<ul class="list_1">
						<li><a href="#">Ceteros mediocritatem</a></li>
						<li><a href="#">Labore nostrum</a></li>
						<li><a href="#">Primis bonorum</a></li>
						<li><a href="#">Ceteros mediocritatem</a></li>
					</ul>
				</div>
			</aside>
		</div><!-- End row -->
		

		
	</div><!-- End container -->
</section>


<script type="text/javascript">
function showVideoReplyForm(event, replyee_id, comment_id, video_id) {
	$parent = $(event.target).parent();
	if($parent.children(".reply-form").length == 0) {
		$parent.append(
			"<form action='/course/reply_video' method='POST' class='reply-form' style='margin-top: 5px;'>" +
				"<textarea rows='8' cols='100' name='body' style='width:100%;'></textarea>" +
				"<input type='hidden' name='video_id' value='" + video_id + "'/>" +
				"<input type='hidden' name='replyee_id' value='" + replyee_id + "' />" +
				"<input type='hidden' name='comment_id' value='" + comment_id + "'/>" +
				"<input type='submit' style='margin-top: 5px;' name='comment_reply' value='Post' />" +
			"</form>");
	}
}	

function showVideoReplyCommentForm(event, replyee_id, comment_id, video_id) {
	$parent = $(event.target).parent().parent();
	if($parent.children(".reply-form").length == 0) {
		$parent.append(
			"<form action='/course/reply_video' method='POST' class='reply-form' style='margin-top: 5px;'>" +
				"<textarea rows='8' cols='100' name='body' style='width:100%;'></textarea>" +
				"<input type='hidden' name='video_id' value='" + video_id + "'/>" +
				"<input type='hidden' name='replyee_id' value='" + replyee_id + "' />" +
				"<input type='hidden' name='comment_id' value='" + comment_id + "'/>" +
				"<input type='submit' style='margin: 8px 0px;' name='comment_reply' value='Post' />" +
			"</form>");
	}
}

</script>
<script src="/js/jquery.fitvids.js"></script> <!-- for video responsive-->
<?php include('includes/footer.php'); ?>