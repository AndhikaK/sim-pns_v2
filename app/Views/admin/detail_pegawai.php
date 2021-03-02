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