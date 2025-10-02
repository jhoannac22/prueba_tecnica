<?php

namespace App\Livewire\Tecnicos;

use App\Livewire\Forms\TecnicoForm;
use App\Models\Tecnico;
use Livewire\Component;

class Show extends Component
{
    public TecnicoForm $form;

    public function mount(Tecnico $tecnico)
    {
        $this->form->setTecnicoModel($tecnico);
    }

    public function render()
    {
        return view('livewire.tecnico.show', ['tecnico' => $this->form->tecnicoModel]);
    }
}
