<?= $this->extend('layout/admin-template-sm-window') ?>

<?= $this->section('content') ?>

<div class="container pb-5">
    <h5 class="pt-5"><?= $title ?></h5>

    <?= $this->include('layout/alert') ?>

    <div class="border border-dark rounded p-3 mb-2 bg-white">
        <form action="<?= base_url("admin/detailpegawai/tambahkeluarga/$nip") ?>" class="">
            <?php foreach ($colForm as $name => $value) : ?>
                <div class="form-group row">
                    <label for="<?= $value ?>" class="col col-form-label"><?= $name ?></label>
                    <div class="col-sm-8">
                        <?php if (str_contains($value, 'tanggal')) : ?>
                            <input type="date" class="form-control form-control-sm" name="<?= $value ?>">
                        <?php else : ?>
                            <input type="text" class="form-control form-control-sm" id="<?= $value ?>" name="<?= $value ?>">
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach ?>

            <input type="text" value="<?= $nip ?>" name="nip" hidden>

            <button class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <div class="border border-dark rounded p-3 bg-white">
        <table class="uk-table m-0 p-0 table-responsive table-riwayat">
            <thead>
                <th>Action</th>
                <?php foreach ($colForm as $name => $value) : ?>
                    <th><?= $name ?></th>
                <?php endforeach ?>
            </thead>

            <?php if (count($dataKeluarga) > 0) : ?>
                <tbody class="tbody-rwy">
                    <?php foreach ($dataKeluarga as $item) : ?>
                        <tr>
                            <?php if ($idItem == $item['id_keluarga']) : ?>
                                <form action="<?= base_url("/admin/detailpegawai/editdatakeluarga/$nip/" . $item['id_keluarga']) ?>" method="POST">
                                    <td>
                                        <button class="icon-button">
                                            <img src="/asset/svg/check-circle-solid.svg" class="fa-icon-success fa-icon" alt="">
                                        </button>
                                        <a href="<?= base_url("/admin/detailpegawai/keluarga/$nip/") ?>" class="">
                                            <img src="/asset/svg/window-close-solid.svg" class="fa-icon-danger fa-icon" alt="">
                                        </a>
                                    </td>
                                    <?php foreach ($colForm as $name => $value) : ?>
                                        <td class="pb-2"><input type="text" name="<?= $value ?>" value="<?= $item[$value] ?>"></td>
                                    <?php endforeach ?>

                                    <input type="text" value="<?= $nip ?>" name="nip" hidden>
                                </form>
                            <?php else : ?>
                                <td>
                                    <a href="<?= base_url("/admin/detailpegawai/keluarga/$nip/" . $item['id_keluarga']) ?>" class="">
                                        <img src="/asset/svg/edit-solid.svg" class="fa-icon-primary fa-icon" alt="">
                                    </a>
                                    <a href="<?= base_url("/admin/detailpegawai/deletedatapdd/$nip/" . $item['id_keluarga']) ?>" class="">
                                        <img src="/asset/svg/trash-solid.svg" class="fa-icon-danger fa-icon" alt="">
                                    </a>
                                </td>
                                <?php foreach ($colForm as $name => $value) : ?>
                                    <td class="pb-2"><?= $item[$value] ?></td>
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