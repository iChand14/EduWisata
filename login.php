<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Edu Wisata Perlebahan Gunung Guntur</title>

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
                    <a href="login.php" class="btn btn-edu-outline disabled m-1">Login</a>
                    <a href="register.php" class="btn btn-edu m-1">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <?php if ( isset($_SESSION['RegS']) ) { ?>
    <div class="cus-toast active">
        <div class="toast-content">
            <i class="fa-solid fa-check check"></i>
            <div class="message">
                <span class="text text-1">Sukses</span>
                <span class="text text-2"><?php echo $_SESSION['RegS']; unset($_SESSION['RegS']) ?></span>
            </div>
            <div class="progress-bar active"></div>
        </div>
    </div>
    <?php } ?>
    
    <!-- Login -->
    <div class="back-ground">

        <div class="container d-flex justify-content-center align-items-center min-vh-100">

            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-area" style="background: #f1c407;">
                    <div class="featured-image text-center mb-3">
                        <img src="img/login-img.png" class="img-fluid" alt="Welcome" style="width: 250px;">
                        <p class="text-white fs-2">Selamat Datang</p>
                        <small class="text-white text-wrap">Silahkan Login untuk Booking ! ! !</small>
                    </div>
                </div>
                <div class="col-md-6 right-area">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2 class="text-dark">LOGIN</h2>
                        </div>

                        <form method="POST" action="fungsi.php" enctype="multipart/form-data" autocomplete="off">

                            <input name="request" value="login" hidden>
                        
                            <div class="input-group mb-3">
                                <input name="email" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email">
                            </div>
                            <div class="input-group mb-1">
                                <input name="pass" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                            </div>
                            <div class="input-group mb-4 d-flex justify-content-between">
                                <div class="form-check">
                                    <!-- <input type="checkbox" class="form-check-input" id="formCheck">
                                    <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label> -->
                                </div>
                                <div class="forgot">
                                    <small><a href="#">Forgot Password</a></small>
                                </div>
                            </div>
                            <?php if ( isset($_SESSION['LoginError']) ) { ?>
                                <div class="alert alert-danger align-items-center" role="alert" id="notLogin">
                                    <div>
                                        <i class="fa-solid fa-triangle-exclamation"></i> 
                                        <?php echo $_SESSION['LoginError']; unset($_SESSION['LoginError']); ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="input-group mb-3">
                                <button class="btn btn-edu btn-lg w-100 fs-5">Login</button>
                            </div>
                            <div class="row"><small>Tidak Memilikin Akun? <a href="register.php">Register</a></small></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        
    </div>
    <!-- End Login -->

    <!-- script & footer -->
    <?php include_once 'template/footer.php' ?>
</body>
</html>