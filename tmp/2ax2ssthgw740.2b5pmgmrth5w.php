<!-- Page Content -->
<div class="container content">

    <div class="row kelas-title">
        <div class="col-lg-12">
            <h4>Blog</h4>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <?php if (count($blogs)>0): ?>
                    
                        <?php foreach (($blogs?:[]) as $blog): ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="text-center">
                                            <img src="<?= $blog['thumbnail'] ?>" class="img-responsive"  width="500" height="300"/>
                                        </p>
                                        <b><a href="<?= $BASE ?>/blog/<?= $blog['id'] ?>"><?= $blog['title'] ?></a></b>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i> <?= $blog['post_date'] ?></p>
                                        <p><?= $blog['short_content'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    
                    <?php else: ?>
                        <div class="col-md-12">
                            <p>Belum terdapat konten blog saat ini</p>
                        </div>
                    
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container -->