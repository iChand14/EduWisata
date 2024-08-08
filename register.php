<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | Edu Wisata Perlebahan Gunung Guntur</title>

    <!-- Icon -->
    <link rel="icon" href="img/favicon.png" type="image/png">
    <!-- style / bootstrap -->
    <?php include_once 'template/header.php' ?>

</head>
<body class="bg-light">

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
                    <a href="index.php#contact" class="nav-item nav-link">Contact</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="login.php" class="btn btn-edu-outline m-1">Login</a>
                    <a href="register.php" class="btn btn-edu disabled m-1">Register</a>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Toast / Notification -->
    <?php if ( isset($_SESSION['RegE']) ) { ?>
    <div class="cus-toast active">
        <div class="toast-content">
            <i class="fa-solid fa-xmark check"></i>
            <div class="message">
                <span class="text text-1">Error</span>
                <span class="text text-2"><?php echo $_SESSION['RegE']; unset($_SESSION['RegE']) ?></span>
            </div>
            <div class="progress-bar active"></div>
        </div>
    </div>
    <?php } ?>
    <!-- End Toast / Notification -->

    <!-- Register -->
    <div class="back-ground">

        <div class="container d-flex justify-content-center align-items-center min-vh-100">

            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-area" style="background: #f1c407;">
                    <div class="featured-image text-center mb-3">
                        <img src="img/register-img.png" class="img-fluid" alt="Register" style="width: 250px;">
                        <p class="text-white fs-2">Selamat Datang</p>
                        <small class="text-white text-wrap">Silahkan Register untuk Membuat Akun ! ! !</small>
                    </div>
                    
                </div>
                <div class="col-md-6 right-area">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2 class="text-dark">REGISTER</h2>
                        </div>

                        <form method="POST" action="fungsi.php" enctype="multipart/form-data" autocomplete="off">

                            <input name="request" value="register" hidden>
                            <input name="stat" value="2" hidden>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" name="username" placeholder="Masukan Username">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" name="email" placeholder="Masukan Email">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control form-control-lg bg-light fs-6" name="pass" placeholder="Masukan Password">
                            </div>
                            <div class="input-group mb-4">
                                <input type="password" class="form-control form-control-lg bg-light fs-6" name="rePass" placeholder="Masukan Ulang Password">
                            </div>
                            
                            <?php if ( isset($_SESSION['RegError']) ) { ?>
                                <div class="alert alert-danger align-items-center mb-3" role="alert" id="notReg">
                                    <div>
                                        <i class="fa-solid fa-triangle-exclamation"></i> 
                                        <?php echo $_SESSION['RegError']; unset($_SESSION['RegError']); ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="input-group mb-3">
                                <button class="btn btn-edu btn-lg w-100 fs-5">Register</button>
                            </div>
                            <div class="row">
                                <small>Sudah Memilikin Akun? <a href="login.php">Login</a></small>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Register -->

    <!-- script & footer -->
    <?php include_once 'template/footer.php' ?>
</body>
</html>