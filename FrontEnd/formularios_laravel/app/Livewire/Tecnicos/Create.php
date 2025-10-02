<?php

namespace App\Livewire\Tecnicos;

use App\Livewire\Forms\TecnicoForm;
use App\Models\Tecnico;
use Livewire\Component;

class Create extends Component
{
    public TecnicoForm $form;

    public function mount(Tecnico $tecnico)
    {
        $this->form->setTecnicoModel($tecnico);
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectRoute('tecnicos.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.tecnico.create');
    }
}
