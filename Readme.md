# Aplikasi Kontak Sederhana

Aplikasi ini adalah aplikasi manajemen kontak sederhana yang dibuat dengan arsitektur MVC (Model-View-Controller) menggunakan PHP. Aplikasi ini memungkinkan pengguna untuk melihat daftar kontak, menambah kontak baru, mengedit kontak yang sudah ada, dan menghapus kontak.

## Struktur Direktori
```
.
├── config/
│ └── Database.php
├── controllers/
│ └── ContactController.php
├── models/
│ └── Contact.php
├── views/
│ └── contacts/
│ ├── index.php
│ ├── create.php
│ └── edit.php
└── index.php
```



## Instalasi

1. **Clone repositori ini ke direktori lokal Anda:**
    ```bash
    git clone https://github.com/username/contact-app.git
    ```

2. **Buat database dan tabel kontak menggunakan SQL berikut:**
    ```sql
    CREATE DATABASE kontak_db;

    USE kontak_db;

    CREATE TABLE contacts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        address TEXT NOT NULL
    );

    INSERT INTO contacts (name, phone, address) VALUES
    ('Weida', '085111111111', 'Gatsu Timur'),
    ('Dipa', '085222222222', 'Gatsu Barat'),
    ('Vincent', '085333333333', 'Canggu'),
    ('Alit', '085444444444', 'Klungkung'),
    ('Eka', '085666778888', 'Renon');
    ```

3. **Konfigurasi koneksi database:**

    Buka `config/Database.php` dan sesuaikan pengaturan koneksi database sesuai dengan konfigurasi Anda:
    ```php
    private $host = 'localhost';
    private $db_name = 'kontak_db';
    private $username = 'root';
    private $password = '';
    ```


## Penggunaan

1. **Menjalankan Aplikasi:**

    Pastikan server web Anda berjalan (misalnya Apache atau Nginx) dan arahkan browser ke `http://localhost/path/to/contact-app/index.php`.

2. **Melihat Daftar Kontak:**

    Halaman utama akan menampilkan daftar kontak dalam bentuk tabel. Anda bisa menambah, mengedit, atau menghapus kontak dari halaman ini.

3. **CRUD Operations via URL:**

    - **Create:** 
        ```
        index.php?action=create&name=YourName&phone=YourPhone&address=YourAddress
        ```

    - **Edit:** 
        ```
        index.php?action=edit&id=ContactID&name=NewName&phone=NewPhone&address=NewAddress
        ```

    - **Delete:** 
        ```
        index.php?action=delete&id=ContactID
        ```

    - **Read All:** 
        ```
        index.php?action=readAll
        ```

    - **Read By ID:** 
        ```
        index.php?action=readById&id=ContactID
        ```


## Struktur Kode

- **index.php:**
  Entry point aplikasi yang menentukan tindakan apa yang harus diambil berdasarkan parameter `action` di URL.

- **config/Database.php:**
  Kelas untuk mengelola koneksi ke database.

- **controllers/ContactController.php:**
  Kelas kontroler yang mengatur logika aplikasi, seperti mengambil daftar kontak, menambah kontak baru, mengedit kontak, dan menghapus kontak.

- **models/Contact.php:**
  Kelas model yang berinteraksi dengan database untuk operasi CRUD.

- **views/contacts/:**
  Direktori yang berisi tampilan (view) untuk menampilkan halaman daftar kontak, form penambahan, dan form pengeditan.

## API Endpoint

Aplikasi ini juga menyediakan endpoint API untuk melakukan operasi CRUD. Semua operasi dapat diakses melalui URL dengan parameter yang sesuai.

- **Base URL:** `http://localhost/path/to/contact-app/api/contact.php`

### Endpoints

- **Create Contact:**
    ```
    GET /api/contact.php?action=create&name=YourName&phone=YourPhone&address=YourAddress
    ```
    Menambah kontak baru dengan nama, nomor telepon, dan alamat yang diberikan.

- **Read All Contacts:**
    ```
    GET /api/contact.php?action=readAll
    ```
    Mengambil semua kontak dalam bentuk JSON.

- **Read Contact By ID:**
    ```
    GET /api/contact.php?action=readById&id=ContactID
    ```
    Mengambil kontak berdasarkan ID dalam bentuk JSON.

- **Update Contact:**
    ```
    GET /api/contact.php?action=edit&id=ContactID&name=NewName&phone=NewPhone&address=NewAddress
    ```
    Memperbarui kontak berdasarkan ID dengan nama, nomor telepon, dan alamat yang baru.

- **Delete Contact:**
    ```
    GET /api/contact.php?action=delete&id=ContactID
    ```
    Menghapus kontak berdasarkan ID.


## Struktur ERD

Berikut adalah Entity-Relationship Diagram (ERD) untuk struktur database aplikasi ini:

### ERD Deskripsi

1. **Table `contacts`:**
   - `id`: Primary Key, Auto Increment
   - `name`: String, Not Null
   - `phone`: String, Not Null
   - `address`: Text, Not Null

### ERD Diagram

```plaintext
+--------------------+
|     contacts       |
+--------------------+
| PK | id            |
|    | name          |
|    | phone         |
|    | address       |
+--------------------+
```

## Refleksi Diri
Berbagai tantangan saya hadapi ketik membangun project dengan MVC, tapi dengan komitmen yang baik saya dapat menyelesaikan projek saya. Untuk kedepannya saya perlu banyak belajar lagi, untungnya ada beberapa referensi yang membantu saya contohnya channel youtubenya Web Programming Unpas!
