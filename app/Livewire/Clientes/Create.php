<?php

namespace App\Livewire\Clientes;

use App\Livewire\Forms\ClienteForm;
use App\Models\Cliente;
use Livewire\Component;

class Create extends Component
{
    public ClienteForm $form;

    public function mount(Cliente $cliente)
    {
        $this->form->setClienteModel($cliente);
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectRoute('clientes.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.cliente.create');
    }
}
