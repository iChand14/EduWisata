<?php session_start(); require_once 'database/config.php';

// Jika belum login akan di arahkan ke form login 
if ( !isset( $_SESSION['login'] ) ) { header('location: login.php'); }

    // jika customer tidak bisa masuk
    if ( $_SESSION['role'] == 'Kasir' || $_SESSION['role'] == 'Admin' ) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booking List | Edu Wisata Perlebahan Gunung Guntur</title>

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
                                <li><a href="booking-list.php" class="dropdown-item nav-active">Booking List</a></li>
                                <li><a href="data-user.php" class="dropdown-item">Data User</a></li>
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
                    <span class="main-title-home">Booking List</span>
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
            <h3 class="text-dark fw-bold text-center mb-5">Booking List</h3>
            <table class="table display nowrap" id="dataTable">
                <thead class="table-edu">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col" data-priority="1">#</th>
                        <th scope="col" class="d-none">id</th> <!-- Hidden -->
                        <th scope="col">Nama Depan</th>
                        <th scope="col">Nama Belakang</th>
                        <th scope="col">JK</th>
                        <th scope="col">Bayar</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Check-In</th>
                        <th scope="col">Check-Out</th>
                        <th scope="col">No. Cabin</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Email</th>
                        <th scope="col">No. Telp</th>
                        <th scope="col">Dewasa</th>
                        <th scope="col">Anak-Anak</th>
                        <th scope="col" data-priority="2">Action</th>
                        <th scope="col" class="d-none">byar</th> <!-- Hidden -->
                        <th scope="col" class="d-none">stat</th> <!-- Hidden -->
                    </tr>
                </thead>
                <tbody>

                <?php

                $select = $koneksi->query("SELECT * FROM booking INNER JOIN user ON booking.id_user = user.id_user INNER JOIN customer ON booking.id_customer = customer.id_customer INNER JOIN cabin ON booking.id_cabin = cabin.id_cabin ORDER BY booking.id_booking DESC ");
                $data = $select->fetch_all(MYSQLI_ASSOC);

                if ( count($data) > 0 ) {
                    for ( $i = 0; $i < count($data); $i++ ) {
                ?>
                    <tr>
                        <th><?php $id = $data[$i]['id_booking'] ?></th>
                        <th scope="row"><?= $i+1 ?></th>
                        <td class="d-none"><?= $data[$i]['id_booking'] ?></td> <!-- Hidden -->
                        <td><?= $data[$i]['nama_depan_customer'] ?></td>
                        <td><?= $data[$i]['nama_belakang_customer'] ?></td>
                        <td><?= $data[$i]['jk'] ?></td>
                        <td><span class="<?php if ($data[$i]['bayar'] == '1') { echo "badge text-bg-success"; } else { echo "badge text-bg-danger"; } ?>"><?php if ($data[$i]['bayar'] == '1') { echo "Sudah dibayar"; } else { echo "Belum dibayar"; } ?></span></td>
                        <td><?= $data[$i]['total_harga'] ?></td>
                        <td><span class="<?php if ($data[$i]['stat_booking'] == '2') { echo "badge bg-success"; } else if ($data[$i]['stat_booking'] == '1') { echo "badge bg-secondary"; } else { echo "badge bg-primary"; } ?>"><?php if ($data[$i]['stat_booking'] == '2') { echo "Selesai"; } else if ($data[$i]['stat_booking'] == '1') { echo "Ditempati"; } else { echo "Booked"; } ?></span></td>
                        <td><?= $data[$i]['check_in'] ?></td>
                        <td><?= $data[$i]['check_out'] ?></td>
                        <td><?= $data[$i]['no_cabin'] ?></td>
                        <td><?= $data[$i]['harga_cabin']." / Hari" ?></td>
                        <td><?= $data[$i]['email_booking'] ?></td>
                        <td><?= $data[$i]['tlp_booking'] ?></td>
                        <td><?= $data[$i]['orang_dewasa'] ?></td>
                        <td><?= $data[$i]['anak_anak'] ?></td>
                        <td class="text-center">
                            <?php 
                            if ($data[$i]['bayar'] == '1' && $data[$i]['stat_booking'] == '0') {
                            ?>
                            <button
                             class="btn btn-danger btnBatal" 
                             style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" >
                                <i class="fa-solid fa-square-xmark"></i>
                            </button> 
                            <?php
                            } else if ($data[$i]['bayar'] == '0' && $data[$i]['stat_booking'] == '0') {
                            ?>
                            <button
                             class="btn btn-success btnBayar" 
                             style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" >
                                <i class="fa-solid fa-square-check"></i>
                            </button> 
                            <?php
                            }
                            ?>
                            <?php if ($data[$i]['stat_booking'] == '1' && $data[$i]['bayar'] == '1') {
                            ?>
                            <button
                             class="btn btn-secondary btnCheckOut" 
                             style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" >
                                <i class="fa-solid fa-users-slash"></i>
                            </button>
                            <?php
                            } else if ($data[$i]['stat_booking'] == '0' && $data[$i]['bayar'] == '1') {
                            ?>
                            <button
                             class="btn btn-primary btnCheckIn" 
                             style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" >
                                <i class="fa-solid fa-users"></i>
                            </button>
                            <?php
                            }
                            if ( $_SESSION['role'] == 'Admin' ) {
                            ?>
                            <button
                             class="btn btn-danger btnDelete" 
                             style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <?php
                            }
                            if ( ($data[$i]['bayar'] == '0' || $data[$i]['bayar'] == '1') && ($data[$i]['stat_booking'] == '0' || $data[$i]['stat_booking'] == '1' || $data[$i]['stat_booking'] == '2') ) {
                            ?>
                            <button
                             class="btn btn-edu btnEdit" 
                             style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <?php
                            }
                            ?>
                        </td>
                        <td class="d-none"><?= $data[$i]['bayar'] ?></td>
                        <td class="d-none"><?= $data[$i]['stat_booking'] ?></td>
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

        $(document).ready(function () {

            $('.btnBatal').on('click', function () {

                $('#batalBookingModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#batalID').val(data[0]);
            });
        });

        $(document).ready(function () {

            $('.btnBayar').on('click', function () {

                $('#bayarBookingModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#bayarID').val(data[0]);
                $('#nDepanBayar').val(data[1]);
                $('#nBelakangBayar').val(data[2]);
                $('#emailCusBayar').val(data[11]);
                $('#tlpCusBayar').val(data[12]);
                $('#noCabinBayar').val(data[9]);
                $('#cInBayar').val(data[7]);
                $('#cOutBayar').val(data[8]);
            });
        });

        $(document).ready(function () {

            $('.btnCheckOut').on('click', function () {

                $('#cOutBookingModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#cOutID').val(data[0]);
            });
        });

        $(document).ready(function () {

            $('.btnCheckIn').on('click', function () {

                $('#cInBookingModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#cInID').val(data[0]);
                $('#nDepanIn').val(data[1]);
                $('#nBelakangIn').val(data[2]);
                $('#emailCusIn').val(data[11]);
                $('#tlpCusIn').val(data[12]);
                $('#noCabinIn').val(data[9]);
                $('#cInIn').val(data[7]);
                $('#cOutIn').val(data[8]);
            });
        });

        $(document).ready(function () {

            $('.btnDelete').on('click', function () {

                $('#deleteBookingModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#deleteBookingID').val(data[0]);
                $('#nDepanDelete').val(data[1]);
                $('#nBelakangDelete').val(data[2]);
                $('#noCabinDelete').val(data[9]);
                $('#cInDelete').val(data[7]);
                $('#cOutDelete').val(data[8]);
            });
        });

        $(document).ready(function () {

            $('.btnEdit').on('click', function () {

                $('#editBookingModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#editBookingID').val(data[0]);
                $('#nDepanEdit').val(data[1]);
                $('#nBelakangEdit').val(data[2]);
                $('#noCabinEdit').val(data[9]);
                $('#cInEdit').val(data[7]);
                $('#cOutEdit').val(data[8]);
                if ( data[16] == '1' ) {
                    $('#editBayar').prop('checked', true);
                } else if ( data[16] == '0' ) {
                    $('#editBelum').prop('checked', true);
                }
                if ( data[17] == '2' ) {
                    $('input[name=stat_booking]').prop('disabled', true);
                    $('#editSelesai').prop('checked', true);
                } else if ( data[17] == '1' ) {
                    $('input[name=stat_booking]').prop('disabled', false);
                    $('#editSelesai').prop('disabled', true);
                    $('#editTempati').prop('checked', true);
                } else if ( data[17] == '0') {
                    $('input[name=stat_booking]').prop('disabled', false);
                    $('#editSelesai').prop('disabled', true);
                    $('#editBooked').prop('checked', true);
                }
            });
        });

    </script>

    <!-- Modal -->
    <?php require_once 'template/modal.php' ?>

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