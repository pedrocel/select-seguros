@extends('director.layout')

@section('title', 'Dashboard')

@section('content')

<div class="p-8">
        <!-- Cabeçalho -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Dashboard de Merenda</h2>
            <div class="flex items-center">
                <!-- Botão de Filtro -->
                <button onclick="openFilterModal()" class="flex items-center px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Filtros
                </button>
            </div>
        </div>

        <!-- Grade de Estatísticas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total de Notificações -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 text-sm font-medium">Entradas até as 09:00</h3>
                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Total</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-900">{{ $morning }}</span>
                    <span class="text-green-500 text-sm ml-2">Alunos servidos</span>
                </div>
            </div>

            <!-- Notificações Enviadas com Sucesso -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 text-sm font-medium">Entradas Entre ás 12:00 e ás 14:00</h3>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Sucesso</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-900">{{ $afternoon }}</span>
                    <span class="text-blue-500 text-sm ml-2">Alunos servidos</span>
                </div>
            </div>

            <!-- Notificações com Falha -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 text-sm font-medium">Entradas Entre ás 17:00 e ás 20:00</h3>
                    <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Falhas</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-900">{{ $evening }}</span>
                    <span class="text-purple-500 text-sm ml-2">Alunos servidos</span>
                </div>
            </div>

            <!-- Tipos de Notificação -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 text-sm font-medium">Estatística geral do dia</h3>
                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">HOJE</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-900">{{ $total }}</span>
                    <span class="text-yellow-500 text-sm ml-2">Total de alunos</span>
                </div>
            </div>

            <div class="bg-emerald-500 rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-white text-sm font-medium">Média dos últimos 30 dias</h3>
                    <span class="bg-green-100 text-emerald-500 text-xs font-medium px-2.5 py-0.5 rounded-full">Total</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-white">{{ $morning }}</span>
                    <span class="text-white text-sm ml-2">Alunos servidos(média 30 dias)</span>
                </div>
            </div>

            <!-- Notificações Enviadas com Sucesso -->
            <div class="bg-red-500 rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-white text-sm font-medium">Média estadual</h3>
                    <span class="bg-white text-red-500 text-xs font-medium px-2.5 py-0.5 rounded-full">Total</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-white">{{ $morning }}</span>
                    <span class="text-white text-sm ml-2">(Escola 20% abaixo da média)</span>
                </div>
            </div>

            <!-- Notificações Enviadas com Sucesso -->
            <div class="bg-orange-500 rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-white text-sm font-medium">Média nacional</h3>
                    <span class="bg-white text-orange-500 text-xs font-medium px-2.5 py-0.5 rounded-full">Total</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-white">{{ $morning }}</span>
                    <span class="text-white text-sm ml-2">(Escola 10% abaixo da média)</span>
                </div>
            </div>

            <!-- Notificações com Falha -->
            <div class="bg-slate-500 rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-white text-sm font-medium">Taxa de aproveitamento</h3>
                    <span class="bg-white text-slate-500 font-medium px-2.5 py-0.5 rounded-full">Geral</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-white">67</span>
                    <span class="text-white text-sm ml-2">% da capacidade total</span>
                </div>
            </div>
        </div>
<!-- Filtros -->
    <div class="grid grid-cols-4 gap-4">
        <!-- Coluna da Tabela (75%) -->
        <div class="col-span-3 bg-white rounded-lg shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Últimos registros</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($faceEvents as $face)
                            <tr>
                        
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="data:image/jpeg;base64,{{ $face->image }}" 
                                    alt="Foto de {{ $face->name }}" >
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $face->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $face->event }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $face->timestamp }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $faceEvents->links() }}
            </div>
        </div>

        <!-- Coluna da Lista de Usuários Vinculados (25%) -->
        <div class="col-span-1 bg-white rounded-lg shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Usuários Vinculados</h3>
            <ul class="space-y-2">
                @foreach ($linkedUsers as $user)
                    <li class="flex justify-between items-center bg-gray-50 p-2 rounded-md shadow-sm">
                    <img src="data:image/jpeg;base64,{{ $user->facial_image_base64 }}" 
                    alt="Foto de {{ $user->name }}" 
                    class="w-8 h-8 rounded-full object-cover border border-gray-300 shadow-sm">    
                    <span class="text-sm font-medium text-gray-700">{{ $user->name }}</span>
                        <button class="text-red-500 hover:text-red-700 text-sm">Remover</button>
                    </li>
                @endforeach
                {{ $linkedUsers->links() }}
            </ul>
            <button class="mt-4 w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-4 rounded-md">
                + Adicionar Usuário
            </button>
        </div>
    </div>

 





    <!-- Modal de Filtros -->
    <div id="filterModal" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black bg-opacity-50" onclick="closeFilterModal()"></div>
            <div class="absolute right-0 top-0 h-full w-1/3 bg-white shadow-lg transform transition-transform duration-300 ease-in-out translate-x-full">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-semibold text-gray-800">Filtrar</h3>
                        <button onclick="closeFilterModal()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Script para controlar o modal -->
    <script>
        function openFilterModal() {
            const modal = document.getElementById('filterModal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.querySelector('.transform').classList.remove('translate-x-full');
            }, 20);
        }

        function closeFilterModal() {
            const modal = document.getElementById('filterModal');
            modal.querySelector('.transform').classList.add('translate-x-full');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>
@endsection
