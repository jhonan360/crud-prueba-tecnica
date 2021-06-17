<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

     /**
     * @var array
     */
    protected $fillable = ['idTipo', 'nombre', 'precio', 'descripcion', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipos()
    {
        return $this->belongsTo('App\Models\Tipos', 'idTipo');
    }

    
}
