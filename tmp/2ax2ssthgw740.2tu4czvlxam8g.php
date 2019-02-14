<div class="container content">
        <div class="row">
            <div class="main">
                <p class="title-login">Ubah Password</p>
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
                            <li><?= $info[0] ?></li>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <form role="form" method="post" action="<?= $BASE ?>/lupa/step3">                    
                    <div class="form-group">
                        <label for="inputPassword">Password Baru</label>
                        <input type="password" class="form-control" name="inputPassword">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Ulangi Password Baru</label>
                        <input type="password" class="form-control" name="inputUlangPassword">
                    </div>                    
                    <input type="hidden" name="serialid" value="<?= $serialid ?>"/>
                    <button type="submit" class="btn btn btn-success">Ganti Password</button>
                </form>
    
            </div>
    
        </div>
    </div>