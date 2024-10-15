<?php
//Referencia de carpeta o (path)
namespace App\Http\Controllers;

//Agregamos la referencia del modelo
use App\Models\Usuario;
use App\Models\Personajes;
use App\Models\Enemigos;
use App\Models\Powerups;
use App\Models\Mercancias;
use App\Models\Plataformas;

//    NombreTablaController
class PrincipalController extends Controller {

    public function getListado() {
        //Se usa el metodo all para obtener todos los usuarios
        //"SELECT * FROM usuarios"
        $personajes = Personajes::all();
        $enemigo = Enemigos::all();
        $powerups = Powerups::all();
        $mercancia = Mercancias::all();
        $plataformas = Plataformas::all();
        return view("landingpage",[
            "personajes" => $personajes,
            "enemigo" => $enemigo,
            "powerups" => $powerups,
            "mercancia" => $mercancia,
            "plataformas" => $plataformas

    ]);
    }
}
