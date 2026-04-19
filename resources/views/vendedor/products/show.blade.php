<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle del Producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="mb-4">
                        <h3 class="text-2xl font-bold">{{ $product->name }}</h3>
                    </div>

                    <div class="mb-4">
                        <p class="text-gray-600 text-sm">Código: {{ $product->id }}</p>
                    </div>

                    <div class="mb-6">
                        <h4 class="font-semibold mb-2">Descripción</h4>
                        <p class="text-gray-700">{{ $product->description ?: 'Sin descripción disponible.' }}</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="font-semibold mb-2">Precio</h4>
                        <p class="text-3xl font-bold text-green-600">${{ number_format($product->price, 2) }}</p>
                    </div>

                    <div class="mb-6">
                        <h4 class="font-semibold mb-2">Disponibilidad</h4>
                        <p class="text-gray-700">
                            @if($product->stock > 0)
                                <span class="text-green-600">{{ $product->stock }} unidades disponibles</span>
                            @else
                                <span class="text-red-600">Agotado</span>
                            @endif
                        </p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('vendedor.products.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Volver al Catálogo
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>