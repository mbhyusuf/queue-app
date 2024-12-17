# Queue App

## Installation

1. Pastikan Anda sudah menginstall Composer.

2. Install dependency.

```bash
composer install
```

3. Migrate database.

```bash
php spark migrate --all
```

4. Copy file `env` dan rename menjadi `.env`. Sesuaikan isinya.

5. Jalankan aplikasi.

```bash
php spark serve
```
