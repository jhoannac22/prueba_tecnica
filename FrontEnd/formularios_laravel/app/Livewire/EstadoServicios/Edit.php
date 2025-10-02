<?php

namespace App\Livewire\EstadoServicios;

use App\Livewire\Forms\EstadoServicioForm;
use App\Models\EstadoServicio;
use Livewire\Component;

class Edit extends Component
{
    public EstadoServicioForm $form;

    public function mount(EstadoServicio $estadoServicio)
    {
        $this->form->setEstadoServicioModel($estadoServicio);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirectRoute('estado-servicios.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.estado-servicio.edit');
    }
}
