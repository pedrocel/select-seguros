<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Gerenciamento de Usuários
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-4 space-y-4 md:space-y-0 md:space-x-4">
            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded w-full md:w-auto">
            Adicionar Novo Usuário
            </a>
        </div>
        <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full border-collapse table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nome</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Email</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b">
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $user->name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $user->email }}</td>
                            <td class="px-4 py-2 text-sm">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-600">Editar</a> |
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="mt-4">
            {{ $users->appends(request()->query())->links() }}
        </div>
    </div>
</x-app-layout>

