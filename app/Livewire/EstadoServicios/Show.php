<?php

namespace App\Livewire\EstadoServicios;

use App\Livewire\Forms\EstadoServicioForm;
use App\Models\EstadoServicio;
use Livewire\Component;

class Show extends Component
{
    public EstadoServicioForm $form;

    public function mount(EstadoServicio $estadoServicio)
    {
        $this->form->setEstadoServicioModel($estadoServicio);
    }

    public function render()
    {
        return view('livewire.estado-servicio.show', ['estadoServicio' => $this->form->estadoServicioModel]);
    }
}
