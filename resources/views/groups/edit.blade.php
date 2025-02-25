<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Grupo: {{ $group->name }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="bg-white p-6 rounded-lg shadow">
            <form method="POST" action="{{ route('groups.update', $group) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome do Grupo</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name', $group->name) }}" 
                        class="border border-gray-300 rounded px-3 py-2 w-full"
                        required
                    >
                </div>

                <div class="mb-4">
                <label for="controllers" class="block text-sm font-medium text-gray-700">Controladores</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mt-2">
                    @foreach($controllers as $controller)
                        <div class="border p-4 rounded-lg shadow hover:shadow-lg transition">
                            <div class="flex items-center flex-col justify-center mb-2">
                                <!-- Imagem centralizada e com tamanho pequeno -->
                                <img src="https://http2.mlstatic.com/D_NQ_NP_2X_947775-MLA77489698011_072024-F.webp" alt="Imagem do controlador" class="w-16 h-16 object-contain mb-2">
                                
                                <!-- Checkbox e nome do controlador -->
                                <div class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        name="controllers[]" 
                                        value="{{ $controller->id }}" 
                                        id="controller_{{ $controller->id }}" 
                                        class="mr-3"
                                        @if(in_array($controller->id, $group->groupControlators->pluck('controlator.id')->toArray())) checked @endif
                                    >
                                    <label for="controller_{{ $controller->id }}" class="text-sm font-medium text-gray-700">
                                        {{ $controller->name }}
                                    </label>
                                </div>
                                
                                <!-- ID do dispositivo -->
                                <p class="text-xs text-gray-500 mt-1">ID do dispositivo: {{ $controller->device_id }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>



                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                        Atualizar Grupo
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
