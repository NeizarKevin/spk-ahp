# REQUIREMENTS:
- Install xampp (download di https://www.apachefriends.org/xampp-files/5.6.37/xampp-win32-5.6.37-0-VC11-installer.exe)
- Buka aplikasi xampp, hidupkan Apache dan MySQL
- Buat folder ahp-crips di c:\xampp\htdocs
- copy semua isi dari folder ini ke dalam folder ahp-crips

# IMPORT DATABASE:
- buka browser, ketikkan http://localhost/phpmyadmin
- Pilih import (tidak usah buat database baru)
- Pilih file ahp_crips.sql yang ada di folder database
- Klik go untuk mulai import database

# RUNNING PROGRAM
- Ketikkan http://localhost/Ahp_sub di browser
- Jika ada dialog login masukkan user dan pass : admin

# CARA UBAH NAMA DATABASE (jika diperlukan)
- Buka http://localhost/phpmyadmin/ di browser
- Pilih nama database di panel kiri (ahp_sub)
- Pilih menu "Operations"
- Pada kolom isian "Rename database to" Isikan nama database tanpa spasi
- Klik Go

- Buka file config.php yang ada di c:\xampp\htdocs\Ahp_sub
- Sesuaikan nama di database_name dengan nama baru yang sudah diubah

# CARA GANTI TEMA:
- Kunjungi https://bootswatch.com/3/
- Pilih salah satu tema, kemudian download bootstrap.min.css-nya, save (Ctrl + S) dan taruh di folder [project]/assets/css/ dengan nama sesuai temanya misal tema simplex namanya simplex-bootstrap.min.css
- Untuk mengganti buka index.php, kemudian cari cooding yang isi [tema]-bootstrap.min.css ganti dengan nama tema yang sudah didownload (misal simplex-bootstrap.min.css)
- Lakukan langkah yang sama jika mengubah tema di login.php

Selesai :D
