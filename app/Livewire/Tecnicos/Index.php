<?php

namespace App\Livewire\Tecnicos;

use App\Models\Tecnico;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render(): View
    {
        $tecnicos = Tecnico::paginate();

        return view('livewire.tecnico.index', compact('tecnicos'))
            ->with('i', $this->getPage() * $tecnicos->perPage());
    }

    public function delete(Tecnico $tecnico)
    {
        $tecnico->delete();

        return $this->redirectRoute('tecnicos.index', navigate: true);
    }
}
