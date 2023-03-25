## Testing

Testing di repository ini dilakukan di 2 level yaitu :

1. Feature Teste (Php Unit)
2. E2E Test (Cypress)

### Feature Test

Cek file **`phpunit.xml`** disini kita pkai custom .env namanya **`.env.testing`**. Tujuannya untuk memisah environment testing dan development.

Perhatikan database yang digunakan untuk project ini adalah mysql, mysqlnya dibagi 2 ada mysql untuk development dan untuk testing.

Nama database developmentnya adalah **`l9`** untuk database testingnya adalah **`testing`**. Jadi untuk menjalankan test di repository ini pastikan database **`testing`**
sudah dibuat.

Untuk menjalankan test di repository ini cukup ketik perintah berikut di terminal

```bash
$ php artisan test
```

atau jika menggunakan docker

```bash
$ sail artisan test
```

hasil dari test akan seperti ini

```bash
   PASS  Tests\Unit\ExampleTest
  ✓ that true is true

   PASS  Tests\Feature\AuthenticationTest
  ✓ login user success
  ✓ login user data empty
  ✓ login user email kosong
  ✓ login user password kosong
  ✓ superadmin can login
  ✓ superadmin can logout
  ✓ normaluser can login
  ✓ normaluser can logout

   PASS  Tests\Feature\CreateUserTest
  ✓ can create new user
  ✓ name field required
  ✓ email field required
  ✓ password field required
  ✓ email field unique
  ✓ superadmin can create new user
  ✓ superadmin can delete a user

   PASS  Tests\Feature\ExampleTest
  ✓ the application returns a successful response

   PASS  Tests\Feature\UserListTest
  ✓ superadmin can see user list
  ✓ superadmin can see paging user list
  ✓ user can search and result shown in list
  ✓ user can search and result shown in list with paging

  Tests:  21 passed
  Time:   2.25s
```

### E2E Test

E2E test ini menggunakan Cypress. Untuk menjalankan Cypress cukup ketik perintah berikut di terminal

```bash
$ npx cypress open
```
