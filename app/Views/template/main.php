<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title><?= $this->renderSection('title') ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/abude_logo.png">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <?= $this->renderSection('css') ?>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img src="<?= base_url() ?>assets/images/abude_logo.png" width="75" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger is-active">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>
                        <ul class="navbar-nav header-right main-notification">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="<?= base_url() ?>assets/#" role="button" data-toggle="dropdown">
                                    <img src="<?= base_url() ?>assets/images/avatar/1.png" width="20" alt="">
                                    <div class="header-info">
                                        <span class="fw-semibold d-block"><?= session('username') ?></span>
                                        <small class="text-muted"><?= session('role') ?></small>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="<?= base_url('Auth/logout') ?>" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Keluar </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="sub-header">
                    <div class="d-flex align-items-center flex-wrap mr-auto">
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                <?php if (session('role') == 'SuperAdmin') : ?>
                    <li class="nav-label first">Main Menu</li>
                    <li><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                            <i class="flaticon-144-layout"></i>
                            <span class="nav-text">Data Master</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('Dashboard')?>">Dashboard</a></li>
                            <li><a href="<?= base_url('Barang')?>">List Barang</a></li>
                            <li><a href="<?= base_url('Cabang')?>">List Cabang</a></li>
                            <li><a href="<?= base_url('Perusahaan')?>">List Perusahaan</a></li>
                            <li><a href="<?= base_url('User') ?>">User</a></li>
                            <li><a href="<?= base_url('Supplier')?>">Supplier</a></li>
                            <li><a href="<?= base_url('Perihal')?>">Perihal</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                            <i class="flaticon-381-network"></i>
                            <span class="nav-text">Laporan Aktivitas</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('Transaksi') ?>">Transaksi</a></li>
                            <li><a href="<?= base_url('Pengeluaran') ?>">Pengeluaran</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if (session('role') == 'Owner') : ?>
                        <li><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                            <i class="flaticon-144-layout"></i>
                            <span class="nav-text">Data Master</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('Dashboard')?>">Dashboard</a></li>
                            <li><a href="<?= base_url('Barang')?>">List Barang</a></li>
                            <li><a href="<?= base_url('Cabang')?>">List Cabang</a></li>
                            <li><a href="<?= base_url('User') ?>">User</a></li>
                            <li><a href="<?= base_url('Supplier')?>">Supplier</a></li>
                            <li><a href="<?= base_url('Perihal')?>">Perihal</a></li>
                        </ul>
                        </li>
                        <li><a class="has-arrow ai-icon" href="<?= base_url() ?>assets/javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-network"></i>
                            <span class="nav-text">Laporan Aktivitas</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('Transaksi') ?>">Transaksi</a></li>
                            <li><a href="<?= base_url('Pengeluaran') ?>">Pengeluaran</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if (session('role') == 'Admin Cabang') : ?>
                        <li><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                            <i class="flaticon-144-layout"></i>
                            <span class="nav-text">Data Master</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('Dashboard')?>">Dashboard</a></li>
                            <li><a href="<?= base_url('Barang')?>">List Barang</a></li>
                            <!-- <li><a href="<?= base_url('User') ?>">User</a></li> -->
                            <li><a href="<?= base_url('Supplier')?>">Supplier</a></li>
                            <li><a href="<?= base_url('Perihal')?>">Perihal</a></li>
                        </ul>
                        </li>
                        <li><a class="has-arrow ai-icon" href="<?= base_url() ?>assets/javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-network"></i>
                            <span class="nav-text">Laporan Aktivitas</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('Transaksi') ?>">Transaksi</a></li>
                            <li><a href="<?= base_url('Pengeluaran') ?>">Pengeluaran</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->

        <?= $this->renderSection('content') ?>

        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="">Tarkiz</a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script data-cfasync="false" src="<?= base_url() ?>assets/../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/global/global.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.bundle.min.js"></script>

    <!-- Chart piety plugin files -->
    <script src="<?= base_url() ?>assets/vendor/peity/jquery.peity.min.js"></script>

    <!-- Dashboard 1 -->
    <script src="<?= base_url() ?>assets/js/dashboard/dashboard-1.js"></script>
    <script src="<?= base_url() ?>assets/vendor/owl-carousel/owl.carousel.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.min.js"></script>
    <script src="<?= base_url() ?>assets/js/deznav-init.js"></script>
    <?= $this->renderSection('script') ?>
</body>

</html>