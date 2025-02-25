<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Grupos de Acesso
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-4 space-y-4 md:space-y-0 md:space-x-4">
            <form method="GET" action="{{ route('groups') }}" class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 w-full md:w-auto">
                <div class="flex-1">
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ request('name') }}" 
                        placeholder="Filtrar por nome" 
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
                    href="{{ route('groups') }}" 
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded w-full md:w-auto"
                >
                    Limpar Filtros
                </a>
            </form>
            <a href="{{ route('groups.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded w-full md:w-auto">
                Criar Novo Grupo
            </a>
        </div>
        <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full rounded-lg shadow overflow-hidden" style="box-shadow: 0 1px 3px 0 rgb(175 100 253), 0 1px 2px -1px rgb(208 82 244);">
            <thead class="table-blue-degrade">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-600 font-medium">ID</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-medium">Nome</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-medium">Controladores associados ao grupo</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-medium">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groupAcesses as $access)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $access->id }}</td>
                            <td class="px-4 py-2">{{ $access->name }}</td>
                            <td class="px-4 py-2">
                            @foreach($access->groupControlators as $group)
                                <button class="bg-blue-500 text-white text-xs py-1 px-2 rounded mb-2">
                                    {{ $group->controlator->name }}
                                </button>
                            @endforeach

                                </td>
                                <td class="px-4 py-2">
                                <a href="{{ route('groups.edit', $access) }}" class="text-yellow-500 hover:underline">Editar</a>
                                <form action="{{ route('groups.destroy', $access) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Deseja excluir?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="mt-4">
            {{ $groupAcesses->appends(request()->query())->links() }}
        </div>
    </div>
</x-app-layout>
