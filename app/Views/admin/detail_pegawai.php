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

            <li>
                <a class="text-white mb-2" data-toggle="collapse" href="#collapse-rwy-pekerjaan" role="button" aria-expanded="false" aria-controls="collapse-rwy-pekerjaan">
                    <p class="bg-primary p-1 rounded  d-inline"><img src="/asset/svg/plus-solid.svg" class="fa-icon fa-icon-white p-0"> Tambah Riwayat Pekerjaan</p>
                </a>
                <div class="collapse mt-3" id="collapse-rwy-pekerjaan">
                    <div class="card card-body">
                        <form action="<?= base_url("/admin/detailpegawai/tambahriwayatpkj") ?>" method="POST">
                            <?php foreach ($colRwyPekerjaan as $name => $value) : ?>
                                <div class="form-group row">
                                    <label for="<?= $value ?>" class="col-2 col-form-label"><?= $name ?></label>
                                    <div class="col-6">
                                        <?php if (!str_contains($value, 'periode')) : ?>
                                            <input type="text" class="form-control form-control-sm" id="<?= $value ?>" name="<?= str_replace('nama', 'id', $value) ?>" list="<?= $name ?>ListOption" autocomplete="off" required>
                                        <?php else : ?>
                                            <input type="date" class="form-control form-control-sm" name="<?= $value ?>">
                                        <?php endif ?>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <input type="text" value="<?= $detailPegawai['nip'] ?>" name="nip" hidden>

                            <button class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>

                <table class="table table-sm table-responsive table-riwayat mt-3">
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
                                <form action="<?= base_url('/admin/detailpegawai/saveRwyPekerjaan') ?>" method="POST">
                                    <td><?= $i++ ?></td>
                                    <td class="d-inline-flex">
                                        <?php if ($edit != 'edit-rwy-pkj-' . $item['id_riwayat_pekerjaan']) : ?>
                                            <a href="<?= base_url('/admin/detail_pegawai/' . $detailPegawai['nip'] . '/edit-rwy-pkj-' . $item['id_riwayat_pekerjaan']) ?>" class="uk-icon-link uk-margin-small-right text-primary" uk-icon="file-edit"></a>
                                            <a href="<?= count($riwayatPekerjaan) < 2 ? "#" : base_url('/admin/Detailpegawai/deletepekerjaan/' . $item['id_riwayat_pekerjaan']) ?>" class="uk-icon-link text-danger" uk-icon="trash"></a>
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
                <a class="text-white mb-2" data-toggle="collapse" href="#collapse-rwy-Golongan" role="button" aria-expanded="false" aria-controls="collapse-rwy-Golongan">
                    <p class="bg-primary p-1 rounded  d-inline"><img src="/asset/svg/plus-solid.svg" class="fa-icon fa-icon-white p-0"> Tambah Riwayat Golongan</p>
                </a>
                <div class="collapse mt-3" id="collapse-rwy-Golongan">
                    <div class="card card-body">
                        <form action="<?= base_url("/admin/detailpegawai/tambahriwayatgol") ?>" method="POST">
                            <?php foreach ($colRwyGolongan as $name => $value) : ?>
                                <div class="form-group row">
                                    <label for="<?= $value ?>" class="col-2 col-form-label"><?= $name ?></label>
                                    <div class="col-6">
                                        <?php if (!str_contains($value, 'periode')) : ?>
                                            <input type="text" class="form-control form-control-sm" id="<?= $value ?>" name="<?= str_replace('nama', 'id', $value) ?>" list="<?= $name ?>ListOption" autocomplete="off" required>
                                        <?php else : ?>
                                            <input type="date" class="form-control form-control-sm" name="<?= $value ?>">
                                        <?php endif ?>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <input type="text" value="<?= $detailPegawai['nip'] ?>" name="nip" hidden>

                            <button class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
                <table class="table table-sm table-responsive table-riwayat mt-3">
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
                                            <a href="<?= count($riwayatGolongan) < 2 ? "#" : base_url('/admin/detailpegawai/deletedata/gol/' . $item['id_riwayat_golongan']) ?>" class="uk-icon-link text-danger" uk-icon="trash"></a>
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
                <div class="row m-2 mb-0">
                    <div class="col rwy-pdd-col-box pl-0 pr-0 pr-0 pb-2">
                        <div class="bg-blue-soft text-white p-2">
                            PENDIDIKAN UMUM
                            <a onclick="window.open('/admin/detailpegawai/tambahpdd/<?= $detailPegawai['nip'] ?>/dikum', 'title', 'width=800, height=600')" class="uk-icon-link uk-margin-small-left text-white" uk-icon="file-edit"></a>
                        </div>
                        <table class="uk-table m-0 p-0">
                            <thead>
                                <th class="">Tahun Kelulusan</th>
                                <th class="">Pendidikan</th>
                            </thead>

                            <?php if (count($riwayatDikum) > 0) : ?>
                                <tbody class="tbody-rwy">
                                    <?php foreach ($riwayatDikum as $item) : ?>
                                        <tr>
                                            <td><?= $item['tahun_lulus'] ?></td>
                                            <td><?= $item['jenjang'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            <?php else : ?>
                            <?php endif ?>
                        </table>
                    </div>
                    <div class="col rwy-pdd-col-box pl-0 pr-0 pb-2">
                        <div class="bg-blue-soft text-white p-2">
                            PENDIDIKAN POLISI
                            <a onclick="window.open('/admin/detailpegawai/tambahpdd/<?= $detailPegawai['nip'] ?>/dikpol', 'title', 'width=800, height=600')" class="uk-icon-link uk-margin-small-left text-white" uk-icon="file-edit"></a>
                        </div>
                        <table class="uk-table m-0 p-0">
                            <thead>
                                <th>Tahun Kelulusan</th>
                                <th>Pendidikan</th>
                            </thead>
                            <?php if (count($riwayatDikpol) > 0) : ?>
                                <tbody class="tbody-rwy">
                                    <?php foreach ($riwayatDikpol as $item) : ?>
                                        <tr>
                                            <td><?= $item['tahun_lulus'] ?></td>
                                            <td><?= $item['nama_dikpol'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            <?php else : ?>
                            <?php endif ?>
                        </table>
                    </div>
                </div>
                <div class="row m-2 mt-0">
                    <div class="col rwy-pdd-col-box pl-0 pr-0 pb-2">
                        <div class="bg-blue-soft text-white p-2">
                            DIKBANGUM
                            <a onclick="window.open('/admin/detailpegawai/tambahpdd/<?= $detailPegawai['nip'] ?>/dikbangum', 'title', 'width=800, height=600')" class="uk-icon-link uk-margin-small-left text-white" uk-icon="file-edit"></a>
                        </div>
                        <table class="uk-table m-0 p-0">
                            <thead>
                                <th>Tahun Kelulusan</th>
                                <th>Pendidikan</th>
                            </thead>
                            <?php if (count($riwayatDikbangum) > 0) : ?>
                                <tbody class="tbody-rwy">
                                    <?php foreach ($riwayatDikbangum as $item) : ?>
                                        <tr>
                                            <td><?= $item['tahun_lulus'] ?></td>
                                            <td><?= $item['nama_dikbangum'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            <?php else : ?>
                            <?php endif ?>
                        </table>
                    </div>
                    <div class="col rwy-pdd-col-box pl-0 pr-0 pb-2">
                        <div class="bg-blue-soft text-white p-2">
                            DIKBANGSPES
                            <a onclick="window.open('/admin/detailpegawai/tambahpdd/<?= $detailPegawai['nip'] ?>/dikbangspes', 'title', 'width=800, height=600')" class="uk-icon-link uk-margin-small-left text-white" uk-icon="file-edit"></a>
                        </div>
                        <table class="uk-table m-0 p-0">
                            <thead>
                                <th>Tahun Kelulusan</th>
                                <th>Pendidikan</th>
                            </thead>
                            <?php if (count($riwayatDikbangspes) > 0) : ?>
                                <tbody class="tbody-rwy">
                                    <?php foreach ($riwayatDikbangspes as $item) : ?>
                                        <tr>
                                            <td><?= $item['tahun_lulus'] ?></td>
                                            <td><?= $item['nama_dikbangspes'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            <?php else : ?>
                            <?php endif ?>
                        </table>
                    </div>
                </div>

            </li>
            <!-- riwayat Pendidikan -->
        </ul>
    </div>
    <!-- Switcher riwayat table -->
    <hr class="uk-divider-icon">

    <!-- daftar anggota Keluarga -->

    <ul class="uk-subnav uk-subnav-pill" uk-switcher="connect: .keluarga-switcher">
        <li>
            <a href="#" onclick="window.open('/admin/detailpegawai/keluarga/<?= $detailPegawai['nip'] ?>', 'title', 'width=800, height=600')">
                Keluarga <img src="/asset/svg/edit-solid.svg" class="fa-icon fa-icon-white">
            </a>
        </li>
    </ul>

    <ul class="uk-switcher uk-margin keluarga-switcher">
        <li>
            <table class="uk-table m-0 p-0 table-riwayat">
                <thead>
                    <?php foreach ($colKeluarga as $name => $value) : ?>
                        <th><?= $name ?></th>
                    <?php endforeach ?>
                </thead>
                <?php if (count($dataKeluarga) > 0) : ?>
                    <tbody class="tbody-rwy">
                        <?php foreach ($dataKeluarga as $item) : ?>
                            <tr>
                                <?php foreach ($colKeluarga as $name => $value) : ?>
                                    <td><?= $item[$value] ?></td>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                <?php else : ?>
                <?php endif ?>
            </table>
        </li>
    </ul>
    <!-- daftar anggota Keluarga -->


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