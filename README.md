# Ladangku

# Latar Belakang
Perkembangan teknologi di era modern membuka peluang besar dalam berbagai sektor, termasuk pertanian. Namun, masih banyak masyarakat yang menghadapi kendala dalam bercocok tanam, seperti keterbatasan lahan, kurangnya pengetahuan teknis, serta proses perawatan yang memakan waktu dan tenaga.

Hidroponik menjadi salah satu solusi pertanian modern yang efisien karena tidak memerlukan lahan luas dan dapat dilakukan di lingkungan terbatas. Meski demikian, sistem hidroponik tetap membutuhkan pemantauan dan pengelolaan yang konsisten.

Oleh karena itu, **Ladangku** hadir sebagai solusi berbasis teknologi untuk mengotomatisasi sistem kebun hidroponik agar lebih mudah, efisien, dan berkelanjutan bagi masyarakat.

## Deskripsi Proyek
**Ladangku** adalah sebuah aplikasi web yang dirancang untuk membantu pengguna dalam mengelola kebun hidroponik secara otomatis. Sistem ini memungkinkan pengguna untuk memantau dan mengatur kondisi tanaman seperti luas lahan, status keanggotaan, serta pengelolaan sistem secara lebih praktis melalui antarmuka digital.

Dengan pendekatan berbasis web, Ladangku dapat diakses dengan mudah kapan saja dan di mana saja, sehingga mendukung pertanian modern yang lebih fleksibel.

##  Fitur Utama
**Validasi Lahan**
  - Sistem akan mengecek apakah luas lahan memenuhi syarat (minimal 2 meter persegi)
  - Jika tidak memenuhi, pengguna tidak dapat melanjutkan

**Sistem Member**
  - Pengguna dengan status member mendapatkan diskon 10%
  - Menggunakan konsep array dalam pengolahan data

**Perulangan (Looping)**
  - Digunakan untuk pengolahan data secara berulang dalam sistem

**Antarmuka Web Responsif**
  - Dibangun menggunakan HTML & CSS (dengan Bootstrap jika digunakan)

**Logika Backend (PHP)**
  - Menggunakan percabangan (if-else)
  - Mengelola input dan proses data pengguna

##  Alur Sistem
1. Pengguna membuka website Ladangku  
2. Pengguna memasukkan data (misalnya luas lahan dan status member)  
3. Sistem melakukan validasi:
   - Jika lahan < 2 m² → ditolak  
   - Jika lahan ≥ 2 m² → lanjut ke proses berikutnya  
4. Sistem mengecek status pengguna:
   - Member → mendapatkan diskon  
   - Non-member → harga normal  
5. Sistem memproses data menggunakan perulangan dan array  
6. Hasil ditampilkan kepada pengguna  

## Teknologi yang Digunakan
### Frontend:
- HTML
- CSS
- Bootstrap

### Backend:
- PHP

### Konsep Pemrograman:
- Percabangan (if-else)
- Perulangan (looping)
- Array

## Tujuan
- Memudahkan masyarakat dalam mengelola kebun hidroponik  
- Meningkatkan efisiensi dalam proses bercocok tanam  
- Mendukung pertanian modern berbasis teknologi  
- Mendorong praktik pertanian berkelanjutan  
