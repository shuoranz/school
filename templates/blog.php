<?php include('includes/header.php'); ?>
<link href="/css/blog.css" rel="stylesheet">
<section id="sub-header">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 text-center">
			<h2>Blog</h2>
			<p class="lead">
				Everything carefully prepared for you 
			</p>
		</div>
	</div><!-- End row -->
</div><!-- End container -->
<div class="divider_top"></div>
</section><!-- End sub-header -->

<section id="main_content">

<div class="container">

<ol class="breadcrumb">
  <li><a href="/index.php">Home</a></li>
  <li><a href="/blog/?p=1">Blog</a></li>
  <li class="active">Current</li>
</ol>

	 <div class="row blog-container"> 
		<div class="col-md-12">
				<div class="single-post">
						<h3><?php echo $blog['title'] ?></h3>
						<div class="post-right">
							<i class="icon-eye"></i><?php echo $blog['view_count'] ?>
								<i class="icon-thumbs-up"></i><?php echo $blog['like_count'] ?>
								<i class="icon-comment"></i><?php echo $blog['reply_num'] ?>
							</div>
						<div class="ck-content">
							<?php echo $blog['body'] ?>
						</div>
						<div class="post_info clearfix">
							<div class="post-left">
								<ul>
									<li><i class="icon-calendar-empty"></i><span><?php echo $blog['create_date']?></span></li>
									<li><a class="icon-user-link" href="#">
									<span class="user-avatar" style="background: url(../../images/avatars/<?php echo $blog['avatar']?>);background-size: cover;"></span><?php echo $blog['username'] ?></a></li>
									<li><i class="icon-flag-filled"></i> <a href="#"><?php echo $blog['name'] ?></a></li>
								</ul>
							</div>
							<div class="post-right">
							<i class="icon-eye"></i><?php echo $blog['view_count'] ?>
								<i class="icon-thumbs-up"></i><?php echo $blog['like_count'] ?>
								<i class="icon-comment"></i><?php echo $blog['reply_num'] ?>
							</div>
						</div>
					</div><!-- end post -->
					
					<hr>
					
					<h4><?php echo $blog['reply_num'] ?> comments</h4>
					
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
										<button onclick = "showReplyForm(event, <?php echo $comment['id'] ?>, <?php echo $comment['id'] ?>, <?php echo $blog['id']?>)" 
										class="reply-button">回复</button>
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
														回复 <?php echo getUsernameByBlogReplyId($reply['replyee_id']) ?>
													<?php endif ?>
													: <?php echo $reply['body']?>
													<div class="dateAndReply"> 
														<?php echo $reply['create_date'] ?>
														<button onclick="showReplyCommentForm(event, <?php echo $reply['id']?>, <?php echo $comment['id'] ?>, <?php echo $blog['id']?>)" 
														class="replycomment">回复</button>
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
					<form action="/blog/comment" method="post">
						<div class="form-group">
							<textarea name="body" class="form-control style_2" style="height:150px;" placeholder="type your comment here"></textarea>
						</div>
						<input type="hidden" name="blog_id" value="<?php echo $blog['id'] ?>" />
						<input type="hidden" name="replyee_id" value="-1" />
						<input type="hidden" name="comment_id" value="-1" />
						<div class="form-group">
							<input type="submit" class=" button_medium" value="Post Comment" name="post_comment"/>
						</div>
					</form>
					<?php else: ?>
					<div>Please login to leave a comment!</div>
					<?php endif;?>
					
					
					
		</div><!-- End col-md-12-->   
  
	
  </div>  <!-- End row-->    
</div><!-- End container -->
</section><!-- End main_content-->
<Script>

</Script>
<?php include('includes/footer.php'); ?>