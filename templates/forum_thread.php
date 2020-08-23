<?php include('includes/header.php'); ?>
<link href="/css/blog.css" rel="stylesheet">
<link href="/css/forum.css" rel="stylesheet">
<style>



ul{
    padding: 0;
    margin:0;
    list-style: none;
}
hr{
    margin:10px 0 15px 0;
}
h3{
    margin-bottom: 5px;
}



.topic{
    border-bottom: #eee solid 1px;
    margin-bottom: 10px;
    padding:10px;
}
.topic-content{
    width:100%;
}
img.avatar{
    width: 100%;
}


a.list-group-item.active, a.list-group-item.active:hover, a.list-group-item.active:focus{
    background: #5c5b69;
    border-radius: 0;
}
.list-group-item{
    border:0;
}


#main-topic{
    background: #f4f4f4;
    padding: 10px;
}


.user-info{
    border: #ddd solid 1px;
    padding:5px;
    overflow: hidden;
    font-size: 13px;
}
.user-info img{
    display: block;
    margin-bottom: 5px;
}
.user-info ul{
    list-style: none;
    margin: 10px 0 0 5px;
}
.user-info li{
    line-height: 1.6em;
}


.btn-primary{
    background:#5c5b69;
}

</style>

<section id="sub-header">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 text-center">
			<h2>Student Blog</h2>
			<!--<p class="lead boxed ">Ex utamur fierent tacimates duis choro an</p>-->
			<p class="lead">
				share your achievements, post your questions
			</p>
		</div>
	</div><!-- End row -->
</div><!-- End container -->
<div class="divider_top"></div>
</section><!-- End sub-header -->

<section id="main_content">

<div class="container">

	<ol class="breadcrumb">
      <li><a href="/">Home</a></li>
	  <li><a href="/forum">Forum</a></li>
      <li class="active"><?php echo $topic['title']; ?></li>
    </ol>
    
	 
     <!--
     <aside class="col-md-4">
     	<div class=" box_style_1">
				<div class="widget" style="margin-top:15px;">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
						<button class="btn btn-default" type="button" style="margin-left:0;"><i class="icon-search"></i></button>
						</span>
					</div>
				</div>
                
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
				</div>
				
			</div>
     </aside>    
	 -->
	 <!--
     <div class="col-md-8">
            <h2>Simply dummy text</h2>
             <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
             <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
			<blockquote class="styled">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                    <small>Someone famous in <cite title="">Body of work</cite></small>
             </blockquote>
             <p><img src="/img/pic_1.jpg" width="800" height="400" alt="Pic" class="img-responsive"></p>
             <h4>Text of the printing</h4>
             <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
             <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
     </div>
	 -->
	<div class="row">
		<h3 style="padding-left:10px;"><?php echo $topic['title']; ?><a style="float:right" href="/forum/edit/?id=<?php echo $topic['id']; ?>">edit</a></h3>
		<br>
		<ul id="topics">
			<li id="main-topic" class="topic topic">
				<div class="row">
					<div class="col-md-2">
						<div class="user-info">
							<img class="avatar pull-left" src="/images/avatars/<?php echo empty($topic['avatar']) ? "noimage.png" : $topic['avatar']; ?>" />
							<ul>
								<li><strong><?php echo $topic['username']; ?></strong></li>
								<li><?php echo userPostCount($topic['user_id']); ?> Posts</li>
								<li><a href="<?php echo BASE_URI; ?>topics.php?user=<?php echo $topic['user_id']; ?>">Profile</a>  </li>
							</ul>
						</div>
					</div>
				<div class="col-md-10">
					<div class="topic-content">
						<p><?php echo $topic['body']; ?></p>
					</div>
					<?php if(count($imgs) > 0): ?>
					<div class="imgs-container">
					<?php foreach($imgs as $img): ?>
						<img class="forum-img" src="<?php echo $img ?>" />
					<?php endforeach;?>
					</div>
					<?php endif; ?>
				</div>
			</li>
					<h4><?php echo $topic['reply_num'] ?> comments</h4>
					
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
										<button onclick = "showTopicReplyForm(event, <?php echo $comment['id'] ?>, <?php echo $comment['id'] ?>, <?php echo $topic['id']?>)" 
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
														<button onclick="showTopicReplyCommentForm(event, <?php echo $reply['id']?>, <?php echo $comment['id'] ?>, <?php echo $topic['id']?>)" 
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
					<form action="/forum/comment" method="post">
						<div class="form-group">
							<textarea name="body" class="form-control style_2" style="height:150px;" placeholder="type your comment here"></textarea>
						</div>
						<input type="hidden" name="topic_id" value="<?php echo $topic['id'] ?>" />
						<input type="hidden" name="replyee_id" value="-1" />
						<input type="hidden" name="comment_id" value="-1" />
						<div class="form-group">
							<input type="submit" class=" button_medium" value="Post Comment" name="post_comment"/>
						</div>
					</form>
					<?php else: ?>
					<div>Please login to leave a comment!</div>
					<?php endif;?>
			<!--
			<?php foreach($replies as $reply) : ?>
			<li class="topic topic">
				<div class="row">
					<div class="col-md-2">
						<div class="user-info">
							<img class="avatar pull-left" src="/images/avatars/<?php echo $reply['avatar']; ?>" />
							<ul>
								<li><strong><?php echo $reply['username']; ?></strong></li>
								<li><?php echo userPostCount($reply['user_id']); ?> Posts</li>
								<li><a href="<?php echo BASE_URI; ?>topics.php?user=<?php echo $reply['user_id']; ?>">Profile</a>  </li>
							</ul>
						</div>
					</div>
				
					<div class="col-md-10">
						<div class="topic-content pull-right">
							<?php echo $reply['body']; ?>
						</div>
					</div>
				</div>
			</li>
			<?php endforeach; ?>
			-->
		<!--
		<h3>Reply to Topic</h3>
		<?php if(isLoggedIn() && isGuestOrAbove()) : ?>
			<li id="main-topic" class="topic topic">
				<div class="row">
					<div class="col-md-2">
						<div class="user-info">
							<img class="avatar pull-left" src="/images/avatars/<?php echo $topic['avatar']; ?>" />
							<ul>
								<li><strong><?php echo $topic['username']; ?></strong></li>
								<li><?php echo userPostCount($topic['user_id']); ?> Posts</li>
								<li><a href="<?php echo BASE_URI; ?>topics.php?user=<?php echo $topic['user_id']; ?>">Profile</a>  </li>
							</ul>
						</div>
					</div>
				<div class="col-md-10">
					<form role="form" method="post" action="/forum/thread/?id=<?php echo $topic['id']?>">
						<div class="form-group">
							<textarea id="reply" rows="20" cols="80" class="form-control" name="body" style="height:230px;"></textarea>
						</div>
						<button name="do_reply" type="submit" class="button_medium">Reply</button>
					</form>
				</div>
			</li>
			
		<?php else : ?>
			<p>Please Login to Reply</p>
		<?php endif; ?>
		-->
		</ul>
	</div>   
</div><!-- End container -->
</section><!-- End main_content-->

<script type="text/javascript">
function showTopicReplyForm(event, replyee_id, comment_id, topic_id) {
	$parent = $(event.target).parent();
	if($parent.children(".reply-form").length == 0) {
		$parent.append(
			"<form action='/forum/reply' method='POST' class='reply-form' style='margin-top: 5px;'>" +
				"<textarea rows='8' cols='100' name='body' style='width:100%;'></textarea>" +
				"<input type='hidden' name='topic_id' value='" + topic_id + "'/>" +
				"<input type='hidden' name='replyee_id' value='" + replyee_id + "' />" +
				"<input type='hidden' name='comment_id' value='" + comment_id + "'/>" +
				"<input type='submit' style='margin-top: 5px;' name='comment_reply' value='Post' />" +
			"</form>");
	}
}	

function showTopicReplyCommentForm(event, replyee_id, comment_id, topic_id) {
	$parent = $(event.target).parent().parent();
	if($parent.children(".reply-form").length == 0) {
		$parent.append(
			"<form action='/forum/reply' method='POST' class='reply-form' style='margin-top: 5px;'>" +
				"<textarea rows='8' cols='100' name='body' style='width:100%;'></textarea>" +
				"<input type='hidden' name='topic_id' value='" + topic_id + "'/>" +
				"<input type='hidden' name='replyee_id' value='" + replyee_id + "' />" +
				"<input type='hidden' name='comment_id' value='" + comment_id + "'/>" +
				"<input type='submit' style='margin: 8px 0px;' name='comment_reply' value='Post' />" +
			"</form>");
	}
}

</script>
<script src="/forum/forum.js"></script>
<?php include('includes/footer.php'); ?>