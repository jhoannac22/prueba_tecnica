<?php

namespace App\Livewire\Forms;

use App\Models\EstadoServicio;
use Livewire\Form;

class EstadoServicioForm extends Form
{
    public ?EstadoServicio $estadoServicioModel;
    
    public $id_estado_servicio = '';
    public $estado = '';

    public function rules(): array
    {
        return [
			'id_estado_servicio' => 'required',
			'estado' => 'required|string',
        ];
    }

    public function setEstadoServicioModel(EstadoServicio $estadoServicioModel): void
    {
        $this->estadoServicioModel = $estadoServicioModel;
        
        $this->id_estado_servicio = $this->estadoServicioModel->id_estado_servicio;
        $this->estado = $this->estadoServicioModel->estado;
    }

    public function store(): void
    {
        $this->estadoServicioModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->estadoServicioModel->update($this->validate());

        $this->reset();
    }
}
