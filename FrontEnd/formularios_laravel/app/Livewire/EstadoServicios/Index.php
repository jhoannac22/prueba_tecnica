<?php

namespace App\Livewire\EstadoServicios;

use App\Models\EstadoServicio;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render(): View
    {
        $estadoServicios = EstadoServicio::paginate();

        return view('livewire.estado-servicio.index', compact('estadoServicios'))
            ->with('i', $this->getPage() * $estadoServicios->perPage());
    }

    public function delete(EstadoServicio $estadoServicio)
    {
        $estadoServicio->delete();

        return $this->redirectRoute('estado-servicios.index', navigate: true);
    }
}
