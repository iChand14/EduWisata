<?php session_start(); require_once 'database/config.php';

// Jika belum login akan di arahkan ke form login 
if ( !isset( $_SESSION['login'] ) ) { header('location: login.php'); }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Informasi Akun | Edu Wisata Perlebahan Gunung Guntur</title>

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
                                <li><a class="dropdown-item nav-active" href="informasi-akun.php">Informasi Akun</a></li>
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
                    <span class="main-title-home">Informasi Akun</span>
                    <p class="label text-light fs-5">Halo <strong><?= $_SESSION['username'] ?></strong></p>   
                </label>
            </div>
        </div>
    </div>

    <!-- Toast / Notification -->
    <?php if ( isset($_SESSION['updateAkun']) ) { ?>
    <div class="cus-toast active">
        <div class="toast-content">
            <i class="fa-solid fa-check check"></i>
            <div class="message">
                <span class="text text-1">Sukses</span>
                <span class="text text-2"><?php echo $_SESSION['updateAkun']; unset($_SESSION['updateAkun']) ?></span>
            </div>
            <div class="progress-bar active"></div>
        </div>
    </div>
    <?php } ?>
    <!-- End Toast / Notification -->

    <div class="py-3 px-5">

        <?php
        $select = $koneksi->query("SELECT * FROM customer INNER JOIN user ON customer.id_user = user.id_user WHERE customer.id_user = " . $_SESSION['id_user']);
        while ( $data = $select->fetch_all(MYSQLI_ASSOC) ) {
        ?>

        <form method="POST" action="fungsi.php" enctype="multipart/form-data" autocomplete="off">

        <input name="request" value="updtAkun" hidden>

        <input name="idCus" value="<?= $data[0]['id_customer'] ?>" hidden>
        <input name="idUs" value="<?= $data[0]['id_user'] ?>" hidden>
    
        <div class="px-3 py-3">
            <h3 class="text-dark fw-bold text-center mb-5">Informasi Akun Anda</h3>
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <div class="form-input">
                        <label class="text-dark fs-5 mb-1" for="nDepan">Nama Depan</label>
                        <input class="form-control" type="text" id="nDepan" name="nDepan" value="<?= $data[0]['nama_depan_customer'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-input">
                        <label class="text-dark fs-5 mb-1" for="nBelakang">Nama Belakang</label>
                        <input class="form-control" type="text" id="nBelakang" name="nBelakang" value="<?= $data[0]['nama_belakang_customer'] ?>">
                    </div>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-8">
                    <div class="form-input">
                        <label class="text-dark fs-5 mb-1" for="email">Email</label>
                        <input class="form-control" type="text" id="email" name="email" value="<?= $data[0]['email_cus'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-input">
                        <label class="text-dark fs-5 mb-1" for="noTelp">No. Telp</label>
                        <input class="form-control" type="text" id="noTelp" name="noTlp" value="<?= substr($data[0]['no_telp'], 1) ?>">
                    </div>
                </div>
            </div>
            <div class="row g-3 mb-5">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="text-dark fs-5">Jenis Kelamin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="jk" type="radio" value="L" id="Laki" <?php echo ($data[0]['jk'] == 'L' ? ' checked' : ''); ?> >
                        <label class="form-check-label" for="Laki">
                            Laki-Laki
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="jk" type="radio" value="P" id="Perempuan" <?php echo ($data[0]['jk'] == 'P' ? ' checked' : ''); ?> >
                        <label class="form-check-label" for="Perempuan">
                            Perempuan
                        </label>
                    </div> 
                </div>
                <div class="col-md-9">
                    <div class="form-input">
                        <label class="text-dark fs-5 mb-1" for="uName">username</label>
                        <input class="form-control" type="text" id="uName" name="username" value="<?= $data[0]['user_name'] ?>">
                    </div>
                </div>
            </div>
            <div class="mb-5 text-end">
                <button class="btn btn-edu">Ubah Informasi Akun</button>
            </div>
        </div>

        </form>

        <?php 
        }
        ?>
    </div>

    <!-- contact -->
    <?php include_once 'template/contact.php' ?>

    <!-- script -->
    <?php include_once 'template/footer.php' ?>
</body>
</html>