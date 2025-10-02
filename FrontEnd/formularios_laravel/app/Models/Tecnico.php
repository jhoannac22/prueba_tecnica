<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tecnico
 *
 * @property $id_tecnico
 * @property $primer_nombre
 * @property $segundo_nombre
 * @property $primer_apellido
 * @property $segundo_apellido
 * @property $especialidad
 * @property $telefono
 * @property $email
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tecnico extends Model
{
    protected $table = 'tecnicos'; // Asegura que use la tabla correcta
    protected $primaryKey = 'id_tecnico';
    public $incrementing = true; // Si es auto_increment
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_tecnico', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'especialidad', 'telefono', 'email'];


}
