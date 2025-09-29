<div class="space-y-6">
    
    <div>
        <flux:input wire:model="form.id_estado_servicio" :label="__('Id Estado Servicio')" type="text"  autocomplete="form.id_estado_servicio" placeholder="Id Estado Servicio"/>
    </div>
    <div>
        <flux:input wire:model="form.estado" :label="__('Estado')" type="text"  autocomplete="form.estado" placeholder="Estado"/>
    </div>

    <div class="flex items-center gap-4">
        <flux:button variant="primary" type="submit">{{ __('Submit') }}</flux:button>
    </div>
</div>