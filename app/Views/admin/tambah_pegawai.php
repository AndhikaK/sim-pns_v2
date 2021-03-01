<?= $this->extend('layout/admin-template') ?>

<?= $this->section('content') ?>

<!-- <link rel="stylesheet" href="/css/date.css"> -->



<div class="container-fluid bg-white p-5 rounded shadow-lg">
    <form action="<?= base_url('/admin/tambahpegawai/tambahdata') ?>" method="POST">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col gap-3">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" placeholder="" required autocomplete="off">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="" required autocomplete="off">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">NAMA</label>
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="" required autocomplete="off">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">ALAMAT</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="" required autocomplete="off">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tempat, Tanggal Lahir</label>
                    <div class="row">
                        <div class="col-7">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat lahir..." required autocomplete="off">
                        </div>
                        <div class="col-5">
                            <input class="form-control" type="date" value="yyyy-MM-dd" name="ttl" id="ttl">
                        </div>
                    </div>

                </div>

                <div class="mb-3">
                    <label for="exampleDataList" class="form-label">Pangkat/Golongan</label>
                    <input class="form-control" list="listPangkatOption" id="pangkat_gol" name="pangkat_gol" placeholder="Masukkan Pangkat/Golongan..." required autocomplete="off">
                    <datalist id="listPangkatOption">
                        <?php foreach ($pangkat_golongan as $row) : ?>

                            <option value="<?= $row['id_golongan'] . " - " . $row['pangkat'] ?>"> </option>

                        <?php endforeach; ?>
                    </datalist>
                </div>



            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="exampleDataList" class="form-label">Jabatan</label>
                    <input class="form-control" list="listJabatanOption" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan..." required autocomplete="off">
                    <datalist id="listJabatanOption">
                        <?php foreach ($jabatan as $row) : ?>

                            <option value="<?= $row['id_jabatan'] . " - " . $row['nama_jabatan'] ?>"> </option>

                        <?php endforeach; ?>
                    </datalist>
                </div>



                <div class="mb-3">
                    <label for="exampleDataList" class="form-label">Satuan Kerja</label>
                    <input class="form-control" list="listSatkerOption" id="id_satker" name="id_satker" placeholder="Masukkan Satuan Kerja..." required autocomplete="off">
                    <datalist id="listSatkerOption">
                        <?php foreach ($satker as $row) : ?>

                            <option value="<?= $row['id_satker'] . " - " . $row['nama_satker'] ?>"> </option>

                        <?php endforeach; ?>
                    </datalist>
                </div>

                <div class="mb-3">
                    <label for="exampleDataList" class="form-label">Bagian</label>
                    <input class="form-control" list="listBagianOption" id="id_bagian" name="id_bagian" placeholder="Masukkan Bagian..." required autocomplete="off">
                    <datalist id="listBagianOption">
                        <?php foreach ($bagian as $row) : ?>

                            <option value="<?= $row['id_bagian'] . " - " . $row['nama_bagian'] ?>"> </option>

                        <?php endforeach; ?>
                    </datalist>
                </div>

                <div class="mb-3">
                    <label for="exampleDataList" class="form-label">Bagian</label>
                    <input class="form-control" list="listSubbagOption" id="id_subbag" name="id_subbag" placeholder="Masukkan Subbag..." required autocomplete="off">
                    <datalist id="listSubbagOption">
                        <?php foreach ($subbag as $row) : ?>

                            <option value="<?= $row['id_subbag'] . " - " . $row['nama_subbag'] ?>"> </option>

                        <?php endforeach; ?>
                    </datalist>
                </div>

                <div class="mb-3">
                    <label for="exampleDataList" class="form-label">JENIS KELAMIN</label>
                    <input class="form-control" list="listGenderOption" id="jenis_kelamin" name="jenis_kelamin" placeholder="Masukkan Gender..." required autocomplete="off">
                    <datalist id="listGenderOption">
                        <option value="LAKI-LAKI"></option>
                        <option value="PEREMPUAN"></option>
                    </datalist>
                </div>

                <div class="mb-3">
                    <label for="exampleDataList" class="form-label">AGAMA</label>
                    <input class="form-control" list="listAgamaOption" id="agama" name="agama" placeholder="Masukkan Agama..." required autocomplete="off">
                    <datalist id="listAgamaOption">
                        <option value="ISLAM"></option>
                        <option value="PROTESTAN"></option>
                        <option value="KATOLIK"></option>
                        <option value="HINDU"></option>
                        <option value="BUDHA"></option>
                        <option value="KONG HU CHU"></option>
                    </datalist>
                </div>



            </div>
        </div>
        <button class="btn btn-primary" type="submit">TAMBAH DATA</button>
    </form>
</div>


<?= $this->endSection(); ?>