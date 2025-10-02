<?php

namespace App\Livewire\Equipos;

use App\Livewire\Forms\EquipoForm;
use App\Models\Equipo;
use Livewire\Component;

class Show extends Component
{
    public EquipoForm $form;

    public function mount(Equipo $equipo)
    {
        $this->form->setEquipoModel($equipo);
    }

    public function render()
    {
        return view('livewire.equipo.show', ['equipo' => $this->form->equipoModel]);
    }
}
