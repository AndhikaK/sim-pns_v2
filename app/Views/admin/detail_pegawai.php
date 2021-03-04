<?= $this->extend('layout/admin-template') ?>


<?= $this->section('content') ?>

<div class="m-4">
    <?= $this->include('layout/alert') ?>
</div>
<div class="container-fluid rounded bg-white p-4 ">


    <form action="<?= base_url('/admin/detailpegawai/savebio') ?>" method="POST" class="">
        <?php if ($edit == 'edit-bio') : ?>
            <button class="btn btn-sm btn-success mb-3">SIMPAN</button>
            <a href="<?= base_url('/admin/detail_pegawai/' . $detailPegawai['nip']) ?>" class="btn btn-sm btn-danger mb-3">BATAL</a>
        <?php else : ?>
            <a href="<?= base_url('/admin/detail_pegawai/' . $detailPegawai['nip']) . '/edit-bio' ?>" class="btn btn-sm btn-primary mb-3">EDIT</a>
        <?php endif; ?>

        <input type="text" name="id_riwayat_pekerjaan" value="<?= $riwayatPekerjaan[0]['id_riwayat_pekerjaan'] ?>" hidden>
        <input type="text" name="id_riwayat_golongan" value="<?= $riwayatGolongan[0]['id_riwayat_golongan'] ?>" hidden>



        <div class="row">
            <div class="col-2">
                <img src="/sdm-polri.png" class="col-12">
            </div>
            <div class="col-5">
                <div class="form-group row">
                    <label for="nip" class="col col-form-label-sm form-label-small">NIP</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= $detailPegawai['nip'] ?>" <?= $edit == 'edit-bio' ? "readonly" : "disabled" ?> autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_pegawai" class="col col-form-label-sm form-label-small">Nama Pegawai</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= $detailPegawai['nama_pegawai'] ?>" <?= $edit == 'edit-bio' ? "" : "disabled" ?> autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col col-form-label-sm form-label-small">Tempat, Tanggal Lahir</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $detailPegawai['tempat_lahir'] ?>" <?= $edit == 'edit-bio' ? "" : "disabled" ?> autocomplete="off">
                        <input class="form-control" type="date" value="<?= $detailPegawai['ttl'] ?>" name="ttl" id="ttl" <?= $edit == 'edit-bio' ? "" : "disabled" ?> autocomplete="off">

                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col col-form-label-sm form-label-small">Alamat</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $detailPegawai['alamat'] ?>" <?= $edit == 'edit-bio' ? "" : "disabled" ?> autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kelamin" class="col col-form-label-sm form-label-small">Jenis Kelamin</label>
                    <div class="col-8">
                        <input type="text" list="genderListOption" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $detailPegawai['jenis_kelamin'] ?>" <?= $edit == 'edit-bio' ? "" : "disabled" ?> autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="agama" class="col col-form-label-sm form-label-small">Agama</label>
                    <div class="col-8">
                        <input type="text" list="agamaListOption" class="form-control" id="agama" name="agama" value="<?= $detailPegawai['agama'] ?>" <?= $edit == 'edit-bio' ? "" : "disabled" ?> autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="form-group row">
                    <label for="nik" class="col col-form-label-sm form-label-small">NIK</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="nik" name="nik" value="<?= $detailPegawai['nik'] ?>" <?= $edit == 'edit-bio' ? "" : "disabled" ?> autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_golongan" class="col col-form-label-sm form-label-small">Golongan dan Pangkat</label>
                    <div class="col-8">
                        <input type="text" list="golonganListOption" class="form-control" id="id_golongan" name="id_golongan" value="<?= ($edit == 'edit-bio' ? $riwayatGolongan[0]['id_golongan'] . " - " : "") . $riwayatGolongan[0]['pangkat'] ?>" <?= $edit == 'edit-bio' ? "" : "disabled" ?> autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_jabatan" class="col col-form-label-sm form-label-small">Jabatan</label>
                    <div class="col-8">
                        <input type="text" list="jabatanListOption" class="form-control" id="id_jabatan" name="id_jabatan" value="<?= ($edit == 'edit-bio' ? $riwayatPekerjaan[0]['id_jabatan'] . " - " : "") . $riwayatPekerjaan[0]['nama_jabatan'] ?>" <?= $edit == 'edit-bio' ? "" : "disabled" ?> autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_satker" class="col col-form-label-sm form-label-small">Satuan Kerja</label>
                    <div class="col-8">
                        <input type="text" list="satkerListOption" class="form-control" id="id_satker" name="id_satker" value="<?= ($edit == 'edit-bio' ? $riwayatPekerjaan[0]['id_satker'] . " - " : "") . $riwayatPekerjaan[0]['nama_satker'] ?>" <?= $edit == 'edit-bio' ? "" : "disabled" ?> autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_bagian" class="col col-form-label-sm form-label-small">Bagian</label>
                    <div class="col-8">
                        <input type="text" list="bagianListOption" class="form-control" id="id_bagian" name="id_bagian" value="<?= ($edit == 'edit-bio' ? $riwayatPekerjaan[0]['id_bagian'] . " - " : "") . $riwayatPekerjaan[0]['nama_bagian'] ?>" <?= $edit == 'edit-bio' ? "" : "disabled" ?> autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_subbag" class="col col-form-label-sm form-label-small">Subbag</label>
                    <div class="col-8">
                        <input type="text" list="subbagListOption" class="form-control" id="id_subbag" name="id_subbag" value="<?= ($edit == 'edit-bio' ? $riwayatPekerjaan[0]['id_subbag'] . " - " : "") . $riwayatPekerjaan[0]['nama_subbag'] ?>" <?= $edit == 'edit-bio' ? "" : "disabled" ?> autocomplete="off">
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- Switcher riwayat table -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.16/dist/css/uikit.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.16/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.16/dist/js/uikit-icons.min.js"></script>


    <hr class="uk-divider-icon">

    <?php $switcher = '' ?>
    <?php if (str_contains($edit, "rwy")) {
        $switcherState = explode("-", $edit);
        $switcher = $switcherState[2];
    } ?>

    <div>
        <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
            <li class="<?= $switcher == "pkj" ? "uk-active" : "" ?>"><a href="#">Riwayat Pekerjaan</a></li>
            <li class="<?= $switcher == "gol" ? "uk-active" : "" ?>"><a href="#">Riwayat Golongan dan Pangkat</a></li>
            <li class="<?= $switcher == "pdd" ? "uk-active" : "" ?>"><a href="#">Riwayat Pendidikan</a></li>
        </ul>

        <ul class="uk-switcher uk-margin uk-margin-large-bottom detail-riwayat">
            <!-- riwayat Pekerjaan -->
            <?php if (count($riwayatPekerjaan)) ?>
            <li>
                <table class="table table-sm table-responsive table-riwayat">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Action</th>
                            <?php foreach ($colRwyPekerjaan as $name => $value) : ?>
                                <th><?= strtoupper($name) ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($riwayatPekerjaan as $item) : ?>
                            <tr>
                                <form action="<?= base_url('/admin/detailpegawai/saveRwyGolongan') ?>" method="POST">
                                    <td><?= $i++ ?></td>
                                    <td class="d-inline-flex">
                                        <?php if ($edit != 'edit-rwy-pkj-' . $item['id_riwayat_pekerjaan']) : ?>
                                            <a href="<?= base_url('/admin/detail_pegawai/' . $detailPegawai['nip'] . '/edit-rwy-pkj-' . $item['id_riwayat_pekerjaan']) ?>" class="uk-icon-link uk-margin-small-right text-primary" uk-icon="file-edit"></a>
                                            <a href="#" class="uk-icon-link text-danger" uk-icon="trash"></a>
                                        <?php elseif ($edit) : ?>
                                            <button type="submit" uk-icon="check" class="text-success"></button>
                                            <a href="<?= base_url('/admin/detail_pegawai/' . $detailPegawai['nip']) ?>" uk-icon="close" class="text-danger"></a>
                                        <?php endif; ?>
                                    </td>
                                    <?php foreach ($colRwyPekerjaan as $name => $value) : ?>
                                        <td>
                                            <?php if ($name == "jabatan" || $name == 'satker' || $name == 'bagian' || $name == 'subbag') : ?>
                                                <input type="text" list="<?= $name . 'ListOption' ?>" name="<?= 'id_' . $name ?>" value="<?= $item['id_' . $name] . " - " . $item['nama_' . $name] ?>" <?= $edit == 'edit-rwy-pkj-' . $item['id_riwayat_pekerjaan'] ? "" : "disabled"  ?> autocomplete="off">
                                            <?php elseif (str_contains($name, 'periode')) : ?>
                                                <input class="form-control" type="date" value="<?= $item[$value] ?>" name="<?= $value ?>" id="ttl" <?= $edit == 'edit-rwy-pkj-' . $item['id_riwayat_pekerjaan'] ? "" : "disabled" ?> autocomplete="off">
                                            <?php else : ?>
                                                <input type="text" name="<?= $value ?>" value="<?= strtoupper($item[$value]) ?>" <?= $edit == 'edit-rwy-pkj-' . $item['id_riwayat_pekerjaan'] ? "" : "disabled"  ?>>
                                            <?php endif; ?>
                                        </td>
                                    <?php endforeach ?>
                                    <input type="text" name="id_riwayat_pekerjaan" value="<?= $item['id_riwayat_pekerjaan'] ?>" hidden>
                                    <input type="text" name="nip" value="<?= $detailPegawai['nip'] ?>" hidden>
                                </form>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </li>
            <!-- riwayat Pekerjaan -->

            <!-- riwayat Golongan -->
            <li>
                <table class="table table-sm table-responsive table-riwayat">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Action</th>
                            <?php foreach ($colRwyGolongan as $name => $value) : ?>
                                <th><?= strtoupper($name) ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($riwayatGolongan as $item) : ?>
                            <tr>
                                <form action="<?= base_url('/admin/detailpegawai/saveRwyGolongan') ?>" method="POST">
                                    <td><?= $i++ ?></td>
                                    <td class="d-inline-flex">
                                        <?php if ($edit != 'edit-rwy-gol-' . $item['id_riwayat_golongan']) : ?>
                                            <a href="<?= base_url('/admin/detail_pegawai/' . $detailPegawai['nip'] . '/edit-rwy-gol-' . $item['id_riwayat_golongan']) ?>" class="uk-icon-link uk-margin-small-right text-primary" uk-icon="file-edit"></a>
                                            <a href="<?= base_url('/admin/detailpegawai/deletedata/gol/' . $item['id_riwayat_golongan']) ?>" class="uk-icon-link text-danger" uk-icon="trash"></a>
                                        <?php elseif ($edit) : ?>
                                            <button type="submit" uk-icon="check" class="text-success"></button>
                                            <a href="<?= base_url('/admin/detail_pegawai/' . $detailPegawai['nip']) ?>" uk-icon="close" class="text-danger"></a>
                                        <?php endif; ?>
                                    </td>
                                    <?php foreach ($colRwyGolongan as $name => $value) : ?>
                                        <td>
                                            <?php if ($name == "jabatan" || $name == 'satker' || $name == 'bagian' || $name == 'subbag') : ?>
                                                <input type="text" list="<?= $name . 'ListOption' ?>" name="<?= 'id_' . $name ?>" value="<?= $item['id_' . $name] . " - " . $item['nama_' . $name] ?>" <?= $edit == 'edit-rwy-gol-' . $item['id_riwayat_golongan'] ? "" : "disabled"  ?> autocomplete="off">
                                            <?php elseif (str_contains($name, 'periode')) : ?>
                                                <input class="form-control" type="date" value="<?= $item[$value] ?>" name="<?= $value ?>" id="ttl" <?= $edit == 'edit-rwy-gol-' . $item['id_riwayat_golongan'] ? "" : "disabled" ?> autocomplete="off">
                                            <?php else : ?>
                                                <input type="text" name="<?= $value ?>" value="<?= strtoupper($item[$value]) ?>" <?= $edit == 'edit-rwy-gol-' . $item['id_riwayat_golongan'] ? "" : "disabled"  ?>>
                                            <?php endif; ?>
                                        </td>
                                    <?php endforeach ?>
                                    <input type="text" name="id_riwayat_golongan" value="<?= $item['id_riwayat_golongan'] ?>" hidden>
                                    <input type="text" name="nip" value="<?= $detailPegawai['nip'] ?>" hidden>
                                </form>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </li>
            <!-- riwayat Golongan -->

            <!-- riwayat Pendidikan -->
            <li class="table-riwayat">
                <div class=" row m-2">
                    <div class="col uk-box-shadow-small">
                        <div class="bg-primary text-white d-inline-block p-2">Pendidikan Umum</div>
                        <table class="uk-table">
                            <thead>
                                <th>Tahun Kelulusan</th>
                                <th>Pendidikan</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="col uk-box-shadow-small p-2">
                        <caption>Pendidikan Umum</caption>
                        <table class="uk-table">
                            <thead>
                                <th>Tahun Kelulusan</th>
                                <th>Pendidikan</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col">
                        <caption>Pendidikan Umum</caption>
                        <table class="uk-table">
                            <thead>
                                <th>Tahun Kelulusan</th>
                                <th>Pendidikan</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <caption>Pendidikan Umum</caption>
                        <table class="uk-table">
                            <thead>
                                <th>Tahun Kelulusan</th>
                                <th>Pendidikan</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </li>
            <!-- riwayat Pendidikan -->
        </ul>
    </div>
    <!-- Switcher riwayat table -->


    <!-- list data to display -->

    <datalist id="genderListOption">
        <option value="LAKI-LAKI"></option>
        <option value="PEREMPUAN"></option>
    </datalist>

    <datalist id="agamaListOption">
        <option value="ISLAM"></option>
        <option value="PROTESTAN"></option>
        <option value="KATOLIK"></option>
        <option value="HINDU"></option>
        <option value="BUDHA"></option>
        <option value="KONG HU CHU"></option>
    </datalist>

    <datalist id="jabatanListOption">
        <?php foreach ($jabatan as $item) : ?>
            <option value="<?= $item['id_jabatan'] . " - " . $item['nama_jabatan'] ?>"></option>
        <?php endforeach ?>
    </datalist>

    <datalist id="golonganListOption">
        <?php foreach ($golongan as $item) : ?>
            <option value="<?= $item['id_golongan'] . " - " . $item['pangkat'] ?>"></option>
        <?php endforeach ?>
    </datalist>

    <datalist id="satkerListOption">
        <?php foreach ($satker as $item) : ?>
            <option value="<?= $item['id_satker'] . " - " . $item['nama_satker'] ?>"></option>
        <?php endforeach ?>
    </datalist>

    <datalist id="bagianListOption">
        <?php foreach ($bagian as $item) : ?>
            <option value="<?= $item['id_bagian'] . " - " . $item['nama_bagian'] ?>"></option>
        <?php endforeach ?>
    </datalist>

    <datalist id="subbagListOption">
        <?php foreach ($subbag as $item) : ?>
            <option value="<?= $item['id_subbag'] . " - " . $item['nama_subbag'] ?>"></option>
        <?php endforeach ?>
    </datalist>


    <!-- list data to display -->

</div>


<?= $this->endSection() ?>