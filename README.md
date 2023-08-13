# Sistem
project Gita Talavial

## Sistem  Gita Talavial

### Features Role User

### Installation
1. Clone the repository using the command "git clone [link]"
2. Create database in MySql
3. Configure the .env file accordingly
4. Run command 

```
$composer install
$php artisan migrate
$php artisan db:seed
$php artisan serve
$php artisan storage:link
```
### Mendapat Update kodingan terbaru
```
$ git fetch origin master
$ git pull origin master
```
### Kirim perubahan coding di local
```
$ git add .
$ git commit -m "catatan perubahan"
$ git push -u origin master
```

### Built With
* Bootstrap- CSS framework
* JQuery- Javascript framework
* Laravel - PHP framework
* MySql- Databse

### Progress fitur 26/7/2023

## login 5 role
* Admin (done)
* Supervisor (done)


## halaman depan

* demo
![demo](public/gambardemo/paneldashboard.png)
![login](public/gambardemo/login.png)
![daftar](public/gambardemo/daftar.png)

## Rencana pengembanagan gitatalavial

## Akses Admin
* admin login per wilayah yang ditentukan (done)
* master wilayah (done)
* menambahkan/edit data pengawas (done)
* Menambahkan data nama sekolah (done)
* Assign pengawas menangani sekolah mana saja ( 1 pengawas up to 30 sekolah SMK)
* Mengupdate nama guru /kepsek beserta jabatannya dan no hp di tiap sekolah
## Akses Stakeholder
* Melihat Laporan / infografis tiap wilayah yang sudah dimappingkan

## Akses Supervisor:
1. update profile
2. membuat Program kerja ( tupoksi apa (ada 7 list tupoksi), sekolah mana, guru siapa semua bentuk pilihan supaya mudah)
3. Membuat laporan aktifitas ( tanggal berapa, tupoksi apa, di sekolah mana, nama guru/kepsek sasaran yang dilayani, deskripsi aktifitas dan foto 3 biji)
4. mengakses halaman umpan balik
User Guru / Kepala sekolah
mereka tidak perlu login
data mereka diinput kedalam system oleh admin ( nama, no hp, jabatan, nama sekolah)
setiap kali seorang pengawas mengunjungi sekolah mereka atau memberikan layanan kepada sekolah mereka ( dari checklist) maka ada whatsapblast ke guru/ kepsek yang berisi link untuk memberikan feedback ( bagaimana layanan pengawas di sekolah). Feedback ini nanti akan tampil dalam bentuk rekap / infografis / spiderweb di halaman penagwas dan stakeholder

1. setiap pengawas meliputi perencanaan vs pelaksanaan, rekap umpan balik
2. Setiap sekolah meliputi : laporan jumlah kunjungan pengawas dan tupoksi apa saja yang dikerjakan dalam kunjungan ( bentuk spiderweb)
3. Setiap program kerja ( ada 7 program kerja) meliputi program kerja apa saja yang dikerjakan oleh pengawas