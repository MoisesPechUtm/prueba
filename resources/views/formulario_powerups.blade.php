<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="{{asset('css/estilosCat.css')}}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
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
    <!--personajes-->
    <div class="form-container">
        <h2>Agregar Power Ups</h2>
        <form action="/guardar_powerup" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ empty($id) ? '' : $id }}"/>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ empty($nombre) ? '' : $nombre }}">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" >{{ empty($descripcion) ? '' : $descripcion }}</textarea>
            </div>      
            <div class="form-group">
            <label>Imagen:</label>
                <input type="file" name="imagen"/>
            </div>      
            <button type="submit">{{ empty($id) ? 'Agregar' : 'Editar' }}</button>
            <a href="/listado_powerup">Cancelar</a>
        </form>
    </div>

</body>
</html>