<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/estilosTable.css')}}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="/listado_personaje">Personajes</a>
                <a class="nav-link" href="/listado_enemigo">Enemigos</a>
                <a class="nav-link" href="/listado_powerup">Power Ups</a>
                <a class="nav-link" href="/listado_mercancia">Mercancia</a>
                <a class="nav-link" href="/listado_plataforma">Plataformas</a>
                <a class="nav-link" href="/listado_comentario">Comentarios</a>
            </div>
        </div>
    </div>
</nav>

<div class="table-container">

    <h1>Listado de Comentarios</h1>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comentario as $registro)
                <tr>
                    <td>{{ $registro["id"] }}</td>
                    <td>{{ $registro["nombre"] }}</td>
                    <td>{{ $registro["comentario"] }}</td>
                    <td>
                        <a href='eliminar_comentarios/{{ $registro["id"] }}'>Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Q8o5ie8isJATV1z06dK+VSdF1UOQXHAsmlU4+Z3qZmcNVNSh5FpDgMRrK0rSp00K" crossorigin="anonymous"></script>
</body>
</html>
