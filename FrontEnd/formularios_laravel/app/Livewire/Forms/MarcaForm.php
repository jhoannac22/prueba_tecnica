<?php

namespace App\Livewire\Forms;

use App\Models\Marca;
use Livewire\Form;

class MarcaForm extends Form
{
    public ?Marca $marcaModel;
    
    public $id_marca = '';
    public $marca = '';

    public function rules(): array
    {
        return [
			'id_marca' => 'required',
			'marca' => 'required|string',
        ];
    }

    public function setMarcaModel(Marca $marcaModel): void
    {
        $this->marcaModel = $marcaModel;
        
        $this->id_marca = $this->marcaModel->id_marca;
        $this->marca = $this->marcaModel->marca;
    }

    public function store(): void
    {
        $this->marcaModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->marcaModel->update($this->validate());

        $this->reset();
    }
}
