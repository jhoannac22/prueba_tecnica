<?php

namespace App\Livewire\Equipos;

use App\Models\Equipo;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render(): View
    {
        $equipos = Equipo::paginate();

        return view('livewire.equipo.index', compact('equipos'))
            ->with('i', $this->getPage() * $equipos->perPage());
    }

    public function delete(Equipo $equipo)
    {
        $equipo->delete();

        return $this->redirectRoute('equipos.index', navigate: true);
    }
}
