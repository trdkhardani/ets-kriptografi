
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>PPDB Kriptografi</title>
    <nav class="navbar bg-body-tertiary bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">PPDB Wakanda</a>
        </div>
      </nav>
</head>
<body class="bg-dark">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
          <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center text-white">Halaman Login</h1>
                <form action="/login" method="post">
                    @csrf
                  <div class="form-floating text-info bg-dark">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="">
                    <label for="email">Alamat Email</label>
                    @error('email')
                <div class="invalid-feedback">
                  {{ $message }} {{-- secara otomatis akan menampilkan pesan error dari validasi yang kita buat di controller --}}
                </div>
                @enderror
                  </div>
                  <div class="form-floating text-info">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                <div class="invalid-feedback">
                  {{ $message }} {{-- secara otomatis akan menampilkan pesan error dari validasi yang kita buat di controller --}}
                </div>
                @enderror
                  </div>
                  <div class="checkbox mb-3">
                  </div>
                  <button class="w-100 btn btn-lg btn-outline-info" type="submit">Login</button>
                </form>
                  <small class="d-block text-center mt-3 text-white">Belum memiliki akun PPDB? <a href="/daftar-siswa">Klik di sini</a></small>
              </main>
        </div>
    </div>
</body>
</html>
