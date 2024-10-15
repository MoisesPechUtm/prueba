<?php
 
namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Productos;
//Agregamos la referencia de Request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use App\Models\User;
use Illuminate\View\View;
 //NombreDelArichivo extiende de Controller
class CompraController extends Controller
{

    public function getApiListado(){
        $compras = Compras::all();
        return ["compras" => $compras];
    }

    public function getApiGetCompraByID($id = null){

            $compra = Compras::find($id);
        
        return $compra;
    }
    //Agregamos un parametro 

    public function getApiFiltro(Request $request){
        //obtenemos los parametros 
        $filtro =$request->input('filtro');
        //"SLECT + FROM usarios WHERE nombre like '%a%'"
        $compras = Compras::Where('nombre', 'like', "%$filtro%")->get();
        return ["compras"=> $compras];
    }

  

    public function postApiAddCompra(Request $request) {
        //Obtenemos los parametros de la peticion
        $data = $request->all();

        $producto_id = $data['id'];
        
        $producto = Productos::find($producto_id);
        
        $compra = new Compras();
        
        //se asignan los parametros de la peticion a objeto
        $compra->nombre = $producto->nombre;
        $compra->precio = $producto->precio;
        $compra->fecha = now();
        $compra->imagen = $producto->imagen;

        //Se ejecuta el metodo save para agregar o modificar el registro
        $compra->save();
        //Se hace la redirecion
    }

    public function putApiUpdateCompra($id, Request $request) {
        //Obtenemos los parametros de la peticion
        $data = $request->all();
        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        $compra = Compras::find($id);
        

        //Validamos si la imagen se esta enviando
        if($request->hasFile('imagen')) {
            if ($compra->imagen !=null) {
                Storage::delete(public_path('imagenes_compras').'/'.$compra->imagen);
            }
            $nombreImagen = time().'.'.$request->imagen->extension();
            //Movemos el archivo a la carpeta publica con el nombre
            $request->imagen->move(public_path('imagenes_compras'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original= $nombreImagen;
        }

        //se asignan los parametros de la peticion a objeto
        $compra->nombre = $data['nombre'];
        $compra->precio = $data['precio'];
        $compra->fecha = now();
        $compra->imagen = $ruta_archivo_original;

        //Se ejecuta el metodo save para agregar o modificar el registro
        $compra->save();
        //Se hace la redirecion
    }
}



?>