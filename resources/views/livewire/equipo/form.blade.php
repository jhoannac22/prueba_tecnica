<div class="space-y-6">
    
    <div>
        <flux:input wire:model="form.id_equipo" :label="__('Id Equipo')" type="text"  autocomplete="form.id_equipo" placeholder="Id Equipo"/>
    </div>
    <div>
        <flux:input wire:model="form.id_cliente" :label="__('Id Cliente')" type="text"  autocomplete="form.id_cliente" placeholder="Id Cliente"/>
    </div>
    <div>
        <flux:input wire:model="form.id_tipo_equipo" :label="__('Id Tipo Equipo')" type="text"  autocomplete="form.id_tipo_equipo" placeholder="Id Tipo Equipo"/>
    </div>
    <div>
        <flux:input wire:model="form.id_marca" :label="__('Id Marca')" type="text"  autocomplete="form.id_marca" placeholder="Id Marca"/>
    </div>
    <div>
        <flux:input wire:model="form.id_tecnico" :label="__('Id Tecnico')" type="text"  autocomplete="form.id_tecnico" placeholder="Id Tecnico"/>
    </div>
    <div>
        <flux:input wire:model="form.modelo" :label="__('Modelo')" type="text"  autocomplete="form.modelo" placeholder="Modelo"/>
    </div>
    <div>
        <flux:input wire:model="form.serie" :label="__('Serie')" type="text"  autocomplete="form.serie" placeholder="Serie"/>
    </div>
    <div>
        <flux:input wire:model="form.descripcion" :label="__('Descripcion')" type="text"  autocomplete="form.descripcion" placeholder="Descripcion"/>
    </div>

    <div class="flex items-center gap-4">
        <flux:button variant="primary" type="submit">{{ __('Submit') }}</flux:button>
    </div>
</div>