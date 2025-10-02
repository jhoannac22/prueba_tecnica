<?php

namespace App\Livewire\Forms;

use App\Models\Cliente;
use Livewire\Form;

class ClienteForm extends Form
{
    public ?Cliente $clienteModel;
    
    public $id_cliente = '';
    public $primer_nombre = '';
    public $segundo_nombre = '';
    public $primer_apellido = '';
    public $segundo_apellido = '';
    public $direccion = '';
    public $telefono = '';
    public $email = '';

    public function rules(): array
    {
        return [
			'id_cliente' => 'required',
			'primer_nombre' => 'required|string',
			'segundo_nombre' => 'string',
			'primer_apellido' => 'required|string',
			'segundo_apellido' => 'string',
			'direccion' => 'required|string',
			'telefono' => 'required|string',
			'email' => 'required|string',
        ];
    }

    public function setClienteModel(Cliente $clienteModel): void
    {
        $this->clienteModel = $clienteModel;
        
        $this->id_cliente = $this->clienteModel->id_cliente;
        $this->primer_nombre = $this->clienteModel->primer_nombre;
        $this->segundo_nombre = $this->clienteModel->segundo_nombre;
        $this->primer_apellido = $this->clienteModel->primer_apellido;
        $this->segundo_apellido = $this->clienteModel->segundo_apellido;
        $this->direccion = $this->clienteModel->direccion;
        $this->telefono = $this->clienteModel->telefono;
        $this->email = $this->clienteModel->email;
    }

    public function store(): void
    {
        $this->clienteModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->clienteModel->update($this->validate());

        $this->reset();
    }
}
