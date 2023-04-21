<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Simple Starter Project CodeIgniter 4" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <!-- Theme style -->
    <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet" />
    <!-- Bootstrap 4-->
    <link href="<?= base_url(); ?>/css/bootstrap4.min.css" rel="stylesheet" />
    <!-- Select2 -->
    <link href="<?= base_url(); ?>/css/select2.min.css" rel="stylesheet" />
    <!-- Toastr -->
    <link href="<?= base_url(); ?>/css/toastr.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <script src="<?= base_url(); ?>/js/fontawesome-5.all.min.js"></script>
    <!-- jQuery -->
    <script src="<?= base_url(); ?>/js/jquery-3.5.1.min.js"></script>
    <!-- jQuery -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="<?= base_url(); ?>/css/adminlte.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/css/daterangepicker.css" rel="stylesheet" />

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url('dashboard'); ?>">CodeIgniter 4</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#profileModal" data-toggle="modal" data-target="#profileModal">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- Include sidebar -->
    <?= $this->include('layout/sidebar'); ?>

    <!-- Render section content -->
    <?= $this->renderSection('content'); ?>

    <!-- Footer -->
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
    </div>
    </div>
    <!-- Jquery Ui -->
    <script src="<?= base_url(); ?>/js/jquery-1.13.2-ui.js"></script>
    <!-- Bootstrap 4-->
    <script src="<?= base_url(); ?>/js/bootstrap-4.5.0.bundle.min.js" ></script>
    <!-- Custom -->
    <script src="<?= base_url(); ?>/js/scripts.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url(); ?>/js/select2.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url(); ?>/js/sweetalert2.js"></script>
    <!-- ChartJs -->
    <!-- <script src="<?= base_url(); ?>/js/Chart-2.8.0.min.js" ></script> -->
    <script src="<?= base_url(); ?>/js/chart-v2.9.4.js" ></script>
    <!-- Toastr -->
    <script src="<?= base_url(); ?>/js/toastr.min.js" ></script>
    <!-- DataTables -->
    <script src="<?= base_url(); ?>/js/datatables/jquery.dataTables.min.js" ></script>
    <script src="<?= base_url(); ?>/js/datatables/dataTables.bootstrap4.min.js" ></script>
    <!-- Demo -->
    <script src="<?= base_url(); ?>/assets/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>/assets/demo/chart-bar-demo.js"></script>
    <script src="<?= base_url(); ?>/assets/demo/datatables-demo.js"></script>
    <script src="<?= base_url(); ?>/assets/dashboard/custom.js"></script>
    <script src="<?= base_url(); ?>/js/moment.min.js"></script>
    <script src="<?= base_url(); ?>/js/daterangepicker.js"></script>

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> Logout Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure..?, Please click the 'logout button'...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('/logout'); ?>" class="btn btn-primary btn-sm">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Profile -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i> Your Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Email : <?= user()->email; ?> <br>
                    Username : <?= user()->username; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>