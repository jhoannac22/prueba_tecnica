<?php

namespace App\Livewire\Forms;

use App\Models\TipoEquipo;
use Livewire\Form;

class TipoEquipoForm extends Form
{
    public ?TipoEquipo $tipoEquipoModel;
    
    public $id_tipo_equipo = '';
    public $tipo_equipo = '';

    public function rules(): array
    {
        return [
			'id_tipo_equipo' => 'required',
			'tipo_equipo' => 'required|string',
        ];
    }

    public function setTipoEquipoModel(TipoEquipo $tipoEquipoModel): void
    {
        $this->tipoEquipoModel = $tipoEquipoModel;
        
        $this->id_tipo_equipo = $this->tipoEquipoModel->id_tipo_equipo;
        $this->tipo_equipo = $this->tipoEquipoModel->tipo_equipo;
    }

    public function store(): void
    {
        $this->tipoEquipoModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->tipoEquipoModel->update($this->validate());

        $this->reset();
    }
}
