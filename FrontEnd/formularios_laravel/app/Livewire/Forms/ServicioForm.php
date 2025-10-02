<?php

namespace App\Livewire\Forms;

use App\Models\Servicio;
use Livewire\Form;

class ServicioForm extends Form
{
    public ?Servicio $servicioModel;
    
    public $id_servicio = '';
    public $fecha_recepcion = '';
    public $descripcion_problema = '';
    public $id_estado_servicio = '';
    public $diagnostico_servicio = '';
    public $solucion_servicio = '';
    public $id_tecnico = '';
    public $id_equipo = '';
    public $id_cliente = '';
    public $fecha_entrega = '';

    public function rules(): array
    {
        return [
			'id_servicio' => 'required',
			'fecha_recepcion' => 'required',
			'descripcion_problema' => 'required|string',
			'id_estado_servicio' => 'required',
			'diagnostico_servicio' => 'string',
			'solucion_servicio' => 'string',
			'id_tecnico' => 'required',
			'id_equipo' => 'required',
			'id_cliente' => 'required',
        ];
    }

    public function setServicioModel(Servicio $servicioModel): void
    {
        $this->servicioModel = $servicioModel;
        
        $this->id_servicio = $this->servicioModel->id_servicio;
        $this->fecha_recepcion = $this->servicioModel->fecha_recepcion;
        $this->descripcion_problema = $this->servicioModel->descripcion_problema;
        $this->id_estado_servicio = $this->servicioModel->id_estado_servicio;
        $this->diagnostico_servicio = $this->servicioModel->diagnostico_servicio;
        $this->solucion_servicio = $this->servicioModel->solucion_servicio;
        $this->id_tecnico = $this->servicioModel->id_tecnico;
        $this->id_equipo = $this->servicioModel->id_equipo;
        $this->id_cliente = $this->servicioModel->id_cliente;
        $this->fecha_entrega = $this->servicioModel->fecha_entrega;
    }

    public function store(): void
    {
        $this->servicioModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->servicioModel->update($this->validate());

        $this->reset();
    }
}
