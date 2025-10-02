<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Servicios') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">Lista de {{ __('Servicios') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto"></div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <flux:button variant="primary"  :href="route('servicios.create')">{{ __('Agregar Nuevo') }}</flux:butt>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">No</th>

									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Id Servicio</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Fecha Recepcion</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Descripcion Problema</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Id Estado Servicio</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Diagnostico Servicio</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Solucion Servicio</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Id Tecnico</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Id Equipo</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Id Cliente</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Fecha Entrega</th>

                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($servicios as $servicio)
                                        <tr class="even:bg-gray-50" wire:key="{{ $servicio->id }}">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ ++$i }}</td>

										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $servicio->id_servicio }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $servicio->fecha_recepcion }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $servicio->descripcion_problema }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $servicio->id_estado_servicio }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $servicio->diagnostico_servicio }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $servicio->solucion_servicio }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $servicio->id_tecnico }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $servicio->id_equipo }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $servicio->id_cliente }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $servicio->fecha_entrega }}</td>

                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                <a wire:navigate href="{{ route('servicios.show', $servicio->id_servicio) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                                                <a wire:navigate href="{{ route('servicios.edit', $servicio->id_servicio) }}" class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">{{ __('Edit') }}</a>
                                                <button
                                                    class="text-red-600 font-bold hover:text-red-900"
                                                    type="button"
                                                    wire:click="delete({{ $servicio->id }})"
                                                    wire:confirm="Estas seguro que lo quieres eliminar?"
                                                >
                                                    {{ __('Delete') }}
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4 px-4">
                                    {!! $servicios->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
