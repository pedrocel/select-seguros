@extends('director.layout')

@section('title', 'Dashboard')

@section('content')

<div class="p-8">
        <!-- Cabeçalho -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Dashboard de Notificações</h2>
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
                    <h3 class="text-gray-600 text-sm font-medium">Total de Notificações</h3>
                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Total</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-900">{{ $totalNotifications }}</span>
                    <span class="text-green-500 text-sm ml-2">+12% na última semana</span>
                </div>
            </div>

            <!-- Notificações Enviadas com Sucesso -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 text-sm font-medium">Enviadas com Sucesso</h3>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Sucesso</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-900">{{ $successfulNotifications }}</span>
                    <span class="text-blue-500 text-sm ml-2">
                        {{ $totalNotifications > 0 ? number_format(($successfulNotifications / $totalNotifications) * 100, 2) . '%' : '0%' }}
                    </span>
                </div>
            </div>

            <!-- Notificações com Falha -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 text-sm font-medium">Falhas no Envio</h3>
                    <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Falhas</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-900">{{ $failedNotifications }}</span>
                    <span class="text-purple-500 text-sm ml-2">
                        {{ $totalNotifications > 0 ? number_format(($failedNotifications / $totalNotifications) * 100, 2) . '%' : '0%' }}
                    </span>
                </div>
            </div>

            <!-- Tipos de Notificação -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 text-sm font-medium">Tipos de Notificação</h3>
                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Tipos</span>
                </div>
                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-900">{{ $notificationTypes->count() }}</span>
                    <span class="text-yellow-500 text-sm ml-2">Diversos</span>
                </div>
            </div>
        </div>
<!-- Filtros -->
<div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 mb-8">
        <!-- Tabela de Notificações Recentes -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-100">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Notificações Recentes</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($notifications as $notification)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $notification->title }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $notification->type->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $notification->created_at->format('d/m/Y H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($notification->logs->where('status', 'sent')->count() > 0)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Enviada</span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Falha</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $notifications->links() }}
                </div>
            </div>
        </div>
    </div>
 





    <!-- Modal de Filtros -->
    <div id="filterModal" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black bg-opacity-50" onclick="closeFilterModal()"></div>
            <div class="absolute right-0 top-0 h-full w-1/3 bg-white shadow-lg transform transition-transform duration-300 ease-in-out translate-x-full">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-semibold text-gray-800">Filtrar Notificações</h3>
                        <button onclick="closeFilterModal()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form method="GET" action="{{ route('director.notifications.dashboard.get') }}" class="space-y-4">
                        <!-- Filtro por Tipo -->
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
                            <select id="type" name="type" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Todos</option>
                                @foreach ($notificationTypes as $type)
                                    <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filtro por Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="status" name="status" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Todos</option>
                                <option value="sent" {{ request('status') == 'sent' ? 'selected' : '' }}>Enviadas</option>
                                <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Falhas</option>
                            </select>
                        </div>

                        <!-- Filtro por Data Inicial -->
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Data Inicial</label>
                            <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}" 
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Filtro por Data Final -->
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700">Data Final</label>
                            <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}" 
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Botão de Aplicar Filtro -->
                        <div>
                            <button type="submit" class="w-full px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Aplicar Filtro
                            </button>
                        </div>
                    </form>
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
