<div class="space-y-6">
    
    <div>
        <flux:input wire:model="form.id_servicio" :label="__('Id Servicio')" type="text"  autocomplete="form.id_servicio" placeholder="Id Servicio"/>
    </div>
    <div>
        <flux:input wire:model="form.fecha_recepcion" :label="__('Fecha Recepcion')" type="text"  autocomplete="form.fecha_recepcion" placeholder="Fecha Recepcion"/>
    </div>
    <div>
        <flux:input wire:model="form.descripcion_problema" :label="__('Descripcion Problema')" type="text"  autocomplete="form.descripcion_problema" placeholder="Descripcion Problema"/>
    </div>
    <div>
        <flux:input wire:model="form.id_estado_servicio" :label="__('Id Estado Servicio')" type="text"  autocomplete="form.id_estado_servicio" placeholder="Id Estado Servicio"/>
    </div>
    <div>
        <flux:input wire:model="form.diagnostico_servicio" :label="__('Diagnostico Servicio')" type="text"  autocomplete="form.diagnostico_servicio" placeholder="Diagnostico Servicio"/>
    </div>
    <div>
        <flux:input wire:model="form.solucion_servicio" :label="__('Solucion Servicio')" type="text"  autocomplete="form.solucion_servicio" placeholder="Solucion Servicio"/>
    </div>
    <div>
        <flux:input wire:model="form.id_tecnico" :label="__('Id Tecnico')" type="text"  autocomplete="form.id_tecnico" placeholder="Id Tecnico"/>
    </div>
    <div>
        <flux:input wire:model="form.id_equipo" :label="__('Id Equipo')" type="text"  autocomplete="form.id_equipo" placeholder="Id Equipo"/>
    </div>
    <div>
        <flux:input wire:model="form.id_cliente" :label="__('Id Cliente')" type="text"  autocomplete="form.id_cliente" placeholder="Id Cliente"/>
    </div>
    <div>
        <flux:input wire:model="form.fecha_entrega" :label="__('Fecha Entrega')" type="text"  autocomplete="form.fecha_entrega" placeholder="Fecha Entrega"/>
    </div>

    <div class="flex items-center gap-4">
        <flux:button variant="primary" type="submit">{{ __('Submit') }}</flux:button>
    </div>
</div>