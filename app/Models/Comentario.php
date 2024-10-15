<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    // Definimos qué tabla es de la base de datos
    protected $table = "comentarios";

    // Definimos el primary key de la tabla
    protected $primaryKey = "id";

    // Deshabilitar los campos de created_at y updated_at
    public $timestamps = false;

    // Definimos las demás columnas que tenemos en la tabla
    protected $fillable = [
        'nombre',
        'comentario'
    ];
}
?>