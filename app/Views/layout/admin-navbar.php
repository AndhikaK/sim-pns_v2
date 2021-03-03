<!-- Vertical navbar -->
<div class="vertical-nav bg-white active" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
        <div class="d-flex align-items-center"><img src="/sdm-polri.png" alt="..." width="65" class="mr-3  img-thumbnail shadow-sm">
            <div class="media-body">
                <h3 class="m-0">SIM-PNS</h3>
                <p class="font-weight-light text-muted mb-0">Polda Lampung</p>
            </div>
        </div>
    </div>

    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Menu</p>

    <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
            <a href="<?= base_url('admin') ?>" class="nav-link text-dark font-italic <?= $navItem == 1 ? 'bg-primary' : 'bg-white' ?>">
                <i class="fa fa-th-large mr-3 fa-fw <?= $navItem == 1 ? 'text-white' : 'text-primary' ?>"></i>
                <span class="<?= $navItem == 1 ? 'text-white' : '' ?>">Beranda </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('/admin/lihat_pegawai') ?>" class="nav-link text-dark font-italic <?= $navItem == 2 ? 'bg-primary' : 'bg-white' ?>">
                <i class="fa fa-address-card mr-3 fa-fw <?= $navItem == 2 ? 'text-white' : 'text-primary' ?>"></i>
                <span class="<?= $navItem == 2 ? 'text-white' : '' ?>">Lihat Data Pegawai </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('/admin/tambah_pegawai') ?>" class="nav-link text-dark font-italic <?= $navItem == 3 ? 'bg-primary' : 'bg-white' ?>">
                <i class="fa fa-cubes mr-3 fa-fw <?= $navItem == 3 ? 'text-white' : 'text-primary' ?>"></i>
                <span class="<?= $navItem == 3 ? 'text-white' : '' ?>">Tambah Pegawai Baru </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('/admin/data_master/jabatan') ?>" class="nav-link text-dark font-italic <?= $navItem == 4 ? 'bg-primary' : 'bg-white' ?>">
                <i class="fa fa-picture-o mr-3 fa-fw <?= $navItem == 4 ? 'text-white' : 'text-primary' ?>"></i>
                <span class="<?= $navItem == 4 ? 'text-white' : '' ?>">Master Data </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('/login/logout') ?>" class="nav-link text-dark font-italic <?= $navItem == 10 ? 'bg-primary' : 'bg-white' ?>">
                <i class="fas fa-sign-out-alt mr-3 fa-fw <?= $navItem == 10 ? 'text-white' : 'text-primary' ?>"></i>
                <span class="<?= $navItem == 10 ? 'text-white' : '' ?>">Logout </span>
            </a>

        </li>
    </ul>

</div>
<!-- End vertical navbar -->