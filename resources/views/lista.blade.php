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
    <a href="{{ route('inicio') }}" class="btn btn-danger">Inicio</a>
  </div>
</nav>

<div class="container">
    <div class="row">
        <h1 class="mt-5 mb-5">Lista de Usuarios y Computadoras</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Nombre PC</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">MAC</th>
                        <th scope="col">IP</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dbusuario as $usuario)
                        <tr>
                        <th scope="row">{{ $usuario->id }}</th>
                        <td>{{ $usuario->usuario }}</td>
                        <td>{{ $usuario->pcnombre }}</td>
                        <td>{{ $usuario->departamento }}</td>
                        <td>{{ $usuario->mac }}</td>
                        <td>{{ $usuario->ip }}</td>
                        <td>
                            <a href="{{ route('usuarios.editar', $usuario) }}" class="btn btn-warning">Editar</a>
                            <a onclick="return confirm('Estas seguro de eliminar el registro ?')" href="{{ route('usuarios.eliminar', $usuario) }}" class="btn btn-danger">Eliminar</a>
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
{{--                {{ $dbusuario->links() }}--}}
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
