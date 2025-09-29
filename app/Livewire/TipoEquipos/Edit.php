<?php

namespace App\Livewire\TipoEquipos;

use App\Livewire\Forms\TipoEquipoForm;
use App\Models\TipoEquipo;
use Livewire\Component;

class Edit extends Component
{
    public TipoEquipoForm $form;

    public function mount(TipoEquipo $tipoEquipo)
    {
        $this->form->setTipoEquipoModel($tipoEquipo);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirectRoute('tipo-equipos.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.tipo-equipo.edit');
    }
}
