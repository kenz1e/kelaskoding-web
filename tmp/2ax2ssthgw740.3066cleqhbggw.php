<!-- Page Content -->
<div class="container content">

    <div class="row kelas-title">
        <div class="col-lg-12">
            <h4><?= $blog['title'] ?></h4>
            <i class="fa fa-calendar" aria-hidden="true"></i> <?= $blog['post_date'].PHP_EOL ?>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <?= $blog['full_content'].PHP_EOL ?>
        </div>
    </div>

</div>
<!-- /.container -->