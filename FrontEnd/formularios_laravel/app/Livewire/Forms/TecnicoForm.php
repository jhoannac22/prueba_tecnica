<?php

namespace App\Livewire\Forms;

use App\Models\Tecnico;
use Livewire\Form;

class TecnicoForm extends Form
{
    public ?Tecnico $tecnicoModel;
    
    public $id_tecnico = '';
    public $primer_nombre = '';
    public $segundo_nombre = '';
    public $primer_apellido = '';
    public $segundo_apellido = '';
    public $especialidad = '';
    public $telefono = '';
    public $email = '';

    public function rules(): array
    {
        return [
			'id_tecnico' => 'required',
			'primer_nombre' => 'required|string',
			'segundo_nombre' => 'string',
			'primer_apellido' => 'required|string',
			'segundo_apellido' => 'string',
			'especialidad' => 'string',
			'telefono' => 'required|string',
			'email' => 'required|string',
        ];
    }

    public function setTecnicoModel(Tecnico $tecnicoModel): void
    {
        $this->tecnicoModel = $tecnicoModel;
        
        $this->id_tecnico = $this->tecnicoModel->id_tecnico;
        $this->primer_nombre = $this->tecnicoModel->primer_nombre;
        $this->segundo_nombre = $this->tecnicoModel->segundo_nombre;
        $this->primer_apellido = $this->tecnicoModel->primer_apellido;
        $this->segundo_apellido = $this->tecnicoModel->segundo_apellido;
        $this->especialidad = $this->tecnicoModel->especialidad;
        $this->telefono = $this->tecnicoModel->telefono;
        $this->email = $this->tecnicoModel->email;
    }

    public function store(): void
    {
        $this->tecnicoModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->tecnicoModel->update($this->validate());

        $this->reset();
    }
}
