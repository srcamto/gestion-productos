<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de Vendedor
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Bienvenido Vendedor</h3>
                    <p>Puedes consultar el catalogo de productos.</p>
                    
                    <div class="mt-6">
                        <a href="{{ route('vendedor.products.index') }}" style="background-color: #10b981; color: white; font-weight: bold; padding: 10px 20px; border-radius: 6px; text-decoration: none; display: inline-block;">
                            Ver Productos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>