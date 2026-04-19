<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de Administrador
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Bienvenido Administrador</h3>
                    <p>Tienes control total sobre el catalogo de productos.</p>
                    
                    <div class="mt-6">
                        <a href="{{ route('admin.products.index') }}" style="background-color: #3b82f6; color: white; font-weight: bold; padding: 10px 20px; border-radius: 6px; text-decoration: none; display: inline-block;">
                            Gestionar Productos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>