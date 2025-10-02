<?php

namespace App\Livewire\TipoEquipos;

use App\Livewire\Forms\TipoEquipoForm;
use App\Models\TipoEquipo;
use Livewire\Component;

class Show extends Component
{
    public TipoEquipoForm $form;

    public function mount(TipoEquipo $tipoEquipo)
    {
        $this->form->setTipoEquipoModel($tipoEquipo);
    }

    public function render()
    {
        return view('livewire.tipo-equipo.show', ['tipoEquipo' => $this->form->tipoEquipoModel]);
    }
}
