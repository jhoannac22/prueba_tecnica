<?php

namespace App\Livewire\Marcas;

use App\Livewire\Forms\MarcaForm;
use App\Models\Marca;
use Livewire\Component;

class Create extends Component
{
    public MarcaForm $form;

    public function mount(Marca $marca)
    {
        $this->form->setMarcaModel($marca);
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectRoute('marcas.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.marca.create');
    }
}
