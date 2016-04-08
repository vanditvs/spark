<div class="main">
    <div class="main-wrapper col-lg-10 col-md-9 col-sm-9 col-xs-12 pull-right">
        <div class="dashboard-content">
            <div class="page-header">
            <h1>$blog['title']<small> <?php echo count($blog['posts']); ?> Posts</small></h1>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Basic Info</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                    <h4><span class="label label-default"><?php echo count($blog['posts']); ?></span> Posts</h4>
                                    <h4><span class="label label-default">7</span> Comments</h4>
                                    <h4><span class="label label-default"><i class="glyphicon glyphicon-bookmark"></i></span> Current Theme : <?php echo $blog['currentTheme']; ?></h4>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-right">
                                    <p>
                                        <a href="#" class="btn btn-primary btn-sm">Manage</a>
                                        <a href="#" class="btn btn-default btn-sm">View</a>
                                    </p>
                                    <small class="text-muted">Created <b><?php echo $blog['created_at']; ?></b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Recent post</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            $latestPost = array_values($blog['posts'])[0];
                            $latestPostSlug = array_keys($blog['posts'])[0];
                            ?>
                            <p>
                                <img class="img-rounded img-responsive" src="<?php echo $latestPost['image']; ?>" alt="post-image">
                            </p>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="post-content">
                                        <p>
                                            <h4 class="media-heading"><?php echo $latestPost['title']; ?></h4>
                                        </p>
                                        <small>
                                            <span class="text-primary"><i class="glyphicon glyphicon-thumbs-up"></i></span> <?php echo $latestPost['likes']; ?> Likes
                                        </small>
                                        <span class="text-muted">|</span>
                                        <small>
                                            <span class="text-primary"><i class="glyphicon glyphicon-comment"></i></span> <?php echo $latestPost['comments']; ?> Comments
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
                                    <p>
                                        <a href="edit-post.php?slug=<?php echo getSlug(); ?>&amp;postSlug=<?php echo $latestPostSlug; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="#" class="btn btn-default btn-sm">View</a>
                                    </p>
                                    <small class="text-muted">Posted <b>5 hours ago</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>