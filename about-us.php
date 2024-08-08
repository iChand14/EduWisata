<?php session_start(); require_once 'database/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About Us | Edu Wisata Perlebahan Gunung Guntur</title>

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
                    <a href="about-us.php" class="nav-item nav-link nav-active">About Us</a>
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
                    <span class="main-title">About</span>
                    <span class="sub-title text-light">Us</span>   
                </label>
            </div>
        </div>
    </div>
    <!-- End Jumbotron / Banner -->
    
    <!-- About Us -->
    <div class="about-us">
        
        <div class="text-center mx-5 px-5 py-3">
            <div class="row my-4 p-2">
                <div class="col-lg-4">
                    <img src="img/about-img2.png" width="320" alt="Edu Wisata">
                </div>
                <div class="col-lg-8 text-start">
                    <h4 class="text-dark"><strong>Edu Wisata Perlebahan Gunung Guntur</strong></h4>
                    <p>
                        Guntur merupakan Kawasan korservasi yang berada di Desa Pasawahan.   
                        Gunung ini merupakan Destinasi Wisata Minat Khusus, tingkat kunjungan 
                        wisatawan tinggi karena memiliki daya tarik berupa medan gunung yang menantang, 
                        lembah, air terjun, sungai, panorama alam dan kawah. Di samping potensi minat 
                        khusus, bentang lahan dan vegatasi di Gunung Guntur dan sekitarnya sangat potensial 
                        untuk dikembangkan menjadi areal budidaya lebah karena terdapat banyak 
                        vegetasi kaliandra dan tanaman penghasil pakan lebah lainnya.
                    </p> <br/>
                    <h5 class="text-dark"><strong>EDU-WISATA  PELEBAHAN GUNUNG GUNTUR</strong></h5> 
                    <p>
                        hadir untuk mendayagunakan potensi alam sekaligus 
                        sebagai Langkah konservasi Kawasan yang bernilai ekonomis, lingkungan dan social.  
                        Eduwisata ini diresmikan oleh Bupati dan GM. PT PLN Unit Induk Distribusi Jawa Barat 
                        pada Bulan Agustus Tahu 2022.  Edu-Wisata dikelola Oleh Bumdes Sauuyunan Desa Pasawahan 
                        dan Yay. Petani Muda Perlebahan.
                    </p>
                    <p>
                        Edu Wisata ini akan menjadi tempat yang baik untuk heailing,  memberikan pengalaman 
                        yang menyenangkan untuk mengenal lebah, hutan dan budaya masyarakat.
                    </p>
                </div>
            </div>
            <div class="row mb-4 p-2">
                <div class="col-lg-6 text-start">
                    <h5 class="text-dark"><strong>AKSESIBILITAS LOKASI</strong></h5>
                    <P>
                        Lokasi dapat ditempuh dengan segala jenis kendaraan  mobil pribadi, motor dengan jarak dari lokasi :
                    </P>
                    <ul style="list-style-type: circle;">
                        <li>Kota Bandung 55 Km</li>
                        <li>Destinasi Wisata Air Panas Cipanas Garut 3 Km</li>
                        <li>Rumah Sakit 24 Jam 5 Km</li>
                    </ul>
                </div>
                <div class="col-lg-6 text-start">
                    <h5 class="text-dark"><strong>Address</strong></h5>
                    <p>
                        Ds. Pasawahan Kec. Tarogong Kaler Kab. Garut Jawa Barat Indonesia
                    </p>
                    <h5 class="text-dark"><strong>Hot-line</strong></h5>
                    <p>
                        +62 813 8891 3696 <br />
                        +62 821 3050 6697
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-dark"><strong>Email</strong></h5>
                            <p>info@eduwisatagnguntur.com</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-dark"><strong>Website</strong></h5>
                            <p>
                                <a style="text-decoration: none;" href="www.eduwisatagnguntur.com">www.eduwisatagnguntur.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <iframe class="map mb-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15834.924655249173!2d107.87156957867396!3d-7.157048529336542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68b7017c4289cd%3A0xeec5d7636144fd66!2sEdu%20Wisata%20Perlebahan%20Pasawahan!5e0!3m2!1sid!2sid!4v1665504593172!5m2!1sid!2sid" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
        </div>

    </div>
    <!-- End About Us -->

    <!-- contact -->
    <?php include_once 'template/contact.php' ?>
    
    <!-- script -->
    <?php include_once 'template/footer.php' ?>
</body>
</html>