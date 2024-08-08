<?php session_start(); require_once 'database/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gallery | Edu Wisata Perlebahan Gunung Guntur</title>

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
                    <a href="gallery.php" class="nav-item nav-link nav-active">Gallery</a>
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
                    <span class="main-title">Gallery</span>
                    <!-- <span class="sub-title text-light">Area</span>    -->
                </label>
            </div>
        </div>
    </div>
    <!-- End Jumbotron / Banner -->


    <!-- Gallery -->
    <div class="gallery">

        <div class="text-center px-5 py-3">
            
            <!-- Foto - Foto -->
            <h3 class="text-dark mb-5"><strong>FOTO - FOTO</strong></h3>
            <div class="container">
                <div class="row g-0 mb-5">
                    <div class="col-md-3">
                        <div class="img-body">
                            <img src="img/Pelatihan1.png" alt="Pelatihan" class="img-image">
                            <div class="img-overlay">
                                <div class="img-text">Pelatihan</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-body">
                            <img src="img/jeep1.png" alt="Jeep" class="img-image">
                            <div class="img-overlay">
                                <div class="img-text">Jeep Tour</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-body">
                            <img src="img/outbond1.png" alt="Outbond" class="img-image">
                            <div class="img-overlay">
                                <div class="img-text">Outbond</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-body">
                            <img src="img/camp1.png" alt="Camp" class="img-image">
                            <div class="img-overlay">
                                <div class="img-text">Camping</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-body">
                            <img src="img/Pelatihan2.png" alt="Pelatihan" class="img-image">
                            <div class="img-overlay">
                                <div class="img-text">Pelatihan</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-body">
                            <img src="img/jeep2.png" alt="Jeep" class="img-image">
                            <div class="img-overlay">
                                <div class="img-text">Jeep Tour</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-body">
                            <img src="img/outbond2.png" alt="Outbond" class="img-image">
                            <div class="img-overlay">
                                <div class="img-text">Outbond</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-body">
                            <img src="img/masuk.png" alt="Welcome" class="img-image">
                            <div class="img-overlay">
                                <div class="img-text">Welcome</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-body">
                            <img src="img/Pelatihan3.png" alt="Pelatihan" class="img-image">
                            <div class="img-overlay">
                                <div class="img-text">Pelatihan</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-body">
                            <img src="img/jeep3.png" alt="Jeep" class="img-image">
                            <div class="img-overlay">
                                <div class="img-text">Jeep Tour</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-body">
                            <img src="img/outbond3.png" alt="Outbond" class="img-image">
                            <div class="img-overlay">
                                <div class="img-text">Outbond</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-body">
                            <img src="img/budidaya.png" alt="Budidaya" class="img-image">
                            <div class="img-overlay">
                                <div class="img-text">Budidaya</div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- End Foto - Foto -->

            <!-- Video -->
            <h3 class="text-dark mb-5"><strong>VIDEO</strong></h3>
            <div class="container mb-5">
                <div class="ratio ratio-16x9">
                    <iframe class="video" width="800" height="600" src="https://www.youtube.com/embed/pl8p_RSJPE8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <!-- End Video -->
        </div>

    </div>
    <!-- End Gallery -->

    <!-- contact -->
    <?php include_once 'template/contact.php' ?>
    
    <!-- script -->
    <?php include_once 'template/footer.php' ?>
</body>
</html>