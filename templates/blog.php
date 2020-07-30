<?php include('includes/header.php'); ?>
<link href="/css/blog.css" rel="stylesheet">
<!-- <section id="sub-header">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 text-center">
			<h2>Blog</h2>
			<p class="lead">
				Everything carefully prepared for you 
			</p>
		</div>
	</div>
</div>
<div class="divider_top"></div>
</section> -->

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
                    <h3 class='blog-title'><?php echo $blog['title'] ?></h3>
                    <div class="post_info clearfix">
                        <div class="post-left">
                            <ul>
                                <li><span><?php echo $blog['create_date']?></span></li>
                                <li><a class="icon-user-link" href="#">
                                        <span class="user-avatar"
                                            style="background: url(../../images/avatars/<?php echo $blog['avatar']?>);background-size: cover;"></span><?php echo $blog['username'] ?></a>
                                </li>
                                <li><i class="icon-flag-filled"></i> <a href="#"><?php echo $blog['name'] ?></a></li>
                            </ul>
                        </div>
                        <div class="post-right">
                            <i class="icon-eye"></i><?php echo $blog['view_count'] ?>
                            <span class="like-button">
                                <i class="icon-thumbs-up<?php echo $blog['liked']?'-alt':''?>"
                                    <?php if($blog['liked']): ?>style="color: #1cbbb4;" <?php endif; ?>
                                    onclick="likeOrUnlike(event, <?php echo $blog['id'] ?>,<?php echo $blog['liked']? 'false': 'true' ?>,<?php echo $blog['like_count']?>)"></i>
                                <div style="display: inline;" class="like_count"><?php echo $blog['like_count'] ?></div>
                            </span>
                            <i class="icon-comment"></i><?php echo $blog['reply_num'] ?>
                        </div>
                    </div>
                    <div class="ck-content">
                        <?php echo $blog['body'] ?>
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
                                    <div class="comment-owner-avatar"
                                        style="background: url(../../images/avatars/<?php echo $comment['avatar']?>);background-size: cover;">
                                    </div>
                                    <div><a href="#"><?php echo $comment['username'] ?></a></div>
                                </div>
                                <div class="comment_info">
                                    <div class="reply-content">
                                        <div class="reply-body">
                                            <?php echo $comment['body'] ?>
                                        </div>
                                        <div class="dateAndReply">
                                            <?php if(isLoggedIn()): ?>
                                            <?php echo $comment['create_date'] ?>
                                            <?php if(getUser()['user_id'] == $comment['user_id'] || isAdmin()): ?>
                                            <?php if($comment['deleted'] == 0): ?>
                                            <span class="reply-delete"
                                                onclick="deleteReply(<?php echo $comment['id'] ?>, <?php echo $blog['id'] ?>)">
                                                <i class="icon-trash-empty"></i>
                                            </span>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if(getUser()['user_id'] == $comment['user_id']): ?>
                                            <?php if($comment['deleted'] == 0): ?>
                                            <span class="reply-edit"
                                                onclick="editReply(event, <?php echo $comment['id'] ?>, '<?php echo $comment['body'] ?>', <?php echo $blog['id'] ?>)">
                                                <i class="icon-edit"></i>
                                            </span>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <button
                                                onclick="showReplyForm(event, <?php echo $comment['id'] ?>, <?php echo $comment['id'] ?>, <?php echo $blog['id']?>)"
                                                class="reply-button">reply</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if(count($comment['replies']) > 0) :?>
                                    <div class="commentReplies">
                                        <?php foreach ($comment['replies'] as $reply) : ?>
                                        <div class="comment-reply">
                                            <div class="reply-avatar-container">
                                                <div class="reply-avatar"
                                                    style="background: url(../../images/avatars/<?php echo $reply['avatar']?>);background-size: cover;">
                                                </div>
                                            </div>
                                            <div class="reply-content">
                                                <div class="reply-body" <?php if($reply['deleted'] != 0):?>
                                                    style="color: #ababab" <?php endif; ?>>
                                                    <span>
                                                        <?php echo $reply['username'] ?><?php if(strcmp($reply['replyee_id'], $comment['id']) != 0): ?>
                                                        to
                                                        <?php echo getUsernameByBlogReplyId($reply['replyee_id']) ?><?php endif ?>:
                                                    </span>
                                                    <?php if($reply['deleted'] != 0):?>
                                                    [This reply has been deleted]
                                                    <?php endif;?>
                                                    <?php if($reply['deleted'] == 0):?>
                                                    <?php echo $reply['body']?>
                                                    <?php endif;?>
                                                </div>
                                                <div class="dateAndReply">
                                                    <?php echo $reply['create_date'] ?>
                                                    <?php if(isLoggedIn()): ?>
                                                    <?php if(getUser()['user_id'] == $reply['user_id'] || isAdmin()): ?>
                                                    <?php if($reply['deleted'] == 0): ?>
                                                    <span class="reply-delete"
                                                        onclick="deleteReply(<?php echo $reply['id'] ?>, <?php echo $blog['id'] ?>)">
                                                        <i class="icon-trash-empty"></i>
                                                    </span>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if(getUser()['user_id'] == $reply['user_id']): ?>
                                                    <?php if($reply['deleted'] == 0): ?>
                                                    <span class="reply-edit"
                                                        onclick="editReply(event, <?php echo $reply['id'] ?>, '<?php echo $reply['body'] ?>', <?php echo $blog['id'] ?>)">
                                                        <i class="icon-edit"></i>
                                                    </span>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if($reply['deleted'] == 0): ?>
                                                    <button class='reply-button'
                                                        onclick="showReplyCommentForm(event, <?php echo $reply['id']?>, <?php echo $comment['id'] ?>, <?php echo $blog['id']?>)"
                                                        class="replycomment">reply</button>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach ?>
                                    </div>
                                    <?php endif ?>
                                </div>


                            </div>
                        </li>
                        <hr>
                        </hr>
                        <?php endforeach ?>
                    </ol>
                </div><!-- End Comments -->

                <h4>Leave a comment</h4>
                <?php if(isLoggedIn()): ?>
                <form action="/blog/comment" method="post">
                    <div class="form-group">
                        <textarea name="body" class="form-control style_2" style="height:150px;"
                            placeholder="type your comment here"></textarea>
                    </div>
                    <input type="hidden" name="blog_id" value="<?php echo $blog['id'] ?>" />
                    <input type="hidden" name="replyee_id" value="-1" />
                    <input type="hidden" name="comment_id" value="-1" />
                    <div class="form-group">
                        <input type="submit" class=" button_medium" value="Post Comment" name="post_comment" />
                    </div>
                </form>
                <?php else: ?>
                <div class="no-login-prompt">Please login to leave a comment!</div>
                <?php endif;?>



            </div><!-- End col-md-12-->


        </div> <!-- End row-->
    </div><!-- End container -->
</section><!-- End main_content-->
<Script>

</Script>
<?php include('includes/footer.php'); ?>