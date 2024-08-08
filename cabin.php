<?php

session_start(); 
require_once 'database/config.php'; 

// Jika belum login akan di arahkan ke form login 
if ( !isset( $_SESSION['login'] ) ) { header('location: login.php'); }

// Jika Sudah Memilih Waktu Check In & Out
if ( isset($_GET['Check_In']) && isset($_GET['Check_Out']) ) {
    $checkIn = $_GET['Check_In'];
    $checkOut = $_GET['Check_Out'];
} else {
    $checkIn = "";
    $checkOut = "";
}

if ( $_SESSION['role'] == 'Customer' ) {
    if ( $_GET['id_cabin'] ) {

        $jika = $koneksi->query("SELECT * FROM customer WHERE id_user = ".$_SESSION['id_user']." AND id_cabin IS NULL");
        $customer = $jika->fetch_all(MYSQLI_ASSOC);

        if (count($customer) > 0) {

            $qry = $koneksi->query("SELECT * FROM cabin WHERE id_cabin = " . $_GET['id_cabin'] );

            while ( $data = $qry->fetch_all(MYSQLI_ASSOC) ) {

                $cek = $koneksi->query("SELECT * FROM customer INNER JOIN user ON customer.id_user = user.id_user WHERE customer.id_user = ".$_SESSION['id_user'] );
                while ( $cus = $cek->fetch_all(MYSQLI_ASSOC) ) {
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cabin No <?= $data[0]['no_cabin'] ?> | Edu Wisata Perlebahan Gunung Guntur</title>

    <!-- Icon -->
    <link rel="icon" href="img/favicon.png" type="image/png">
    <!-- style / bootstrap -->
    <?php include_once 'template/header.php' ?>

</head>
<body class="bg-light">
    
    <!-- Nav -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid mx-5">
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
                    <a href="#contact" class="nav-item nav-link">Contact</a>
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
                                <li><a href="data-user.php" class="dropdown-item">Data User</a></li>
                                <li><a href="data-cabin.php" class="dropdown-item">Data Cabin</a></li>
                                <li><a href="data-customer.php" class="dropdown-item">Data Customer</a></li>
                                <li><a href="change-password.php" class="dropdown-item">Change Password</a></li>
                            <?php } else if ( $_SESSION['role'] == "Kasir" ) { ?>
                                <li><a href="booking-list.php" class="dropdown-item">Booking List</a></li>
                                <li><a href="data-customer.php" class="dropdown-item">Data Customer</a></li>
                                <li><a href="data-cabin.php" class="dropdown-item">Data Cabin</a></li>
                                <li><a href="change-password.php" class="dropdown-item">Change Password</a></li>
                            <?php } else if ( $_SESSION['role'] == "Customer" ) { ?>
                                <li><a href="informasi-akun.php" class="dropdown-item">Informasi Akun</a></li>
                                <li><a href="history-booking.php" class="dropdown-item">History Booking</a></li>
                                <li><a href="change-password.php" class="dropdown-item">Change Password</a></li>
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
    <div class="jumbotron">
        <div class="p-5 mb-4 cover">
            <div class="container-fluid group-sign py-5">
                <label class="EduColor title">
                    <span class="main-title">Form</span>
                    <span class="sub-title text-light">Booking</span>   
                </label>
            </div>
        </div>
    </div>
    <!-- End Jumbotron / Banner -->

    <!-- Form Booking Cabin -->
    <div class="form-booking px-3">

        <!-- Cabin -->
        <div class="px-5 p-5 text-center rounded-2 bg-light shadow box-booking">
            <h3 class="text-dark mb-5"><strong>SILAHKAN ISI FORM BOOKING</strong></h2>

            <form method="POST" action="fungsi.php" enctype="multipart/form-data" autocomplete="off">

            <input name="request" value="booking" hidden>

            <!-- Data Cabin -->
            <input name="noC" value="<?= $data[0]['no_cabin'] ?>" hidden>
            <input name="idC" value="<?= $data[0]['id_cabin'] ?>" hidden>

            <div class="row g-5">
                <div class="col-lg-6">
                    <img class="border rounded mb-4" src="img/cabin1.jpeg" height="425" alt="Cabin" />
                    <h3 class="text-dark">Cabin no <strong class="EduColor"><?= $data[0]['no_cabin'] ?></strong></h3>
                </div>

                <!-- Form Isi -->
                <div class="col-lg-6 text-start text-dark">
                    <?php if ( isset($_SESSION['bNot']) ) { ?>
                        <div class="col-lg-12">
                            <div class="alert alert-danger align-items-center mb-3" role="alert" id="notReg">
                                <div>
                                    <i class="fa-solid fa-triangle-exclamation"></i> 
                                    <?php echo $_SESSION['bNot']; unset($_SESSION['bNot']); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row g-2 mb-2">
                        <div class="col-sm-6">
                            <label class="mb-1 mx-2" for="namaDepan"><strong>Nama Depan</strong></label>
                            <div class="input-group">
                                <input name="nDepan" type="text" class="form-control mb-3" id="namaDepan" value="<?= $cus[0]['nama_depan_customer'] ?>" <?php if ($cus[0]['nama_depan_customer']) { echo "readonly"; } ?> >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="mb-1 mx-2" for="namaBelakang"><strong>Nama Belakan</strong></label>
                            <div class="input-group">
                                <input name="nBelakang" type="text" class="form-control mb-3" id="namaBelakang" value="<?= $cus[0]['nama_belakang_customer'] ?>" <?php if ($cus[0]['nama_belakang_customer']) { echo "readonly"; } ?>>
                            </div>
                        </div>
                    </div>
                    <label class="mb-1 mx-2" for="Email"><strong>Email</strong></label>
                    <div class="input-group mb-2">
                        <input name="email" type="text" class="form-control mb-3" id="Email" value="<?= $_SESSION['email'] ?>" <?php if (isset($_SESSION['email'])) { echo "Readonly"; } ?>>
                    </div>
                    <div class="row g-2 mb-2">
                        <div class="col-sm-6 checkin">
                            <label class="mb-1 mx-2" for="checkIn"><strong>Check In</strong></label>
                            <div class="input-group">
                                <input name="cIn" type="date" class="form-control mb-3" id="checkIn" value="<?= $checkIn ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="mb-1 mx-2" for="checkOut"><strong>Check Out</strong></label>
                            <div class="input-group checkout">
                                <input name="cOut" type="date" class="form-control mb-3" id="checkOut" value="<?= $checkOut ?>">
                            </div>
                        </div>
                    </div>
                    <label class="mb-1 mx-2" for="noTelp"><strong>No. Telp</strong></label>
                    <div class="input-group mb-2">
                        <input name="tlp" type="text" class="form-control mb-3" id="noTelp" value="<?= substr($cus[0]['no_telp'], 1) ?>" <?php if ($cus[0]['no_telp']) { echo "readonly"; } ?>>
                    </div>
                    <div class="row g-2 mb-2">
                        <di class="col-sm-6">
                            <label class="mb-1 mx-2" for="orangDewasa"><strong>Banyak Orang Dewasa</strong></label>
                            <div class="input-group mb-2">
                                <input name="jDewasa" type="number" class="form-control mb-3" id="orangDewasa">
                            </div>
                        </di>
                        <di class="col-sm-6">
                            <label class="mb-1 mx-2" for="anakAnak"><strong>Banyak Anak - Anak</strong></label>
                            <div class="input-group mb-2">
                                <input name="jAnak" type="number" class="form-control mb-3" id="anakAnak">
                            </div>
                        </di>
                    </div>
                    <button class="btn btn-edu w-100 fs-5">Book Sekarang</button>
                </div>
                <!-- End Form Isi -->

            </div>

            </form>

        </div>
        <!-- End Cabin -->

    </div>
    <!-- End Form Booking Cabin -->

    <!-- contact -->
    <?php include_once 'template/contact.php' ?>
    
    <!-- script -->
    <?php include_once 'template/footer.php' ?>
</body>
</html>
<?php
                }
            }
        } else {
            $_SESSION['BookErr'] = "Anda saat ini Sedang Membooking Cabin !";
            header('location: booking.php');
        }
    } else {
        $_SESSION['BookErr'] = "Anda Belum Memilih Cabin !";
        header('location: booking.php');
    }
} else {
    $_SERVER['NotifErr'] = "Tidak Ada Izin untuk Mengakses Halaman !";
    header('location: index.php');
}
?>