<!-- success alert -->
<?php if (session()->getFlashData('success-delete')) : ?>
    <div class="alert alert-success-alt alert-dismissible fade show" role="alert">
        <span class="glyphicon glyphicon-certificate"></span>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Hapus Data Berhasil!</strong> <?= session()->getFlashData('success-delete') ?> </div>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('success-add')) : ?>
    <div class="alert alert-success-alt alert-dismissible fade show" role="alert">
        <span class="glyphicon glyphicon-certificate"></span>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Tambah Data Berhasil!</strong> <?= session()->getFlashData('success-add') ?> </div>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('success-edit')) : ?>
    <div class="alert alert-success-alt alert-dismissible fade show" role="alert">
        <span class="glyphicon glyphicon-certificate"></span>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Edit Data Berhasil!</strong> <?= session()->getFlashData('success-edit') ?> </div>
    </div>
<?php endif; ?>
<!-- success alert -->



<!-- failded alert -->
<?php if (session()->getFlashData('failed-delete')) : ?>
    <div class="alert alert-danger-alt alert-dismissible fade show" role="alert">
        <span class="glyphicon glyphicon-certificate"></span>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Hapus Data Gagal!</strong> <?= session()->getFlashData('failed-delete') ?> </div>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('failed-add')) : ?>
    <div class="alert alert-danger-alt alert-dismissible fade show" role="alert">
        <span class="glyphicon glyphicon-certificate"></span>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Tambah Data Gagal!</strong> <?= session()->getFlashData('failed-add') ?> </div>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('failed-edit')) : ?>
    <div class="alert alert-danger-alt alert-dismissible fade show" role="alert">
        <span class="glyphicon glyphicon-certificate"></span>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Edit Data Gagal!</strong> <?= session()->getFlashData('failed-edit') ?> </div>
    </div>
<?php endif; ?>
<!-- failded alert -->