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
            <!--
     
     -->
            <a class="button_medium" href="/forum/create">Create</a>
            <div class="row">
                <div class="col-md-3">
                    <aside>
                        <div class=" box_style_1">
                            <div class="widget" style="margin-top:15px;">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" style="margin-left:0;"><i
                                                class="icon-search"></i></button>
                                    </span>
                                </div>
                            </div>

                            <div class="widget">
                                <h4>Featured Events</h4>

                                <ul class="recent_post">
                                    <li>
                                        <i class="icon-calendar-empty"></i> 16th July, 2020
                                        <div><a href="#">It is a long established fact that a reader will be distracted
                                            </a></div>
                                    </li>
                                    <li>
                                        <i class="icon-calendar-empty"></i> 16th July, 2020
                                        <div><a href="#">It is a long established fact that a reader will be distracted
                                            </a></div>
                                    </li>
                                    <li>
                                        <i class="icon-calendar-empty"></i> 16th July, 2020
                                        <div><a href="#">It is a long established fact that a reader will be distracted
                                            </a></div>
                                    </li>
                                    <li>
                                        <i class="icon-calendar-empty"></i> 16th July, 2020
                                        <div><a href="#">It is a long established fact that a reader will be distracted
                                            </a></div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </aside>
                </div>
                <div class="col-md-9">
                    <?php foreach ($topics as $topic) : ?>
                    <div class="media list_news">
                        <div class="col-md-9">
                            <!--<div class="circ-wrapper pull-left"><h3>15<br>July</h3></div>-->
                            <div class='pull-left publisher'>
                                <img class="avatar pull-left" src="/images/avatars/<?php echo $topic['avatar']; ?>" />
                                <div class="username"><?php echo $topic['username'] ?></div>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="/forum/thread/?id= <?php echo $topic['id']; ?>">
                                        <?php echo $topic['title']; ?> </a></h4>
                                <p><?php echo mb_substr($topic['body'], 0, 100); ?> <a
                                        href="/forum/thread/?id= <?php echo $topic['id']; ?>"> read more....</a></p>
                            </div>
                        </div><!-- End col-md-8-->
                        <div class="col-md-2 view-like-reply">
                            <i class="icon-eye"></i><?php echo $topic['view_count'] ?>
                            <span class="like-button">
                                <i class="icon-thumbs-up<?php echo $topic['liked']?'-alt':''?>"
                                    <?php if($topic['liked']): ?>style="color: #1cbbb4;" <?php endif; ?>
                                    onclick="likeOrUnlike(event, <?php echo $topic['id'] ?>,<?php echo $topic['liked']? 'false': 'true' ?>,<?php echo $topic['like_count']?>)"></i>
                                <div style="display: inline;" class="like_count">
                                    <?php echo $topic['like_count'] ?></div>
                            </span>
                            <i class="icon-comment"></i><?php echo $topic['reply_count'] ?>
                        </div>
                        <div class="col-md-1 create_date">
                            <i><?php echo $topic['create_date'] ?></i>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
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


        </div> <!-- End row-->
    </div><!-- End container -->
</section><!-- End main_content-->


<?php include('includes/footer.php'); ?>