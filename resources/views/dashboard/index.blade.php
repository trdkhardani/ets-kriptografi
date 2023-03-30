
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <title>PPDB Kriptografi</title>
    <nav
      class="navbar navbar-expand-lg bg-body-tertiary bg-dark"
      data-bs-theme="dark"
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="#">PPDB Wakanda</a>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <form action="/logout" method="post">
                @csrf
            <button type="submit" class="nav-link px-3 bg-dark border-0" href="">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </nav>
  </head>
  <body class="bg-dark text-white text-center">
    <div class="mt-5">
      <h1>Selamat Datang!</h1>
      Berikut adalah data diri anda: <br />
      Nama: {{ auth()->user()->name }} <br />
      NISN: {{ auth()->user()->nisn }} <br />
    </div>
  </body>
</html>
