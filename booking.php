<?php session_start(); require_once 'database/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booking | Edu Wisata Perlebahan Gunung Guntur</title>

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
                    <a href="booking.php" class="nav-item nav-link nav-active">Booking</a>
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

    <!-- Toast / Notification -->
    <?php if ( isset($_SESSION['BookErr']) ) { ?>
    <div class="cus-toast active">
        <div class="toast-content">
            <i class="fa-solid fa-xmark check"></i>
            <div class="message">
                <span class="text text-1">Error</span>
                <span class="text text-2"><?php echo $_SESSION['BookErr']; unset($_SESSION['BookErr']) ?></span>
            </div>
            <div class="progress-bar active"></div>
        </div>
    </div>
    <?php } ?>
    <!-- End Toast / Notification -->
    
    <!-- Jumbotron / Banner -->
    <div class="jumbotron">
        <div class="p-5 mb-4 cover">
            <div class="container-fluid group-sign py-5">
                <label class="EduColor title">
                    <span class="main-title">Booking</span>
                    <span class="sub-title text-light">Area</span>   
                </label>
            </div>
        </div>
    </div>
    <!-- End Jumbotron / Banner -->

    <!-- Form Short Booking -->
    <div class="form-short-booking px-5">
        <div class="mx-5 bg-light shadow short-booking">
            <div class="container-sm text-center py-3 px-1">
                <div class="row mb-4 mx-2">
                    <div class="col-9 short-header text-start">
                        <span class="s-header-title text-secondary">Hallo</span>
                        <span class="s-header-text text-dark">Apa yang Ingin Anda Lakukan?</span>
                    </div>
                    <div class="col-3 text-end">
                        <img src="img/main_device_image.png" height="60" alt="Edu Wisata">
                    </div>
                </div>
                <hr />

                <form method="GET" action="cabin.php" enctype="multipart/form-data">

                <div class="row mx-2 g-2">
                    <div class="col-md-4 p-1">
                        <label class="d-flex justify-content-start EduColor text-shadow fw-bold m-1" for="PaketEdu">Pilih Cabin</label>
                        <div class="input-group">
                            <div class="input-group-text" ><i id="iconChange" class="fa-solid fa-cabin"></i></div>
                            <select class="form-select" name="id_cabin" id="PaketEdu" required>
                                <option value="" selected hidden>Pilih Cabin</option>
                                <?php
                                $qry = $koneksi->query("SELECT * FROM cabin");
                                $data = $qry->fetch_all(MYSQLI_ASSOC);
                                for ($x = 0; $x < count($data); $x++) {
                                    if ( $data[$x]['booking'] == 2) {
                                ?>
                                <option value="" disabled>Cabin No <?= $data[$x]['no_cabin'] ?>, Booked. Oleh : <?= $data[$x]['nama_customer'] ?></option>
                                <?php
                                    } else if ( $data[$x]['booking'] == 1 ) {
                                ?>
                                <option value="" disabled>Cabin No <?= $data[$x]['no_cabin'] ?>, on Pending. Oleh : <?= $data[$x]['nama_customer'] ?></option>
                                <?php
                                    } else {
                                ?>
                                <option value="<?= $data[$x]['id_cabin'] ?>">Cabin No <?= $data[$x]['no_cabin'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 p-1 checkin">
                        <label class="d-flex justify-content-start EduColor text-shadow fw-bold m-1" for="checkIn">Check-In</label>
                        <input type="date" class="form-control checkin" name="Check_In" id="CheckIn" required />
                    </div>
                    <div class="col-md-2 p-1">
                        <label class="d-flex justify-content-start EduColor text-shadow fw-bold m-1" for="Durasi">Durasi</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="fa-solid fa-timer"></i></div>
                            <select class="form-select datepicker" id="Durasi" onchange="autoDurasi(this.value)" required>
                                <option value="" selected hidden>...</option>
                                <option value="1">1 Hari</option>
                                <option value="2">2 Hari</option>
                                <option value="3">3 Hari</option>
                                <option value="4">4 Hari</option>
                                <option value="5">5 Hari</option>
                                <option value="6">6 Hari</option>
                                <option value="7">7 Hari</option>
                                <option value="8">8 Hari</option>
                                <option value="9">9 Hari</option>
                                <option value="10">10 Hari</option>
                                <option value="11">11 Hari</option>
                                <option value="12">12 Hari</option>
                                <option value="13">13 Hari</option>
                                <option value="14">14 Hari</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 p-1">
                        <label class="d-flex justify-content-start EduColor text-shadow fw-bold m-1" for="COut">Check-Out</label>
                        <input type="date" class="form-control" name="Check_Out" id="CheckOut" readonly />
                    </div>
                    <div class="col d-grid gap-2">
                        <button type="submit" class="btn btn-edu">Cari</button>
                    </div>
                </div>

            </form>

            </div>
        </div>
    </div>
    <!-- End Short Booking -->

    <!-- Cabin -->
    <div class="cabin px-3">
        <div class="px-5 py-3">
            <div class="row g-3 mb-5">

                <?php
                $no = 0;
                $qry = $koneksi->query("SELECT * FROM cabin");
                $data = $qry->fetch_all(MYSQLI_ASSOC);
                
                if ( count($data) > 0 ) {
                    for ( $x = 0; $x < count($data); $x++ ) {
                ?>

                <div class="col-md-3">
                    
                    <!-- Card -->
                    <div class="card">
                        <img src="<?= "img/cabin1.jpeg" ?>" alt="Cabin">
                        <div class="card-body">
                            <h5>Cabin <?= $x+1 ?></h5>
                            <div class=" d-flex justify-content-between">
                                <p>No Cabin : <?= $data[$x]['no_cabin'] ?><br/>
                            <b>Rp.</b> <?= $data[$x]['harga_cabin'] ?></p>
                                <?php if ( $data[$x]['booking'] == 2 ) { ?>
                                <a class="disabled" ><button class="btn btn-secondary btn-sm disabled">Booked</button></a>
                                <?php } else if ( $data[$x]['booking'] == 1 ) { ?>
                                <a class="disabled" ><button class="btn btn-warning text-white btn-sm disabled">Pending</button></a>
                                <?php } else { ?>
                                <a href="cabin.php?id_cabin=<?= $data[$x]['id_cabin'] ?>"><button class="btn btn-edu btn-sm">Book Sekarang</button></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div class="status d-flex justify-content-center align-items-center">
                                Status : 
                                <?php if ( $data[$x]['booking'] == 0 ) {
                                    ?>
                                    <span class="badge rounded-pill bg-success mx-1">Tersedia</span>
                                    <?php
                                } else if ( $data[$x]['booking'] == 1 ) {
                                    ?>
                                    <span class="badge rounded-pill bg-warning mx-1">Pending</span>
                                    <?php
                                } else if ( $data[$x]['booking'] == 2 ) { 
                                    ?>
                                    <span class="badge rounded-pill bg-secondary mx-1">Booked</span>
                                <?php } ?>
                            </div>
                            <div>
                                <?php if ( $data[$x]['booking'] == 2 ) { ?>
                                    Oleh : <span class="text-dark fw-bold"><?= $data[$x]['nama_customer']; ?></span>
                                <?php } else if ( $data[$x]['booking'] == 1 ) { ?>
                                    Oleh : <span class="text-dark fw-bold"><?= $data[$x]['nama_customer']; ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                </div>
                <?php 
                    }
                } 
                ?>
            </div>
        </div>
    </div>
    <!-- End Cabin -->

    <!-- contact -->
    <?php include_once 'template/contact.php' ?>
    
    <!-- script -->
    <?php include_once 'template/footer.php' ?>
</body>
</html>