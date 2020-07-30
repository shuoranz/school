<?php include('includes/header.php'); ?>

<section id="sub-header">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 text-center">
			<h2>Student Forum</h2>
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
	  <li class="active">Create</li>
    </ol>
    
	<div class="row">
		<aside class="col-md-4">
			<div class=" box_style_1">
				<div class="widget">
					<h4>Notification</h4>
					
					<h5>(1) Do not post something bad</h5>
					<h5>(2) Do not post something bad</h5>
					<h5>(3) Do not post something bad</h5>
					<h5>(4) Do not post something bad</h5>
					<h5>(5) Do not post something bad</h5>
				</div>
				
			</div>
		</aside>
		<div class="col-md-8 box_style_2">
			<form role="form" method="post">
				<div class="form-group">
					<label>Post Title</label>
					<input type="text" class="form-control" name="title" placeholder="enter the title..." />
				</div>
				<div class="form-group">
					<label>Category</label>
					<select class="form-control" name="category_id">
						<?php foreach(getCategories() as $category) : ?>
							<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
				<label>Upload Images </label> <span style="font-family: sans-serif">(<span class="counter"> 0 </span> / 5 )</span>
					<input type="file" id="img" name="img" accept="image/*" multiple="true">
				</div>
				<div class="form-group">
					<label>Content</label>
					<textarea id="body" rows="30" cols="80" class="form-control" name="body" style="height:200px;" placeholder="share your story..."></textarea>
					<!--<script>CKEDITOR.replace('body');</script>-->
				</div>
				<button type="submit" class="button_medium" name="do_create">Submit</button>
				
			</form>
		</div>
	</div>
	<div style="height:100px;"></div>
</div>
                        
<?php include('includes/footer.php'); ?>