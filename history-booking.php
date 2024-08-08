<?php session_start(); require_once 'database/config.php';

// Jika belum login akan di arahkan ke form login 
if ( !isset( $_SESSION['login'] ) ) { header('location: login.php'); }

    if ( $_SESSION['role'] == 'Customer' || $_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Kasir' ) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>History Booking | Edu Wisata Perlebahan Gunung Guntur</title>

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
                                <li><a class="dropdown-item" href="informasi-akun.php">Informasi Akun</a></li>
                                <li><a class="dropdown-item nav-active" href="history-booking.php">History Booking</a></li>
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
                    <span class="main-title-home">History Booking</span>
                    <?php
                    if ( $_SESSION['role'] == 'Customer' ) {
                    ?>
                        <p class="label text-light fs-5">Halo <strong><?= $_SESSION['username'] ?></strong></p>
                    <?php
                    } else if ( $_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Kasir' ) {
                        $name = $koneksi->query("SELECT * FROM customer INNER JOIN user ON customer.email_cus = user.email WHERE id_customer = ".$_GET['id_customer']);
                        while ( $user = $name->fetch_all(MYSQLI_ASSOC) ) {
                    ?>
                        <p class="label text-light fs-5">History Atas Nama <strong><?= $user[0]['nama_depan_customer'] ." ". $user[0]['nama_belakang_customer'] ?></strong></p>
                    <?php
                        }
                    }
                    ?>
                       
                </label>
            </div>
        </div>
    </div>

    <div class="py-3 px-5">

        <div class="text-dark ">
            <h3 class="text-dark fw-bold text-center mb-5">History Booking</h3>
            <?php
            if ( $_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Kasir' ) {
            ?>
            <a href="data-customer.php" class="btn btn-danger"
            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
            <?php
            }
            ?>
            <table class="table table-striped mt-2">
                <thead class="table-edu">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Depan</th>
                        <th scope="col">Check - In</th>
                        <th scope="col">Check - Out</th>
                        <th scope="col">No. Cabin</th>
                        <th scope="col">Ket.</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $first = ($page > 1) ? ($page * $limit) - $limit : 0;
                if ( $_SESSION['role'] == 'Customer' ) {
                    $id = $_SESSION['id_user'];
                } else if ( $_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Kasir' ) {
                    $id = $_GET['id_customer'];
                }

                $row = $koneksi->query("SELECT * FROM booking WHERE id_user = ".$id." OR id_customer = ".$id);

                $select = $koneksi->query("SELECT * FROM booking INNER JOIN user ON booking.id_user = user.id_user INNER JOIN customer ON booking.id_customer = customer.id_customer INNER JOIN cabin ON booking.id_cabin = cabin.id_cabin WHERE booking.id_user = $id OR booking.id_customer = $id ORDER BY booking.id_booking DESC LIMIT $first, $limit");
                $data = $select->fetch_all(MYSQLI_ASSOC);

                if ( count($data) > 0 ) {
                    for ( $i = 0; $i < count($data); $i++ ) {
                ?>

                    <tr class="table-light">
                        <th scope="row"><?= $i+1 ?></th>
                        <td><?= $data[$i]['nama_depan_booking'] ?></td>
                        <td><?= $data[$i]['check_in'] ?></td>
                        <td><?= $data[$i]['check_out'] ?></td>
                        <td><?= $data[$i]['no_cabin'] ?></td>
                        <td>
                            <span class="<?php if ($data[$i]['stat_booking'] == '2') { echo "badge bg-success"; } else if ($data[$i]['stat_booking'] == '1') { echo "badge bg-secondary"; } else { echo "badge bg-primary"; } ?>"><?php if ($data[$i]['stat_booking'] == '2') { echo "Selesai"; } else if ($data[$i]['stat_booking'] == '1') { echo "Menempati"; } else { echo "Booked"; } ?></span>
                        </td>
                    </tr>

                <?php
                    }
                }
                ?>

                </tbody>
                <tfoot class="table-dark opacity-50">
                    <tr>
                        <th scope="col">*</th>
                        <th scope="col" colspan="4">Total Booking :</th>
                        <th scope="col"><?= $row->num_rows." Kali"; ?></th>
                    </tr>
                </tfoot>
            </table>

            <nav aria-label="Page navigation example">

                <?php

                $prev = $page - 1;
                $next = $page + 1;

                $pagination = $koneksi->query("SELECT * FROM booking INNER JOIN user ON booking.id_user = user.id_user INNER JOIN customer ON booking.id_customer = customer.id_customer INNER JOIN cabin ON booking.id_cabin = cabin.id_cabin WHERE booking.id_user = $id OR booking.id_customer = $id ORDER BY booking.id_booking DESC LIMIT $first, $limit");
                $pag = $pagination->fetch_all(MYSQLI_ASSOC);

                $sPage = ceil(count($pag) / $limit);

                ?>

                <ul class="pagination justify-content-end">
                    <li class="page-item <?php if ($page <= 1) { echo "disabled"; } ?>">
                        <a class="page-link" <?php if ($page > 1) { echo "href='?page=$prev'"; } ?>>Previous</a>
                    </li>

                    <?php
                    for($x = 0; $x < $sPage; $x++){
                        if( $page == $x+1){
                            ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="?page=<?php echo $x+1; ?>">
                                    <?php echo $x+1;?>
                                </a>
                            </li>
                            <?php
                        }else{
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $x+1; ?>">
                                    <?php echo $x+1;?>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                    
                    <li class="page-item <?php if ($page == $sPage) { echo "disabled"; } ?>">
                    <a class="page-link" <?php if ($page < $sPage) { echo "href='?page=$next'"; } ?>>Next</a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>

    <!-- contact -->
    <?php include_once 'template/contact.php' ?>

    <!-- script -->
    <?php include_once 'template/footer.php' ?>
</body>
</html>
<?php
    } else {
        $_SERVER['NotifErr'] = "Tidak Ada Izin untuk Mengakses Halaman !";
        header('location: index.php');
    }
?>