<!-- Page Content -->
<div class="container content">

    <div class="row kelas-title">
        <div class="col-lg-12">
            <h4>Kelas Premium</h4>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <?php foreach (($premium?:[]) as $course): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center">
                                    <img src="<?= $admin_domain ?>/ui/uploads/<?= $course['thumbnail'] ?>" class="img-responsive" width="310" height="200" />
                                </p>
                                <p><b><a href="<?= $BASE ?>/detail/<?= $course['id'] ?>"><?= $course['name'] ?></a></b></p>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $course['duration'] ?></p>
                                <p>
                                    <?php foreach ((explode(',',$course['keyword'])?:[]) as $keyword): ?>
                                        <button type="button" class="btn btn-outline-success btn-sm"><?= $keyword ?></button>
                                    <?php endforeach; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary  pull-right">Lihat Kelas PREMIUM Lainnya</button>
        </div>
    </div> -->

    <div class="row kelas-title">
        <div class="col-lg-12">
            <h4>Kelas Gratis</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <?php if (count($free)>0): ?>
                    
                        <?php foreach (($free?:[]) as $course): ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="text-center">
                                            <img src="<?= $admin_domain ?>/ui/uploads/<?= $course['thumbnail'] ?>" class="img-responsive" width="310" height="200" />
                                        </p>
                                        <p><b><a href="<?= $BASE ?>/detail/<?= $course['id'] ?>"><?= $course['name'] ?></a></b></p>
                                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $course['duration'] ?></p>
                                        <p>
                                            <?php foreach ((explode(',',$course['keyword'])?:[]) as $keyword): ?>
                                                <button type="button" class="btn btn-outline-success btn-sm"><?= $keyword ?></button>
                                            <?php endforeach; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    
                    <?php else: ?>
                        <div class="col-lg-12">
                            <p>Belum terdapat kelas</p>
                        </div>
                    
                <?php endif; ?>
            </div>
        </div>
    </div>


</div>
<!-- /.container -->