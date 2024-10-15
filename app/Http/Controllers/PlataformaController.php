<?php
 
namespace App\Http\Controllers;

use App\Models\Plataformas;
//Agregamos la referencia de Request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use App\Models\User;
use Illuminate\View\View;
 //NombreDelArichivo extiende de Controller
class PlataformaController extends Controller
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
        //Se usa el metodo all para obtener todos los plataformas
        //"SELECT * FROM plataformas"
        $plataformas = Plataformas::all();
        return view("listado_plataforma",["plataformas" => $plataformas]);
    }

    //public function getAll(){
            //Se usa el metodo all para obtner todos los los usuarios
            //"SELECT * FROM usuarios"
           // $plataforma = plataformas::all();

            //Imprimir 
            //dd($usuarios);
            //return view('listado_plataforma', ["plataformas" =>$plataforma]);
        
    //}

    //orm enloquet


    public function getForm($id = null){
        //Validar si estan enviadno el id
        if($id == null){
            //Genramos una instancia nueva 
            $plataforma = new Plataformas();
        }
        else{
            //Ejecutyamos el metodos find parar buscar por el pk
            //"SELECT * FORM usuarios WHERE id=3"
            $plataforma = Plataformas::find($id);
        }
        return view("formulario_plataformas",$plataforma);
    }
    //Agregamos un parametro 
    public function getDelete($id) {
        //Se busca el registro de la tabla
        //SELECT * FROM plataformas WHERE id=1
        $plataforma = Plataformas::find($id);

        //Se borra la imagen
        if(!empty($plataforma->imagen)){
            Storage::delete(public_path('imagenes_plataformas').'/'.$plataforma->imagen);
        }

        //Se ejecuta el metodo delete
        //DELETE FROM plataformas WHERE id=1
        $plataforma->delete();

        //Redigimos a listado
        return redirect('listado_plataforma');
    }

    public function saveData(Request $request) {
        //Obtenemos los parametros de la peticion
        $data = $request->all();
        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        //Validamos si el parametro de id es null
        if($data["id"] == null){
            //instanciamos un objeto plataforma
            $plataforma = new Plataformas();
        }
        else {
            //se busca el registro con el id
            $plataforma = Plataformas::find($data['id']);

            //valido si van a modificar la imagen y si tengo una imagen en la base de datos
            if ($request->hasFile('imagen') && $plataforma->imagen != null) {
                // Eliminar la imagen que se tiene en base datos
                Storage::delete(public_path('imagenes_plataformas').'/'.$plataforma->imagen);
            }
        }

        //Validamos si la imagen se esta enviando
        if($request->hasFile('imagen')) {
            //Generamos un nombre aliatorio y concatenamos la extension de la imagen
            $nombreImagen = time().'.'.$request->imagen->extension();
            //Movemos el archivo a la carpeta publica con el nombre
            $request->imagen->move(public_path('imagenes_plataformas'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original= $nombreImagen;
        }

        //se asignan los parametros de la peticion a objeto
        $plataforma->nombre = $data['nombre'];
        $plataforma->descripcion = $data['descripcion'];
        $plataforma->imagen = $ruta_archivo_original;

        //Se ejecuta el metodo save para agregar o modificar el registro
        $plataforma->save();
        //Se hace la redirecion
        return redirect('listado_plataforma');
    }

}
?>