<?php
 
namespace App\Http\Controllers;

use App\Models\Powerups;
//Agregamos la referencia de Request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use App\Models\User;
use Illuminate\View\View;
 //NombreDelArichivo extiende de Controller
class PowerupController extends Controller
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
        //Se usa el metodo all para obtener todos los PowerUps
        //"SELECT * FROM PowerUps"
        $powerups = Powerups::all();
        return view("listado_powerup",["powerups" => $powerups]);
    }

    //public function getAll(){
            //Se usa el metodo all para obtner todos los los usuarios
            //"SELECT * FROM usuarios"
           // $powerup = powerups::all();

            //Imprimir 
            //dd($usuarios);
            //return view('listado_powerup', ["powerups" =>$powerup]);
        
    //}

    //orm enloquet


    public function getForm($id = null){
        //Validar si estan enviadno el id
        if($id == null){
            //Genramos una instancia nueva 
            $powerup = new Powerups();
        }
        else{
            //Ejecutyamos el metodos find parar buscar por el pk
            //"SELECT * FORM usuarios WHERE id=3"
            $powerup = Powerups::find($id);
        }
        return view("formulario_powerups",$powerup);
    }
    //Agregamos un parametro 
    public function getDelete($id) {
        //Se busca el registro de la tabla
        //SELECT * FROM powerups WHERE id=1
        $powerup = Powerups::find($id);

        //Se borra la imagen
        if(!empty($powerup->imagen)){
            Storage::delete(public_path('imagenes_powerups').'/'.$powerup->imagen);
        }

        //Se ejecuta el metodo delete
        //DELETE FROM powerups WHERE id=1
        $powerup->delete();

        //Redigimos a listado
        return redirect('listado_powerup');
    }

    public function saveData(Request $request) {
        //Obtenemos los parametros de la peticion
        $data = $request->all();
        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        //Validamos si el parametro de id es null
        if($data["id"] == null){
            //instanciamos un objeto powerup
            $powerup = new Powerups();
        }
        else {
            //se busca el registro con el id
            $powerup = Powerups::find($data['id']);

            //valido si van a modificar la imagen y si tengo una imagen en la base de datos
            if ($request->hasFile('imagen') && $powerup->imagen != null) {
                // Eliminar la imagen que se tiene en base datos
                Storage::delete(public_path('imagenes_powerups').'/'.$powerup->imagen);
            }
        }

        //Validamos si la imagen se esta enviando
        if($request->hasFile('imagen')) {
            //Generamos un nombre aliatorio y concatenamos la extension de la imagen
            $nombreImagen = time().'.'.$request->imagen->extension();
            //Movemos el archivo a la carpeta publica con el nombre
            $request->imagen->move(public_path('imagenes_powerups'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original= $nombreImagen;
        }

        //se asignan los parametros de la peticion a objeto
        $powerup->nombre = $data['nombre'];
        $powerup->descripcion = $data['descripcion'];
        
        if($request->hasFile('imagen')) {
            $powerup->imagen = $ruta_archivo_original;
        }

        //Se ejecuta el metodo save para agregar o modificar el registro
        $powerup->save();
        //Se hace la redirecion
        return redirect('listado_powerup');
    }

}
?>