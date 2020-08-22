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
            <li class="active">Forum</li>
        </ol>

        <div class="row">
            <div class="row">
                <div class="col-md-3">
                    <aside>
                        <div class=" box_style_1">
							<!--
                            <div class="widget" style="margin-top:15px;">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" style="margin-left:0;"><i
                                                class="icon-search"></i></button>
                                    </span>
                                </div>
                            </div>
							-->
                            <div class="widget">
                                <h4>Categories</h4>
                                <ul class="categories">
                                    <li><a href='/forum/?p=1' <?php if(!isset($_GET['c'])): ?> class="active"
                                            <?php endif; ?>>All
                                            Topics</a></li>
                                    <?php foreach($categories as $category): ?>
                                    <li><a href='/forum/?c=<?php echo $category["id"] ?>&p=1'
                                            <?php if(isset($_GET['c']) && $_GET['c'] == $category["id"]): ?>
                                            class="active" <?php endif; ?>><?php echo $category['name'] ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div><!-- End widget -->
                            <br />

                        </div>
                    </aside>
                </div>
                <div class="col-md-9">
                    <?php if(isStudentOrAbove()): ?>
                    <a class="button_medium" href="/forum/create">Create</a>
                    <?php endif; ?>
                    <div class="sort-container">
                        Sort By
                        <select class="selectpicker" style="padding: 3px;" onchange="toogleSelect(event,'ob')">
                            <option value="cd" id="default" <?php if(!isset($_GET['ob'])): ?> selected <?php endif; ?>>
                                Create Date</option>
                            <option value="lc" <?php if(isset($_GET['ob']) && $_GET['ob'] == 'lc'): ?> selected
                                <?php endif; ?>>Likes</option>
                            <option value="vc" <?php if(isset($_GET['ob']) && $_GET['ob'] == 'vc'): ?> selected
                                <?php endif; ?>>Views</option>
                            <option value="rc" <?php if(isset($_GET['ob']) && $_GET['ob'] == 'rc'): ?> selected
                                <?php endif; ?>>Replies</option>
                        </select>
                        <div class="desc-container" onclick="toggleForumDesc(event)">
                            <i class="icon-up-open <?php if(isset($_GET['desc']) && $_GET['desc'] == 0): ?>active<?php endif; ?>"
                                id="asc"></i>
                            <i class="icon-down-open <?php if(!isset($_GET['desc'])): ?>active<?php endif; ?>"
                                id="desc"></i>
                        </div>
                        <a id="hidden-sort" style="display:none;"> </a>
                    </div>
                    <?php foreach ($topics as $topic) : ?>
                    <?php $imgsArr = preg_split('/,/', $topic['imgs']); ?>
                    <?php if($topic['status'] === "published" || (isAdmin() || getUser()['user_id'] === $topic['user_id'] || $topic['imgs'] === "")): ?>
                    <div class="media">
                        <div class="col-md-10">
                            <!--<div class="circ-wrapper pull-left"><h3>15<br>July</h3></div>-->
                            <div class='pull-left publisher'>
                                <img class="avatar pull-left" src="/images/avatars/<?php echo $topic['avatar']; ?>" />
                                <div class="username"><?php echo $topic['username'] ?></div>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="/forum/thread/?id= <?php echo $topic['id']; ?>">
                                        <?php echo $topic['title']; ?>
                                    </a></h4>
                                <p><?php echo mb_substr($topic['body'], 0, 100); ?>
                                    <a href="/forum/thread/?id= <?php echo $topic['id']; ?>"> read more...</a>
                                </p>
                            </div>
                        </div><!-- End col-md-8-->
                        <div class="col-md-2 view-like-reply">
                            <i class="icon-eye"></i><?php echo $topic['view_count'] ?>
                            <span class="like-button">
                                <i class="icon-thumbs-up<?php echo $topic['liked']?'-alt':''?>"
                                    <?php if($topic['liked']): ?>style="color: #1cbbb4;" <?php endif; ?>
                                    onclick="likeOrUnlikeTopic(event, <?php echo $topic['id'] ?>,<?php echo $topic['liked']? 'false': 'true' ?>,<?php echo $topic['like_count']?>)"></i>
                                <div style="display: inline;" class="like_count">
                                    <?php echo $topic['like_count'] ?></div>
                            </span>
                            <i class="icon-comment"></i><?php echo $topic['reply_count'] ?>
							
							<br>
							<i><?php echo $topic['create_date'] ?></i>
							<?php if ($topic["top"] == 1) : ?>
							<br><i>Top Topic</i>
							<?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <hr>

            <div class="text-center">
                <ul class="pagination">
                    <li><a <?php if($_GET['p'] > 1): ?>href="/forum/?p=<?php echo $_GET['p']-1 ?>" <?php endif; ?>
                            <?php if($_GET['p'] == 1): ?> style="background-color: #eee" <?php endif; ?>>Prev</a>
                    </li>
                    <?php foreach($pages as $page): ?>
                    <li <?php if($page==$_GET['p']): ?>class="active" <?php endif; ?>>
                        <a href="/forum/<?php echo copyAndSetPageURI($_GET, $page) ?>"><?php echo $page ?></a>
                    </li>
                    <?php endforeach; ?>
                    <li><a <?php if($_GET['p'] < $pageMax): ?>href="/forum/?p=<?php echo $_GET['p']+1 ?>"
                            <?php endif; ?> <?php if($_GET['p'] == $pageMax): ?>style="background-color: #eee"
                            <?php endif; ?>>Next</a>
                    </li>
                </ul><!-- end pagination-->
            </div>


        </div> <!-- End row-->
    </div><!-- End container -->
</section><!-- End main_content-->
<script src="/forum/forum.js"></script>
<?php include('includes/footer.php'); ?>