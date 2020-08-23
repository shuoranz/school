<?php include('includes/header.php'); ?>
<link href="/css/forum.css" rel="stylesheet">
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
                    </div>

                </div>
            </aside>
            <div class="col-md-8 box_style_2">
                <form id="create_form" role="form" method="post" enctype="multipart/form-data" onsubmit="nameFileInputs()">
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
					<?php if(isAdminPlus() || isSuperAdmin()): ?>
					<div class="form-group">
                        <label>Top</label>
                        <div style="display:flex; align-items: center; flex-wrap: wrap; background-color: #eeeeee; padding: 10px; border-radius: 5px;">
                            <label style="display: flex;">
                                <input type="checkbox" name="top" value="1"
                                    style="margin-left:5px;">
                                <div style="padding:1px 6px;background-color:red;color: white; margin-left:8px;margin-right:10px;font-size:13px;border-radius:4px;">
                                    Top
                                </div>
                            </label>
                        </div>
                    </div>
					<?php endif; ?>
                    <div class="form-group" id="file-upload">
                        <div style="display: flex;margin-bottom: 8px;">
                            <label style="margin-bottom: 0px;">Upload Images </label>
                            <span style="font-family: sans-serif;margin-left:4px;"> ( <span id="counter"> 0
                                </span> / 5 )
                            </span>
                            <button class='icon-button' onclick="addImageUpload(event)">
                                <i class='icon-plus'></i>
                            </button>
                        </div>
                        <div class="file-container">
                            <input type="file" name="img" accept="image/*">
							<!-- <button class='icon-button'>
                                <i class='icon-cancel'></i>
                            </button> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="body" rows="30" cols="80" class="form-control" name="body" style="height:200px;"
                            placeholder="share your story..."></textarea>
                        <!--<script>CKEDITOR.replace('body');</script>-->
                    </div>
                    <button type="submit" class="button_medium" name="do_create">Submit</button>

                </form>
            </div>
        </div>
        <div style="height:100px;"></div>
    </div>
    <script src="/forum/forum.js"></script>
    <?php include('includes/footer.php'); ?>