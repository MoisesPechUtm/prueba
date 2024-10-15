<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/general.css')}}"/>
    <title>Document</title>
</head>
<body>
<a href="formulario_usuario">Agregar usuario</a>

    <div class="contenedor">
    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Imagenes</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($usuarios as $usuario) 
                <tr>
                <td>{{$usuario['id']}}</td>
                <td>{{$usuario['nombre']}}</td>
                <td>{{$usuario['edad']}}</td>
                <td><img src="/imagenes_personajes/{{ $registro['imagen'] }}" width="100"></td>
                <td><a href='formulario_usuario/{{$usuario["id"]}}'>Editar</a>
                <a href='eliminar_usuario/{{$usuario["id"]}}'>Eliminar</a></td>
                </tr>            
        @endforeach
        </tbody>
    </table>
   </div>
</body>
</html>