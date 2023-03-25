## Testing

Testing di repository ini dilakukan di 2 level yaitu :

1. Feature Teste (Php Unit)
2. E2E Test (Cypress)

### Feature Test

Cek phpunit.xml disini kita pkai custom .env namanya .env.testing. Tujuannya untuk memisah environment testing dan development.

Perhatikan database yang digunakan untuk project ini adalah mysql, mysqlnya dibagi 2 ada mysql untuk development dan untuk testing. Nama database developmentnya adalah `l9` untuk database testingnya adalah `testing`. Jadi untuk menjalankan test di repository ini pastikan database `testing` sudah dibuat.

Untuk menjalankan test di repository ini cukup ketik perintah berikut di terminal

```bash
$ php artisan test
```

### E2E Test

E2E test ini menggunakan Cypress. Untuk menjalankan Cypress cukup ketik perintah berikut di terminal

```bash

```
