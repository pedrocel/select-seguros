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
            <a href="{{ route('diretor.users.edit', ['user' => $user->id]) }}" 
   class="p-2 hover:bg-dark-light rounded-lg tooltip" 
   data-tooltip="Ver detalhes">
    <i class="fas fa-eye text-gray-300 text-sm"></i>
</a>
        </div>
    </td>
</tr>
@endforeach
