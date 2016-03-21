<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar">
    <ul class="nav nav-sidebar text-right">
        <li <?php echo isActive(["dashboard", "manage"]); ?>>
            <a href="dashboard.php"><i class="glyphicon glyphicon-th-large"></i> Dashboard</a>
        </li>
        <?php if($currentBlog){ ?>
        <li <?php echo isActive(["manage-posts"]); ?>>
            <a href="manage-posts.php?slug=<?php echo getSlug(); ?>"><i class="glyphicon glyphicon-file"></i> Posts</a>
        </li>
        <li <?php echo isActive(["manage-comments"]); ?>>
            <a href="manage-comments.php"><i class="glyphicon glyphicon-comment"></i> Comments</a>
        </li>
        <li <?php echo isActive(["customize"]); ?>>
            <a href="customize.php"><i class="glyphicon glyphicon-tint"></i> Customize</a>
        </li>
        <?php } ?>
    </ul>
</div>