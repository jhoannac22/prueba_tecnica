<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Equipo
 *
 * @property $id_equipo
 * @property $id_cliente
 * @property $id_tipo_equipo
 * @property $id_marca
 * @property $id_tecnico
 * @property $modelo
 * @property $serie
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Marca $marca
 * @property Tecnico $tecnico
 * @property TipoEquipo $tipoEquipo
 * @property Asignacione[] $asignaciones
 * @property HistorialMovimiento[] $historialMovimientos
 * @property Servicio[] $servicios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Equipo extends Model
{
    protected $table = 'equipos';
    protected $primaryKey = 'id_equipo';
    protected $perPage = 20;

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_equipo', 'id_cliente', 'id_tipo_equipo', 'id_marca', 'id_tecnico', 'modelo', 'serie', 'descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'id_cliente', 'id_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marca()
    {
        return $this->belongsTo(\App\Models\Marca::class, 'id_marca', 'id_marca');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tecnico()
    {
        return $this->belongsTo(\App\Models\Tecnico::class, 'id_tecnico', 'id_tecnico');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoEquipo()
    {
        return $this->belongsTo(\App\Models\TipoEquipo::class, 'id_tipo_equipo', 'id_tipo_equipo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaciones()
    {
        return $this->hasMany(\App\Models\Asignacione::class, 'id_equipo', 'id_equipo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialMovimientos()
    {
        return $this->hasMany(\App\Models\HistorialMovimiento::class, 'id_equipo', 'id_equipo');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicios()
    {
        return $this->hasMany(\App\Models\Servicio::class, 'id_equipo', 'id_equipo');
    }

}
