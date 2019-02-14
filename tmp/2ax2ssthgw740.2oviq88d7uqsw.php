<!-- Page Content -->
<div class="container content">
    <!-- Heading Row -->
    <div class="row">
        <div class="col-lg-8">
            <div style="position:relative;height:0;padding-bottom:56.25%">
                <!-- <iframe src="https://www.youtube.com/embed/1czeebKyxHA?ecver=2" width="640" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0"
                    allowfullscreen></iframe> -->
                <?= $course['intro_video'].PHP_EOL ?>
            </div>
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
            <h3><?= $course['name'] ?></h3>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $course['duration'] ?></p>
            <p class="harga">IDR <?= number_format($course['price']) ?></p>
            <a class="btn btn-success btn-block btn-lg" href="<?= $BASE ?>/daftarkelas/<?= $course['id'] ?>">Daftar Kelas Ini</a>
        </div>
        <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <br/>
    <div class="row">
        <div class="col-lg-8">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active tab-title" href="#profile" role="tab" data-toggle="tab">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tab-title" href="#buzz" role="tab" data-toggle="tab">Tasks</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="profile">
                    <br/> <?= $course['overview'].PHP_EOL ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="buzz">
                    <br/>
                    <table class="table table-striped">
                        <?php foreach (($items?:[]) as $item): ?>
                            <tr>
                                <td><?= $item['name'] ?></td>
                                <td><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $item['duration'] ?></td>
                                <td><i class="fa fa-play-circle" aria-hidden="true"></i> Play</td>
                            </tr>                          
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-4">
            <div class="row kelas-title">
                <div class="col-md-12">
                    <h4>Kelas Lainnya</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center">
                                <img src="http://placehold.it/310x200" class="img-responsive" />
                            </p>
                            <p><b><a href="<?= $BASE ?>/detail">Membangun RestoBook Application dengan Angular, Ionic dan Springboot</a></b></p>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 10 jam belajar</p>
                            <p>
                                <button type="button" class="btn btn-outline-success btn-sm">Springboot</button>
                                <button type="button" class="btn btn-outline-success btn-sm">Ionic 2</button>
                                <button type="button" class="btn btn-outline-success btn-sm">PostgreSQL</button>
                                <button type="button" class="btn btn-outline-success btn-sm">Heroku</button>
                            </p>
                        </div>
                    </div>
                </div>                
            </div>
        </div> -->
    </div>

</div>
<!-- /.container -->