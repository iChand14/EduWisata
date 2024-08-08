    <!-- Table User -->
    <!-- Modal Edit User -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h3 class="modal-title text-white" id="editUserModalLabel">Edit Role User</h3>
                </div>

                <form action="action.php" method="GET">

                <div class="modal-body">

                    <input type="hidden" name="action" value="edit">
                    
                    <input type="hidden" name="table" value="user">

                    <input type="hidden" name="id" id="editID">

                    <div class="form-grup mb-2">
                        <label class="text-dark fs-6 mb-1" for="editUsername">Username</label>
                        <input type="text" class="form-control" id="editUsername" readonly>
                    </div>
                    <div class="form-grup mb-2">
                        <label class="text-dark fs-6 mb-1" for="editEmail"> Email </label>
                        <input type="text" class="form-control" id="editEmail" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="text-dark fs-6">Role</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input editStat" name="stat_user" type="radio" value="0" id="editAdmin">
                        <label class="form-check-label" for="editAdmin">
                            <span class="badge bg-primary">Admin</span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input editStat" name="stat_user" type="radio" value="1" id="editKasir">
                        <label class="form-check-label" for="editKasir">
                            <span class="badge bg-warning">Kasir</span>
                        </label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input editStat" name="stat_user" type="radio" value="2" id="editCustomer">
                        <label class="form-check-label" for="editCustomer">
                            <span class="badge bg-success">Customer</span>
                        </label>
                    </div> 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning text-white">Edit</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Modal Edit User -->

    <!-- Modal Delete User -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h3 class="modal-title text-white" id="deleteUserModalLabel">Delete</h3>
                </div>

                <form action="action.php" method="GET">

                <div class="modal-body">

                    <input type="hidden" name="action" value="delete">
                    
                    <input type="hidden" name="table" value="user">

                    <input type="hidden" name="id" id="deleteUserID">

                    <label class="text-dark fs-5 mb-3">Apakah anda ingin menghapus User dengan <br/>
                    Data sebagai berikut : </label>

                    <div class="form-input mb-2">
                        <label class="text-dark fs-6 mb-1" for="deleteUsername">Username</label>
                        <input type="text" class="form-control" id="deleteUsername" disabled>
                    </div>
                    <div class="form-input mb-2">
                        <label class="text-dark fs-6 mb-1" for="deleteEmail">Email</label>
                        <input type="text" class="form-control" id="deleteEmail" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="text-dark fs-6">Role</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input editStat" type="radio" value="0" id="deleteAdmin" disabled>
                        <label class="form-check-label" for="deleteAdmin">
                            <span class="badge bg-primary">Admin</span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input editStat" type="radio" value="1" id="deleteKasir" disabled>
                        <label class="form-check-label" for="deleteKasir">
                            <span class="badge bg-warning">Kasir</span>
                        </label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input editStat" type="radio" value="2" id="deleteCustomer" disabled>
                        <label class="form-check-label" for="deleteCustomer">
                            <span class="badge bg-success">Customer</span>
                        </label>
                    </div> 
 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Modal Delete User -->
    <!-- Table User -->

    <!-- Table Booking -->
    <!-- Modal Batal -->
    <div class="modal fade" id="batalBookingModal" tabindex="-1" aria-labelledby="batalBookingModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h3 class="modal-title text-white" id="batalBookingModalLabel">Batalkan Status Pembayaran</h3>
                </div>

                <form action="action.php" method="GET">

                <div class="modal-body">

                    <input type="hidden" name="action" value="batal">
                    
                    <input type="hidden" name="table" value="booking">

                    <input type="hidden" name="id" id="batalID">

                    <p>Klik "Ya" untuk Merubah Status <span class="badge bg-success">Sudah dibayar</span> menjadi <span class="badge bg-danger">Belum dibayar</span></p>
 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Modal Batal -->

    <!-- Modal Bayar -->
    <div class="modal fade" id="bayarBookingModal" tabindex="-1" aria-labelledby="bayarBookingModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h3 class="modal-title text-white" id="bayarBookingModalLabel">Bayar Status Pembayaran</h3>
                </div>

                <form action="action.php" method="GET">

                <div class="modal-body">

                    <input type="hidden" name="action" value="bayar">
                    
                    <input type="hidden" name="table" value="booking">

                    <input type="hidden" name="id" id="bayarID">

                    <p class="text-dark fw-semibold">Data Booking</p>

                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <div class="form-input">
                                <label for="nDepan" class="text-dark fs-6 mb-1">Nama Customer</label>
                                <input type="text" class="form-control" id="nDepanBayar" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-input">
                                <label for="nBelakang" class="text-dark fs-6 mb-1">Nama Belakang</label>
                                <input type="text" class="form-control" id="nBelakangBayar" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-input mb-3">
                        <label for="emailCus" class="text-dark fs-6 mb-1">Email</label>
                        <input type="text" class="form-control" id="emailCusBayar" readonly />
                    </div>
                    <div class="form-input mb-3">
                        <label for="tlpCus" class="text-dark fs-6 mb-1">No. Tlp</label>
                        <input type="text" class="form-control" id="tlpCusBayar" readonly />
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md-4">
                            <label for="noCabin" class="text-dark fs-6 mb-1">No Cabin</label>
                            <input type="text" class="form-control" id="noCabinBayar" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="cIn" class="text-dark fs-6 mb-1">Check In</label>
                            <input type="text" class="form-control" id="cInBayar" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="cOut" class="text-dark fs-6 mb-1">Check Out</label>
                            <input type="text" class="form-control" id="cOutBayar" readonly>
                        </div>
                    </div>
                    
                    <hr>

                    <p>Jika Customer Sudah Memberikan Bukti Pembayaran, <br />
                    Klik "Ya" untuk Merubah Status <span class="badge bg-danger">Belum dibayar</span> menjadi <span class="badge bg-success">Sudah dibayar</span></p>
 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Ya</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Modal Bayar -->

    <!-- Modal Check Out -->
    <div class="modal fade" id="cOutBookingModal" tabindex="-1" aria-labelledby="cOutBookingModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h3 class="modal-title text-white" id="cOutBookingModalLabel">Check Out</h3>
                </div>

                <form action="action.php" method="GET">

                <div class="modal-body">

                    <input type="hidden" name="action" value="check_out">
                    
                    <input type="hidden" name="table" value="booking">

                    <input type="hidden" name="id" id="cOutID">

                    <p>Klik "Check Out" untuk Merubah Status <span class="badge bg-secondary">Ditempati</span> menjadi <span class="badge bg-success">Selesai</span></p>

 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary">Check Out</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Modal Check Out -->

    <!-- Modal Check In -->
    <div class="modal fade" id="cInBookingModal" tabindex="-1" aria-labelledby="cInBookingModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title text-white" id="cInBookingModalLabel">Check In</h3>
                </div>

                <form action="action.php" method="GET">

                <div class="modal-body">

                    <input type="hidden" name="action" value="check_in">
                    
                    <input type="hidden" name="table" value="booking">

                    <input type="hidden" name="id" id="cInID">

                    <p class="text-dark fw-semibold">Data Booking</p>

                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <div class="form-input">
                                <label for="nDepan" class="text-dark fs-6 mb-1">Nama Customer</label>
                                <input type="text" class="form-control" id="nDepanIn" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-input">
                                <label for="nBelakang" class="text-dark fs-6 mb-1">Nama Belakang</label>
                                <input type="text" class="form-control" id="nBelakangIn" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-input mb-3">
                        <label for="emailCus" class="text-dark fs-6 mb-1">Email</label>
                        <input type="text" class="form-control" id="emailCusIn" readonly />
                    </div>
                    <div class="form-input mb-3">
                        <label for="tlpCus" class="text-dark fs-6 mb-1">No. Tlp</label>
                        <input type="text" class="form-control" id="tlpCusIn" readonly />
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md-4">
                            <label for="noCabin" class="text-dark fs-6 mb-1">No Cabin</label>
                            <input type="text" class="form-control" id="noCabinIn" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="cIn" class="text-dark fs-6 mb-1">Check In</label>
                            <input type="text" class="form-control" id="cInIn" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="cOut" class="text-dark fs-6 mb-1">Check Out</label>
                            <input type="text" class="form-control" id="cOutIn" readonly>
                        </div>
                    </div>

                    <p>Klik "Check Out" untuk Merubah Status <span class="badge bg-primary">Booked</span> menjadi <span class="badge bg-secondary">Ditempati</span></p>
 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Check In</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Modal Check In -->

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteBookingModal" tabindex="-1" aria-labelledby="deleteBookingModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h3 class="modal-title text-white" id="deleteBookingModalLabel">Delete</h3>
                </div>

                <form action="action.php" method="GET">

                <div class="modal-body">

                    <input type="hidden" name="action" value="delete">
                    
                    <input type="hidden" name="table" value="booking">

                    <input type="hidden" name="id" id="deleteBookingID">

                    <p class="text-dark fw-semibold">Data Booking</p>

                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <div class="form-input">
                                <label for="nDepan" class="text-dark fs-6 mb-1">Nama Customer</label>
                                <input type="text" class="form-control" id="nDepanDelete" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-input">
                                <label for="nBelakang" class="text-dark fs-6 mb-1">Nama Belakang</label>
                                <input type="text" class="form-control" id="nBelakangDelete" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md-4">
                            <label for="noCabin" class="text-dark fs-6 mb-1">No Cabin</label>
                            <input type="text" class="form-control" id="noCabinDelete" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="cIn" class="text-dark fs-6 mb-1">Check In</label>
                            <input type="text" class="form-control" id="cInDelete" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="cOut" class="text-dark fs-6 mb-1">Check Out</label>
                            <input type="text" class="form-control" id="cOutDelete" readonly>
                        </div>
                    </div>

                    <p>Apakah Anda Yakin Akan Menghapus Data Tersebut ?</p>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Modal Delete -->

    <!-- Modal Edit -->
    <div class="modal fade" id="editBookingModal" tabindex="-1" aria-labelledby="editBookingModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-edu">
                    <h3 class="modal-title text-white" id="editBookingModalLabel">Edit</h3>
                </div>

                <form action="action.php" method="GET">

                <div class="modal-body">

                    <input type="hidden" name="action" value="edit">
                    
                    <input type="hidden" name="table" value="booking">

                    <input type="hidden" name="id" id="editBookingID">

                    <p class="text-dark fw-semibold">Data Booking</p>

                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <div class="form-input">
                                <label for="nDepan" class="text-dark fs-6 mb-1">Nama Customer</label>
                                <input type="text" class="form-control" id="nDepanEdit" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-input">
                                <label for="nBelakang" class="text-dark fs-6 mb-1">Nama Belakang</label>
                                <input type="text" class="form-control" id="nBelakangEdit" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="text-dark fs-6">Bayar</label>
                    </div>
                    <div class="form-check form-check-inline mb-3">
                        <input class="form-check-input editStat" type="radio" name="bayar_booking" value="1" id="editBayar">
                        <label class="form-check-label" for="editBayar">
                            <span class="badge bg-success">Sudah Dibayar</span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input editStat" type="radio" name="bayar_booking" value="0" id="editBelum">
                        <label class="form-check-label" for="editBelum">
                            <span class="badge bg-danger">Belum Dibayar</span>
                        </label>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <label for="cIn" class="text-dark fs-6 mb-1">Check In</label>
                            <input type="text" class="form-control" id="cInEdit" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="cOut" class="text-dark fs-6 mb-1">Check Out</label>
                            <input type="text" class="form-control" id="cOutEdit" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="text-dark fs-6">Status</label>
                    </div>
                    <div class="form-check form-check-inline mb-3">
                        <input class="form-check-input editStat" type="radio" name="stat_booking" value="2" id="editSelesai">
                        <label class="form-check-label" for="editSelesai">
                            <span class="badge bg-success">Selesai</span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input editStat" type="radio" name="stat_booking" value="1" id="editTempati">
                        <label class="form-check-label" for="editTempati">
                            <span class="badge bg-secondary">Ditempati</span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input editStat" type="radio" name="stat_booking" value="0" id="editBooked">
                        <label class="form-check-label" for="editBooked">
                            <span class="badge bg-primary">Booked</span>
                        </label>
                    </div>

                    

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-edu">Edit</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    <!-- Table Booking -->

    <!-- Table Cabin -->
    <!-- Modal Add -->
    <div class="modal fade" id="addCabinModal" tabindex="-1" aria-labelledby="addCabinModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title text-white" id="addCabinModalLabel">Tambah Cabin</h3>
                </div>

                <form action="action.php" method="GET">

                <div class="modal-body">

                    <input type="hidden" name="action" value="add">
                    
                    <input type="hidden" name="table" value="cabin">

                    <p class="text-dark fw-semibold">Masukan Data Cabin</p>

                    <div class="form-input mb-3">
                        <label for="noC" class="text-dark fs-6 m-1">No Cabin</label>
                        <input type="text" class="form-control" name="no_cabin" id="noC">
                    </div>
                    <div class="form-input mb-3">
                        <label for="hargaC" class="text-dark fs-6 m-1">Harga Cabin</label>
                        <input type="text" class="form-control" name="harga_cabin" id="hargaC">
                    </div>
 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Modal Add -->

    <!-- Modal Edit -->
    <div class="modal fade" id="editCabinModal" tabindex="-1" aria-labelledby="editCabinModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-edu">
                    <h3 class="modal-title text-white" id="editCabinModalLabel">Edit Cabin</h3>
                </div>

                <form action="action.php" method="GET">

                <div class="modal-body">

                    <input type="hidden" name="action" value="edit">
                    
                    <input type="hidden" name="table" value="cabin">

                    <input type="hidden" name="id" id="editCabinID">

                    <p class="text-dark fw-semibold">Data Cabin</p>

                    <div class="form-input mb-3">
                        <label for="noCabin" class="text-dark fs-6 m-1">No Cabin</label>
                        <input type="text" class="form-control" name="no_cabin" id="noCabin">
                    </div>
                    <div class="form-input mb-3">
                        <label for="hargaCabin" class="text-dark fs-6 m-1">Harga Cabin</label>
                        <input type="text" class="form-control" name="harga_cabin" id="hargaCabin">
                    </div>
 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-edu">Edit</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteCabinModal" tabindex="-1" aria-labelledby="deleteCabinModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h3 class="modal-title text-white" id="deleteCabinModalLabel">Delete Cabin</h3>
                </div>

                <form action="action.php" method="GET">

                <div class="modal-body">

                    <input type="hidden" name="action" value="delete">
                    
                    <input type="hidden" name="table" value="cabin">

                    <input type="hidden" name="id" id="deleteCabinID">

                    <p class="text-dark fw-semibold">Apakah Anda yakin untuk Menghapus Cabin Nomor <span class="badge bg-success" id="NomorCabin"></span> ?</p>
 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Modal Delete -->
    <!-- Table Cabin -->