<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="assets/vendor/toastr/toastr.min.css" rel="stylesheet">

    <title>PHP Dasar - Dashboard</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PHP Dasar</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tables
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tabel Siswa</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION["username"] ?></span>
                                <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Siswa</h1>
                    <p class="mb-4">Berikut adalah daftar siswa yang telah terdaftar</p>

                    <!-- Tabel Siswa -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Siswa</h6>
                            <a href="insert.php" class="btn btn-primary">Tambah Data Siswa</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="index.php" method="GET" class="row justify-content-between">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Cari berdasarkan NIS dan nama.." name="search" value="<?= @$search ?>">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-md-flex justify-content-end">
                                        <a href="index.php" class="btn btn-primary mb-3">Clear</a>
                                    </div>
                                </form>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <!-- thead dan tfoot tambahkan <th>Foto</th> setelah # -->
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Foto</th>
                                            <th>
                                                NIS
                                                <a href="index.php?sort=nis&order=asc">↑</a>
                                                <a href="index.php?sort=nis&order=desc">↓</a>
                                            </th>
                                            <th>
                                                Nama Lengkap
                                                <a href="index.php?sort=name&order=asc">↑</a>
                                                <a href="index.php?sort=name&order=desc">↓</a>
                                            </th>
                                            <th>
                                                Jenis Kelamin
                                                <a href="index.php?sort=gender&order=asc">↑</a>
                                                <a href="index.php?sort=gender&order=desc">↓</a>
                                            </th>
                                            <th>
                                                Alamat
                                                <a href="index.php?sort=address&order=asc">↑</a>
                                                <a href="index.php?sort=address&order=desc">↓</a>
                                            </th>
                                            <th>
                                                No Telepon
                                                <a href="index.php?sort=phone_number&order=asc">↑</a>
                                                <a href="index.php?sort=phone_number&order=desc">↓</a>
                                            </th>
                                            <th>
                                                Kelas
                                                <a href="index.php?sort=class&order=asc">↑</a>
                                                <a href="index.php?sort=class&order=desc">↓</a>
                                            </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Foto</th>
                                            <th>NIS</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Kelas</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if ($result->num_rows == 0) : ?>
                                            <tr>
                                                <td colspan="8" class="text-center">
                                                    <h5 class="font-weight-bold">Siswa Tidak Ditemukan!</h5>
                                                </td>
                                            </tr>
                                        <?php else : ?>
                                            <?php $i = 1; ?>
                                            <?php while ($student = $result->fetch_assoc()) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td align="center">
                                                        <?php if (strlen($student["avatar"]) > 0) : ?>
                                                            <img src="assets/img/students/<?= $student["avatar"] ?>" alt="<?= $student["name"] ?>" width="80px">
                                                        <?php else : ?>
                                                            <img src="assets/img/students/default.jpg" alt="Default Avatar" width="80px">
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= $student["nis"] ?></td>
                                                    <td><?= $student["name"] ?></td>
                                                    <td><?= ($student["gender"] == "P" ? "Perempuan" : "Laki-laki") ?></td>
                                                    <td><?= $student["address"] ?></td>
                                                    <td><?= $student["phone_number"] ?></td>
                                                    <td><?= $student["class"] ?></td>
                                                    <td>
                                                        <a href="edit.php?nis=<?= $student['nis'] ?>">Edit</a> |
                                                        <a href="delete.php?nis=<?= $student['nis'] ?>" data-delete="<?= $student['name'] ?>">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="logout.php" method="POST">
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Data Modal -->
    <div class="delete-modal modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary btn-delete">Ya</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/toastr/toastr.min.js"></script>
    <!-- <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script> -->
    <!-- <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="assets/js/demo/datatables-demo.js"></script> -->

    <script>
        $(function() {
            $('[data-delete]').on('click', function(e) {
                e.preventDefault();

                const nama = this.dataset.delete;
                const href = this.href;

                $('.delete-modal').modal('show');
                $('.delete-modal .modal-body').html(`Anda yakin ingin menghapus data <b>${nama}</b>?`);

                $('.btn-delete').off();
                $('.btn-delete').on('click', function() {
                    $.ajax({
                        'url': href,
                        'type': 'GET',
                        'success': function(result) {
                            if (result == 1) {
                                $('.delete-modal').modal('hide');
                                toastr.success('Data berhasil dihapus', 'Informasi');
                            }
                        },
                    });
                });
            });
        });
    </script>
</body>


</html>