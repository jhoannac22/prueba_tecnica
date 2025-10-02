<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Marca
 *
 * @property $id_marca
 * @property $marca
 * @property $created_at
 * @property $updated_at
 *
 * @property Equipo[] $equipos
 * @property Modelo[] $modelos
 * @property HistorialMovimiento[] $historialMovimientos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Marca extends Model
{
    protected $table='marcas';
    protected $primaryKey = 'id_marca';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_marca', 'marca'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipos()
    {
        return $this->hasMany(\App\Models\Equipo::class, 'id_marca', 'marca_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modelos()
    {
        return $this->hasMany(\App\Models\Modelo::class, 'id', 'marca_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialMovimientos()
    {
        return $this->hasMany(\App\Models\HistorialMovimiento::class, 'id', 'marca_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */


}
