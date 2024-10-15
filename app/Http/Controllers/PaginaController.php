<?php
//Referencia de carpeta o (path)
namespace App\Http\Controllers;

//Agregamos la referencia del modelo
use App\Models\Usuario;
use App\Models\Personajes;

//    NombreTablaController
class PrincipalController extends Controller {

    public function getListado() {
        //Se usa el metodo all para obtener todos los usuarios
        //"SELECT * FROM usuarios"
        $usuarios = Usuario::all();
        $personajes = Personajes::all();
        return view("principal",[
            "usuarios" => $usuarios,
            "personajes" => $personajes
    ]);
    }
}
