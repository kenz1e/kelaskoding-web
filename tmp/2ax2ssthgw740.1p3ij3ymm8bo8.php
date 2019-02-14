<!-- Page Content -->
<div class="container content">

    <div class="row kelas-title">
        <div class="col-lg-12">
            <h4>Proses Pembayaran</h4>
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
            <p>Anda memilih kelas training berikut </p>
            <table class="table table-striped">
                <thead>

                    <td>Nama Kelas</td>
                    <td>Harga</td>
                    <td>Hak akses</td>

                </thead>
                <tbody>
                    <tr>
                        <td><b><?= $course['name'] ?></b></td>
                        <td>IDR <?= number_format($course['price']) ?></td>
                        <td>Seumur hidup</td>
                    </tr>
                </tbody>
            </table>
            <div class="alert alert-danger pull-left" style="width: 600px">
                <i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> Pembayaran tidak dapat dibatalkan, refund
                atau diganti dengan kelas training yang lain. <br/> Dengan membayar kelas training ini berarti anda setuju
                dengan kententuan ini.
            </div>
            <p class="pull-right"><a href="#" class="btn btn-info" id="payButton">Bayar Sekarang</a></p>
        </div>
    </div>
    <div class="row">        
        <div class="col-lg-12 text-center">
            <br/><br/>
            <p>Pembayaran diproses melalui</p>
            <img src="<?= $BASE ?>/ui/img/veritrans.png"/><br/><br/>
            <p><img src="<?= $BASE ?>/ui/img/payments.png"/></p>
        </div>
    </div>
</div>
<!-- /.container -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="VT-client-yzP9BfkpQdmyqHPY"></script>
<script type="text/javascript">
    document.getElementById('payButton').onclick = function () {
        // SnapToken acquired from previous step
        snap.pay('<?= $snapToken ?>');
    };

</script>