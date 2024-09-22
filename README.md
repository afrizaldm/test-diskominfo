# Laravel with Docker

Panduan ini menjelaskan cara menjalankan aplikasi Laravel dengan menggunakan Docker.

## Requirements

Pastikan Anda telah menginstal aplikasi berikut:
- **Docker**: [Download dan Install Docker](https://www.docker.com/products/docker-desktop)
- **Docker Compose**: Biasanya sudah termasuk dengan Docker Desktop, namun jika belum terinstall, bisa diunduh di [sini](https://docs.docker.com/compose/install/).

## Cara Menjalankan

### 1. **Clone Project**

   Clone repository project ke komputer Anda:

   ```bash
   git clone https://github.com/afrizaldm/test-diskominfo.git
   cd test-diskominfo
   ```

### 2. Install Dependencies

Install dependensi yang diperlukan menggunakan Composer:

   ```bash
   composer install
   ```

### 3. Run Docker Containers

Jalankan container Docker menggunakan Docker Compose:

   ```bash
   docker-compose up
   ```

### 4. Stop Docker Containers

Untuk menghentikan container yang sedang berjalan:

   ```bash
   docker-compose down
   ```

---

# Instalasi Laravel Secara Manual

Panduan ini menjelaskan cara menginstal PHP 8.2 menggunakan XAMPP, WAMP, atau solusi server lainnya, serta cara mengkloning repository Laravel dan menjalankannya.

## Prasyarat

PC sudah terinstall software sebagai berikut

- `PHP 8.2` (XAMPP, WAMP, atau server lain)
- `Composer`
- `Git`

## Langkah-langkah Instalasi

### 1. Instal PHP 8.2
- **XAMPP**: Unduh dan instal dari [XAMPP](https://www.apachefriends.org/download.html).
- **WAMP**: Unduh dan instal dari [WAMP](https://www.wampserver.com/en/).

<!-- Aktifkan modul **Apache** dan **MySQL** dari Control Panel (XAMPP/WAMP). -->

### 2. Instal Composer
Instal Composer dari [Composer](https://getcomposer.org/download/).

## Langkah Kloning Projek

### 1. Kloning Repository Laravel
Masuk ke folder server lokal Anda (`htdocs` untuk XAMPP, `www` untuk WAMP), lalu kloning repository:

```bash
   git clone https://github.com/afrizaldm/test-diskominfo.git
   cd test-diskominfo
```

### 2. Instal Dependensi Laravel
Jalankan perintah berikut untuk menginstal semua dependensi:

```bash
composer install
```

### 3. Konfigurasi Environment File
Salin `.env.example` dan rubah nama filenya menjadi `.env`

```bash
cp .env.example .env
```

Atur koneksi database di file `.env`

```bash
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=nama_database
# DB_USERNAME=root
# DB_PASSWORD=
```

### 4. Generate Application Key

Perintah ini menghasilkan kunci enkripsi unik untuk mengamankan data sensitif seperti sesi dan token. Kunci ini akan disimpan di dalam file `.env`.

```bash
php artisan key:generate
```

### 5. Migrasi Database dan Seeder

Langkah ini menjalankan perintah untuk membuat struktur tabel dalam database dan mengisi tabel dengan data awal. Dengan menjalankan perintah berikut, Anda akan memastikan bahwa semua tabel yang diperlukan dibuat dan data yang bersifat acak akan ditambahkan ke dalam tabel.

```bash
php artisan migrate --seed
```

## Menjalankan Server

Menajalankan Server di lokal dengan perintah berikut

```bash
php artisan serve
```

Akses aplikasi di `http://localhost:8000`.

---

# Laravel with Docker

This guide explains how to run a Laravel application using Docker.

## Requirements

Ensure you have the following applications installed:
- **Docker**: [Download and Install Docker](https://www.docker.com/products/docker-desktop)
- **Docker Compose**: It usually comes with Docker Desktop, but if not installed, you can download it [here](https://docs.docker.com/compose/install/).

## How to Run

### 1. **Clone the Project**

Clone the project repository to your local machine:

   ```bash
   git clone https://github.com/afrizaldm/test-diskominfo.git
   cd test-diskominfo
   ```

### 2. Install Dependencies

Install the necessary dependencies using Composer:

   ```bash
   composer install
   ```

### 3. Run Docker Containers

Run the Docker containers using Docker Compose:

   ```bash
   docker-compose up
   ```

### 4. Stop Docker Containers

To stop the running containers:

   ```bash
   docker-compose down
   ```

---

# Laravel Installation

This guide explains how to install PHP 8.2 using XAMPP, WAMP, or other server solutions, clone a Laravel repository, and run it locally.

## Prerequisites
- `PHP 8.2` (XAMPP, WAMP, or other server solutions)
- `Composer`
- `Git`

## Installation Steps

### 1. Install PHP 8.2
- **XAMPP**: Download and install from [XAMPP](https://www.apachefriends.org/download.html).
- **WAMP**: Download and install from [WAMP](https://www.wampserver.com/en/).

<!-- Enable the **Apache** and **MySQL** modules from the Control Panel (XAMPP/WAMP). -->

### 2. Install Composer
Install Composer from [Composer](https://getcomposer.org/download/).

## Projcet Cloning Steps

### 1. Clone the Laravel Repository
Navigate to your local server folder (`htdocs` for XAMPP, `www` for WAMP), then clone the repository:

```bash
   git clone https://github.com/afrizaldm/test-diskominfo.git
   cd test-diskominfo
```

### 2. Install Laravel Dependencies
Run the following command to install all dependencies:

```bash
composer install
```

### 3. Configure Environment File
Copy the `.env.example` file and rename it to `.env`

```bash
cp .env.example .env
```

Set the database connection in the `.env` file:

```bash
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=database_name
# DB_USERNAME=root
# DB_PASSWORD=
```

### 4. Generate Application Key

This command generates a unique encryption key for securing sensitive data like sessions and tokens. The key will be stored in the `.env` file.

```bash
php artisan key:generate
```

### 5. Migrate Database and Run Seeder

This step runs the command to create the structure of tables in the database and populate them with initial data. By executing the following command, you ensure that all necessary tables are created and random data will be added to the tables.

```bash
php artisan migrate --seed
```
## Run the Local Server

Run the Local Server:

```bash
php artisan serve
```

Access the application at `http://localhost:8000`