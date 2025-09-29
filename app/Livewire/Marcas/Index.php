<?php

namespace App\Livewire\Marcas;

use App\Models\Marca;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render(): View
    {
        $marcas = Marca::paginate();

        return view('livewire.marca.index', compact('marcas'))
            ->with('i', $this->getPage() * $marcas->perPage());
    }

    public function delete(Marca $marca)
    {
        $marca->delete();

        return $this->redirectRoute('marcas.index', navigate: true);
    }
}
