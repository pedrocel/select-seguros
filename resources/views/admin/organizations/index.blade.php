<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-lg leading-tight">
        Lista de Organizações
        </h2>
    </x-slot>

    <div class="container mx-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-4 space-y-4 md:space-y-0 md:space-x-4">
            <h2 class="text-lg font-medium">Gerenciamento de Organizações</h2>
            <a href="{{ route('admin.organizacoes.create') }}" class="btn-create">
                Criar Organização
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2 lg:grid-cols-3">
    @forelse($organizacoes as $organizacao)
        <div class="bg-white rounded-lg shadow-lg p-4 flex items-center justify-between">
            <!-- Ícone e Nome da Organização -->
            <div class="flex items-center space-x-4">
                <div class="bg-blue-100 text-blue-500 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 16v-2m-4-4h2m8 0h2m-6-4h2m-6 0H8m4-4h2M6 20h12m-3-10V8a2 2 0 012-2h2m-2 4h2a2 2 0 012 2v4a2 2 0 01-2 2h-2m-8-6h2m4 0h2M6 6h2" />
                    </svg>
                </div>
                <h3 class="block text-gray-700 font-medium">{{ $organizacao->name }}</h3>
            </div>

            <div>
                <a href="{{ route('admin.organizacoes.show', $organizacao) }}" 
                   class="flex items-center text-blue-500 hover:text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h.01M4.5 12c1.38 2.69 4.41 4.5 7.5 4.5s6.12-1.81 7.5-4.5c-1.38-2.69-4.41-4.5-7.5-4.5S5.88 9.31 4.5 12z" />
                    </svg>
                    Detalhes
                </a>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center text-gray-500">
            Nenhuma organização cadastrada.
        </div>
    @endforelse
</div>

    </div>
</x-app-layout>


