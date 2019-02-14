<div class="container content">
    <div class="row">
        <div class="main">
            <p class="title-login">Silahkan Masuk, atau <a href="<?= $BASE ?>/daftar">Daftar</a></p>
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
            <!-- <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <a href="#" class="btn btn-lg btn-primary btn-block">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook
                        </a>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <a href="#" class="btn btn-lg btn-danger btn-block"><i class="fa fa-google-plus-square" aria-hidden="true"></i> Google</a>
                </div>
            </div>
            <div class="login-or">
                <hr class="hr-or">
                <span class="span-or">or</span>
            </div> -->

            <form role="form" method="post" action="<?= $BASE ?>/login">
                <div class="form-group">
                    <label for="inputUsernameEmail">Email</label>
                    <input type="text" class="form-control" name="inputEmail" value="<?= $SESSION['flash']['inputEmail'] ?>">
                </div>
                <div class="form-group">
                    <a class="pull-right" href="<?= $BASE ?>/lupa">Lupa password?</a>
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" name="inputPassword">
                </div>
                <!-- <div class="checkbox pull-right">
                    <label>
                  <input type="checkbox">
                  Ingat saya </label>
                </div> -->
                <button type="submit" class="btn btn-success btn-block">
                Masuk
              </button>
            </form>

        </div>

    </div>
</div>