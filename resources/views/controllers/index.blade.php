<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Controladores  
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-4 space-y-4 md:space-y-0 md:space-x-4">
            <form method="GET" action="{{ route('controllers.index') }}" class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 w-full md:w-auto">
                <div class="flex-1">
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ request('name') }}" 
                        placeholder="Filtrar por nome" 
                        class="border border-gray-300 rounded px-3 py-2 w-full"
                    >
                </div>
                <div class="flex-1">
                    <input 
                        type="text" 
                        name="ip" 
                        value="{{ request('ip') }}" 
                        placeholder="Filtrar por IP" 
                        class="border border-gray-300 rounded px-3 py-2 w-full"
                    >
                </div>
                <div class="flex-1">
                    <input 
                        type="text" 
                        name="device_id" 
                        value="{{ request('device_id') }}" 
                        placeholder="Filtrar por ID do dispositivo" 
                        class="border border-gray-300 rounded px-3 py-2 w-full"
                    >
                </div>
                <button 
                    type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded w-full md:w-auto"
                >
                    Filtrar
                </button>
                <a 
                    href="{{ route('controllers.index') }}" 
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded w-full md:w-auto"
                >
                    Limpar Filtros
                </a>
            </form>
            <a href="{{ route('controllers.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded w-full md:w-auto">
                Criar Controlador
            </a>
        </div>
        <table class="min-w-full rounded-lg shadow overflow-hidden" style="box-shadow: 0 1px 3px 0 rgb(175 100 253), 0 1px 2px -1px rgb(208 82 244);">
        <thead class="table-blue-degrade">
                    <tr>
                        <th class="px-4 py-2 text-left text-white font-medium">ID</th>
                        <th class="px-4 py-2 text-left text-white font-medium">Nome</th>
                        <th class="px-4 py-2 text-left text-white font-medium">IP</th>
                        <th class="px-4 py-2 text-left text-white font-medium">Porta</th>
                        <th class="px-4 py-2 text-left text-white font-medium">ID do dispositivo</th>
                        <th class="px-4 py-2 text-left text-white font-medium">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($controllers as $controller)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $controller->id }}</td>
                            <td class="px-4 py-2">{{ $controller->name }}</td>
                            <td class="px-4 py-2">{{ $controller->ip }}</td>
                            <td class="px-4 py-2">{{ $controller->port }}</td>
                            <td class="px-4 py-2">{{ $controller->device_id }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('controllers.edit', $controller) }}" class="text-blue-500 hover:underline">Editar</a>
                                <form action="{{ route('controllers.destroy', $controller) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Deseja excluir?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Nenhum controller cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="mt-4">
            {{ $controllers->appends(request()->query())->links() }}
        </div>
    </div>
</x-app-layout>
