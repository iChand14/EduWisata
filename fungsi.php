<?php

require_once 'database/config.php';

session_start();

if ( isset( $_SERVER ) ) {
    if ( isset( $_SERVER['REQUEST_METHOD'] ) ) {
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            
            if ( isset($_POST) ) {
                
                // request from <input name="request" value="" hidden/>
                $request = $_POST['request'];

                // login
                if ( $request == 'login' ) {

                    if ( $_POST['email'] || $_POST['pass']) {
                        $cek = $koneksi->query("SELECT * FROM user WHERE email = '". $_POST['email'] ."' ");
                        $data = $cek->fetch_all(MYSQLI_ASSOC);

                        if ( $cek == true && count($data) > 0 ) {
                            if ( password_verify( $_POST['pass'], $data[0]['pass'] )  ) {
                                if ( $data[0]['stat_user'] == '0' ) {
                                    // Admin
                                    $_SESSION['login'] = true;
                                    $_SESSION['id_user'] = $data[0]['id_user'];
                                    $_SESSION['role'] = 'Admin';
                                    $_SESSION['username'] = $data[0]['user_name'];
                                    $_SESSION['email'] = $data[0]['email'];
                                    $_SESSION['loginSukses'] = 'Login Berhasil';
                                    header('location: index.php');
                                } else if ( $data[0]['stat_user'] == '1' ) {
                                    // Kasir
                                    $_SESSION['login'] = true;
                                    $_SESSION['id_user'] = $data[0]['id_user'];
                                    $_SESSION['role'] = 'Kasir';
                                    $_SESSION['username'] = $data[0]['user_name'];
                                    $_SESSION['email'] = $data[0]['email'];
                                    $_SESSION['loginSukses'] = 'Login Berhasil';
                                    header('location: index.php');
                                } else if ( $data[0]['stat_user'] == '2' ) {
                                    // Customer
                                    $_SESSION['login'] = true;
                                    $_SESSION['id_user'] = $data[0]['id_user'];
                                    $_SESSION['role'] = 'Customer';
                                    $_SESSION['username'] = $data[0]['user_name'];
                                    $_SESSION['email'] = $data[0]['email'];
                                    $_SESSION['loginSukses'] = 'Login Berhasil';
                                    header('location: index.php');
                                }
                            } else {
                                $_SESSION['LoginError'] = "Email atau Password Salah !";
                                header('location: login.php');
                            }
                        } else {
                            $_SESSION['LoginError'] = "Email dan Password Salah !";
                            header('location: login.php');
                        }
                    } else {
                        $_SESSION['LoginError'] = "Masukan Email dan Password !";
                        header('location: login.php');
                    }
                    
                
                // register CUSTOMER
                } else if ( $request == 'register' ) {

                    if ( $_POST['username'] && $_POST['email'] && $_POST['pass'] && $_POST['rePass'] ) {
                        $cek = $koneksi->query("SELECT email FROM user WHERE email = '" . $_POST['email'] . "' ");
                        $data = $cek->fetch_all();
                        

                        $filter = preg_replace('/\x00|<[^>]*>?/', '', $_POST['username']);
                        $username = str_replace(["'", '"'], ['&#39;', '&#34;'], $filter);

                        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


                        if ( $cek == true && count((array)$data) == 0 ) {
                            if( $_POST['pass'] == $_POST['rePass'] ) {

                                $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

                                $stat = $_POST['stat'];

                                // register user
                                $insert = $koneksi->prepare("INSERT INTO user (`user_name`,`email`,`pass`,`stat_user`) VALUE (?, ?, ?, ?)");
                                $insert->bind_param('ssss', $username, $email, $pass, $stat);

                                // Insert id_user and email into customer
                                $customer = $koneksi->prepare("INSERT INTO customer (`id_user`,`email_cus`) SELECT id_user, email FROM user WHERE email = ?");
                                $customer->bind_param('s', $email);

                                if ( $insert ) {

                                    $saved_reg = $insert->execute();
                                    $saved_cus = $customer->execute();

                                    $_SESSION['RegS'] = "Registrasi Berhasil, Silahkan Login !";
                                    header('location: login.php');
                                } else {
                                    $_SESSION['RegE'] = "Terjadi Kesalahan !";
                                    header('location: register.php');
                                }
                            } else {
                                $_SESSION['RegError'] = "Password tidak Sesuai !";
                                header('location: register.php');
                            }
                        } else {
                            $_SESSION['RegError'] = "Email Telah Terdaftar !";
                            header('location: register.php');
                        }
                    } else {
                        $_SESSION['RegError'] = "Masukan Data yang dibutuhkan !";
                        header('location: register.php');
                    }

                // ubah informasi akun
                } else if ( $request == 'updtAkun' ) {
                    
                    if ( $_POST['nDepan'] && $_POST['nBelakang'] && $_POST['email'] && $_POST['noTlp'] && $_POST['jk'] && $_POST['username'] && $_POST['idUs'] ) {
                        $cek = $koneksi->query("SELECT * FROM customer INNER JOIN user ON customer.id_user = user.id_user WHERE customer.id_customer = ".$_POST['idCus'] );
                        $data = $cek->fetch_all();

                        if ( $cek == true && count((array)$data) > 0 ) {

                            $idCus = $_POST['idCus'];
                            $idUs = $_POST['idUs'];

                            $depan = preg_replace('/\x00|<[^>]*>?/', '', $_POST['nDepan']);
                            $nDepan = str_replace(["'", '"'], ['&#39;', '&#34;'], $depan);

                            $belakang = preg_replace('/\x00|<[^>]*>?/', '', $_POST['nBelakang']);
                            $nBelakang = str_replace(["'", '"'], ['&#39;', '&#34;'], $belakang);

                            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

                            $tlp = "0". substr($_POST['noTlp'], 4, 3) . substr($_POST['noTlp'], 8, 4) . substr($_POST['noTlp'], 13);

                            $jk = $_POST['jk'];
                            
                            $user = preg_replace('/\x00|<[^>]*>?/', '', $_POST['username']);
                            $username = str_replace(["'", '"'], ['&#39;', '&#34;'], $user);

                            // update customer
                            $update = $koneksi->prepare("UPDATE customer SET nama_depan_customer = ?, nama_belakang_customer = ?, email_cus = ?, jk = ?, no_telp = ? WHERE id_customer = ?");
                            $update->bind_param('ssssss', $nDepan, $nBelakang, $email, $jk, $tlp, $idCus);

                            // update user.username
                            $uUser = $koneksi->prepare("UPDATE user SET user_name = ? WHERE id_user = ?");
                            $uUser->bind_param('ss', $username, $idUs);

                            if ( $update && $uUser ) {

                                $update->execute();
                                $uUser->execute();
                                
                                $_SESSION['updateAkun'] = "Informasi Akun telah diubah !";
                                header('location: informasi-akun.php');
                            } else {
                                $_SESSION['updateAkun'] = "Terjadi Kelasahan !";
                                header('location: informasi-akun.php');
                            }
                        }
                    }


                // change pass
                } else if ( $request == 'cgPass') {
                    if ( $_POST['pSekarang'] && $_POST['pBaru'] && $_POST['rpBaru'] ) {
                        if ( $_POST['pBaru'] == $_POST['rpBaru'] ) {
                            $cek = $koneksi->query("SELECT * FROM user WHERE email = '" . $_POST['email'] . "'");
                            $data = $cek->fetch_all(MYSQLI_ASSOC);

                            if ( $cek == true && count($data) > 0 ) {
                                if ( password_verify( $_POST['pSekarang'], $data[0]['pass'] ) ) {

                                    $pBaru = password_hash($_POST['pBaru'], PASSWORD_DEFAULT);

                                    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

                                    // update pass
                                    $update = $koneksi->prepare("UPDATE user SET pass = ? WHERE email = ?");
                                    $update->bind_param('ss', $pBaru, $email);

                                    if ( $update ) {

                                        $update->execute();

                                        $_SESSION['cPass'] = "Password Berhasil diubah !";
                                        header('location: index.php');
                                    } else {
                                        $_SESSION['cPassE'] = "Terjadi Kesalahan !";
                                        header('location: index.php');
                                    }
                                } else {
                                    $_SESSION['cPass'] = "Password Salah !";
                                    header('location: change-password.php');
                                }
                            }
                        } else {
                            $_SESSION['cPass'] = "Password Baru tidak Sesuai !";
                            header('location: change-password.php');
                        }
                    } else {
                        $_SESSION['cPass'] = "Masukan Data yang dibutuhkan !";
                        header('location: change-password.php');
                    }

                    
                // bookiing
                } else if ( $request == 'booking') {
                    if ( !($_POST['cIn'] == $_POST['cOut']) ) {
                        if ( $_POST['nDepan'] && $_POST['nBelakang'] && $_POST['email'] && $_POST['tlp'] && $_POST['jDewasa'] && $_POST['jAnak']) {
                                if ( $_POST['cIn'] && $_POST['cOut'] ) {

                                    $cek = $koneksi->query("SELECT * FROM cabin WHERE id_cabin  = '" . $_POST['idC'] . "' AND booking = '0'");
                                    $data = $cek->fetch_all(MYSQLI_ASSOC);

                                    if ( $cek == true && count((array)$data) > 0 ) {
                                        // Filter
                                        $cIn = $_POST['cIn'];
                                        $cOut = $_POST['cOut'];

                                        $depan = preg_replace('/\x00|<[^>]*>?/', '', $_POST['nDepan']);
                                        $nDepan = str_replace(["'", '"'], ['&#39;', '&#34;'], $depan);

                                        $belakang = preg_replace('/\x00|<[^>]*>?/', '', $_POST['nBelakang']);
                                        $nBelakang = str_replace(["'", '"'], ['&#39;', '&#34;'], $belakang);

                                        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

                                        $idC = $_POST['idC'];
                                        
                                        $tlp = "0". substr($_POST['tlp'], 4, 3) . substr($_POST['tlp'], 8, 4) . substr($_POST['tlp'], 13);

                                        $stat = '0';

                                        $date1 = new DateTime($cIn);
                                        $date2 = new DateTime($cOut);
                                        $interval = $date1->diff($date2);
                                        $durasi = $interval->days;

                                        $total = $data[0]['harga_cabin'] * $durasi; 

                                        $bayar = '0';

                                        $dewasa = $_POST['jDewasa'];
                                        $anak = $_POST['jAnak'];
                                        
                                        $booking = $koneksi->prepare("INSERT INTO booking (`check_in`,`check_out`,`nama_depan_booking`,`nama_belakang_booking`,`email_booking`,`tlp_booking`,`id_cabin`,`stat_booking`,`total_harga`,`bayar`,`orang_dewasa`,`anak_anak`) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
                                        $booking->bind_param('ssssssssssss', $cIn, $cOut, $nDepan, $nBelakang, $email, $tlp, $idC, $stat, $total, $bayar, $dewasa, $anak);

                                        $uBook = $koneksi->prepare("UPDATE cabin INNER JOIN booking ON cabin.id_cabin = booking.id_cabin SET cabin.booking = '1', cabin.nama_customer = ? WHERE cabin.id_cabin = ?");
                                        $uBook->bind_param('ss', $nDepan, $idC);
                                        
                                        $iUser = $koneksi->prepare("UPDATE booking INNER JOIN user ON booking.email_booking = user.email SET booking.id_user = user.id_user WHERE user.email = ?");
                                        $iUser->bind_param('s', $email);

                                        $iCustomer = $koneksi->prepare("UPDATE booking INNER JOIN customer ON booking.email_booking = customer.email_cus SET booking.id_customer = customer.id_customer WHERE customer.email_cus = ?");
                                        $iCustomer->bind_param('s', $email);

                                        $booked = $koneksi->prepare("UPDATE customer SET id_cabin = ? WHERE email_cus = ?");
                                        $booked->bind_param('ss', $idC, $email);
                                        
                                        include 'bayar.php';
                                        if ( isset($_SERVER['REQUEST_METHOD']) ) {
                                            if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                                                if ( $booking && $uBook && $iUser && $iCustomer && $booked ) {
                                            
                                                    $booking->execute();
                                                    $uBook->execute();
                                                    $iUser->execute();
                                                    $iCustomer->execute();
                                                    $booked->execute();
                    
                                                    $_SESSION['bNot'] = "Cabin No. ".$_POST['noC']." Behasil dibooking, menunggu persetujuan Admin !";
                                                    header('location: index.php');
                                                } else {
                                                    $_SESSION['NotifErr'] = "Cabin tidak Terbooking !";
                                                    header('location: index.php');
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    $_SESSION['bNot'] = "Silahkan masukkan Tanggal Check In & Check Out";
                                    header('location: cabin.php?id_cabin='.$_POST['idC']);
                                }
                        } else {
                            $_SESSION['bNot'] = "Silahkan isi Form Terlebihdahulu";
                            if ( $_POST['cIn'] && $_POST['cOut'] ) {
                                header('location: cabin.php?id_cabin='.$_POST['idC'].'&Check_In='.$_POST['cIn'].'&Check_Out='.$_POST['cOut']);
                            } else {
                                header('location: cabin.php?id_cabin='.$_POST['idC']);
                            }
                        }
                    } else {
                        $_SESSION['bNot'] = "Tidak bisa booking di hari yang sama";
                        header('location: cabin.php?id_cabin='.$_POST['idC'].'&Check_In='.$_POST['cIn'].'&Check_Out=');
                    }
                } else {
                    $_SESSION['ErFungsi'] = "Terjadi Kesalahan !";
                    header('location: index.php');
                }
            }

        } else {
            echo "METHOD IN NOT POST";
            header('location: index.php');
        }
    } else {
        echo "REQUEST_METHOD NULL";
        header('location: index.php');
    }
} else {
    echo "NO RESPONSE";
    header('location: index.php');
}
?>