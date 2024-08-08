<?php session_start(); require_once 'database/config.php'; 
// Jika belum login akan di arahkan ke form login 
if ( !isset( $_SESSION['login'] ) ) { header('location: login.php'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Change Password | Edu Wisata Perlebahan Gunung Guntur</title>

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
                                <li><a href="data-customer.php" class="dropdown-item">Data Customer</a></li><li><a href="change-password.php" class="dropdown-item nav-active">Change Password</a></li>
                            <?php } else if ( $_SESSION['role'] == "Kasir" ) { ?>
                                <li><a href="booking-list.php" class="dropdown-item">Booking List</a></li>
                                <li><a href="data-customer.php" class="dropdown-item">Data Customer</a></li>
                                <li><a href="data-cabin.php" class="dropdown-item">Data Cabin</a></li>
                                <li><a href="change-password.php" class="dropdown-item nav-active">Change Password</a></li>
                            <?php } else if ( $_SESSION['role'] == "Customer" ) { ?>
                                <li><a href="informasi-akun.php" class="dropdown-item">Informasi Akun</a></li>
                                <li><a href="history-booking.php" class="dropdown-item">History Booking</a></li>
                                <li><a href="change-password.php" class="dropdown-item nav-active">Change Password</a></li>
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

    <!-- Bayar -->
    <div class="back-ground">

        <div class="container d-flex justify-content-center align-items-center min-vh-100">

            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-area" style="background: #f1c407;">
                    <div class="featured-image text-center mb-3">
                        <img src="img/reset-img.png" class="img-fluid" alt="Welcome" style="width: 250px;">
                        <p class="text-white fs-2">Change Password</p>
                        <small class="text-white text-wrap">Silahkan Masukan Password Baru ! ! !</small>
                    </div>
                </div>
                <div class="col-md-6 right-area">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2 class="text-dark">CHANGGE PASSWORD</h2>
                        </div>

                        <?php 
                        $select = $koneksi->query("SELECT * FROM user WHERE id_user = '" . $_SESSION['id_user'] . "'");

                        while ( $user = $select->fetch_all(MYSQLI_ASSOC) ) {
                        ?>

                        <form method="POST" action="fungsi.php" enctype="multipart/form-data" autocomplete="off">
                        
                            <input name="request" value="cgPass" hidden>
                            
                            <div class="input-group mb-3">
                                <input name="email" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email" value="<?= $user[0]['email'] ?>" <?php if ($user[0]['email']) { echo "readonly"; } ?>>
                            </div>
                            <div class="input-group mb-3">
                                <input name="pSekarang" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Masukan Password Saat Ini">
                            </div>
                            <div class="input-group mb-3">
                                <input name="pBaru" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Masukan Password Baru">
                            </div>
                            <div class="input-group mb-4">
                                <input name="rpBaru" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Masukan Ulang Password Baru">
                            </div>

                            <?php if ( isset($_SESSION['cPass']) ) { ?>
                                <div class="alert alert-danger align-items-center mb-3" role="alert" id="notReg">
                                    <div>
                                        <i class="fa-solid fa-triangle-exclamation"></i> 
                                        <?php echo $_SESSION['cPass']; unset($_SESSION['cPass']); ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="input-group mb-3">
                                <button class="btn btn-edu btn-lg w-100 fs-5">Register</button>
                            </div>

                        </form>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>

        </div>
        
    </div>
    <!-- End Bayar -->

    <!-- script -->
    <?php include_once 'template/footer.php' ?>
</body>
</html>