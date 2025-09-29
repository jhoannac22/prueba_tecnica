<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Cliente
 *
 * @property $id_cliente
 * @property $primer_nombre
 * @property $segundo_nombre
 * @property $primer_apellido
 * @property $segundo_apellido
 * @property $direccion
 * @property $telefono
 * @property $email
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    protected $table = 'clientes'; // Asegura que use la tabla correcta
    protected $primaryKey = 'id_cliente';
    public $incrementing = true; // Si es auto_increment
    protected $keyType = 'int'; // Si es integer
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_cliente', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'direccion', 'telefono', 'email'];


}
