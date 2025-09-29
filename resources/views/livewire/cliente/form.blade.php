<div class="space-y-6">
    
    <div>
        <flux:input wire:model="form.id_cliente" :label="__('Id Cliente')" type="text"  autocomplete="form.id_cliente" placeholder="Id Cliente"/>
    </div>
    <div>
        <flux:input wire:model="form.primer_nombre" :label="__('Primer Nombre')" type="text"  autocomplete="form.primer_nombre" placeholder="Primer Nombre"/>
    </div>
    <div>
        <flux:input wire:model="form.segundo_nombre" :label="__('Segundo Nombre')" type="text"  autocomplete="form.segundo_nombre" placeholder="Segundo Nombre"/>
    </div>
    <div>
        <flux:input wire:model="form.primer_apellido" :label="__('Primer Apellido')" type="text"  autocomplete="form.primer_apellido" placeholder="Primer Apellido"/>
    </div>
    <div>
        <flux:input wire:model="form.segundo_apellido" :label="__('Segundo Apellido')" type="text"  autocomplete="form.segundo_apellido" placeholder="Segundo Apellido"/>
    </div>
    <div>
        <flux:input wire:model="form.direccion" :label="__('Direccion')" type="text"  autocomplete="form.direccion" placeholder="Direccion"/>
    </div>
    <div>
        <flux:input wire:model="form.telefono" :label="__('Telefono')" type="text"  autocomplete="form.telefono" placeholder="Telefono"/>
    </div>
    <div>
        <flux:input wire:model="form.email" :label="__('Email')" type="text"  autocomplete="form.email" placeholder="Email"/>
    </div>

    <div class="flex items-center gap-4">
        <flux:button variant="primary" type="submit">{{ __('Submit') }}</flux:button>
    </div>
</div>