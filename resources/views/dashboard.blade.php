<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl p-2">
        <!-- Primera fila: Clientes, Técnicos, Tipo de Equipos -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <!-- Clientes -->
            <a href="{{ route('clientes.index') }}"
               class="group relative rounded-xl border border-neutral-200/70 bg-white/80 dark:bg-neutral-900/70 dark:border-neutral-700 overflow-hidden hover:bg-white/90 dark:hover:bg-neutral-800 transition">
                <div class="relative h-32 md:h-40 flex items-center justify-center">
                    <span class="text-4xl text-gray-500 group-hover:text-blue-600 transition">👥</span>
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-white/70 dark:bg-black/40 px-4 py-2 backdrop-blur-sm">
                    <span class="font-semibold text-sm text-gray-800 dark:text-gray-100">Clientes</span>
                </div>
            </a>

            <!-- Técnicos -->
            <a href="{{ route('tecnicos.index') }}"
               class="group relative rounded-xl border border-neutral-200/70 bg-white/80 dark:bg-neutral-900/70 dark:border-neutral-700 overflow-hidden hover:bg-white/90 dark:hover:bg-neutral-800 transition">
                <div class="relative h-32 md:h-40 flex items-center justify-center">
                    <span class="text-4xl text-gray-500 group-hover:text-green-600 transition">🛠️</span>
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-white/70 dark:bg-black/40 px-4 py-2 backdrop-blur-sm">
                    <span class="font-semibold text-sm text-gray-800 dark:text-gray-100">Técnicos</span>
                </div>
            </a>

            <!-- Tipo de Equipos -->
            <a href="{{ route('tipo-equipos.index') }}"
               class="group relative rounded-xl border border-neutral-200/70 bg-white/80 dark:bg-neutral-900/70 dark:border-neutral-700 overflow-hidden hover:bg-white/90 dark:hover:bg-neutral-800 transition">
                <div class="relative h-32 md:h-40 flex items-center justify-center">
                    <span class="text-4xl text-gray-500 group-hover:text-indigo-600 transition">🧰</span>
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-white/70 dark:bg-black/40 px-4 py-2 backdrop-blur-sm">
                    <span class="font-semibold text-sm text-gray-800 dark:text-gray-100">Tipo de Equipos</span>
                </div>
            </a>
        </div>

        <!-- Segunda fila: Marcas, Equipos, Estados de Servicios, Servicios -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            <!-- Marcas -->
            <a href="{{ route('marcas.index') }}"
               class="group relative rounded-xl border border-neutral-200/70 bg-white/80 dark:bg-neutral-900/70 dark:border-neutral-700 overflow-hidden hover:bg-white/90 dark:hover:bg-neutral-800 transition">
                <div class="relative h-32 md:h-40 flex items-center justify-center">
                    <span class="text-4xl text-gray-500 group-hover:text-orange-600 transition">🏷️</span>
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-white/70 dark:bg-black/40 px-4 py-2 backdrop-blur-sm">
                    <span class="font-semibold text-sm text-gray-800 dark:text-gray-100">Marcas</span>
                </div>
            </a>

            <!-- Equipos -->
            <a href="{{ route('equipos.index') }}"
               class="group relative rounded-xl border border-neutral-200/70 bg-white/80 dark:bg-neutral-900/70 dark:border-neutral-700 overflow-hidden hover:bg-white/90 dark:hover:bg-neutral-800 transition">
                <div class="relative h-32 md:h-40 flex items-center justify-center">
                    <span class="text-4xl text-gray-500 group-hover:text-purple-600 transition">💻</span>
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-white/70 dark:bg-black/40 px-4 py-2 backdrop-blur-sm">
                    <span class="font-semibold text-sm text-gray-800 dark:text-gray-100">Equipos</span>
                </div>
            </a>

            <!-- Estado de Servicios -->
            <a href="{{ route('estado-servicios.index') }}"
               class="group relative rounded-xl border border-neutral-200/70 bg-white/80 dark:bg-neutral-900/70 dark:border-neutral-700 overflow-hidden hover:bg-white/90 dark:hover:bg-neutral-800 transition">
                <div class="relative h-32 md:h-40 flex items-center justify-center">
                    <span class="text-4xl text-gray-500 group-hover:text-red-600 transition">📊</span>
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-white/70 dark:bg-black/40 px-4 py-2 backdrop-blur-sm">
                    <span class="font-semibold text-sm text-gray-800 dark:text-gray-100">Estado de Servicios</span>
                </div>
            </a>

            <!-- Servicios -->
            <a href="{{ route('servicios.index') }}"
               class="group relative rounded-xl border border-neutral-200/70 bg-white/80 dark:bg-neutral-900/70 dark:border-neutral-700 overflow-hidden hover:bg-white/90 dark:hover:bg-neutral-800 transition">
                <div class="relative h-32 md:h-40 flex items-center justify-center">
                    <span class="text-4xl text-gray-500 group-hover:text-yellow-600 transition">⚙️</span>
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-white/70 dark:bg-black/40 px-4 py-2 backdrop-blur-sm">
                    <span class="font-semibold text-sm text-gray-800 dark:text-gray-100">Servicios</span>
                </div>
            </a>
        </div>
    </div>
</x-layouts.app>
