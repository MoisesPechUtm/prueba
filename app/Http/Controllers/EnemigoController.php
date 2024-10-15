<?php
 
namespace App\Http\Controllers;

use App\Models\Enemigos;
//Agregamos la referencia de Request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use App\Models\User;
use Illuminate\View\View;
 //NombreDelArichivo extiende de Controller
class EnemigoController extends Controller
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
        //Se usa el metodo all para obtener todos los enemigos
        //"SELECT * FROM enemigos"
        $enemigos = Enemigos::all();
        return view("listado_enemigo",["enemigo" => $enemigos]);
    }

    //public function getAll(){
            //Se usa el metodo all para obtner todos los los usuarios
            //"SELECT * FROM usuarios"
           // $enemigo = Enemigos::all();

            //Imprimir 
            //dd($usuarios);
            //return view('listado_enemigo', ["Enemigos" =>$enemigo]);
        
    //}

    //orm enloquet


    public function getForm($id = null){
        //Validar si estan enviadno el id
        if($id == null){
            //Genramos una instancia nueva 
            $enemigo = new Enemigos();
        }
        else{
            //Ejecutyamos el metodos find parar buscar por el pk
            //"SELECT * FORM usuarios WHERE id=3"
            $enemigo = Enemigos::find($id);
        }
        return view("formulario_enemigos",$enemigo);
    }
    //Agregamos un parametro 
    public function getDelete($id) {
        //Se busca el registro de la tabla
        //SELECT * FROM enemigos WHERE id=1
        $enemigo = Enemigos::find($id);

        //Se borra la imagen
        if(!empty($enemigo->imagen)){
            Storage::delete(public_path('imagenes_enemigos').'/'.$enemigo->imagen);
        }

        //Se ejecuta el metodo delete
        //DELETE FROM enemigos WHERE id=1
        $enemigo->delete();

        //Redigimos a listado
        return redirect('listado_enemigo');
    }

    public function saveData(Request $request) {
        //Obtenemos los parametros de la peticion
        $data = $request->all();
        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        //Validamos si el parametro de id es null
        if($data["id"] == null){
            //instanciamos un objeto personaje
            $enemigo = new Enemigos();
        }
        else {
            //se busca el registro con el id
            $enemigo = Enemigos::find($data['id']);

            //valido si van a modificar la imagen y si tengo una imagen en la base de datos
            if ($request->hasFile('imagen') && $enemigo->imagen != null) {
                // Eliminar la imagen que se tiene en base datos
                Storage::delete(public_path('imagenes_enemigos').'/'.$enemigo->imagen);
            }
        }

        //Validamos si la imagen se esta enviando
        if($request->hasFile('imagen')) {
            //Generamos un nombre aliatorio y concatenamos la extension de la imagen
            $nombreImagen = time().'.'.$request->imagen->extension();
            //Movemos el archivo a la carpeta publica con el nombre
            $request->imagen->move(public_path('imagenes_enemigos'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original= $nombreImagen;
        }

        //se asignan los parametros de la peticion a objeto
        $enemigo->nombre = $data['nombre'];
        $enemigo->descripcion = $data['descripcion'];
        $enemigo->imagen = $ruta_archivo_original;

        //Se ejecuta el metodo save para agregar o modificar el registro
        $enemigo->save();
        //Se hace la redirecion
        return redirect('listado_enemigo');
    }

}
?>