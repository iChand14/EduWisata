<?php
require_once 'database/config.php';

session_start();

if ( isset( $_SERVER ) ) {
    if ( isset( $_SERVER['REQUEST_METHOD'] ) ) {
        if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
            if ( isset($_GET) ) {

                // action from action=
                $action = $_GET['action'];

                // table from table=
                $table = $_GET['table'];

                // tabel BOOKING
                if ( $table == 'booking') {

                    // bayar
                    if ( $action == 'bayar' ) {
                        
                        $cek = $koneksi->query("SELECT * FROM booking WHERE id_booking ='".$_GET['id']."' ");
                        $data = $cek->fetch_all(MYSQLI_ASSOC);

                        if ( $cek == true && count($data) > 0 ) {

                            $yes = '1';

                            $bayar = $koneksi->prepare("UPDATE booking SET bayar = ? WHERE id_booking = '".$_GET['id']."' ");
                            $bayar->bind_param('s', $yes);

                            if ( $bayar ) {
                                $bayar->execute();

                                $_SESSION['succ'] = "Atas Nama : <strong>".$data[0]['nama_depan_booking']." ".$data[0]['nama_belakang_booking']."</strong> , Sudah dibayar !";
                                header('location: booking-list.php');
                            } else {
                                $_SESSION['err'] = "Status tidak berubah !";
                                header('location: booking-list.php');
                            }
                        }

                    // batal bayar
                    } else if ( $action == 'batal' ) {

                        $cek = $koneksi->query("SELECT * FROM booking WHERE id_booking ='".$_GET['id']."' ");
                        $data = $cek->fetch_all(MYSQLI_ASSOC);

                        if ( $cek == true && count($data) > 0 ) {

                            $yes = '0';

                            $batal_bayar = $koneksi->prepare("UPDATE booking SET bayar = ? WHERE id_booking = '".$_GET['id']."' ");
                            $batal_bayar->bind_param('s', $yes);

                            if ( $batal_bayar ) {
                                $batal_bayar->execute();

                                $_SESSION['succ'] = "Atas Nama : <strong>".$data[0]['nama_depan_booking']." ".$data[0]['nama_belakang_booking']."</strong> , Pembayaran dibatalkan !";
                                header('location: booking-list.php');
                            } else {
                                $_SESSION['err'] = "Status tidak berubah !";
                                header('location: booking-list.php');
                            }
                        }

                    // check in
                    } else if ( $action == 'check_in' ) {

                        $cek = $koneksi->query("SELECT * FROM booking WHERE id_booking ='".$_GET['id']."' ");
                        $data = $cek->fetch_all(MYSQLI_ASSOC);

                        if ( $cek == true && count($data) > 0 ) {

                            $yes = '1';

                            $check_in = $koneksi->prepare("UPDATE booking SET stat_booking = ? WHERE id_booking = '".$_GET['id']."' ");
                            $check_in->bind_param('s', $yes);
                            
                            $id = $_GET['id'];

                            $iCabin = $koneksi->prepare("UPDATE cabin INNER JOIN booking ON cabin.id_cabin = booking.id_cabin SET cabin.booking = '2' WHERE booking.id_booking = ?");
                            $iCabin->bind_param('s', $id);
                            var_dump($iCabin);

                            if ( $check_in && $iCabin ) {
                                $check_in->execute();
                                $iCabin->execute();

                                $_SESSION['succ'] = "Atas Nama : <strong>".$data[0]['nama_depan_booking']." ".$data[0]['nama_belakang_booking']."</strong> , Telah melakukan Check In !";
                                header('location: booking-list.php');
                            } else {
                                $_SESSION['err'] = "Status tidak berubah !";
                                header('location: booking-list.php');
                            }
                        }

                    // check out
                    } else if ( $action == 'check_out' ) {
                        
                        $cek = $koneksi->query("SELECT * FROM booking WHERE id_booking ='".$_GET['id']."' ");
                        $data = $cek->fetch_all(MYSQLI_ASSOC);

                        if ( $cek == true && count($data) > 0 ) {

                            $yes = '2';

                            $check_out = $koneksi->prepare("UPDATE booking SET stat_booking = ? WHERE id_booking = '".$_GET['id']."' ");
                            $check_out->bind_param('s', $yes);
                            
                            $id = $_GET['id'];

                            $sCustomer = $koneksi->prepare("UPDATE customer INNER JOIN booking ON customer.id_customer = booking.id_customer SET customer.id_cabin = NULL WHERE booking.id_booking = ?");
                            $sCustomer->bind_param('s', $id);

                            $sCabin = $koneksi->prepare("UPDATE cabin INNER JOIN booking ON cabin.id_cabin = booking.id_cabin SET cabin.booking = '0', cabin.nama_customer = NULL WHERE booking.id_booking = ?");
                            $sCabin->bind_param('s', $id);

                            if ( $check_out && $sCustomer && $sCabin ) {
                                $check_out->execute();
                                $sCustomer->execute();
                                $sCabin->execute();

                                $_SESSION['succ'] = "Atas Nama : <strong>".$data[0]['nama_depan_booking']." ".$data[0]['nama_belakang_booking']."</strong> , Telah melakukan Check Out !";
                                header('location: booking-list.php');
                            } else {
                                $_SESSION['err'] = "Status tidak berubah !";
                                header('location: booking-list.php');
                            }
                        }

                    // delete
                    } else if ( $action == 'delete' ) {
                        
                        $cek = $koneksi->query("SELECT * FROM booking WHERE id_booking ='".$_GET['id']."' ");
                        $data = $cek->fetch_all(MYSQLI_ASSOC);

                        if ( $cek == true && count($data) > 0 ) {

                            $id = $_GET['id'];

                            $delete = $koneksi->prepare("DELETE FROM booking WHERE id_booking = ?");
                            $delete->bind_param('s', $id);

                            if ( $delete ) {
                                $delete->execute();

                                $_SESSION['succ'] = "Data telah dihapus !";
                                header('location: booking-list.php');
                            } else {
                                $_SESSION['err'] = "Data tidak dihapus !";
                                header('location: booking-list.php');
                            }
                        }

                    } else if ( $action == 'edit' ) {

                        $cek = $koneksi->query("SELECT * FROM booking WHERE id_booking ='".$_GET['id']."' ");
                        $data = $cek->fetch_all(MYSQLI_ASSOC);

                        if ( $cek == true && count($data) > 0 ) {

                            $id = $_GET['id'];
                            $bayar = $_GET['bayar_booking'];
                            $stat = $_GET['stat_booking'];

                            $restore = $koneksi->prepare("UPDATE booking SET bayar = ?, stat_booking = ? WHERE id_booking = ?");
                            $restore->bind_param('sss', $bayar, $stat, $id);

                            if ( $restore ) {
                                $restore->execute();

                                $_SESSION['succ'] = " Data Atas Nama : <strong>".$data[0]['nama_depan_booking']." ".$data[0]['nama_belakang_booking']."</strong> , telah diubah !";
                                header('location: booking-list.php');
                            } else {
                                $_SESSION['err'] = "Data tidak teredit !";
                                header('location: booking-list.php');
                            }
                        }
                    } else {
                        $_SESSION['err'] = "Terjadi Kesalahan !";
                        header('location: index.php');
                    }

                // table USER
                } else if ( $table == 'user' ) {

                    // edit
                    if ( $action == 'edit' ) {

                        $cek = $koneksi->query("SELECT * FROM user WHERE id_user ='".$_GET['id']."' ");
                        $data = $cek->fetch_all(MYSQLI_ASSOC);

                        if ( $cek == true && count($data) > 0 ) {

                            $id = $_GET['id'];
                            $sU = $_GET['stat_user'];

                            $editUser = $koneksi->prepare("UPDATE user SET stat_user = ? WHERE id_user = ?");
                            $editUser->bind_param('ss', $sU, $id);

                            if ( $editUser ) {
                                $editUser->execute();

                                $_SESSION['succ'] = " Role dengan username : <strong>".$data[0]['user_name']."</strong> , telah diubah !";
                                header('location: data-user.php');
                            } else {
                                $_SESSION['err'] = "Data tidak terubah !";
                                header('location: data-user.php');
                            }
                        }

                    // delete
                    } else if ( $action == 'delete' ) {

                        $cek1 = $koneksi->query("SELECT * FROM user WHERE id_user ='".$_GET['id']."' ");
                        $data1 = $cek1->fetch_all(MYSQLI_ASSOC);

                        if ( $cek1 == true && count($data1) > 0 ) {

                            $id = $_GET['id'];

                            $deletUser = $koneksi->prepare("DELETE FROM user WHERE id_user = ?");
                            $deletUser->bind_param('s', $id);

                            if ( $deletUser ) {
                                
                                $cek2 = $koneksi->query("SELECT * FROM customer WHERE id_user = ".$id);
                                $data2 = $cek2->fetch_all(MYSQLI_ASSOC);
                                
                                if ( $cek2 == true && count($data2) > 0 ) {
                                    $deleteCustomer = $koneksi->prepare("DELETE FROM customer WHERE id_user = ?");
                                    $deleteCustomer->bind_param('s', $id);

                                    if ( $deleteCustomer ) {
                                        $deleteCustomer->execute();
                                        $deletUser->execute();
                                    }
                                } else {
                                    $deletUser->execute();
                                }
                                
                                $_SESSION['succ'] = " User telah dihapus !";
                                header('location: data-user.php');
                            } else {
                                $_SESSION['err'] = "User tidak terhapus !";
                                header('location: data-user.php');
                            }
                        }

                    } else {
                        $_SESSION['err'] = "Terjadi Kesalahan !";
                        header('location: index.php');
                    }

                // Table CABIN
                } else if ( $table == 'cabin' ) {

                    // Add
                    if ( $action == 'add') {

                        if ( $_GET['no_cabin'] && $_GET['harga_cabin'] ) {

                            $cek = $koneksi->query("SELECT * FROM cabin WHERE no_cabin = '".$_GET['no_cabin']."' ");
                            $data = $cek->fetch_all(MYSQLI_ASSOC);

                            if ( $cek == true && count($data) == 0 ) {

                                $noC = $_GET['no_cabin'];
                                $book = '0';
                                $hargaC = $_GET['harga_cabin'];

                                $addCabin = $koneksi->prepare("INSERT INTO cabin(`no_cabin`,`booking`,`harga_cabin`) VALUE (?, ?, ?)");
                                $addCabin->bind_param('sss', $noC, $book, $hargaC);

                                if ( $addCabin ) {
                                    $addCabin->execute();

                                    $_SESSION['succ'] = "Data cabin telah ditambahkan !";
                                    header('location: data-cabin.php');
                                } else {
                                    $_SESSION['err'] = "Data tidak tertambahkan !";
                                    header('location: data-cabin.php');
                                }
                            } else {
                                $_SESSION['err'] = "Nomor Cabin sudah Ada !";
                                header('location: data-cabin.php');
                            }
                        } else {
                            $_SESSION['err'] = "Form tambah Cabin tidak boleh kosong";
                            header('location: data-cabin.php');
                        }

                    // Edit
                    } else if ( $action == 'edit' ) {

                        $cek = $koneksi->query("SELECT * FROM cabin WHERE no_cabin ='".$_GET['id']."' ");
                        $data = $cek->fetch_all(MYSQLI_ASSOC);

                        if ( $cek == true && count($data) > 0 ) {

                            $id = $_GET['id'];
                            $noC = $_GET['no_cabin'];
                            $hargaC = $_GET['harga_cabin'];

                            $editCabin = $koneksi->prepare("UPDATE cabin SET no_cabin = ?, harga_cabin = ? WHERE id_cabin = ?");
                            $editCabin->bind_param('sss', $noC, $hargaC, $id);

                            if ( $editCabin ) {
                                $editCabin->execute();

                                $_SESSION['succ'] = "Data cabin telah diubah !";
                                header('location: data-cabin.php');
                            } else {
                                $_SESSION['err'] = "Data tidak terubah !";
                                header('location: data-cabin.php');
                            }
                        } else {
                            $_SESSION['err'] = "Tidak bisa Mengubah, karena Terdapat Nomor Cabin yang sama !";
                            header('location: data-cabin.php');
                        }

                    // Delete
                    } else if ( $action == 'delete' ) {

                        $cek = $koneksi->query("SELECT * FROM cabin WHERE no_cabin = '".$_GET['no_cabin']."' ");
                        $data = $cek->fetch_all(MYSQLI_ASSOC);

                        if ( $cek == true && count($data) > 0 ) {

                            $id = $_GET['id'];

                            $addCabin = $koneksi->prepare("DELETE FROM cabin WHERE id_cabin = ?");
                            $addCabin->bind_param('s', $id);

                            if ( $addCabin && $data[0]['booking'] == '0' && $data[0]['nama_customer'] == NULL ) {
                                $addCabin->execute();

                                $_SESSION['succ'] = "Data cabin telah dihapus !";
                                header('location: data-cabin.php');
                            } else if ( $addCabin && $data[0]['booking'] !== '0' && $data[0]['nama_customer'] !== NULL ) {
                                $_SESSION['err'] = "Cabin sedang dibooking, Data tidak terhapus !";
                                header('location: data-cabin.php');
                            } else {
                                $_SESSION['err'] = "Data tidak terhapus !";
                                header('location: data-cabin.php');
                            }
                        }
                    }
                }
            }
        } else {
            echo "METHOD IN NOT GET";
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