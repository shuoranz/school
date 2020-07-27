<?php include('includes/header.php'); ?>
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
      <li><a href="/">Home</a></li>
      <li><a href="/blog">Blog</a></li>
	  <li class="active">Create</li>
    </ol>
    
	<div class="row">
		<aside class="col-md-3">
			<div class=" box_style_1">
				<div class="widget">
					<h4>Notification</h4>
					
					<h5>(1) Do not post something bad</h5>
					<h5>(2) Do not post something bad</h5>
					<h5>(3) Do not post something bad</h5>
					<h5>(4) Cover image resolution: 900*675 
							or higher quality with same ratio
							for best effect</h5>
				</div>
				
			</div>
		</aside>
		<div class="col-md-9 box_style_2">
			<form role="form" method="post" enctype="multipart/form-data"
				  onsubmit="document.getElementById('editor').value=window.editor.getData()">
				<div class="form-group">
					<label>Post Title</label>
					<input type="text" class="form-control" name="title" value=<?php echo $blog['title'] ?> />
				</div>
				<div class="form-group">
					<label>Category</label>
					<select class="form-control" name="category_id">
						<?php foreach(getBlogCategories() as $category) : ?>
                        <option value="<?php echo $category['id']; ?>" <?php if($category['id'] == $blog['category_id']): ?>selected="selected"<?php endif; ?>><?php echo $category['name']; ?></option>
						<?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
					<label>tags</label>
					<input type="text" class="form-control" name="tags" value='<?php echo $blog['tag'] ?>' />
				</div>
				<div class="form-group">
				    <label>Cover Image</label>
					<input type="file" name="cover" id="cover">
				</div>
				<div class="form-group">
					<label>Content</label>
					<textarea id="editor" class="form-control" name="body" style="height:200px;">
					</textarea>
				</div>
				<button type="submit" class="button_medium" name="post_edit">Submit</button>
			</form>
		</div>
	</div>
	<div style="height:100px;"></div>
</div>
<script src="/js/ckeditor5/build/ckeditor.js"></script>
<script src="/js/blogEditorConfig.js"></script>
<!-- <script src="/ckfinder/ckfinder.js"></script> -->
<script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>
<script>
		ClassicEditor.create( document.querySelector('#editor'),
		blogConfig)
		.then( editor => {
            window.editor = editor;
            editor.setData('<?php echo $blog['body'] ?>');
		} )
		.catch( error => {
			console.error( error );
        } );
        
</script>
<?php include('includes/footer.php'); ?>