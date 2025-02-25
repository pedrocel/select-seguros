<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Controller
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <form action="{{ route('controllers.update', $controller) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nome:</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $controller->name) }}" 
                    class="w-full border-gray-300 rounded mt-1" 
                    required
                >
            </div>
            <div class="mb-4">
                <label for="ip" class="block text-gray-700">IP:</label>
                <input 
                    type="text" 
                    id="ip" 
                    name="ip" 
                    value="{{ old('ip', $controller->ip) }}" 
                    class="w-full border-gray-300 rounded mt-1" 
                    required
                >
            </div>
            <div class="mb-4">
                <label for="port" class="block text-gray-700">Porta:</label>
                <input 
                    type="number" 
                    id="port" 
                    name="port" 
                    value="{{ old('port', $controller->port) }}" 
                    class="w-full border-gray-300 rounded mt-1" 
                    required
                >
            </div>
            <div class="mb-4">
                <label for="type" class="block text-gray-700">Tipo:</label>
                <input 
                    type="text" 
                    id="type" 
                    name="type" 
                    value="{{ old('type', $controller->type) }}" 
                    class="w-full border-gray-300 rounded mt-1" 
                    required
                >
            </div>
            <div class="mb-4">
                <label for="device_id" class="block text-gray-700">ID do Dispositivo:</label>
                <input 
                    type="number" 
                    id="device_id" 
                    name="device_id" 
                    value="{{ old('device_id', $controller->device_id) }}" 
                    class="w-full border-gray-300 rounded mt-1"
                >
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                Atualizar
            </button>
        </form>
    </div>
</x-app-layout>
