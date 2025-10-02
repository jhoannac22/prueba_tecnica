<?php

namespace App\Livewire\TipoEquipos;

use App\Models\TipoEquipo;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render(): View
    {
        $tipoEquipos = TipoEquipo::paginate();

        return view('livewire.tipo-equipo.index', compact('tipoEquipos'))
            ->with('i', $this->getPage() * $tipoEquipos->perPage());
    }

    public function delete(TipoEquipo $tipoEquipo)
    {
        $tipoEquipo->delete();

        return $this->redirectRoute('tipo-equipos.index', navigate: true);
    }
}
