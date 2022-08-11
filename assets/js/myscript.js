const flashData = $('.flash-data').data('flashdata');
const flashData1 = $('.flash-dataError').data('flashdatax');

if (flashData) {
    Swal.fire({
        title: 'Data ',
        text: 'Berhasil ' + flashData,
        icon: 'success'
    });
}
if (flashData1) {
    Swal.fire({
        title: 'Data ',
        text: 'Gagal ' + flashData1,
        icon: 'error'
    });
}

// tombol-hapus
$('.tombol-cancel').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin',
        text: "data akan di hapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'YA!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});


$('.tombol-active').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin',
        text: "data akan di NON-ACTIVE kan",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'YA!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

$('.tombol-deactive').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin',
        text: "data akan di ACTIVE kan",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'YA!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});





/* Tanpa Rupiah */
var tanpa_rupiah = document.getElementById('tanpa-rupiah');
tanpa_rupiah.addEventListener('keyup', function(e)
{
    tanpa_rupiah.value = formatRupiah(this.value);
});

var tanpa_rupiahB = document.getElementById('tanpa-rupiah-B');
tanpa_rupiahB.addEventListener('keyup', function(e)
{
    tanpa_rupiahB.value = formatRupiah(this.value);
});

/* Fungsi */
function formatRupiah(angka, prefix)
{
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split    = number_string.split(','),
        sisa     = split[0].length % 3,
        rupiah     = split[0].substr(0, sisa),
        ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
        
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
