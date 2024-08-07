<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory - Dashboard</title>
    <!-- Untuk favicon.ico -->
    <link rel="icon" href="/icon/favicon.ico" type="image/x-icon">

    <!-- Untuk favicon.png -->
    <link rel="icon" href="/icon/favicon.png" type="image/png">

    <!-- Untuk favicon.svg -->
    <link rel="icon" href="/icon/favicon.svg" type="image/svg+xml">
    <link rel="icon" href="/icon/favicon.ico" sizes="16x16 32x32 48x48" type="image/x-icon">


    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .button-container {
            display: flex;
            gap: 10px;
            /* Jarak antara tombol */
        }

        .btn-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            /* Mengatur jarak antara ikon dan teks */
            padding: 10px 15px;
            /* Mengatur padding dalam tombol */
            font-size: 14px;
            /* Mengatur ukuran font */
            text-decoration: none;
            /* Menghapus garis bawah dari link */
            border-radius: 5px;
            /* Menambahkan border-radius */
            transition: background-color 0.3s;
            /* Animasi transisi background-color */
        }

        .btn-icon .icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-icon .text {
            margin-left: 5px;
            /* Memberikan jarak antara ikon dan teks */
        }

        .btn-success {
            background-color: #28a745;
            border: 1px solid #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            border: 1px solid #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <?= $this->include('layout/left_menu') ?>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <?= $this->include('layout/top_menu') ?>

            </nav>
            <div id="content">
                <?= $this->renderSection('content') ?>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <?= $this->include('layout/footer') ?>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>/assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>/assets/js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>/assets/js/demo/datatables-demo.js"></script>

</body>

</html>