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
                        <p class="text-gray-600 text-sm">ID: {{ $product->id }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                    </div>

                    <div class="mb-4">
                        <p class="text-gray-700">{{ $product->description ?: 'Sin descripción' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-2xl font-bold text-green-600">${{ number_format($product->price, 2) }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-gray-600">Stock disponible: {{ $product->stock }}</p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.products.edit', $product) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                        <a href="{{ route('admin.products.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Volver</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>