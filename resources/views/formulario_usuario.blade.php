<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/guardar_usuario" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ empty($id) ? '' : $id}}"/>
        <label for="">Nombre:</label>
        <br>
        <input type="text" name="nombre" value="{{ empty($nombre) ? '' : $nombre}}"/>
        <label for="">Edad:</label>
        <br>
        <input type="text" name="edad" value="{{ empty($edad) ? '' : $edad}}"/>
        <br>
        <label for="">Imagenes:</label>
        <br>
        <input type="file" name="imagen" value=""/>
        <br>
        <button type="submit">{{ empty($id) ? 'Agregar' : 'Modificar' }}</button>
        <a href="listado">Cancelar</a>
    </form>
</body>
</html>