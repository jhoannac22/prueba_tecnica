<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render(): View
    {
        $clientes = Cliente::paginate();

        return view('livewire.cliente.index', compact('clientes'))
            ->with('i', $this->getPage() * $clientes->perPage());
    }

    public function delete(Cliente $cliente)
    {
        $cliente->delete();

        return $this->redirectRoute('clientes.index', navigate: true);
    }
}
