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
		 <?php if ($isAdmin) : ?>
			 <a href="/blog/create" style="border: 1px solid black; padding: 5px 10px; background-color: grey; color: white;"> create(仅admin) </a>
		 <?php endif; ?>
	 <?php $count = 0; ?>
	 <?php foreach ($blogs as $blog) : ?>
     		<div class="post">
					<a href="blog_post.html" title="single_post.html"><img src="img/blog-3.jpg" alt="" class="img-responsive"></a>
					<div class="post_info clearfix">
						<div class="post-left">
							<ul>
								<li><i class="icon-calendar-empty"></i>On <span><?php echo $blog['create_date']?></span></li>
								<li><i class="icon-user"></i>By <a href="#"><?php echo $blog['username'] ?></a></li>
								<li><i class="icon-flag-filled"></i> <a href="#"><?php echo $blog['name'] ?></a></li>
							</ul>
						</div>
						<div class="post-right">
							<i class="icon-eye"></i><?php echo $blog['view_count'] ?>
							<i class="icon-thumbs-up"></i><?php echo $blog['like_count'] ?>
							<i class="icon-comment"></i><?php echo $blog['reply_num'] ?>
						</div>
					</div>
					<div class="tag-list">
						<?php foreach ($tags[$count] as $tagName=>$tagColor) : ?>
							<div class="blog-tag" style="background-color:<?php echo $tagColor ?>;">
								<div class="tag-dot"></div>
								<?php echo $tagName ?>
								<div class="tag-triangle" style="border-left-color: <?php echo $tagColor ?>"></div>
							</div>
						<?php endforeach; ?>  
	 				</div>
					<a style="display: block;" href="/blog/thread/?id= <?php echo $blog['id']; ?>" title="single_post.html">
						<h2 class='blog-titldive'><?php echo $blog['title'] ?></h2>
					</a>
					<p class='blog-body'>
						<?php echo $blog['body'] ?>
					</p>
					<a href="/blog/thread/?id= <?php echo $blog['id']; ?>" class="button_medium" title="single_post.html">Read more</a>
				</div><!-- end post -->
		<?php $count++; ?>
	<?php endforeach; ?>      
				
                
				<hr>
                
                <div class="text-center">
                    <ul class="pagination">
                        <li><a href="#">Prev</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next</a></li>
                    </ul><!-- end pagination-->
                </div>
     </div><!-- End col-md-8-->   
  
	
  </div>  <!-- End row-->    
</div><!-- End container -->
</section><!-- End main_content-->
<?php include('includes/footer.php'); ?>