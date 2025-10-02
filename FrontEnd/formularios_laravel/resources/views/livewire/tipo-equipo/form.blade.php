<div class="space-y-6">
    
    <div>
        <flux:input wire:model="form.id_tipo_equipo" :label="__('Id Tipo Equipo')" type="text"  autocomplete="form.id_tipo_equipo" placeholder="Id Tipo Equipo"/>
    </div>
    <div>
        <flux:input wire:model="form.tipo_equipo" :label="__('Tipo Equipo')" type="text"  autocomplete="form.tipo_equipo" placeholder="Tipo Equipo"/>
    </div>

    <div class="flex items-center gap-4">
        <flux:button variant="primary" type="submit">{{ __('Submit') }}</flux:button>
    </div>
</div>