<?php
 
namespace App\Http\Controllers;

use App\Models\Usuario;
//Agregamos la referencia de Request
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

//use App\Models\User;
use Illuminate\View\View;
 //NombreDelArichivo extiende de Controller
class UsuarioController extends Controller
{
    public function getListado(){
        $usuarios = Usuario::all();
        return view ("listado_usuario", ["usuarios" => $usuarios]);
    }

    public function getApiListado(){
        $usuarios = Usuario::all();
        return ["usuarios" => $usuarios];
    }


    public function index(){
        //informacion de un registro 
        $datos=[
            "id"=> 1,
            "Nombre" => "Miguel"
        ];
        //se devuelve una vista 
        return view('listado_usuario', $datos);
    }

    public function getAll(){
            //Se usa el metodo all para obtner todos los los usuarios
            //"SELECT * FROM usuarios"
            $usuarios = Usuario::all();

            //Imprimir 
            //dd($usuarios);
            return view('listado', ["usuarios" =>$usuarios]);
        
    }

    //orm enloquet


    public function getForm($id = null){
        //Validar si estan enviadno el id
        if($id == null){
            //Genramos una instancia nueva 
            $usuario = new Usuario();
        }
        else{
            //Ejecutyamos el metodos find parar buscar por el pk
            //"SELECT * FORM usuarios WHERE id=3"
            $usuario = Usuario::find($id);
        }
        return view("formulario_usuario",$usuario);
    }
    //Agregamos un parametro 
    public function getDelete($id) {
        //Se busca el registro de la tabla
        //SELECT * FROM usuarios WHERE id=1
        $usuario = Usuario::find($id);
        //Se borra la imagen
        if(!empty($usuario->imagen)){
            Storage::delete(public_path('imagenes').'/'.$usuario->imagen);
        }
        //Se ejecuta el metodo delete
        //DELETE FROM usuarios WHERE id=1
        $usuario->delete();

        //Redigimos a listado
        return redirect('listado_usuario');
    }
    //Agregamos un pareametro opcional
    public function saveData(Request $request) {
        //Obtenemos los parametros de la peticion
        $data = $request->all();

        //Validamos si el parametro de id es null
        if($data["id"] == null){
            //instanciamos un objeto usuario
            $usuario = new Usuario();
        }
        else {
            //se busca el registro con el id
            $usuario = Usuario::find($data['id']);


            if ($request->hasFile('imagen')) {
                // Eliminar la imagen anterior
                Storage::delete(public_path('imagenes').'/'.$usuario->imagen);
            }
        }

        //Validamos si la imagen se esta enviando
        if($request->hasFile('imagen')) {
            $nombreImagen = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $nombreImagen);
            $ruta_archivo_original= $nombreImagen;
        }

        //se asignan los parametros de la peticion a objeto
        $usuario->nombre = $data['nombre'];
        $usuario->edad = $data['edad'];
        $usuario->imagen = $ruta_archivo_original;
        //Se ejecuta el metodo save para agregar o modificar el registro
        $usuario->save();
        //Se hace la redirecion
        return redirect('listado_usuario');
    }

    
}
?>