<?php
 
namespace App\Http\Controllers;

use App\Models\Personajes;
//Agregamos la referencia de Request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use App\Models\User;
use Illuminate\View\View;
 //NombreDelArichivo extiende de Controller
class PersonajeController extends Controller
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
        //Se usa el metodo all para obtener todos los personajes
        //"SELECT * FROM personajes"
        $personajes = Personajes::all();
        return view("listado_personaje",["personajes" => $personajes]);
    }

    public function getApiListado(){
        $personajes = Personajes::all();
        return ["personajes" => $personajes];
    }

    public function getForm($id = null){
        //Validar si estan enviadno el id
        if($id == null){
            //Genramos una instancia nueva 
            $personaje = new Personajes();
        }
        else{
            //Ejecutyamos el metodos find parar buscar por el pk
            //"SELECT * FORM usuarios WHERE id=3"
            $personaje = Personajes::find($id);
        }
        return view("formulario_personajes",$personaje);
    }

    public function getApiGetPersonajeByID($id = null){

            $personaje = Personajes::find($id);
        
        return $personaje;
    }
    //Agregamos un parametro 
    public function getDelete($id) {
        //Se busca el registro de la tabla
        //SELECT * FROM personajes WHERE id=1
        $personaje = Personajes::find($id);

        //Se borra la imagen
        if(!empty($personaje->imagen)){
            Storage::delete(public_path('imagenes_personajes').'/'.$personaje->imagen);
        }

        //Se ejecuta el metodo delete
        //DELETE FROM personajes WHERE id=1
        $personaje->delete();

        //Redigimos a listado
        return redirect('listado_personaje');
    }

    public function deleteApiEliminar($id) {
        //Se busca el registro de la tabla
        //SELECT * FROM personajes WHERE id=1
        $personaje = Personajes::find($id);

        //Se borra la imagen
        if(!empty($personaje->imagen)){
            Storage::delete(public_path('imagenes_personajes').'/'.$personaje->imagen);
        }

        //Se ejecuta el metodo delete
        //DELETE FROM personajes WHERE id=1
        $personaje->delete();

    }

    public function getApiFiltro(Request $request){
        //obtenemos los parametros 
        $filtro =$request->input('filtro');
        //"SLECT + FROM usarios WHERE nombre like '%a%'"
        $personajes = Personajes::Where('nombre', 'like', "%$filtro%")->get();
        return ["personajes"=> $personajes];
    }



    public function saveData(Request $request) {
        //Obtenemos los parametros de la peticion
        $data = $request->all();
        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        //Validamos si el parametro de id es null
        if($data["id"] == null){
            //instanciamos un objeto personaje
            $personaje = new Personajes();
        }
        else {
            //se busca el registro con el id
            $personaje = Personajes::find($data['id']);

            //valido si van a modificar la imagen y si tengo una imagen en la base de datos
            if ($request->hasFile('imagen') && $personaje->imagen != null) {
                // Eliminar la imagen que se tiene en base datos
                Storage::delete(public_path('imagenes_personajes').'/'.$personaje->imagen);
            }
        }


        //Validamos si la imagen se esta enviando
        if($request->hasFile('imagen')) {
            //Generamos un nombre aliatorio y concatenamos la extension de la imagen
            $nombreImagen = time().'.'.$request->imagen->extension();
            //Movemos el archivo a la carpeta publica con el nombre
            $request->imagen->move(public_path('imagenes_personajes'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original= $nombreImagen;
        }

        //se asignan los parametros de la peticion a objeto
        $personaje->nombre = $data['nombre'];
        $personaje->descripcion = $data['descripcion'];

        if ($request->hasFile('imagen')) {
            $personaje->imagen = $ruta_archivo_original;
        }

        if ($data = "") {
            # code...
        }

        //Se ejecuta el metodo save para agregar o modificar el registro
        $personaje->save();

    }


    public function postApiAddPersonaje(Request $request) {
        //Obtenemos los parametros de la peticion
        $data = $request->all();
        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        $personaje = new Personajes();
        

        //Validamos si la imagen se esta enviando
        if($request->hasFile('imagen')) {
            //Generamos un nombre aliatorio y concatenamos la extension de la imagen
            $nombreImagen = time().'.'.$request->imagen->extension();
            //Movemos el archivo a la carpeta publica con el nombre
            $request->imagen->move(public_path('imagenes_personajes'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original= $nombreImagen;
        }

        //se asignan los parametros de la peticion a objeto
        $personaje->nombre = $data['nombre'];
        $personaje->descripcion = $data['descripcion'];
        $personaje->imagen = $ruta_archivo_original;

        //Se ejecuta el metodo save para agregar o modificar el registro
        $personaje->save();
        //Se hace la redirecion
    }
    public function putApiUpdatePersonaje($id, Request $request) {
        //Obtenemos los parametros de la peticion
        $data = $request->all();
        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        $personaje = Personajes::find($id);
        

        //Validamos si la imagen se esta enviando
        if($request->hasFile('imagen')) {
            if ($personaje->imagen !=null) {
                Storage::delete(public_path('imagenes_personajes').'/'.$personaje->imagen);
            }
            $nombreImagen = time().'.'.$request->imagen->extension();
            //Movemos el archivo a la carpeta publica con el nombre
            $request->imagen->move(public_path('imagenes_personajes'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original= $nombreImagen;
        }

        //se asignan los parametros de la peticion a objeto
        $personaje->nombre = $data['nombre'];
        $personaje->descripcion = $data['descripcion'];
        $personaje->imagen = $ruta_archivo_original;

        //Se ejecuta el metodo save para agregar o modificar el registro
        $personaje->save();
        //Se hace la redirecion
    }
}



?>