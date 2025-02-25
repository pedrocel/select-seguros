




@extends('director.layout')

@section('title', 'Dashboard')

@section('content')

<div class="p-8">
        <!-- Cabeçalho -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Módulo de notificações</h2>
            <div class="flex items-center">
                <!-- Botão de Filtro -->
                <button onclick="openFilterModal()" class="flex items-center px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Voltar para a tela anterior
                </button>
            </div>
        </div>

        <!-- Grade de Estatísticas -->
        <div class="w-full max-w-8xl bg-white rounded-lg shadow-lg p-8">
            <!-- Cabeçalho -->
            <div class="mb-8 0-8">
                <h1 class="text-3xl font-bold text-gray-800">Enviar Notificação Manual</h1>
                <p class="text-gray-600">Preencha os campos abaixo para enviar uma notificação.</p>
            </div>

            <!-- Formulário -->
            <form action="#" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                
                <div>
                        <label class="block text-sm font-medium text-gray-700">Caixas de Entrada</label>
                        <div class="mt-2 space-y-2">
                                <div class="p-4 bg-gray-50 rounded-lg">
                                    <!-- Remetente -->
                                    <div class="flex items-center">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRklgrK0wrMayEbUOmJNah0llZe_2A-1H5FyA&s"
                                             alt="123"
                                             class="w-8 h-8 rounded-full border-2 border-gray-200">
                                        <p class="ml-2 text-sm font-medium text-gray-900">Todas as Caixas de entrada</p>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="https://cdn-icons-png.flaticon.com/512/54/54324.png"
                                             alt="123"
                                             class="w-8 h-8 rounded-full border-2 border-gray-200">
                                        <p class="ml-2 text-sm font-medium text-gray-900">Lixeira(3)</p>
                                    </div>
                                    <!-- Assunto e Data -->
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-900">Adicionar Caixa de entrada</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Primeira Coluna: Título, Mensagem e Canais -->
                    <div>
                        <!-- Campo para o Título -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                            <input type="text" id="title" name="title" required
                                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   placeholder="Digite o título da notificação">
                        </div>

                        <!-- Campo para a Mensagem -->
                        <div class="mb-6">
                            <label for="message" class="block text-sm font-medium text-gray-700">Mensagem</label>
                            <textarea id="message" name="message" rows="4" required
                                      class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      placeholder="Digite a mensagem da notificação"></textarea>
                        </div>

                        <!-- Seleção de Canais -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700">Canais de Envio</label>
                            <div class="mt-2 space-y-2">
                                <!-- Card WhatsApp -->
                                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                    <input type="checkbox" id="channel_whatsapp" name="channels[]" value="whatsapp"
                                           class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="channel_whatsapp" class="ml-3 flex items-center">
                                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4C6.477 4 2 6.477 2 9s4.477 5 10 5 10-2.477 10-5-4.477-5-10-5zM12 14c-2.11 0-4.165.668-5.888 1.793a4.98 4.98 0 00-.534 1.06C5.373 17.846 7.58 19 10 19c1.67 0 3.21-.79 4.239-2.14a6.217 6.217 0 01-.343-1.207C16.65 14.669 14.11 14 12 14zM12 4v1M12 19v1"></path>
                                        </svg>
                                        <span class="ml-2 text-sm text-gray-700">WhatsApp</span>
                                    </label>
                                </div>

                                <!-- Card E-mail -->
                                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                    <input type="checkbox" id="channel_email" name="channels[]" value="email"
                                           class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="channel_email" class="ml-3 flex items-center">
                                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="ml-2 text-sm text-gray-700">E-mail</span>
                                    </label>
                                </div>

                                <!-- Card Push -->
                                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                    <input type="checkbox" id="channel_push" name="channels[]" value="push"
                                           class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="channel_push" class="ml-3 flex items-center">
                                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-3-6v3m0 0v3m0-3h3m-3 0h-3m-6 0v3m0 0v3m0-3h3m-3 0h-3"></path>
                                        </svg>
                                        <span class="ml-2 text-sm text-gray-700">Push</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Segunda Coluna: Lista de Usuários -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Selecione os Usuários</label>
                        <div class="mt-2 space-y-2">
                            @foreach($users as $user)
                                <div id="user_{{ $user->id }}" class="flex items-center p-4 bg-gray-50 rounded-lg cursor-pointer hover:bg-gray-100 transition-colors"
                                     onclick="toggleUserSelection('{{ $user->id }}')">
                                    <!-- Imagem do Usuário -->
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                         alt="{{ $user->name }}"
                                         class="w-10 h-10 rounded-full border-2 border-gray-200">
                                    <!-- Informações do Usuário -->
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                                        <p class="text-sm text-gray-500">{{ $user->phone }}</p>
                                    </div>
                                    <!-- Checkbox (oculto) -->
                                    <input type="checkbox" id="selected_user_{{ $user->id }}" name="users[]" value="{{ $user->id }}"
                                           class="hidden">
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <!-- Botão de Enviar -->
                <div class="flex justify-end mt-8">
                    <button type="submit"
                            class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Enviar Notificação
                    </button>
                </div>
            </form>
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
    <script>
        function toggleUserSelection(userId) {
            const userCard = document.getElementById(`user_${userId}`);
            const checkbox = document.getElementById(`selected_user_${userId}`);

            // Alterna a seleção
            checkbox.checked = !checkbox.checked;

            // Altera o estilo do card
            if (checkbox.checked) {
                userCard.classList.add('bg-emerald-500', 'border-blue-200');
            } else {
                userCard.classList.remove('bg-emerald-500', 'border-blue-200');
            }
        }
    </script>
@endsection