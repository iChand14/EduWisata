<script src="js/script.js"></script>
<!-- <script src="jQuery/jquery.dataTable.min.js"></script> -->

<script type="text/javascript">
    // Toast / Notification
    const toast = document.querySelector('.cus-toast'),
          iconClose = document.querySelector('.close'),
          progress = document.querySelector('.progress-bar');

    // Menghilangkan notif di login.php
    if ( $('#notLogin').is(':visible')) {
        setTimeout(function () {
            $('#notLogin').fadeOut(300);
        }, 2000);
    }

    // Menghilangkan notif di register.php
    if ( $('#notReg').is(':visible')) {
        setTimeout(function () {
            $('#notReg').fadeOut(300).hide(300);
        }, 2000);
    }

    // Menghilangkan notif di index.php
    if ($('.cus-toast').is(':visible')) {
    setTimeout(function () {
        $('.cus-toast').fadeOut(500);
    }, 5300);
    setTimeout(() => {
        toast.classList.remove('active');
    }, 5000);
    setTimeout(() => {
        progress.classList.remove('active');
    }, 5300);
    }

    // Input Nomor HP
    $('#noTelp').mask('+62 000-0000-00000');

    $('#noTelp').on('input propertychange paste', function (e) {
        var val = $(this).val();
        if(val == "+62") {
            $(this).val("");
        }
        if(val == "+62 0") {
            $(this).val("+62 ");
        }
    });

    // datatable
    // data customer
    new DataTable('#dataTable2', {
        autoWidth: false,
        responsive:[
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 },
        {
            details: {
                type: 'column',
                targets: 1
            }
        },
        ] ,
        columnDefs: [ {
            className: 'dtr-control',
            orderable: false,
            targets:   0
        } ],
        language: {
            decimal:        "",
            emptyTable:     "Akun ini Belum Pernah Booking",
            info:           "Menampilkan _START_ sampai _END_ dari _TOTAL_ Data",
            infoEmpty:      "Menampilkan 0 sampai 0 dari 0 Data",
            infoFiltered:   "(difilter dari _MAX_ total Data)",
            infoPostFix:    "",
            thousands:      ",",
            lengthMenu:     "Menampilkan _MENU_ Data",
            loadingRecords: "Memuat...",
            processing:     "",
            search:         "Cari:",
            zeroRecords:    "Data Tidak ada yang Cocok",
            paginate: {
                first:      "Awal",
                last:       "Akhir",
                next:       "Selanjutnya",
                previous:   "Sebelumnya"
            }
        }
    });
    // data booking
    new DataTable('#dataTable', {
        autoWidth: false,
        responsive:[
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 },
        {
            details: {
                type: 'column',
                targets: 1
            }
        },
        ] ,
        columnDefs: [ {
            className: 'dtr-control',
            orderable: false,
            targets:   0
        } ],
        order: [ 1, 'asc' ],
        language: {
            decimal:        "",
            emptyTable:     "Akun ini Belum Pernah Booking",
            info:           "Menampilkan _START_ sampai _END_ dari _TOTAL_ Data",
            infoEmpty:      "Menampilkan 0 sampai 0 dari 0 Data",
            infoFiltered:   "(difilter dari _MAX_ total Data)",
            infoPostFix:    "",
            thousands:      ",",
            lengthMenu:     "Menampilkan _MENU_ Data",
            loadingRecords: "Memuat...",
            processing:     "",
            search:         "Cari:",
            zeroRecords:    "Data Tidak ada yang Cocok",
            paginate: {
                first:      "Awal",
                last:       "Akhir",
                next:       "Selanjutnya",
                previous:   "Sebelumnya"
            }
        },
    });

</script>