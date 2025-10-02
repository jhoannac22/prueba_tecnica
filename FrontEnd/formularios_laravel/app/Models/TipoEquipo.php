<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoEquipo
 *
 * @property $id_tipo_equipo
 * @property $tipo_equipo
 * @property $created_at
 * @property $updated_at
 *
 * @property Equipo[] $equipos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoEquipo extends Model
{
    protected $table = 'tipo_equipos';
    protected $primaryKey = 'id_tipo_equipo';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_tipo_equipo', 'tipo_equipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipos()
    {
        return $this->hasMany(\App\Models\Equipo::class, 'id_tipo_equipo', 'id_tipo_equipo');
    }

}
