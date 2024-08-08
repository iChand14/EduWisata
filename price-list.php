<?php session_start(); require_once 'database/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Price List | Edu Wisata Perlebahan Gunung Guntur</title>

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
                    <a href="price-list.php" class="nav-item nav-link nav-active">Price List</a>
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
                    <span class="main-title">Price</span>
                    <span class="sub-title text-light">List</span>   
                </label>
            </div>
        </div>
    </div>
    <!-- End Jumbotron / Banner -->

    <!-- Price List -->
    <div class="price-list ">

        <!-- Lebah Madu -->
        <div class="text-center px-5 py-3">
            <div class="text-dark">
                <h3 class="mb-5 fw-medium text-start"><strong>Edu-Wisata  Lebah Madu “ Become a Beekeeping ”</strong></h3>
                <div class="row g-2 mb-5">
                    <div class="col-md-6">
                        <img src="img/eduwisatalebah.jpg" height="400" alt="Edu Wisata Lebah">
                    </div>
                    <div class="col-md-6 text-start">
                        <h3><strong>Fasilitas : </strong></h3>
                        <ul style="list-style-type: number;">
                            <li>Tour Guide</li>
                            <li>Welcome Drink "Es Nadu Gn. Guntur"</li>
                            <li>Fasilitas Saung</li>
                            <li>Makan Siang</li>
                        </ul>
                        <h3><strong>Aktifitas : </strong></h3>
                        <ul style="list-style-type: number;">
                            <li>Ice Breaking</li>
                            <li>Mengenal Lebah</li>
                            <li>Jelajah Edu Wisata (interaksi dengan lebah)</li>
                            <li>Fun Games</li>
                        </ul>
                        </br>
                        <h5><strong>Harga : Rp. 75.000,-/orang </strong></h5>
                        <h5><strong>Minimal 20 orang </strong></h5>
                        <h5>*Discount untuk warga Garut</h5>
                    </div>
                </div>
                <p class="text-start">
                    Setiap pengunjung akan diajak dalam petualangan menyenangkan <br />
                    untuk mengenal kehidupan lebah, manfaat lebah, dan bagaimana <br />
                    lebah mengumpulkan pakan serta membuat madu.
                </p>
                </br>      
                <p class="text-start">
                    Temukan wisata edukasi ini, dengan materi pembelajaran <br />
                    singkat dan interaksi langsung dengan lebah madu dan peternak lebah madu.
                </p>
            </div>
        </div>
        <!-- End Lebah Madu -->

        <!-- Pelatihan -->
        <div class="bg-body-secondary text-center px-5 py-3">
            <div class="text-dark">
                <h3 class="mb-5 fw-medium text-end"><strong>Pelatihan Budidaya Lebah Madu</strong></h3>
                <div class="row g-2 mb-5">
                    <div class="col-md-6 text-start">
                        <h3><strong>Fasilitas : </strong></h3>
                        <ul style="list-style-type: number;">
                            <li>Pelatihan Kit</li>
                            <li>Welcome Drink "Es Nadu Gn. Guntur"</li>
                            <li>Akomodasi Tergantung Paket Pelatihan</li>
                        </ul>
                        <h3><strong>Aktifitas : </strong></h3>
                        <ul style="list-style-type: number;">
                            <li>Ice Breaking</li>
                            <li>Pelatihan dengan materi :
                                <ul style="list-style-type: lower-alpha;">
                                <li>Bio-Ekologi Lebah</li>
                                <li>Pengenalan dan Budidaya Pakan Lebah</li>
                                <li>Apikulture/Teknik Budidaya Lebah Madu</li>
                                <li>BApi Theraphy (pengenalan awal)</li>
                                </ul>
                            </li>
                            <li>Fun Games</li>
                        </ul>
                        </br>
                        <h5><strong>Harga : Call,-/orang </strong></h5>
                        <h5><strong>+62 813 8891 3696 / +62 821 3050 6697 </strong></h5>
                        <h5><strong>Minimal 10 orang </strong></h5>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="img/PelatihanPrice.png" height="450" alt="Pelatihan Budidaya Lebah Madu">
                    </div>
                </div>
                <p class="text-end">
                    Tidak sekedar pelatihan tetapi, pengelola akan <br />
                    menyajikan kegiatan pelatihan dalam suasana yang <br />
                    asik dengan selingan fun games yang membangun  <br />
                    motivasi, Kerjasama dan  jiwa tawakal.
                </p>
                </br>      
                <p class="text-end">
                    Pelatihan di bawah instruktur pakar dan praktisi <br />
                    Dr. Sopandi Sunarya (SITH-ITB), Yudi Rismayadi, Ir, MSI, IPU (Ahli Serangga Sosial), <br />
                    Tyanto, Ssi (praktisi Apicutur dan Api terapi), serta Rasu Garda (motivator). 
                </p>
            </div>
        </div>
        <!-- End Pelatihan -->

        <!-- Outbond -->
        <div class="text-center px-5 py-3">
            <div class="text-dark">
                <h3 class="mb-5 fw-medium text-start"><strong>Outbond</strong></h3>
                <div class="row g-2 mb-5">
                    <div class="col-md-6">
                        <img src="img/outbond.jpg" height="400" alt="Edu Wisata Outbond">
                    </div>
                    <div class="col-md-6 text-start">
                        <h3><strong>Fasilitas : </strong></h3>
                        <ul style="list-style-type: number;">
                            <li>Instruktur</li>
                            <li>Welcome Drink "Es Nadu Gn. Guntur"</li>
                            <li>Fasilitas Outbond</li>
                            <li>Akomodasi Tergantung Paket</li>
                        </ul>
                        <h3><strong>Aktifitas : </strong></h3>
                        <ul style="list-style-type: number;">
                            <li>Ice Breaking</li>
                            <li>Comunication</li>
                            <li>Team Building</li>
                        </ul>
                        </br>
                        <h5><strong>Harga : Call,-/orang </strong></h5>
                        <h5><strong>+62 813 8891 3696 / +62 821 3050 6697 </strong></h5>
                        <h5><strong>Minimal 20 orang </strong></h5>
                    </div>
                </div>
                <p class="text-start">
                    Outbond di kaki Gunung Guntur yang indah dan sajian Ice breaking, fun games, team building. <br />
                    akomadasi alami disertai terapi lebah akan menjadikan libur keluarga,<br />
                    perusahaan yang sangat berkesan.  
                </p>
                </br>      
                <p class="text-start">
                    Nikmati pula keindahan camping dengan suasana <br />
                    panorama malam keindahan Kota Garut. <br />
                </p>
            </div>
        </div>
        <!-- End Outbond -->

        <!-- Jeep Gunung -->
        <div class="bg-body-secondary text-center px-5 py-3">
            <div class="text-dark">
                <h3 class="mb-5 fw-medium text-end"><strong>Jeep Gunung Guntur Lava Tour</strong></h3>
                <div class="row g-2 mb-5">
                    <div class="col-md-6 text-start">
                        <h3><strong>Fasilitas : </strong></h3>
                        <ul style="list-style-type: number;">
                            <li>Driver & Tour Guide</li>
                            <li>Welcome Drink "Es Nadu Gn. Guntur"</li>
                            <li>Jeep</li>
                            <li>Makan Nasi Liwet</li>
                        </ul>
                        <h3><strong>Aktifitas : </strong></h3>
                        <ul style="list-style-type: number;">
                            <li>Ice Breaking</li>
                            <li>Mengenal Gunung Guntur dan Geologi Batuan Vulkanik</li>
                            <li>Lava Tour</li>
                        </ul>
                        </br>
                        <h5><strong>Harga : Rp. 375.000,-/orang </strong></h5>
                        <h5><strong>Minimal 3 orang </strong></h5>
                    </div>
                    <div class="col-md-6">
                        <img src="img/jeep.png" height="400" alt="Edu Wisata Outbond">
                    </div>
                </div>
                <p class="text-end">
                    Tidak sekedar tour jeep menyulusuri keseruan lava tour Gunung Guntur, <br />
                    pengunjung akan di berikan wawasan sejarah gUnung Guntur dan <br />
                    engenai aspek geologi yang menarik.
              </p>
            </div>
        </div>
        <!-- End Jeep Gunung -->

        <!-- Camping -->
        <div class="text-center px-5 py-3">
            <div class="text-dark">
                <h3 class="mb-5 fw-medium text-start"><strong>Camping</strong></h3>
                <div class="row g-2 mb-5">
                    <div class="col-md-6">
                        <img src="img/camp.png" height="400" alt="Edu Wisata Outbond">
                    </div>
                    <div class="col-md-6 text-start">
                        <h3><strong>Fasilitas : </strong></h3>
                        <ul style="list-style-type: number;">
                            <li>Free tenda Kapasitas 2-4 orang</li>
                            <li>Welcome Drink "Es Nadu Gn. Guntur"</li>
                            <li>Sarana Eduwisata</li>
                            <li>Makan Nasi Liwet (2 ornag)</li>
                        </ul>
                        <h3><strong>Aktifitas : </strong></h3>
                        <ul style="list-style-type: number;">
                            <li>Mengenal Lebah</li>
                            <li>Menikmati Panorama dan Pendakian ke Gn. Guntur</li>
                        </ul>
                        </br>
                        <h5><strong>Harga : Rp. 75.000,-/orang </strong></h5>
                        <h5><strong>Minimal 2 orang </strong></h5>
                    </div>
                </div>
                <p class="text-start">
                    Suasana alam dan sajian panorama malam yang indah memandang Kota Garut akan menimbulkan kesan camping yang berbeda. <br /> 
                    Ragam aktivitas bisa dikembangkan oleh para pengujung termasuk mendaki Puncak Gunung Guntur  yang mempesona, <br />
                    ditambah akan menemukan pengetahuan mengenai lebah, hutan konservasi, dan budaya masyarakat"
              </p>
            </div>
        </div>
        <!-- End Camping -->

    </div>
    <!-- End Price List -->

    <!-- contact -->
    <?php include_once 'template/contact.php' ?>
    
    <!-- script -->
    <?php include_once 'template/footer.php' ?>
</body>
</html>