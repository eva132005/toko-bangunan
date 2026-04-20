📌 Deskripsi

Project ini adalah aplikasi web sederhana yang dibuat menggunakan Laravel untuk mengelola data produk pada toko bangunan.
Aplikasi ini memungkinkan pengguna untuk menambah, melihat, mengedit, dan menghapus data produk (CRUD)

🎯 Tujuan Project
Memahami dasar penggunaan Laravel
Menerapkan konsep CRUD (Create, Read, Update, Delete)
Menghubungkan Laravel dengan database MySQL
Membuat tampilan web yang rapi dan interaktif
⚙️ Tools & Teknologi
PHP
Laravel
MySQL
Laragon
Visual Studio Code
Bootstrap
🧱 Tahapan Pembuatan Project
1. Instalasi Laravel

Install Laravel menggunakan Composer:

composer create-project laravel/laravel toko-bangunan

Masuk ke folder project:

cd toko-bangunan
2. Menjalankan Laravel

Jalankan server:

php artisan serve

Buka di browser:

http://127.0.0.1:8000

3. Konfigurasi Database

Edit file .env:

DB_DATABASE=toko_bangunan
DB_USERNAME=root
DB_PASSWORD=
4. Membuat Model & Migration
php artisan make:model Produk -m

Edit migration:

$table->string('nama_produk');
$table->integer('harga');
$table->integer('stok');
$table->string('kategori');

Jalankan:

php artisan migrate
5. Membuat Controller
php artisan make:controller ProdukController
6. Membuat Route

File: routes/web.php

use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return redirect('/produk');
});

Route::resource('produk', ProdukController::class);
7. Membuat Model

File: app/Models/Produk.php

protected $fillable = [
    'nama_produk',
    'harga',
    'stok',
    'kategori'
];
8. Membuat View

Folder:

resources/views/produk

File:

index.blade.php
create.blade.php
edit.blade.php
. Implementasi CRUD (Sesuai Project)
🔹 Menampilkan Data (READ)

Mengambil semua data produk dari database dan menampilkannya ke halaman utama.

public function index()
{
    $produk = Produk::all();
    return view('produk.index', compact('produk'));
}
🔹 Menampilkan Form Tambah Data

Menampilkan halaman untuk menambahkan produk baru.

public function create()
{
    return view('produk.create');
}
🔹 Menambah Data (CREATE)

Menyimpan data produk baru ke database.

public function store(Request $request)
{
    Produk::create($request->all());
    return redirect('/produk')->with('success', 'Data berhasil ditambahkan');
}
🔹 Menampilkan Form Edit

Mengambil data berdasarkan ID untuk ditampilkan di halaman edit.

public function edit($id)
{
    $produk = Produk::findOrFail($id);
    return view('produk.edit', compact('produk'));
}
🔹 Mengupdate Data (UPDATE)

Memperbarui data produk yang sudah ada.

public function update(Request $request, $id)
{
    $produk = Produk::findOrFail($id);
    $produk->update($request->all());
    return redirect('/produk')->with('success', 'Data berhasil diupdate');
}
🔹 Menghapus Data (DELETE)

Menghapus data produk dari database.

public function destroy($id)
{
    $produk = Produk::findOrFail($id);
    $produk->delete();
    return redirect('/produk')->with('success', 'Data berhasil dihapus');
}
📦 Struktur Data Produk

Data produk yang digunakan dalam project ini terdiri dari beberapa field:

protected $fillable = [
    'nama_produk',
    'harga',
    'stok',
    'kategori'
];

Penjelasan:

nama_produk → Nama barang
harga → Harga produk
stok → Jumlah stok tersedia
kategori → Jenis produk (contoh: semen, cat, dll)
