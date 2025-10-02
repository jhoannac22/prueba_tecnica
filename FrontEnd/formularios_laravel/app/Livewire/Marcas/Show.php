<?php

namespace App\Livewire\Marcas;

use App\Livewire\Forms\MarcaForm;
use App\Models\Marca;
use Livewire\Component;

class Show extends Component
{
    public MarcaForm $form;

    public function mount(Marca $marca)
    {
        $this->form->setMarcaModel($marca);
    }

    public function render()
    {
        return view('livewire.marca.show', ['marca' => $this->form->marcaModel]);
    }
}
