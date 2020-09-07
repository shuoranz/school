<?php include('includes/header.php'); ?>
<link href="/css/news.css" rel="stylesheet">
<!-- <section id="sub-header">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 text-center">
			<h2>News page</h2>
			<p class="lead">
            Keep up with what's happening in the world 
			</p>
		</div>
	</div>
</div>
<div class="divider_top"></div>
</section> -->

<section id="main_content">

    <div class="container">

        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="/news/?p=1">Home</a></li>
            <li class="active">Current</li>
        </ol>

        <div class="row single-news-container">

            <!-- <aside class="col-md-4">
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
     </aside>  -->
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <?php if(isAdmin()):?>
                <div class="admin-editAndDelete">
                    <a href=<?php echo "/news/edit/?id=".$news['id'] ?> class="edit-link">
                        <i class="icon-edit"></i>
                    </a>
                    <button class="post-delete" onclick="deleteNews(<?php echo $news['id'] ?>)">
                        <i class="icon-trash-empty"></i>
                    </button>
                </div>
                <?php endif;?>
                <div class="single-post">
                    <h3 class='news-title'><?php echo $news['title'] ?></h3>
                    <div class="post_info clearfix">
                        <div class="post-left">
                            <ul>
                                <li><span><?php echo $news['create_date']?></span></li>
                                <li><a class="icon-user-link" href="#">
                                        <span class="user-avatar"
                                            style="background: url(../../images/avatars/<?php echo $news['avatar']?>);background-size: cover;"></span><?php echo $news['username'] ?></a>
                                </li>
                                <li><i class="icon-flag-filled"></i> <a href="#"><?php echo $news['category'] ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="post-right">
                            <i class="icon-eye"></i><?php echo $news['view_count'] ?>
                            <span class="like-button">
                                <i class="icon-thumbs-up<?php echo $news['liked']?'-alt':''?>"
                                    <?php if($news['liked']): ?>style="color: #1cbbb4;" <?php endif; ?>
                                    onclick="likeOrUnlikeNews(event, <?php echo $news['id'] ?>,<?php echo $news['liked']? 'false': 'true' ?>,<?php echo $news['like_count']?>)"></i>
                                <div style="display: inline;" class="like_count"><?php echo $news['like_count'] ?></div>
                            </span>
                            <i class="icon-comment"></i><?php echo $news['reply_num'] ?>
                        </div>
                    </div>
                    <div class="ck-content">
                        <?php echo $news['body'] ?>
                    </div>
                </div>

                <h4>Leave a comment</h4>
                <?php if(isLoggedIn()): ?>
                <form action="/news/comment" method="post">
                    <div class="form-group">
                        <textarea name="body" class="form-control style_2" style="height:150px;"
                            placeholder="type your comment here"></textarea>
                    </div>
                    <input type="hidden" name="news_id" value="<?php echo $news['id'] ?>" />
                    <input type="hidden" name="replyee_id" value="-1" />
                    <input type="hidden" name="comment_id" value="-1" />
                    <div class="form-group">
                        <input type="submit" class=" button_medium" value="Post Comment" name="post_comment" />
                    </div>
                </form>
                <?php else: ?>
                <div class="no-login-prompt">Please login to leave a comment!</div>
                <?php endif;?>

                <h4><?php echo $news['reply_num'] ?> comments</h4>
                <div id="comments">
                    <ol>
                        <?php foreach($comments as $comment) : ?>
                        <?php if($comment['deleted'] == 0): ?>
                        <li>
                            <div class="single-comment">
                                <div class="comment-owner">
                                    <div class="owner-container">
                                        <div class="comment-owner-avatar"
                                            style="background: url(../../images/avatars/<?php echo $comment['avatar']?>);background-size: cover;">
                                        </div>
                                        <div class="comment-username"><a href="#"><?php echo $comment['username'] ?></a>
                                        </div>
                                        <div class="create_date">
                                            <?php echo $news["complete_date"] ?>
                                        </div>
                                    </div>
                                    <?php if(isLoggedIn()): ?>
                                    <div class="replyEditDelete">
                                        <?php if((getUser()['user_id'] == $comment['user_id']) || isAdmin()):?>
                                        <span class="reply-delete"
                                            onclick="deleteNewsReply(<?php echo $comment['id'] ?>, <?php echo $news['id'] ?>)">
                                            <i class="icon-trash-empty"></i>
                                        </span>
                                        <?php endif;?>
                                        <?php if(getUser()['user_id'] == $comment['user_id']):?>
                                        <span class="reply-edit"
                                            onclick="editNewsReply(event, <?php echo $comment['id'] ?>, '<?php echo $comment['body'] ?>', <?php echo $news['id'] ?>)">
                                            <i class="icon-edit"></i>
                                        </span>
                                        <?php endif; ?>
                                        <button
                                            onclick="newsReply(event, <?php echo $comment['id']?>,<?php echo $news['id'] ?>)"
                                            class="reply-button">Reply</button>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="comment_info">
                                    <?php if($comment['replyee_id'] != -1): ?>
                                    <div class="quote-block">
                                        <span><?php echo $comment['quote']['username'] ?>: </span>
                                        <?php if($comment['quote']['deleted'] == 0): ?>
                                        <i>"<?php echo $comment['quote']['body']?>"</i>
                                        <?php else: ?>
                                        [This reply has been deleted]
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    <p>
                                        <?php echo $comment['body'] ?>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <?php endif;?>
                        <?php endforeach ?>
                    </ol>
                </div>

            </div><!-- End col-md-8-->

        </div> <!-- End row-->

    </div><!-- End container -->
</section><!-- End main_content-->
<script src="/news/news.js"></script>
<?php include('includes/footer.php'); ?>