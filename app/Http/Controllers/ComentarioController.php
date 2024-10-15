<?php
 
namespace App\Http\Controllers;

use App\Models\Comentario;
//Agregamos la referencia de Request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use App\Models\User;
use Illuminate\View\View;
 //NombreDelArichivo extiende de Controller
class ComentarioController extends Controller
{
    public function index(){
        //informacion de un registro 
        $datos=[
            "id"=> 1,
            "Nombre" => "Miguel",
            "descripcion" =>"ola"
        ];
        //se devuelve una vista 
        return view('landingpage', $datos);
    }

    public function getListado() {
        //Se usa el metodo all para obtener todos los comentario
        //"SELECT * FROM comentario"
        $comentario = Comentario::all();
        return view("listado_comentario",["comentario" => $comentario]);
    }

    public function getAll(){
            //Se usa el metodo all para obtner todos los los usuarios
            //"SELECT * FROM usuarios"
           $comentario = comentario::all();

            //Imprimir 
            //dd($usuarios);
            return view('landingpage', ["comentario" =>$comentario]);
        
    }

    //orm enloquet


    public function getForm($id = null){
        //Validar si estan enviadno el id
        if($id == null){
            //Genramos una instancia nueva 
            $personaje = new Comentario();
        }
        else{
            //Ejecutyamos el metodos find parar buscar por el pk
            //"SELECT * FORM usuarios WHERE id=3"
            $personaje = Comentario::find($id);
        }
        return view("landingpage",$personaje);
    }
    public function getDelete($id)
    {
        // Se consulta el comentario con base al parámetro de id
        $comentarios = Comentario::find($id);
        // Ejecutamos el método para eliminar
        $comentarios->delete();
        // Redirigimos al listado
        return redirect('/listado_comentario');
    }

    public function saveData(Request $request)
    {   
        //Obtenemos los parametros que nos manda la peticion
        $data = $request->all();
        if ($data["id"] == null) {
            $comentarios = new Comentario();
            $comentarios -> nombre = $data['nombre'];
            $comentarios -> comentario = $data['comentario'];
        }else {
            $comentarios = Comentario::find($data['id']);
            $comentarios -> nombre = $data['nombre'];
            $comentarios -> comentario = $data['comentario'];
        }
        $comentarios->save();

        return redirect('/landingpage');
    }
}

?>