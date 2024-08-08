<?php session_start(); require_once 'database/config.php';

// Jika belum login akan di arahkan ke form login 
if ( !isset( $_SESSION['login'] ) ) { header('location: login.php'); }

    // jika customer tidak bisa masuk
    if ( $_SESSION['role'] == 'Admin' ) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data User | Edu Wisata Perlebahan Gunung Guntur</title>

    <!-- Icon -->
    <link rel="icon" href="img/favicon.png" type="image/png">
    <!-- style / bootstrap -->
    <?php include_once 'template/header.php' ?>

</head>
<body class="bg-light">
    
    <!-- Nav -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid justify-content-between mx-5">
            <a href="index.php" class="navbar-brand">
                <div class="brand-text-logo">
                    <img src="img/logo.png" height="28" alt="CoolBrand">
                    <label class="brand-text">
                        <span>EDU WISATA</span>
                        <span>Perlebahan Gunung Guntur</span>
                    </label>
                </div>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="gallery.php" class="nav-item nav-link">Gallery</a>
                    <a href="price-list.php" class="nav-item nav-link">Price List</a>
                    <a href="booking.php" class="nav-item nav-link">Booking</a>
                    <a href="about-us.php" class="nav-item nav-link">About Us</a>
                    <!-- <a href="#contact" class="nav-item nav-link">Contact</a> -->
                </div>
                <div class="navbar-nav ms-auto">
                    <?php if ( isset($_SESSION['login']) == true ) { ?>
                    <li class="nav-item dropdown prof">
                        <a class="nav-link prof-box" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user users bg-dark text-white"></i>
                            <div class="profile">
                                <span class="profile-text profile-text-1"><?php echo $_SESSION['username']; ?></span>
                                <span class="profile-text profile-text-2"><?php echo $_SESSION['email']; ?></span>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><h6 class="dropdown-header text-dark fw-bold fs-6"><?php echo $_SESSION['role']; ?></h6></li>
                            <li><hr class="dropdown-divider"></li>
                            <?php if ( $_SESSION['role'] == "Admin" ) { ?>
                                <li><a href="booking-list.php" class="dropdown-item">Booking List</a></li>
                                <li><a href="data-user.php" class="dropdown-item nav-active">Data User</a></li>
                                <li><a href="data-cabin.php" class="dropdown-item">Data Cabin</a></li>
                                <li><a href="data-customer.php" class="dropdown-item">Data Customer</a></li>
                                <li><a href="change-password.php" class="dropdown-item">Change Password</a></li>
                            <?php } else if ( $_SESSION['role'] == "Kasir" ) { ?>
                                <li><a href="booking-list.php" class="dropdown-item nav-active">Booking List</a></li>
                                <li><a href="data-customer.php" class="dropdown-item">Data Customer</a></li>
                                <li><a href="change-password.php" class="dropdown-item">Change Password</a></li>
                            <?php } else if ( $_SESSION['role'] == "Customer" ) { ?>
                                <li><a class="dropdown-item" href="informasi-akun.php">Informasi Akun</a></li>
                                <li><a class="dropdown-item" href="history-booking.php">History Booking</a></li>
                                <li><a class="dropdown-item" href="change-password.php">Change Password</a></li>
                            <?php } ?>
                            <li><hr class="dropdown-divider"></li>
                            <li><a href="logout.php" class="dropdown-item text-danger">Logout</a></li>
                        </ul>
                    </li>
                    <?php } else { ?>
                    <a href="login.php" class="btn btn-edu-outline m-1">Login</a>
                    <a href="register.php" class="btn btn-edu m-1">Register</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Nav -->

    <!-- Jumbotron / Banner -->
    <div class="jumbotron-home">
        <div class="py-1 px-5 mb-4 cover">
            <div class="container-fluid group-sign-home py-5 mx-4">
                <!-- <img src="img/main_device_image.png" height="120" alt="Edu Wisata"> -->
                <label class="EduColor title-home">
                    <span class="main-title-home">Data User</span>
                    <p class="label text-light fs-5">Halo <strong><?= $_SESSION['username'] ?></strong></p>   
                </label>
            </div>
        </div>
    </div>

    <!-- notification -->
    <?php if ( isset($_SESSION['succ']) ) { ?>
    <div class="cus-toast active">
        <div class="toast-content">
            <i class="fa-solid fa-check check"></i>
            <div class="message">
                <span class="text text-1">Sukses</span>
                <span class="text text-2"><?php echo $_SESSION['succ']; unset($_SESSION['succ']) ?></span>
            </div>
            <div class="progress-bar active"></div>
        </div>
    </div>
    <?php } ?>
    <?php if ( isset($_SESSION['err']) ) { ?>
    <div class="cus-toast active">
        <div class="toast-content">
            <i class="fa-solid fa-xmark check"></i>
            <div class="message">
                <span class="text text-1">Error</span>
                <span class="text text-2"><?php echo $_SESSION['err']; unset($_SESSION['err']) ?></span>
            </div>
            <div class="progress-bar active"></div>
        </div>
    </div>
    <?php } ?>

    <div class="py-3 px-5">

    
        <div class="text-dark">
            <h3 class="text-dark fw-bold text-center mb-5">Data User</h3>
            <table class="table display nowrap" id="dataTable">
                <thead class="table-edu">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col" data-priority="1">#</th>
                        <th scope="col" class="d-none">id</th> <!-- Hidden -->
                        <th scope="col">username</th>
                        <th scope="col" class="d-none">val stat</th> <!-- Hidden -->
                        <th scope="col" width="50px">role</th>
                        <th scope="col">email</th>
                        <th scope="col" width="50px" data-priority="2">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                $select = $koneksi->query("SELECT * FROM user ORDER BY id_user DESC");
                $data = $select->fetch_all(MYSQLI_ASSOC);

                if ( count($data) > 0 ) {
                    for ( $i = 0; $i < count($data); $i++ ) {
                ?>
                    <tr>
                        <th><?php $id = $data[$i]['id_user'] ?></th>
                        <th scope="row"><?= $i+1 ?></th>
                        <td class="d-none"><?= $id ?></td> <!-- Hidden -->
                        <td><?= $data[$i]['user_name'] ?></td>
                        <td class="d-none"><?= $data[$i]['stat_user'] ?></td> <!-- Hidden -->
                        <td class="text-center">
                            <span class="<?php if ( $data[$i]['stat_user'] == '0' ) { echo "badge bg-primary"; } else if ( $data[$i]['stat_user'] == '1' ) { echo "badge bg-warning"; } else if ( $data[$i]['stat_user'] == '2' ) { echo "badge bg-success"; } ?>"><?php if ( $data[$i]['stat_user'] == '0' ) { echo "Admin"; } else if ( $data[$i]['stat_user'] == '1' ) { echo "Kasir"; } else if ( $data[$i]['stat_user'] == '2' ) { echo "Customer"; } ?></span>
                        </td>
                        <td><?= $data[$i]['email'] ?></td>
                        <td class="text-center">
                            <button
                             class="btn btn-edu editUser"
                             style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button
                             class="btn btn-danger deleteUser"
                             style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php
                    }
                }
                ?>

                </tbody>
            </table>
    
        </div>

    </div>

    <script>

        // edit
        $(document).ready(function () {

            $('.editUser').on('click', function () {

                $('#editUserModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#editID').val(data[0]);
                $('#editUsername').val(data[1]);
                if (data[2] == '0') {
                    $('#editAdmin').prop('checked', true);
                }
                if ( data[2] == '1') {
                    $('#editKasir').prop('checked', true);
                }
                if ( data[2] == '2') {
                    $('#editCustomer').prop('checked', true);
                }
                $('#editEmail').val(data[4]);
            }); 
        });

        // delete
        $(document).ready(function () {

            $('.deleteUser').on('click', function () {

                $('#deleteUserModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#deleteUserID').val(data[0]);
                $('#deleteUsername').val(data[1]);
                if (data[2] == '0') {
                    $('#deleteAdmin').prop('checked', true);
                }
                if ( data[2] == '1') {
                    $('#deleteKasir').prop('checked', true);
                }
                if ( data[2] == '2') {
                    $('#deleteCustomer').prop('checked', true);
                }
                $('#deleteEmail').val(data[4]);
            });
        });

    </script>

    <!-- Modal -->
    <?php include_once 'template/modal.php' ?>

    <!-- script -->
    <?php include_once 'template/footer.php' ?>
</body>
</html>
<?php
    } else {
        $_SERVER['NotifErr'] = "Tidak Ada Izin untuk Mengakses Halaman !";
        header('location: index.php');
    }
?>