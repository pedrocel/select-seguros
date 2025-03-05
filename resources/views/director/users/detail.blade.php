@extends('director.layout')

@section('title', 'Detalhes do usuário')

@section('content')

<div class="p-4">
    <h2 class="text-2xl font-semibold mb-6">Detalhes e Edição do Usuário</h2>
    
    <!-- Formulário de Edição -->
    <form action="{{ route('director.user.update.post', $user) }}" method="POST" class="space-y-6">
        @csrf
        @method('POST')
        <input type="hidden" name="user_id" value="{{ $user->id }}">

        <!-- Nome -->
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Nome:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" 
                   class="w-full bg-[#242424] border border-gray-800 rounded-lg px-4 py-2">
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" 
                   class="w-full bg-[#242424] border border-gray-800 rounded-lg px-4 py-2" disabled>
        </div>

        <!-- WhatsApp -->
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">WhatsApp:</label>
            <input type="text" id="whatsapp" name="whatsapp" value="{{ $user->whatsapp }}" 
                   class="w-full bg-[#242424] border border-gray-800 rounded-lg px-4 py-2">
        </div>

        <!-- CPF -->
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">CPF:</label>
            <input type="text" id="cpf" name="cpf" value="{{ $user->cpf }}" 
                   class="w-full bg-[#242424] border border-gray-800 rounded-lg px-4 py-2">
        </div>

        <!-- Data de Nascimento -->
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Data de Nascimento:</label>
            <input type="date" id="birthdate" name="birthdate" 
                   value="{{ \Carbon\Carbon::parse($user->birthdate)->format('Y-m-d') }}" 
                   class="w-full bg-[#242424] border border-gray-800 rounded-lg px-4 py-2">
        </div>
        <!-- Botões de Ação -->
        <div class="mt-6 flex justify-end space-x-3">
            <button type="button" onclick="window.history.back()" 
                    class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
                Cancelar
            </button>
            <button type="submit" 
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Salvar
            </button>
        </div>
    </form>
</div>

@endsection
