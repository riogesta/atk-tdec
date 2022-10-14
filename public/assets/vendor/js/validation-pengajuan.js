// merubah tombol 'simpan' pada 'modal tambah akun' menajadi 'disabled'
let btnTambahPengajuan = document.querySelector("button[data-bs-target='#tambahPengajuan']");
let btnSimpan = document.querySelector("button#simpanPengajuan");

btnTambahPengajuan.addEventListener('click', () => {
   btnSimpan.setAttribute('disabled', true);
})

// tombol hanya dapat di klik jika semua validasi benar
let enableButton = () => {

   if (inputJumlah.value.length < 0 || inputJumlah.value == '') {
      return btnSimpan.setAttribute('disabled', true);
   } else if (inputJumlah.classList.contains('is-invalid') || selectBarang.classList.contains('is-invalid')) {
      return btnSimpan.setAttribute('disabled', true);
   } else {
      return btnSimpan.removeAttribute('disabled');
   }

}

// jumlah validation
let jumlahValidation = document.querySelector("div.invalid-feedback.jumlah");
let inputJumlah = document.querySelector("input[type='number']#jumlah");
jumlahValidation.style.display = 'none';

// logic
inputJumlah.addEventListener('input', () => {
   if (inputJumlah.value > 0) {
      jumlahValidation.style.display = 'none';
      inputJumlah.classList.remove('is-invalid');
      enableButton();
   } else {
      jumlahValidation.style.display = 'block';
      jumlahValidation.innerHTML = 'Masukan jumlah minimal 1 atau lebih!';
      inputJumlah.classList.add('is-invalid');
      enableButton();
   }
})

// barang validation
let barangValidation = document.querySelector("div.invalid-feedback.barang");
let selectBarang = document.querySelector("select#selectBarang");
barangValidation.style.display = 'none';

$("select#selectBarang").on("change", function () {
   $("input#satuan").val($(this).find(':selected').attr('data-satuan'));

   let valueOfSelectedBarang = $(this).find(':selected').val();

   if (valueOfSelectedBarang == '') {
      barangValidation.style.display = 'block';
      barangValidation.innerHTML = 'Pilihan tidak boleh kosong!'
      selectBarang.classList.add('is-invalid');
      enableButton();
   } else {
      barangValidation.style.display = 'none';
      selectBarang.classList.remove('is-invalid');
      enableButton(valueOfSelectedBarang);

   }
})