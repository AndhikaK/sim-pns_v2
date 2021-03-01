<?= $this->extend('layout/admin-template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <?= $this->include('layout/alert') ?>
    <!-- filter form -->
    <form action="<?= base_url('/admin/lihat_pegawai') ?>" method="POST">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-12">
                <div class="card card-sm mb-2">
                    <div class="card-body row no-gutters align-items-center">
                        <!-- <div class="col-auto">
                            <i class="fas fa-search h4 text-body text-primary mr-2 mt-1"></i>
                        </div> -->
                        <!--end of col-->
                        <div class="col">
                            <input name="keyword" class="form-control form-control form-control-borderless" type="search" placeholder="Cari data pegawai...">
                        </div>
                        <!--end of col-->
                        <div class="col-auto">
                            <button class="btn btn-primary ml-1" type="submit">Search</button>
                        </div>
                        <!--end of col-->
                        <div class="col-auto">
                            <!-- <button class="btn btn-success ml-2" type="button">Filter</button> -->
                            <button class="btn btn-success ml-2" type="button" data-toggle="collapse" data-target="#collapse-filter" aria-expanded="false" aria-controls="collapse-filter">
                                Filter
                            </button>
                        </div>
                        <!--end of col-->

                        <div class="collapse col-12 mt-2" id="collapse-filter">
                            <div class="card card-body mb-1">
                                <h4 class="card-title">Filter Kolom</h4>
                                <hr class="">
                                <div class="d-inline">
                                    <label class="check"> <input type="checkbox" name="agama" value="Agama"> <span>Agama</span></label>
                                    <label class="check"> <input type="checkbox" name="ttl" value="Tempat Lahir"> <span>Tanggal Lahir</span> </label>
                                </div>
                            </div>

                            <div class="card card-body">
                                <h4 class="card-title">Filter Kategori</h4>
                                <hr class="">
                                <div class="row">
                                    <div class="col-3">
                                        <h4 class="card-title">Jabatan</h4>
                                        <div class="some">
                                            <?php foreach ($jabatan as $item) : ?>
                                                <label class="check">
                                                    <input type="checkbox" name="<?= "filter-nama_jabatan-" . $item['nama_jabatan'] ?>" value="<?= $item['nama_jabatan'] ?>">
                                                    <span><?= $item['nama_jabatan'] ?></span>
                                                </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <h4 class="card-title">Golongan dan Pangkat</h4>
                                        <div class="some">
                                            <?php foreach ($pangkat_golongan as $item) : ?>
                                                <label class="check">
                                                    <input type="checkbox" name="<?= "filter-s@id_golongan-" . $item['id_golongan'] ?>" value="<?= $item['id_golongan'] ?>">
                                                    <span><?= $item['pangkat'] ?></span>
                                                </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <h4 class="card-title">Satuan Kerja</h4>
                                        <div class="some">
                                            <?php foreach ($satker as $item) : ?>
                                                <label class="check">
                                                    <input type="checkbox" name="<?= "filter-nama_satker-" . $item['nama_satker'] ?>" value="<?= $item['nama_satker'] ?>">
                                                    <span><?= $item['nama_satker'] ?></span>
                                                </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <h4 class="card-title">Bagian</h4>
                                        <div class="some">
                                            <?php foreach ($bagian as $item) : ?>
                                                <label class="check">
                                                    <input type="checkbox" name="<?= "filter-nama_bagian-" . $item['nama_bagian'] ?>" value="<?= $item['nama_bagian'] ?>">
                                                    <span><?= $item['nama_bagian'] ?></span>
                                                </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <h4 class="card-title">Subbag</h4>
                                        <div class="some">
                                            <?php foreach ($subbag as $item) : ?>
                                                <label class="check">
                                                    <input type="checkbox" name="<?= "filter-nama_subbag-" . $item['nama_subbag'] ?>" value="<?= $item['nama_subbag'] ?>">
                                                    <span><?= $item['nama_subbag'] ?></span></label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- filter form -->

    <!-- table data pegawai -->


    <div class="card">
        <div class="card-body">
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col">
                    <h3 class="py-3 text-center font-bold font-up blue-text">Data PNS Polda Lampung</h3>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
            <!--Table-->
            <?php if (count($dataPegawai) > 0) : ?>

                <table class="table table-hover table-responsive mb-2">
                    <!--Table head-->
                    <thead>
                        <tr>
                            <th scope="row" class="align-top">No.</th>
                            <th class="align-top">Action</th>
                            <?php foreach ($columns as $column => $field) : ?>
                                <th class="align-top"><?= $column ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                    <tbody>

                        <?php $i = 1 ?>
                        <?php foreach ($dataPegawai as $pegawai) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></td>
                                <td>
                                    <a href="<?= base_url('/admin/detail_pegawai/' . $pegawai['nip']) ?>"><i class="fa fa-info-circle mr-1 text-primary fa-fw"></i></a>
                                    <a href="<?= base_url('/admin/delete_pegawai/' . $pegawai['nip']) ?>"><i class="fa fa-trash text-danger"></i></a>
                                </td>
                                <?php foreach ($columns as $key => $col) : ?>
                                    <td><?= strtoupper($pegawai[$col == 'p.nip' ? 'nip' : $col]) ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                    <!--Table body-->
                </table>

                <!--Bottom Table UI-->

                <div class="d-flex justify-content-center">
                    <!-- pagination -->

                    <?= $pager->makeLinks(1, $perPage, $total, 'paging') ?>

                    <!-- pagination -->

                </div>
                <!--Bottom Table UI-->
            <?php else : ?>
                <!-- Team item -->
                <div class="card mx-auto p-2 mb-4" style="width: 18rem;">
                    <i class="far fa-frown-open fa-5x text-center text-primary card-img-top"></i>

                    <p class="card-text text-center mt-2">Pencarian tidak ditemukan...</p>

                </div>

            <?php endif ?>
        </div>
    </div>
</div>

<!-- table data pegawai -->

<?= $this->endSection() ?>