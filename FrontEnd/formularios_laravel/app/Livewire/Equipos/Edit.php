<?php

namespace App\Livewire\Equipos;

use App\Livewire\Forms\EquipoForm;
use App\Models\Equipo;
use Livewire\Component;

class Edit extends Component
{
    public EquipoForm $form;

    public function mount(Equipo $equipo)
    {
        $this->form->setEquipoModel($equipo);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirectRoute('equipos.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.equipo.edit');
    }
}
