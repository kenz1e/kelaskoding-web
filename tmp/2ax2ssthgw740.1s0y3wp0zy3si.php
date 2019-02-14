<div class="container content">
    <div class="row">
        <div class="main">
            <p class="title-login">Daftar Baru</p>
            <?php if ($SESSION['flash']['errors']!=null): ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> <?php echo $SESSION['flash']['errorType']; ?></h4>
                    <?php foreach (($SESSION['flash']['errors']?:[]) as $error): ?>
                        <li><?php echo $error['0']; ?></li>
                    <?php endforeach; ?>
                </div>
                <?php if ($SESSION['flash']['infos']!=null): ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info-circle"></i> <?php echo $SESSION['flash']['errorType']; ?></h4>
                        <?php foreach (($SESSION['flash']['infos']?:[]) as $info): ?>
                            <li><?php echo $info['0']; ?></li>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <form role="form" method="post" action="<?php echo $BASE; ?>/daftar/member">
                <div class="form-group">
                    <label for="inputNama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="inputNama" value="<?php echo $SESSION['flash']['inputNama']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="text" class="form-control" name="inputEmail" value="<?php echo $SESSION['flash']['inputEmail']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" name="inputPassword">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Ulangi Password</label>
                    <input type="password" class="form-control" name="inputUlangPassword">
                </div>
                <div class="form-group">
                    <p class="control-label">Tulis kode berikut</p>
                    <img src="<?php echo $BASE; ?>/captcha" title="captcha image" alt="captcha" class="img-responsive" />
                    <input id="captcha" type="text" name="captcha" class="form-control" />
                </div>
                <button type="submit" class="btn btn btn-success">Daftar Sekarang</button>
            </form>

        </div>

    </div>
</div>