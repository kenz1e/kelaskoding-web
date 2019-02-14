<!-- Page Content -->
<div class="container content">

    <div class="row kelas-title">
        <div class="col-lg-12">
            <h4>Kelas yang anda ikuti</h4>
            <?php if ($SESSION['flash']['errors']!=null): ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><i class="icon fa fa-ban"></i> <?= $SESSION['flash']['errorType'] ?></b>
                    <?php foreach (($SESSION['flash']['errors']?:[]) as $error): ?>
                        <li><?= $error[0] ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if ($SESSION['flash']['infos']!=null): ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><i class="icon fa fa-info-circle"></i> <?= $SESSION['flash']['errorType'] ?></b>
                    <?php foreach (($SESSION['flash']['infos']?:[]) as $info): ?>
                        <p><?= $info[0] ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <?php if (count($courses)>0): ?>
                    
                        <?php foreach (($courses?:[]) as $course): ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="text-center">
                                            <img src="<?= $admin_domain ?>/ui/uploads/<?= $course['thumbnail'] ?>" class="img-responsive" width="310" height="200" />
                                        </p>
                                        <p><b><a href="<?= $BASE ?>/kelassaya/belajar/<?= $course['id'] ?>"><?= $course['name'] ?></a></b></p>
                                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $course['duration'] ?></p>
                                        <p>
                                            <?php foreach ((explode(',',$course['keyword'])?:[]) as $keyword): ?>
                                                <button type="button" class="btn btn-outline-success btn-sm"><?= $keyword ?></button>
                                            <?php endforeach; ?>
                                        </p>
                                        <a class="btn btn-success btn-block btn-lg" href="<?= $BASE ?>/kelassaya/belajar/<?= $course['id'] ?>">Mulai Belajar</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    
                    <?php else: ?>
                        <div class="col-lg-12">
                            <p>Anda belum mengikuti kelas apapun</p>
                        </div>
                    
                <?php endif; ?>
            </div>
        </div>
    </div>


</div>
<!-- /.container -->