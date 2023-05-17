Instalasi Laravel 8
1. Tentukan Lokasi File
2. Clone Project contoh: Git Clone "https://github.com/dimasaguswahyudi/Kendaraan.git"
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

4. Lihat Semua Penjualan
    4.A Http Request: http://localhost:8000/api/penjualan
    4.B Method GET
    4.C Run
5. Lihat Penjualan Per Kendaraan
    5.A Http Request: http://localhost:8000/api/getpenjualan/{kendaraan_id}
    5.B Method GET
    5.C Run
6. Create Penjualan (store)
    6.A Http Request: http://localhost:8000/api/penjualan
    6.B Method POST
    6.C Body field "kendaraan_id, jumlah"
    6.D Run
7. Update Penjualan (update)
    7.A Http Request: http://localhost:8000/api/penjualan/{penjualan_id}
    7.B Method PUT
    7.C Json Response "kendaraan_id, jumlah"
    7.D Run
8. Lihat Stok
    8.A Http Request: http://localhost:8000/api/stok
    8.B Method GET
    8.C Run
9. Tambah/Update Stok
    9.A Http Request: http://localhost:8000/api/stok
    9.B Method POST
    9.C Body field "kendaraan_id, jumlah"
    9.D Run
10. Lihat Semua Kendaraan
    10.A Http Request: http://localhost:8000/api/kendaraan
    10.B Method GET
    10.C Run
11. Tambah Kendaraan
    11.A Http Request: http://localhost:8000/api/kendaraan
    11.B Method POST
    11.C Body field "tahun_keluaran, warna, harga"
    11.D Run
12. Update Kendaraan
    12.A Http Request: http://localhost:8000/api/kendaraan/{kendaraan_id}
    11.B Method PUT
    11.C Json Response "tahun_keluaran, warna, harga"
    11.D Run
13. Lihat Semua Mobil
    13.A Http Request: http://localhost:8000/api/mobil
    13.B Method GET
    13.C Run
14. Tambah Mobil
    14.A Http Request: http://localhost:8000/api/mobil
    14.B Method POST
    14.C Body field "kendaraan_id, mesin, kapasitas_penumpang, tipe"
    14.D Run
15. Update Mobil
    15.A Http Request: http://localhost:8000/api/mobil/{mobil_id}
    15.B Method PUT
    15.C Json Response "kendaraan_id, mesin, kapasitas_penumpang, tipe"
    15.D Run
16. Lihat Semua motor
    16.A Http Request: http://localhost:8000/api/motor
    16.B Method GET
    16.C Run
17. Tambah motor
    17.A Http Request: http://localhost:8000/api/motor
    17.B Method POST
    17.C Body field "kendaraan_id, mesin, tipe_suspensi, tipe_transmisi"
    17.D Run
18. Update motor
    18.A Http Request: http://localhost:8000/api/motor/{motor_id}
    18.B Method PUT
    18.C Json Response "kendaraan_id, mesin, tipe_suspensi, tipe_transmisi"
    18.D Run

Running Test Case
1. php artisan test
