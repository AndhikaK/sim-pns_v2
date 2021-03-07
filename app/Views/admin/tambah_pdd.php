<?= $this->extend('layout/admin-template-sm-window') ?>

<?= $this->section('content') ?>

<div class="container pb-5">
    <h5 class="pt-5"><?= $title ?></h5>

    <?= $this->include('layout/alert') ?>

    <div class="border border-dark rounded p-3 mb-2 bg-white">
        <form action="<?= base_url("admin/detailpegawai/tambahdatapdd/$nip/$pdd") ?>" class="">
            <?php foreach ($colForm as $name => $value) : ?>
                <div class="form-group row">
                    <label for="<?= $value ?>" class="col col-form-label"><?= $name ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="<?= $value ?>" name="<?= $value ?>">
                    </div>
                </div>
            <?php endforeach ?>

            <button class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <div class="border border-dark rounded p-3 bg-white">
        <table class="uk-table m-0 p-0">
            <thead>
                <th>Action</th>
                <th>Tahun Kelulusan</th>
                <th>Pendidikan</th>
            </thead>

            <?php if (count($riwayatPDD) > 0) : ?>
                <tbody class="tbody-rwy">
                    <?php foreach ($riwayatPDD as $item) : ?>
                        <tr>

                            <?php if ($idItem == $item['id_riwayat_' . $pdd]) : ?>
                                <form action="<?= base_url("/admin/detailpegawai/editdatapdd/$nip/$pdd/" . $item["id_riwayat_" . $pdd]) ?>" method="POST">
                                    <td>
                                        <button class="icon-button">
                                            <img src="/asset/svg/check-circle-solid.svg" class="fa-icon-success fa-icon" alt="">
                                        </button>
                                        <a href="<?= base_url("/admin/detailpegawai/tambahpdd/$nip/$pdd/") ?>" class="">
                                            <img src="/asset/svg/window-close-solid.svg" class="fa-icon-danger fa-icon" alt="">
                                        </a>
                                    </td>
                                    <?php foreach ($colForm as $name => $value) : ?>
                                        <td><input type="text" name="<?= $value ?>" value="<?= $item[$value] ?>"></td>
                                    <?php endforeach ?>

                                </form>
                            <?php else : ?>
                                <td>
                                    <a href="<?= base_url("/admin/detailpegawai/tambahpdd/$nip/$pdd/" . $item['id_riwayat_' . $pdd]) ?>" class="">
                                        <img src="/asset/svg/edit-solid.svg" class="fa-icon-primary fa-icon" alt="">
                                    </a>
                                    <a href="<?= base_url("/admin/detailpegawai/deletedatapdd/$nip/$pdd/" . $item['id_riwayat_' . $pdd]) ?>" class="">
                                        <img src="/asset/svg/trash-solid.svg" class="fa-icon-danger fa-icon" alt="">
                                    </a>
                                </td>
                                <?php foreach ($colForm as $name => $value) : ?>
                                    <td><?= $item[$value] ?></td>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            <?php else : ?>
            <?php endif ?>
        </table>
    </div>
</div>

<?= $this->endSection() ?>