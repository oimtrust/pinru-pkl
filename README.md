# Aplikasi Peminjaman Ruang

### Instalasi
1. Download source code aplikasi ini atau di clone dengan cara :
```bash
git clone https://github.com/oimtrust/pinru-pkl.git
```
1. Lalu sesuaikan source code dibawah ini untuk menunjukkan link url aplikasi anda :
Letak file pada `pinru-pkl/apps/config/app.php`
```php
if (!defined('RESTRICTED')) exit('No direct script access allowed!');
/** @var HOST_URL $baseUrl */
$baseUrl = 'http://localhost/pinru-pkl/'; // <-- Sesuaikan dengan url kalian
```
1. Selanjutnya aturlah database pada file php berikut di sesuaikan dengan database kalian, file terletak pada `pinru-pkl/apps/config/database.php` dan jangan lupa import file database ke dalam phpmyadmin atau manajamen database lain yang anda punya (Misal : dbninja) yang terletak pada `pinru-pkl/apps/config/db_pinru_pkl.sql`. untuk source code file `database.php` seperti ini :
```php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'rahasia');
define('DB_DATABASE', 'db_pinru_pkl');
```
1. Lalu jalankan aplikasi anda. Untuk masuk ke sistem admin bukalah link `http://localhost/pinru-pkl/admin.php` dan untuk username dan password :
`username : oimtrust, password : rahasia`

1. Untuk Approve :
`username : approve, password : rahasia`

Sedangkan user biasa bisa di lihat di menu user role admin, password `rahasia` semua

### Lisensi
Aplikasi ini berlisensi MIT dan Kredit dimiliki hak penuh oleh Fathur Rohim ([oimtrust.com](http://oimtrust.com/ "oimtrust.com"))
