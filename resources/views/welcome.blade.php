<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar PC Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/63/Sudebip.png/800px-Sudebip.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Sudebip - Registro de Computadoras y Usuarios
    </a>
      <a href="{{ route('lista') }}" class="btn btn-info">Registros</a>
  </div>
</nav>

<div class="container">
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="mt-5 mb-5">Registrar PC & Usuario</h1>

        <div class="card mb-5">
            <div class="card-body">
                <h5 class="card-title">Usuario y PC a registrar</h5>
                <form action="{{ route('guardar') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="mac" class="form-label">MAC</label>
                        <input class="form-control" type="text" name="mac" id="mac" placeholder="Introducir MAC">
                        @error('mac')
                            <span class="text-danger">{{ $message  }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ip" class="form-label">IP</label>
                        <input class="form-control" type="text" name="ip" id="ip" placeholder="Introducir IP">
                        @error('ip')
                            <span class="text-danger">{{ $message  }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="usuario" class="form-label">USUARIO</label>
                        <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Introducir Nombre y Apellido">
                        @error('usuario')
                            <span class="text-danger">{{ $message  }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pcnombre" class="form-label">NOMBRE PC</label>
                        <input class="form-control" type="text" name="pcnombre" id="pcnombre" placeholder="Introducir Nombe de la PC">
                        @error('pcnombre')
                            <span class="text-danger">{{ $message  }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="departamento" class="form-label">UNIDAD ADMINISTRATIVA</label>
                        <input class="form-control" type="text" name="departamento" id="departamento" placeholder="Introducir el Departamento al cual pertenece">
                    </div>
                        <input class="btn btn-primary" type="submit" value="Registrar">
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
