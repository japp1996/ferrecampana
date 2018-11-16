<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    public $timestamps = false;
    protected $table = "productos";

    public function categorias()
    {
        return $this->hasOne(Categoria::class, 'code');
    }
}
