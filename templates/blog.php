<?php include('includes/header.php'); ?>
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
					<h4>Text widget</h4>
					<p>
						 Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
					</p>
				</div><!-- End widget -->
               
                
				<div class="widget">
					<h4>Recent post</h4>
                    
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
					</ul>
				</div><!-- End widget -->
                
				<div class="widget tags add_bottom_30">
					<h4>Tags</h4>
					<a href="#">Lorem ipsum</a>
					<a href="#">Dolor</a>
					<a href="#">Long established</a>
					<a href="#">Sit amet</a>
					<a href="#">Latin words</a>
					<a href="#">Excepteur sint</a>
				</div><!-- End widget -->
                
			</div><!-- End box-sidebar -->
     </aside><!-- End aside -->
     
     <div class="col-md-8">
     		<div class="post">
					<a href="blog_post.html" title="single_post.html"><img src="img/blog-3.jpg" alt="" class="img-responsive"></a>
					<div class="post_info clearfix">
						<div class="post-left">
							<ul>
								<li><i class="icon-calendar-empty"></i>On <span><?php echo $blog['create_date']?></span></li>
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
					<h2><a href="#" title="single_post.html"><?php echo $blog['title'] ?></a></h2>
					<p>
						<?php echo $blog['body'] ?>
					</p>
				</div><!-- end post -->
                
                <hr>
                
                <h4><?php echo $blog['reply_num'] ?> comments</h4>
                
				<div id="comments">
					<ol>
						<?php foreach($replies as $reply) : ?>
						<li>
						<div class="avatar"><a href="#"><img src="img/avatar1.jpg" alt=""></a></div>
						<div class="comment_right clearfix">
							<div class="comment_info">
								Posted by <a href="#"><?php echo $reply['username'] ?></a><span>|</span> <?php echo $reply['create_date'] ?><span>|</span>
							</div>
							<p>
								<?php echo $reply['body'] ?>
							</p>
						</div>
						</li>
						<hr></hr>
						<?php endforeach ?>
					</ol>
				</div><!-- End Comments -->
                
				<h4>Leave a comment</h4>
				<form action="#" method="post">
					<div class="form-group">
						<input class="form-control style_2" type="text" name="name" value="Enter Name"/>
					</div>
					<div class="form-group">
						<input class="form-control style_2" type="text" name="mail" value="Enter Email"/>
					</div>
					<div class="form-group">
						<textarea name="message" class="form-control style_2" style="height:150px;">Message...</textarea>
					</div>
					<div class="form-group">
						<input type="reset" class=" button_medium_outline" value="Clear form"/>
						<input type="submit" class=" button_medium" value="Post Comment"/>
					</div>
				</form>
                
     </div><!-- End col-md-8-->   
  
	
  </div>  <!-- End row-->    
</div><!-- End container -->
</section><!-- End main_content-->
<?php include('includes/footer.php'); ?>