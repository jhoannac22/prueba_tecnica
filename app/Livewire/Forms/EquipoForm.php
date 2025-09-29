<?php

namespace App\Livewire\Forms;

use App\Models\Equipo;
use Livewire\Form;

class EquipoForm extends Form
{
    public ?Equipo $equipoModel;
    
    public $id_equipo = '';
    public $id_cliente = '';
    public $id_tipo_equipo = '';
    public $id_marca = '';
    public $id_tecnico = '';
    public $modelo = '';
    public $serie = '';
    public $descripcion = '';

    public function rules(): array
    {
        return [
			'id_equipo' => 'required',
			'id_cliente' => 'required',
			'id_tipo_equipo' => 'required',
			'id_marca' => 'required',
			'modelo' => 'string',
			'serie' => 'required|string',
			'descripcion' => 'string',
        ];
    }

    public function setEquipoModel(Equipo $equipoModel): void
    {
        $this->equipoModel = $equipoModel;
        
        $this->id_equipo = $this->equipoModel->id_equipo;
        $this->id_cliente = $this->equipoModel->id_cliente;
        $this->id_tipo_equipo = $this->equipoModel->id_tipo_equipo;
        $this->id_marca = $this->equipoModel->id_marca;
        $this->id_tecnico = $this->equipoModel->id_tecnico;
        $this->modelo = $this->equipoModel->modelo;
        $this->serie = $this->equipoModel->serie;
        $this->descripcion = $this->equipoModel->descripcion;
    }

    public function store(): void
    {
        $this->equipoModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->equipoModel->update($this->validate());

        $this->reset();
    }
}
