// Fungsi Durasi saat memilih durasi
function autoDurasi(value) {
  // Ambil Tanggal Check-In
  const ChekhIn = new Date(document.getElementById('CheckIn').value);

  var index = {
    1: 1, // value 1 = 1 hari
    2: 2,
    3: 3,
    4: 4,
    5: 5,
    6: 6,
    7: 7,
    8: 8,
    9: 9,
    10: 10,
    11: 11,
    12: 12,
    13: 13,
    14: 14, // value 14 = 14 hari
  };

  // Menambahkan Hari dari Durasi
  ChekhIn.setDate(ChekhIn.getDate() + index[value]);

  // Ambil data Hari - Bulan - Tahun
  const hari = '0' + ChekhIn.getDate();
  const bulan = '0' + (ChekhIn.getMonth() + 1);
  const tahun = ChekhIn.getFullYear();

  // console.log(hari) + console.log(bulan) + console.log(tahun);

  // Menyusun ke Format YYYY-MM-DD
  const CheckOut = tahun + '-' + bulan.slice(-2) + '-' + hari.slice(-2);

  // console.log(CheckOut);

  // Memasukan Hasil ke Check-Out
  document.getElementById('CheckOut').setAttribute('value', CheckOut);
}
