<?php
//ruta de referencia
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enemigos extends Model
{
    use HasFactory;

    //Definimos que tabla es de la base de datos
    protected $tableName = "enemigos";

    //Definimos el primary key de la tabla
    protected $primaryKey = "id";

    //Desabilitar los campos de created_ y update_at
    public $timestamps = false;

    //Definimos las demas columnas que tenemis en la tabla
    protected $filalable = [
        'nombre',
        'descripcion',
        'imagen'
    ];

    
}
