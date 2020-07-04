<?php include('includes/header.php'); ?>
<link href="/css/news.css" rel="stylesheet">
<section id="sub-header">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 text-center">
			<h2>News</h2>
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
      <?php if ($isAdmin) : ?>
			<a href="/news/create" 
			 style="border: 1px solid black; padding: 5px 10px; background-color: grey; color: white;">
			 create(仅admin) 
			</a>
	   <?php endif; ?>
      <?php foreach($all_news as $news): ?>
        <div class="media list_news">
                   <div class="circ-wrapper pull-left"></div>
                   <div class="media-body">
                        <h4 class="media-heading"><a href="/news/thread/?id=<?php echo $news['id']; ?>"><?php echo $news['title'] ?></a></h4>
                         <div style="height: 60px;"><?php echo $news['body']?></div>
                   </div>
                   <div style="margin-top: 10px; margin-left: 89px;"><em>Posted By <?php echo $news['username'] ?></em></div>
                  
         </div>
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