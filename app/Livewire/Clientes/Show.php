<?php

namespace App\Livewire\Clientes;

use App\Livewire\Forms\ClienteForm;
use App\Models\Cliente;
use Livewire\Component;

class Show extends Component
{
    public ClienteForm $form;

    public function mount(Cliente $cliente)
    {
        $this->form->setClienteModel($cliente);
    }

    public function render()
    {
        return view('livewire.cliente.show', ['cliente' => $this->form->clienteModel]);
    }
}
