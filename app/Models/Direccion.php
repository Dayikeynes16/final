<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $fillable = ['destinatario', 'direccion','telefono','referencias', 'usuario_id', 'nombre','codigo_postal','estado'];

    public $timestamps = false;

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }

}
