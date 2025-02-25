<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        {{-- Cards Superiores --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            {{-- Card 1: Quantidade de Organizações --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md flex flex-col items-center">
                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">Organizações (Escolas)</h3>
                <p class="text-3xl font-bold text-blue-500 mt-2">{{ $organizacoes->count() }}</p>
            </div>

            {{-- Card 2: Quantidade de Alunos --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md flex flex-col items-center">
                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">Alunos</h3>
                <p class="text-3xl font-bold text-green-500 mt-2">{{ $alunosTotal }}</p>
            </div>

            {{-- Card 3: Quantidade de Controladores --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md flex flex-col items-center">
                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">Controladores</h3>
                <p class="text-3xl font-bold text-purple-500 mt-2">22</p>
            </div>
        </div>
    </div>
</x-app-layout>
