Instalasi Laravel 8
1. Tentukan Lokasi File
2. Clone Project contoh: Git Clone "https://github.com/dimasaguswahyudi/kendaraan_inosoft.git"
3. Install Vendor pada project try: Composer Install
4. Setting ENV seperti yang sudah disediakan pada file .env.example
5. Generate JWT Auth try: php artisan jwt:secret
6. Migrate Database dan Seeder try: php artisan migrate --seed
7. Generate Key try: php artisan key:generate
8. Run Project try: Php artisan serv
9. Import Collection pada postman di file "TestBackendInosoft.postman_collection.json"
10. Good Job

Dokumentasi API bisa juga dilihat pada link:
https://documenter.getpostman.com/view/12563133/2s93JtS4oZ#intro

Running Response CRUD

1. Login
    1.A Http Request: http://localhost:8000/api/auth/login
    1.B Method POST
    1.C Run
2. Show Profile/Me
    2.A Http Request: http://localhost:8000/api/auth/me
    2.B Method POST
    2.C Run
3. Logout
    3.A Http Request: http://localhost:8000/api/auth/logout
    3.B Method POST
    3.C Run

Setting Token Terlebih dahulu
1. Copy Token pada hasil Respons saat Login
2. Pilih "Authorization"
3. Pilih Type "Bearer Token"
4. Paste Token

4. Lihat Stok Kendaraan
    4.A Http Request: http://localhost:8000/api/kendaraan/stok
    4.B Method GET
    4.C Run
5. Lihat Semua Kendaraan
    5.A Http Request: http://localhost:8000/api/kendaraan
    5.B Method GET
    5.C Run
6. Tambah Kendaraan
    6.A Http Request: http://localhost:8000/api/kendaraan
    6.B Method POST
    6.C Body field "tahun_keluaran, warna, harga"
    6.D Run
7. Update Kendaraan
    7.A Http Request: http://localhost:8000/api/kendaraan/{kendaraan_id}
    7.B Method PUT
    7.C Json Response "tahun_keluaran, warna, harga"
    7.D Run
8. Hapus Kendaraan
    8.A Http Request: http://localhost:8000/api/kendaraan/{kendaraan_id}
    8.B Method DELETE
    8.C Run
9. Lihat Semua Mobil
    9.A Http Request: http://localhost:8000/api/mobil
    9.B Method GET
    9.C Run
10. Tambah Mobil
    10.A Http Request: http://localhost:8000/api/mobil
    10.B Method POST
    10.C Body field "kendaraan_id, mesin, kapasitas_penumpang, tipe, jumlah"
    10.C Run
11. Update Mobil
    11.A Http Request: http://localhost:8000/api/mobil/{mobil_id}
    11.B Method PUS
    11.C Json Response "mesin, kapasitas_penumpang, tipe, jumlah"
    11.D Run
12. Hapus Mobil
    12.A Http Request: http://localhost:8000/api/mobil/{mobil_id}
    11.B Method DELETE
    11.D Run
13. Lihat Semua Motor
    13.A Http Request: http://localhost:8000/api/motor
    13.B Method GET
    13.C Run
14. Tambah Motor
    14.A Http Request: http://localhost:8000/api/motor
    14.B Method POST
    14.C Body field "kendaraan_id, mesin, tipe_suspensi, tipe_transmisi, jumlah"
    14.D Run
15. Update Motor
    15.A Http Request: http://localhost:8000/api/motor/{motor_id}
    15.B Method PUT
    15.C Json Response "mesin, tipe_suspensi, tipe_transmisi, jumlah"
    15.D Run
16. Hapus Motor
    16.A Http Request: http://localhost:8000/api/motor/{motor_id}
    16.B Method DELETE
    16.C Run
17. Lihat Semua Penjualan
    17.A Http Request: http://localhost:8000/api/penjualan
    17.B Method GET
    17.C Run
18. Lihat Penjualan Per Kendaraan
    18.A Http Request: http://localhost:8000/api/getpenjualan/{kendaraan_id}
    18.B Method GET
    18.C Run
19. Tambah penjualan
    19.A Http Request: http://localhost:8000/api/penjualan
    19.B Method POST
    19.C Body field "kendaraan_id, jumlah"
    19.D Run
20. Update Penjualan
    20.A Http Request: http://localhost:8000/api/penjualan/{penjualan_id}
    20.B Method PUT
    20.C Json Response "jumlah"
    20.D Run
21. Hapus Motor
    21.A Http Request: http://localhost:8000/api/penjualan/{penjualan_id}
    21.B Method DELETE
    21.C Run

Running Test Case
1. php artisan test
