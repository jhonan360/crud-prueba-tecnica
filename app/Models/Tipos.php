<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    use HasFactory;

     /**
     * @var array
     */
    protected $fillable = ['idCategoria', 'nombre', 'created_at', 'updated_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Productos', 'id', 'idTipo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorias()
    {
        return $this->belongsTo('App\Models\Categorias', 'idCategoria');
    }
}
