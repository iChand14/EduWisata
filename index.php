<?php session_start(); require_once 'database/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | Edu Wisata Perlebahan Gunung Guntur</title>

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
                    <a href="index.php" class="nav-item nav-link nav-active">Home</a>
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
    <div class="jumbotron-home">
        <div class="p-5 mb-4 cover">
            <div class="container-fluid group-sign-home py-5">
                <img src="img/main_device_image.png" height="120" alt="Edu Wisata">
                <label class="EduColor title-home">
                    <span class="main-title-home">EDU WISATA</span>
                    <span class="sub-title-home">Perlebahan Gunung Guntur</span>
                    <p class="label text-light">Selamat Datang Di Website Eduwisata Perlembahan Gn. Guntur</p>   
                </label>
            </div>
        </div>
    </div>
    
    <!-- Toast / Notification -->
    <!-- login -->
    <?php if ( isset($_SESSION['loginSukses']) ) { ?>
    <div class="cus-toast active">
        <div class="toast-content">
            <i class="fa-solid fa-check check"></i>
            <div class="message">
                <span class="text text-1">Sukses</span>
                <span class="text text-2"><?php echo $_SESSION['loginSukses']; unset($_SESSION['loginSukses']) ?></span>
            </div>
            <div class="progress-bar active"></div>
        </div>
    </div>
    <?php } ?>

    <!-- change pass -->
    <?php if ( isset($_SESSION['cPass']) ) { ?>
    <div class="cus-toast active">
        <div class="toast-content">
            <i class="fa-solid fa-check check"></i>
            <div class="message">
                <span class="text text-1">Sukses</span>
                <span class="text text-2"><?php echo $_SESSION['cPass']; unset($_SESSION['cPass']) ?></span>
            </div>
            <div class="progress-bar active"></div>
        </div>
    </div>
    <?php } ?>
    <?php if ( isset($_SESSION['cPassE']) ) { ?>
    <div class="cus-toast active">
        <div class="toast-content">
            <i class="fa-solid fa-xmark check"></i>
            <div class="message">
                <span class="text text-1">Error</span>
                <span class="text text-2"><?php echo $_SESSION['cPassE']; unset($_SESSION['cPassE']) ?></span>
            </div>
            <div class="progress-bar active"></div>
        </div>
    </div>
    <?php } ?>

    <!-- Error Fungsi -->
    <?php if ( isset($_SESSION['ErFungsi']) ) { ?>
    <div class="cus-toast active">
        <div class="toast-content">
            <i class="fa-solid fa-xmark check"></i>
            <div class="message">
                <span class="text text-1">Error</span>
                <span class="text text-2"><?php echo $_SESSION['ErFungsi']; unset($_SESSION['ErFungsi']) ?></span>
            </div>
            <div class="progress-bar active"></div>
        </div>
    </div>
    <?php } ?>

    <!-- Booking -->
    <?php if ( isset($_SESSION['bNot']) ) { ?>
    <div class="cus-toast active">
        <div class="toast-content">
            <i class="fa-solid fa-check check"></i>
            <div class="message">
                <span class="text text-1">Sukses</span>
                <span class="text text-2"><?php echo $_SESSION['bNot']; unset($_SESSION['bNot']) ?></span>
            </div>
            <div class="progress-bar active"></div>
        </div>
    </div>
    <?php } ?>

    <!-- Cabin -->
    <?php if ( isset($_SESSION['NotifErr']) ) { ?>
    <div class="cus-toast active">
        <div class="toast-content">
            <i class="fa-solid fa-xmark check"></i>
            <div class="message">
                <span class="text text-1">Error</span>
                <span class="text text-2"><?php echo $_SESSION['NotifErr']; unset($_SESSION['NotifErr']) ?></span>
            </div>
            <div class="progress-bar active"></div>
        </div>
    </div>
    <?php } ?>
    <!-- End Toast / Notification -->

    <div class="text-center px-5 py-3">
    
        <!-- Gallery --> 
        <h1 class="text-dark mb-1">GALLERY</h1>

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
        <!-- End Gallery -->

        <!-- Price List -->
        <h1 class="text-dark mb-5">PRICE LIST</h1>
        <div class="row g-3 text-dark">
            <div class="col-lg-4">
                <div class="d-flex align-items-center flex-column" style="height: 100%;">
                    <h4 class="mb-4 fw-medium"><strong>EDU-WISATA LEBAH MADU “ BECOME A BEEKEEPING ”</strong></h4>
                    <p class="px-5">Setiap pengunjung akan diajak dalam petualangan menyenangkan  untuk mengenal kehidupan lebah, 
                    manfaat lebah, dan bagaimana lebah mengumpulkan pakan serta membuat madu. Temukan wisata edukasi ini, dengan materi pembelajaran 
                    singkat dan interaksi langsung dengan lebah madu dan peternak lebah madu.
                    </p>
                    <div class="mt-auto">
                        <strong>Rp. 75.000/org Min 20 org</strong>
                        <h6>* Discount untuk warga Garut</h6>
                    </div>
                    <a href="price-list.php" class="btn btn-edu-outline mt-2">DETAIL</a>
                </div>
            </div>
            <div class="col-lg-4 border-start">
                <div class="d-flex align-items-center flex-column" style="height: 100%;">
                    <h4 class="mb-4 fw-medium"><strong>PELATIHAN BUDIDAYA LEBAH MADU</strong></h4>
                    <p class="px-5">Tidak sekedar pelatihan tetapi, pengelola akan menyajikan kegiatan pelatihan dalam suasana yang asik 
                    dengan selingan fun games yang membangun  motivasi, Kerjasama dan  jiwa tawakal. Pelatihan di bawah instruktur pakar dan praktisi 
                    Dr. Sopandi Sunarya (SITH-ITB), Yudi Rismayadi, Ir, MSI, IPU (Ahli Serangga Sosial),  Tyanto, Ssi (praktisi Apicutur dan Api terapi), serta Rasu Garda (motivator). 
                    </p>
                    <div class="mt-auto">
                        <strong>Rp. Call,-/Org Min. 10 Org</strong>
                    </div>
                    <a href="price-list.php" class="btn btn-edu-outline mt-2">DETAIL</a>
                </div>
            </div>
            <div class="col-lg-4 border-start">
                <div class="d-flex align-items-center flex-column" style="height: 100%;">
                    <h4 class="mb-4 fw-medium"><strong>OUTBOND</strong></h4>
                    <p class="px-5">Outbond di kaki Gunung Guntur yang indah dan sajian  Ice breaking, fun games, team building. 
                    akomadasi alami disertai terapi lebah akan menjadikan libur keluarga, perusahaan yang sangat berkesan. Nikmati pula 
                    keindahan camping dengan suasana panorama malam keindahan Kota Garut. </p>
                    <div class="mt-auto">
                        <strong class="align-self-end">Rp. Call,-/Org Min. 20 Org</strong>
                    </div>
                    <a href="price-list.php" class="btn btn-edu-outline mt-2">DETAIL</a>
                </div>
            </div>
        </div>
        <div class="row g-3 my-5 py-5 text-dark border-top">
            <div class="col-lg-6">
                <div class="d-flex align-items-center flex-column" style="height: 100%;">
                    <h4 class="mt-3 mb-4 fw-medium"><strong>JEEP GUNUNG GUNTUR LAVA TOUR</strong></h4>
                    <p class="px-5">Tidak sekedar tour jeep menyulusuri keseruan lava tour Gunung Guntur, pengunjung 
                    akan di berikan wawasan sejarah gUnung Guntur dan mengenai aspek geologi yang menarik.
                    </p>
                    <div class="mt-auto">
                        <strong>Rp. 375.000/org Min 3 org</strong>
                    </div>
                    <a href="price-list.php" class="btn btn-edu-outline mt-2">DETAIL</a>
                </div>
            </div>
            <div class="col-lg-6 border-start">
                <div class="d-flex align-items-center flex-column" style="height: 100%;">
                    <h4 class="mt-3 mb-4 fw-medium"><strong>CAMPING</strong></h4>
                    <p class="px-5">Suasana alam dan sajian panorama 
                    malam yang indah memandang Kota Garut akan menimbulkan kesan camping 
                    yang berbeda. Ragam aktivitas bisa dikembangkan oleh para pengujung 
                    termasuk mendaki Puncak Gunung Guntur  yang mempesona, ditambah akan 
                    menemukan pengetahuan mengenai lebah, hutan konservasi, dan budaya masyarakat"
                    </p>
                    <div class="mt-auto">
                        <strong>Rp. 75.000/org Min 2 org</strong>
                    </div>
                    <a href="price-list.php" class="btn btn-edu-outline mt-2">DETAIL</a>
                </div>
            </div>
        </div>
        <!-- End Price List -->

        <!-- About Us -->
        <h1 class="text-dark mb-5">ABOUT US</h1>
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
                    dan Yay. Petani Muda Perlebahan. . . . . . . . . . . . . .
                </p>
                <div class="text-start">
                    <span>Ingin Tau Lebih Tentang Kita?. . . . . .</span> <br>
                    <a href="about-us.php" class="btn btn-edu-outline m-2">READ MORE</a>
                </div>
            </div>
        </div>
        <!-- End About Us -->

    </div>

    

    <!-- contact -->
    <?php include_once 'template/contact.php' ?>

    <!-- script -->
    <?php include_once 'template/footer.php' ?>
</body>
</html>