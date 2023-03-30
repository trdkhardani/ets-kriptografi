
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
          <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> -->
          <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center text-white">Halaman Pendaftaran</h1>
                <form action="/register" method="post">
                  <div class="form-floating text-info">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required value="">
                    <label for="email">Alamat Email</label>
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-floating text-info">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                  </div>
                  <div class="form-floating text-info">
                    <input type="text" name="nisn" class="form-control" id="nisn" placeholder="NISN" required>
                    <label for="nisn">NISN</label>
                  </div>
                  <div class="checkbox mb-3">
                  </div>
                  <button class="w-100 btn btn-lg btn-outline-info" type="submit">Daftar</button>
                </form>
                  <small class="d-block text-center mt-3 text-white">Sudah memiliki akun PPDB? <a href="/">Klik di sini</a></small>
              </main>
        </div>
    </div>
</body>
</html>
