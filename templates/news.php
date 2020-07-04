<?php include('includes/header.php'); ?>
<link href="/css/news.css" rel="stylesheet">
<section id="sub-header">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 text-center">
			<h2>News page</h2>
			<p class="lead">
            Keep up with what's happening in the world 
			</p>
		</div>
	</div><!-- End row -->
</div><!-- End container -->
<div class="divider_top"></div>
</section><!-- End sub-header -->

<section id="main_content">

<div class="container">

<ol class="breadcrumb">
      <li><a href="index.html">Home</a></li>
      <li class="active">Active page</li>
    </ol>
    
	 <div class="row"> 
     
     <aside class="col-md-4">
     	<div class=" box_style_1">
				<div class="widget" style="margin-top:15px;">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
						<button class="btn btn-default" type="button" style="margin-left:0;"><i class="icon-search"></i></button>
						</span>
					</div><!-- /input-group -->
				</div><!-- End Search -->
                
				<div class="widget">
					<h4>Featured Events</h4>
                    
					<ul class="recent_post">
						<li>
						<i class="icon-calendar-empty"></i> 16th July, 2020
						<div><a href="#">It is a long established fact that a reader will be distracted </a></div>
						</li>
						<li>
						<i class="icon-calendar-empty"></i> 16th July, 2020
						<div><a href="#">It is a long established fact that a reader will be distracted </a></div>
						</li>
						<li>
						<i class="icon-calendar-empty"></i> 16th July, 2020
						<div><a href="#">It is a long established fact that a reader will be distracted </a></div>
						</li>
                        <li>
						<i class="icon-calendar-empty"></i> 16th July, 2020
						<div><a href="#">It is a long established fact that a reader will be distracted </a></div>
						</li>
					</ul>
				</div><!-- End widget -->
				
			</div><!-- End box-sidebar -->
     </aside><!-- End aside -->    
     <div class="col-md-8">
            <h2 style="font-size: 22px;"><?php echo $news['title'] ?></h2>
			 <div><?php echo $news['body'] ?></div>
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
					</div>
			 <h4>Leave a comment</h4>
					<?php if(isLoggedIn()): ?>
					<form action="/news/comment" method="post">
						<div class="form-group">
							<textarea name="body" class="form-control style_2" style="height:150px;" placeholder="type your comment here"></textarea>
						</div>
						<input type="hidden" name="news_id" value="<?php echo $news['id'] ?>" />
						<input type="hidden" name="replyee_id" value="-1" />
						<input type="hidden" name="comment_id" value="-1" />
						<div class="form-group">
							<input type="submit" class=" button_medium" value="Post Comment" name="post_comment"/>
						</div>
					</form>
					<?php else: ?>
					<div>Please login to leave a comment!</div>
					<?php endif;?>
					
     </div><!-- End col-md-8-->   
	
  </div>  <!-- End row-->    
  
</div><!-- End container -->
</section><!-- End main_content-->
<?php include('includes/footer.php'); ?>