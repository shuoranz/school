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
  <li class="active">Blog</li>
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
					<h4>Categories</h4>
					<ul class="categories">
						<li><a href = '/blog/?p=1' 
						<?php if(!isset($_GET['c'])): ?>
							class="active"
						<?php endif; ?>>All blogs</a></li>
						<?php foreach($categories as $category): ?>
							<li><a href = '/blog/?c=<?php echo $category["id"] ?>&p=1'
							<?php if(isset($_GET['c']) && $_GET['c'] == $category["id"]): ?>
								class="active"	
							<?php endif; ?>><?php echo $category['name'] ?></a></li>
						<?php endforeach; ?>
					</ul>
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
			<a href="/blog/create" 
			 style="border: 1px solid black; padding: 5px 10px; background-color: grey; color: white;">
			 create(仅admin) 
			</a>
		 <?php endif; ?>
		 <div class="sort-container" >
			 Sort By 
			<select class="selectpicker" style="padding: 3px;" onchange="toogleBlogSelect(event,'ob')">
				<option value = "cd" id="default"<?php if(!isset($_GET['ob'])): ?> selected <?php endif; ?>>Create Date</option>
		 		<option value = "lc" <?php if(isset($_GET['ob']) && $_GET['ob'] == 'lc'): ?> selected <?php endif; ?>>Likes</option>
				<option value = "vc" <?php if(isset($_GET['ob']) && $_GET['ob'] == 'vc'): ?> selected <?php endif; ?>>Views</option>
				<option value = "rc" <?php if(isset($_GET['ob']) && $_GET['ob'] == 'rc'): ?> selected <?php endif; ?>>Replies</option>
			</select>
			<div class="desc-container" onclick="toggleDesc(event)">
				<i class="icon-up-open <?php if(isset($_GET['desc']) && $_GET['desc'] == 0): ?>active<?php endif; ?>"
					id="asc"></i>
				<i class="icon-down-open <?php if(!isset($_GET['desc'])): ?>active<?php endif; ?>"
					id="desc"></i>
			</div>
			<a id = "hidden-sort" style="display:none;"> </a>
		 </div>
	 <?php $count = 0; ?>
	 <?php foreach ($blogs as $blog) : ?>
     		<div class="post">
				 <?php if($isAdmin): ?>
					<a class="edit-link"> 
						<i class="icon-edit"></i>
					 </a>
					 <button class="post-delete" onclick="deleteBlog(<?php echo $blog['id'] ?>)"> 
						 <i class="icon-trash-empty"></i>
					 </button>
				 <?php endif; ?>
			 	<div class="left" style="background: url(<?php echo $blog['cover']?>);background-size: cover;">
				</div>
			    <div class="right">
					<div class="blog-title-container">
						<a class="blog-title-link" href="/blog/thread/?id= <?php echo $blog['id']; ?>" title="single_post.html">
							<h2 class='blog-title'><?php echo $blog['title'] ?></h2>
						</a>
					</div>
					<?php if (count($tags[$count]) > 0): ?>
					<div class="tag-list">
							<?php foreach ($tags[$count] as $tagName=>$tagColor) : ?>
								<div class="blog-tag" style="background-color: <?php echo $tagColor ?>; color: white;">
									<?php echo $tagName ?>
								</div>
							<?php endforeach; ?> 
					</div>
					<?php endif; ?> 
					<div class='blog-body'>
						<?php echo $blog['body'] ?>
					</div>
					<div class="post_info clearfix">
						<div class="post-left">
							<ul>
								<li><a class="icon-user-link" href="#">
									<span class="user-avatar" style="background: url(../images/avatars/<?php echo $blog['avatar']?>);background-size: cover;"></span><?php echo $blog['username'] ?></a>
								</li>
								<li><span class="blog-date"><?php echo $blog['create_date']?></span></li>
								<li><i class="icon-flag-filled"></i> <a href="#"><?php echo $blog['name'] ?></a></li>
							</ul>
						</div>
						<div class="post-right">
							<i class="icon-eye"></i><?php echo $blog['view_count'] ?>
							<i class="icon-thumbs-up"></i><?php echo $blog['like_count'] ?>
							<i class="icon-comment"></i><?php echo $blog['reply_num'] ?>
						</div>
					</div>
					</div>
				</div><!-- end post -->
		<?php $count++; ?>
	<?php endforeach; ?>       
                <div class="text-center">
                    <ul class="pagination">
						<li><a <?php if($_GET['p'] > 1): ?>href="/blog/?p=<?php echo $_GET['p']-1 ?>" <?php endif; ?> 
								<?php if($_GET['p'] == 1): ?> style="background-color: #eee" <?php endif; ?>>Prev</a></li>
						<?php foreach($pages as $page): ?>
						<li <?php if($page==$_GET['p']): ?>class="active"<?php endif; ?>>
							<a href="/blog/<?php echo copyAndSetPageURI($_GET, $page) ?>"><?php echo $page ?></a>
						</li>
						<?php endforeach; ?>
                        <li><a <?php if($_GET['p'] < $pageMax): ?>href="/blog/?p=<?php echo $_GET['p']+1 ?>" <?php endif; ?>
							<?php if($_GET['p'] == $pageMax): ?>style="background-color: #eee" <?php endif; ?>>Next</a></li>
                    </ul><!-- end pagination-->
                </div>
     </div><!-- End col-md-8-->   
  
	
  </div>  <!-- End row-->    
</div><!-- End container -->
</section><!-- End main_content-->
<?php include('includes/footer.php'); ?>