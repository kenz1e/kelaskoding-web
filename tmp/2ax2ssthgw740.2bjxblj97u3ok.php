<div class="container content">
        <div class="row">
            <div class="main">
                <p class="title-login">Lupa Password</a>
                </p>
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
    
                <form role="form" method="post" action="<?= $BASE ?>/lupa/step1">
                    <p>Kami akan mengirimkan link ke alamat email anda untuk proses perubahan password</p>
                    <div class="form-group">
                        <label for="inputUsernameEmail">Email terdaftar</label>
                        <input type="text" class="form-control" name="inputEmail">
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">
                        Reset Password
                      </button>
                </form>
    
            </div>
    
        </div>
    </div>