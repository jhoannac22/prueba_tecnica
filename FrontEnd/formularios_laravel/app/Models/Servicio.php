<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 *
 * @property $id_servicio
 * @property $fecha_recepcion
 * @property $descripcion_problema
 * @property $id_estado_servicio
 * @property $diagnostico_servicio
 * @property $solucion_servicio
 * @property $id_tecnico
 * @property $id_equipo
 * @property $id_cliente
 * @property $fecha_entrega
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Equipo $equipo
 * @property EstadoServicio $estadoServicio
 * @property Tecnico $tecnico
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Servicio extends Model
{
    protected $table='servicios';
    protected $primaryKey = 'id_servicio';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_servicio', 'fecha_recepcion', 'descripcion_problema', 'id_estado_servicio', 'diagnostico_servicio', 'solucion_servicio', 'id_tecnico', 'id_equipo', 'id_cliente', 'fecha_entrega'];


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
    public function equipo()
    {
        return $this->belongsTo(\App\Models\Equipo::class, 'id_equipo', 'id_equipo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadoServicio()
    {
        return $this->belongsTo(\App\Models\EstadoServicio::class, 'id_estado_servicio', 'id_estado_servicio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tecnico()
    {
        return $this->belongsTo(\App\Models\Tecnico::class, 'id_tecnico', 'id_tecnico');
    }

}
