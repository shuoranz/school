<?php include('includes/header.php'); ?>
<link href="/css/news.css" rel="stylesheet">
<!-- <section id="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h2>News</h2>
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
            <li><a href="/">Home</a></li>
            <li class="active">Active page</li>
        </ol>

        <div class="row">

            <aside class="col-md-4">
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
                            <li><a href='/news/?p=1' <?php if(!isset($_GET['c'])): ?> class="active" <?php endif; ?>>All
                                    News</a></li>
                            <?php foreach($categories as $category): ?>
                            <li><a href='/news/?c=<?php echo $category["id"] ?>&p=1'
                                    <?php if(isset($_GET['c']) && $_GET['c'] == $category["id"]): ?> class="active"
                                    <?php endif; ?>><?php echo $category['category'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
					<hr>
					<!--
                    <div class="widget">
                        <h4>Featured Events</h4>

                        <ul class="recent_post">
                            <li>
                                <i class="icon-calendar-empty"></i> 16th July, 2020
                                <div><a href="#">It is a long established fact that a reader will be distracted </a>
                                </div>
                            </li>
                        </ul>
                    </div>
					-->

                </div><!-- End box-sidebar -->
            </aside><!-- End aside -->

            <div class="col-md-8">
                <?php if ($isAdmin) : ?>
                <a href="/news/create"
                    style="border: 1px solid black; padding: 5px 10px; background-color: grey; color: white;">
                    create(Only Admin)
                </a>
                <?php endif; ?>
                <div class="sort-container">
                    Sort By
                    <select class="selectpicker" style="padding: 3px;" onchange="toogleNewsSelect(event,'ob')">
                        <option value="cd" id="default" <?php if(!isset($_GET['ob'])): ?> selected <?php endif; ?>>
                            Create Date</option>
                        <option value="lc" <?php if(isset($_GET['ob']) && $_GET['ob'] == 'lc'): ?> selected
                            <?php endif; ?>>Likes</option>
                        <option value="vc" <?php if(isset($_GET['ob']) && $_GET['ob'] == 'vc'): ?> selected
                            <?php endif; ?>>Views</option>
                        <option value="rc" <?php if(isset($_GET['ob']) && $_GET['ob'] == 'rc'): ?> selected
                            <?php endif; ?>>Replies</option>
                    </select>
                    <div class="desc-container" onclick="toggleNewsDesc(event)">
                        <i class="icon-up-open <?php if(isset($_GET['desc']) && $_GET['desc'] == 0): ?>active<?php endif; ?>"
                            id="asc"></i>
                        <i class="icon-down-open <?php if(!isset($_GET['desc'])): ?>active<?php endif; ?>"
                            id="desc"></i>
                    </div>
                    <a id="hidden-sort" style="display:none;"> </a>
                </div>
                <?php foreach($all_news as $news): ?>
                <div class="news-container">
                    <div class="news-cover" style="background: url(<?php echo $news['cover'] ?>);background-size: cover;">
                    </div>
                    <div class="news-body">
                        <div class="tags-and-title">
                            <div class="tags">
								<?php if ($news["top"] == "1"): ?>
								<div class="tag" style="background-color: red; color: white;">
                                    顶置
                                </div>	
								<?php endif; ?>
                                <?php foreach($news['tag'] as $tagName=>$tagColor): ?>
                                <div class="tag" style="background-color: <?php echo $tagColor?>">
                                    <?php echo $tagName ?>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="title-container">
                                <a href="/news/thread/?id=<?php echo $news['id']; ?>" class="news-heading-link">
                                    <h4 class="news-heading"><?php echo $news['title'] ?></h4>
                                </a>
                            </div>
                            <?php if(isAdmin()):?>
                            <div class="editAndDelete">
                                <a href=<?php echo "/news/edit/?id=".$news['id'] ?> class="edit-link">
                                    <i class="icon-edit"></i>
                                </a>
                                <button class="post-delete" onclick="deleteNews(<?php echo $news['id'] ?>)">
                                    <i class="icon-trash-empty"></i>
                                </button>
                            </div>
                            <?php endif;?>
                        </div>
                        <div class="news-info">
                            <div class="publisher">
                                <div class="avatar" style="background: url(../images/avatars/<?php echo $news['avatar']?>);
														   background-size: cover;">
                                </div>
                                <?php echo $news['username']?>
                            </div>
                            <div class="other-info">
                                <i class="icon-eye"></i><?php echo $news['view_count'] ?>
                                <span class="like-button">
                                    <i class="icon-thumbs-up<?php echo $news['liked']?'-alt':''?>"
                                        <?php if($news['liked']): ?>style="color: #1cbbb4;" <?php endif; ?>
                                        onclick="likeOrUnlikeNews(event, <?php echo $news['id'] ?>,<?php echo $news['liked']? 'false': 'true' ?>,<?php echo $news['like_count']?>)"></i>
                                    <div style="display: inline;" class="like_count">
                                        <?php echo $news['like_count'] ?></div>
                                </span>
                                <i class="icon-comment"></i><?php echo $news['reply_count'] ?>
                                <div class="date-container">
                                    <?php echo $news["create_date"] ?>
                                </div>
                            </div>
                        </div>
                        <div class="news-summary">
                            <?php echo $news['body']?>
                        </div>
                        <div class="category-container">
                            <i class="icon-flag-filled"></i> <a
                                href='/news/?c=<?php echo $news['category_id'] ?>&p=1'><?php echo $news['category'] ?></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="text-center">
                    <ul class="pagination">
                        <li><a <?php if($_GET['p'] > 1): ?>href="/news/?p=<?php echo $_GET['p']-1 ?>" <?php endif; ?>
                                <?php if($_GET['p'] == 1): ?> style="background-color: #eee" <?php endif; ?>>Prev</a>
                        </li>
                        <?php foreach($pages as $page): ?>
                        <li <?php if($page==$_GET['p']): ?>class="active" <?php endif; ?>>
                            <a href="/news/<?php echo copyAndSetPageURI($_GET, $page) ?>"><?php echo $page ?></a>
                        </li>
                        <?php endforeach; ?>
                        <li><a <?php if($_GET['p'] < $pageMax): ?>href="/news/?p=<?php echo $_GET['p']+1 ?>"
                                <?php endif; ?> <?php if($_GET['p'] == $pageMax): ?>style="background-color: #eee"
                                <?php endif; ?>>Next</a></li>
                    </ul><!-- end pagination-->
                </div>
            </div><!-- End col-md-8-->

        </div> <!-- End row-->
    </div><!-- End container -->
</section><!-- End main_content-->
<script src="/news/news.js"></script>
<?php include('includes/footer.php'); ?>