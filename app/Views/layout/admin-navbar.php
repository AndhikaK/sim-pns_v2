<!-- Vertical navbar -->
<div class="vertical-nav bg-white active" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
        <div class="media d-flex align-items-center"><img src="sdm-polri.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
            <div class="media-body">
                <h3 class="m-0">SIM-PNS</h3>
                <p class="font-weight-light text-muted mb-0">Polda Lampung</p>
            </div>
        </div>
    </div>

    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>

    <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
            <a href="<?= base_url('admin') ?>" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                Beranda
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('/admin/lihat_pegawai') ?>" class="nav-link text-dark font-italic">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                Lihat Data Pegawai
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Services
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark font-italic">
                <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
                Gallery
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('/login/logout') ?>" class="nav-link text-dark font-italic">
                <!-- <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i> -->
                <i class="fas fa-sign-out-alt mr-3 text-primary fa-fw"></i>
                Logout
            </a>

        </li>
    </ul>

</div>
<!-- End vertical navbar -->