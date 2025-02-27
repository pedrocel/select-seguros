@foreach ($users as $user)
<tr class="border-b border-border-dark hover:bg-dark-light/50 transition-colors">
    <td class="p-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                <span class="text-sm font-medium text-white">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                </span>
            </div>
            <div>
                <p class="font-medium text-white">{{ $user->name }}</p>
                <p class="text-sm text-gray-400">{{ $user->email }}</p>
            </div>
        </div>
    </td>
    <td class="p-5 text-white">{{ $user->whatsapp }}</td>
    <td class="p-5 text-white">{{ $user->cpf }}</td>
    <td class="p-5 text-white">{{ \Carbon\Carbon::parse($user->birthdate)->format('d/m/Y') }}</td>
    <td class="p-5">
        <span class="bg-success/10 text-success px-3 py-1 rounded-full text-xs font-medium">Ativo</span>
    </td>
    <td class="p-5">
        <div class="flex items-center gap-2">
            <button class="p-2 hover:bg-dark-light rounded-lg tooltip" data-tooltip="Editar">
                <i class="fas fa-edit text-gray-300 text-sm"></i>
            </button>
            <button 
        class="p-2 hover:bg-dark-light rounded-lg tooltip" 
        data-tooltip="Ver detalhes"
        data-name="{{ $user->name }}" 
        data-email="{{ $user->email }}"
        data-cpf="{{ $user->cpf }}"
        data-whatsapp="{{ $user->whatsapp }}"
        data-id="{{ $user->id }}" 
        onclick="openUserModal(this)">
        <i class="fas fa-eye text-gray-300 text-sm"></i>
    </button>
            <button class="p-2 hover:bg-dark-light rounded-lg tooltip" data-tooltip="Mais opções">
                <i class="fas fa-ellipsis-v text-gray-300 text-sm"></i>
            </button>
        </div>
    </td>
</tr>
@endforeach
<div id="userModalEditar" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/60 backdrop-blur"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-dark-lighter border border-border-dark rounded-xl shadow-xl w-full max-w-md relative modal-fade-in">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-6 border-b border-border-dark">
                <h3 class="text-xl font-semibold text-white">Detalhes do Usuário</h3>
                <button id="closeUserModal" class="text-gray-400 hover:text-white" onclick="closeUserModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <form action="{{ route('diretor.users.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT') <!-- Use o método PUT ou PATCH para atualizar o usuário -->

                    <!-- Nome -->
                    <div>
                        <label for="name" class="block text-gray-300 font-medium mb-1">Nome</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="modal-name" 
                            class="border border-border-dark rounded-lg w-full px-4 py-2 bg-dark text-white"
                            required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-gray-300 font-medium mb-1">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="modal-email" 
                            class="border border-border-dark rounded-lg w-full px-4 py-2 bg-dark text-white"
                            required>
                    </div>

                    <!-- CPF -->
                    <div>
                        <label for="cpf" class="block text-gray-300 font-medium mb-1">CPF</label>
                        <input 
                            type="text" 
                            name="cpf" 
                            id="modal-cpf" 
                            class="border border-border-dark rounded-lg w-full px-4 py-2 bg-dark text-white"
                            required>
                    </div>

                    <!-- WhatsApp -->
                    <div>
                        <label for="whatsapp" class="block text-gray-300 font-medium mb-1">WhatsApp</label>
                        <input 
                            type="text" 
                            name="whatsapp" 
                            id="modal-whatsapp" 
                            class="border border-border-dark rounded-lg w-full px-4 py-2 bg-dark text-white"
                            required>
                    </div>

                    <!-- Perfil -->
                    <div>
                        <label for="profile_id" class="block text-gray-300 font-medium mb-1">Perfil</label>
                        <select 
                            name="profile_id" 
                            id="modal-profile_id" 
                            class="border border-border-dark rounded-lg w-full px-4 py-2 bg-dark text-white"
                            required>
                            @foreach ($profiles as $profile)
                                <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Botões -->
                    <div class="flex justify-end gap-3 pt-4">
                        <button type="button" id="cancelUserModal" class="px-4 py-2 border border-border-dark text-gray-300 rounded-lg hover:bg-dark-light transition-colors" onclick="closeUserModal()">
                            Cancelar
                        </button>
                        <button type="submit" class="px-4 py-2 bg-primary hover:bg-primary-dark text-white rounded-lg transition-colors">
                            Atualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
