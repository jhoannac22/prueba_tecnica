<div class="space-y-6">
    
    <div>
        <flux:input wire:model="form.id_marca" :label="__('Id Marca')" type="text"  autocomplete="form.id_marca" placeholder="Id Marca"/>
    </div>
    <div>
        <flux:input wire:model="form.marca" :label="__('Marca')" type="text"  autocomplete="form.marca" placeholder="Marca"/>
    </div>

    <div class="flex items-center gap-4">
        <flux:button variant="primary" type="submit">{{ __('Submit') }}</flux:button>
    </div>
</div>