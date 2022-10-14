// merubah tombol 'simpan' pada 'modal tambah akun' menajadi 'disabled'
let btn = document.querySelector("button#simpan");

// tombol hanya dapat di klik jika semua validasi benar
let enableButton = () => {

   if (inputUsername.value.length < 4 || inputPassword.value.length < 4 || selectUnitProdi.value ==
      '') {
      return btn.setAttribute('disabled', true);
   } else if (inputUsername.classList.contains('is-invalid') || inputPassword.classList.contains('is-invalid')) {
      return btn.setAttribute('disabled', true);
   } else {
      return btn.removeAttribute('disabled');
   }

}

// username validation
let usernameValidation = document.querySelector("div.invalid-feedback.username");
let inputUsername = document.querySelector("input#username");
usernameValidation.style.display = 'none';

// logic
inputUsername.addEventListener('input', () => {
   const regex = new RegExp(/^[a-zA-Z0-9]*$/gm);
   if (regex.test(inputUsername.value)) {
      if (inputUsername.value.length < 4) {
         usernameValidation.style.display = 'block';
         inputUsername.classList.add('is-invalid');
         enableButton();
         if (inputUsername.value.length <= 0) {
            usernameValidation.innerHTML = "Username tidak boleh kosong!"
         } else {
            usernameValidation.innerHTML =
               "Username minimal terdiri dari 4 atau lebih karakter!"
         }
      } else {
         if (inputUsername.value.length > 18) {
            usernameValidation.style.display = 'block';
            inputUsername.classList.add('is-invalid');
            usernameValidation.innerHTML = "Username tidak boleh lebih dari 17 karakter!"
            enableButton();
         } else {
            let inputOld = document.querySelector("input[name='username-old']")
            if (inputOld.value == inputUsername.value) {
               usernameValidation.style.display = 'none';
               inputUsername.classList.remove('is-invalid');
               enableButton()
            } else {
               usernameValidation.style.display = 'none';
               inputUsername.classList.remove('is-invalid');
               enableButton();
               // ajax cek apakah username sudah ada yang menggunakan
               $.ajax({
                  type: "get",
                  url: `/akun/user-exist/${inputUsername.value}`,
                  headers: {
                     'X-Requested-With': 'XMLHttpRequest'
                  },
                  success: function (data) {
                     if (data == '1') {
                        inputUsername.classList.add('is-invalid');
                        usernameValidation.style.display = 'block';
                        usernameValidation.innerHTML = "Username sudah ada !"
                        btn.setAttribute('disabled', true)
                     }
                  }
               });
            }
         }
      }

   } else {
      inputUsername.classList.add('is-invalid')
      usernameValidation.style.display = 'block';
      usernameValidation.innerHTML = "Username tidak boleh mengandung simbol dan spasi!"
      enableButton()
   }
})

// password validation
let passwordValidation = document.querySelector("div.invalid-feedback.password");
let inputPassword = document.querySelector("input#password-now");
passwordValidation.style.display = 'none';
// logic
inputPassword.addEventListener('input', () => {
   if (inputPassword.value.length < 4) {
      passwordValidation.style.display = 'block';
      inputPassword.classList.add('is-invalid');
      enableButton();

      if (inputPassword.value.length = 0) {
         passwordValidation.innerHTML = "Password tidak boleh kosong!"
      } else {
         passwordValidation.innerHTML =
            "Password minimal terdiri dari 4 atau lebih karakter!"
      }
   } else {
      if (inputPassword.value.length > 30) {
         passwordValidation.style.display = 'block';
         inputPassword.classList.add('is-invalid');
         passwordValidation.innerHTML = "Password tidak boleh lebih dari 30 karakter!"
         enableButton();
      } else {
         passwordValidation.style.display = 'none';
         inputPassword.classList.remove('is-invalid');
         enableButton();
      }
   }
})

// unit / prodi validation
let unitProdiValidation = document.querySelector("div.invalid-feedback.unit-prodi");
let selectUnitProdi = document.querySelector("select#unit-prodi");
unitProdiValidation.style.display = 'none';

$(document.body).on("change", "select#unit-prodi", function () {
   console.log(this.value);
   if (this.value == '') {
      unitProdiValidation.style.display = 'block';
      selectUnitProdi.classList.add('is-invalid');
      unitProdiValidation.innerHTML = "Pilihan tidak boleh kosong!";
      enableButton()
   } else {
      unitProdiValidation.style.display = 'none';
      selectUnitProdi.classList.remove('is-invalid');
      enableButton()
   }
});