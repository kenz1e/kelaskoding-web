<!-- Page Content -->
<div class="container content">
    <div class="row">
        <div class="col-lg-12">
            <h4><?= $course['name'] ?></h4>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $course['duration'] ?></p>
            <br/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 add-scroll">
            <table class="table table-striped">
                <?php foreach (($items?:[]) as $item): ?>
                    <?php if ($selectedItem['id']==$item['id']): ?>
                        
                            <tr style="background: #9AF690;">
                                <td><?= $item['name'] ?></td>
                                <td><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $item['duration'] ?></td>
                                <td><i class="fa fa-play-circle fa-lg" aria-hidden="true"></i></td>
                            </tr>
                        
                        <?php else: ?>
                            <tr>
                                <td><a href="<?= $BASE ?>/kelassaya/play/<?= $course['id'] ?>/<?= $item['id'] ?>"><?= $item['name'] ?></a></td>
                                <td><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $item['duration'] ?></td>
                                <td><a href="<?= $BASE ?>/kelassaya/play/<?= $course['id'] ?>/<?= $item['id'] ?>"><i class="fa fa-play-circle fa-lg" aria-hidden="true"></i></a></td>
                            </tr>
                        
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col-lg-8">
            <div style="position:relative;height:0;padding-bottom:56.25%">
                <?php if ($selectedItem): ?>
                    <?= $selectedItem['item_video'] ?>
                    <?php else: ?> <?= $course['intro_video'] ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <br/>
    <br/>
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active tab-title" href="#diskusi" role="tab" data-toggle="tab">Diskusi</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="diskusi">
                    <br/>
                    <table class="table table-striped">
                        <tr>
                            <td colspan="2">
                                <?php if ($SESSION['flash']['errors']!=null): ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b><i class="icon fa fa-ban"></i> <?= $SESSION['flash']['errorType'] ?></b>
                                        <?php foreach (($SESSION['flash']['errors']?:[]) as $error): ?>
                                            <li><?= $error[0] ?></li>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <form method="POST" action="<?= $BASE ?>/comment/submit">
                                    <div class="form-group">
                                        <label for="overview">Pertanyaan Anda</label>
                                        <textarea class="form-control textarea" name="comments" id="comments" rows="5"><?= $SESSION['flash']['comments'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <p class="control-label">Tulis kode keamanan berikut</p>
                                        <img src="<?= $BASE ?>/captcha" title="captcha image" alt="captcha" class="img-responsive" />
                                        <input id="captcha" type="text" name="captcha" class="form-control" style="width:200px" />
                                    </div>
                                    <input type="hidden" name="courseId" value="<?= $course['id'] ?>" />
                                    <input type="hidden" name="itemId" value="<?= $selectedItem['id'] ?>" />
                                    <input type="submit" value="Kirim Pertanyaan" class="btn btn-success" />
                                </form>
                            </td>
                        </tr>
                        <?php if (count($comments)>0): ?>
                            
                                <?php foreach (($comments?:[]) as $comment): ?>
                                    <tr>
                                        <td style="width: 15%;" class="text-center">
                                            <img src="<?= $BASE ?>/ui/img/user.png" width="30px" height="30px" class="img-responsive" />
                                            <p><?= $comment['fullname'] ?></p>
                                        </td>
                                        <td>
                                            <p class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> <?= $comment['comments_date'] ?></p>
                                            <br/><br/> <?= $comment['comments'].PHP_EOL ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            
                            <?php else: ?>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        Belum terdapat diskusi di kelas ini
                                    </td>
                                </tr>
                            
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container -->