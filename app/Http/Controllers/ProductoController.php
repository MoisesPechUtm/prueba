<?php
 
namespace App\Http\Controllers;

use App\Models\Productos;
//Agregamos la referencia de Request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use App\Models\User;
use Illuminate\View\View;
 //NombreDelArichivo extiende de Controller
class ProductoController extends Controller
{

    public function getApiListado(){
        $productos = Productos::all();
        return ["productos" => $productos];
    }


    public function getApiGetProductoByID($id = null){

            $producto = Productos::find($id);
        
        return $producto;
    }

    public function deleteApiEliminar($id) {
        //Se busca el registro de la tabla
        //SELECT * FROM productos WHERE id=1
        $producto = Productos::find($id);

        //Se borra la imagen
        if(!empty($producto->imagen)){
            Storage::delete(public_path('imagenes_productos').'/'.$producto->imagen);
        }

        //Se ejecuta el metodo delete
        //DELETE FROM productos WHERE id=1
        $producto->delete();

    }

    public function getApiFiltro(Request $request){
        //obtenemos los parametros 
        $filtro =$request->input('filtro');
        //"SLECT + FROM usarios WHERE nombre like '%a%'"
        $productos = Productos::Where('nombre','like', "%$filtro%")->get();
        return ["productos"=> $productos];
    }

    public function saveData(Request $request) {
        //Obtenemos los parametros de la peticion
        $data = $request->all();
        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        //Validamos si el parametro de id es null
        if($data["id"] == null){
            //instanciamos un objeto producto
            $producto = new Productos();
        }
        else {
            //se busca el registro con el id
            $producto = Productos::find($data['id']);

            //valido si van a modificar la imagen y si tengo una imagen en la base de datos
            if ($request->hasFile('imagen') && $producto->imagen != null) {
                // Eliminar la imagen que se tiene en base datos
                Storage::delete(public_path('imagenes_productos').'/'.$producto->imagen);
            }
        }


        //Validamos si la imagen se esta enviando
        if($request->hasFile('imagen')) {
            //Generamos un nombre aliatorio y concatenamos la extension de la imagen
            $nombreImagen = time().'.'.$request->imagen->extension();
            //Movemos el archivo a la carpeta publica con el nombre
            $request->imagen->move(public_path('imagenes_productos'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original= $nombreImagen;
        }

        //se asignan los parametros de la peticion a objeto
        $producto->nombre = $data['nombre'];
        $producto->precio = $data['precio'];

        if ($request->hasFile('imagen')) {
            $producto->imagen = $ruta_archivo_original;
        }

        if ($data = "") {
            # code...
        }

        //Se ejecuta el metodo save para agregar o modificar el registro
        $producto->save();

    }


    public function postApiAddProducto(Request $request) {
        //Obtenemos los parametros de la peticion
        $data = $request->all();
        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        $producto = new Productos();
        

        //Validamos si la imagen se esta enviando
        if($request->hasFile('imagen')) {
            //Generamos un nombre aliatorio y concatenamos la extension de la imagen
            $nombreImagen = time().'.'.$request->imagen->extension();
            //Movemos el archivo a la carpeta publica con el nombre
            $request->imagen->move(public_path('imagenes_productos'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original= $nombreImagen;
        }

        //se asignan los parametros de la peticion a objeto
        $producto->nombre = $data['nombre'];
        $producto->precio = $data['precio'];
        $producto->imagen = $ruta_archivo_original;

        //Se ejecuta el metodo save para agregar o modificar el registro
        $producto->save();
        //Se hace la redirecion
    }

    public function putApiUpdateProducto($id, Request $request) {
        //Obtenemos los parametros de la peticion
        $data = $request->all();
        //Establecemos un nombre de la imagen
        $producto_id = $data['id'];

        $producto = Productos::find($producto_id);
        

        //Validamos si la imagen se esta enviando
    
        $producto->imagen = $producto->imagen;
        //se asignan los parametros de la peticion a objeto
        $producto->nombre = $data['nombre'];
        $producto->precio = $data['precio'];

        //Se ejecuta el metodo save para agregar o modificar el registro
        $producto->save();
        //Se hace la redirecion
    }
}



?>