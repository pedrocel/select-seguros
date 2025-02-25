@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="p-8">
        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Alunos</h2>
            <div class="flex items-center space-x-4">
                <div class="relative">
                <form action="{{ route('upload.cpf') }}" method="POST" enctype="multipart/form-data" class="flex items-center">
                    @csrf
                    <label for="file" class="block text-sm font-medium text-gray-700 mr-2">Escolha a planilha</label>
                    <input type="file" name="file" id="file" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 file:border-0 file:bg-blue-100 file:text-blue-700 file:px-4 file:py-2 file:rounded-l-md hover:file:bg-blue-200 transition duration-300" accept=".xlsx" required>

                    <button type="submit" class="ml-2 bg-emerald-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-emerald-500 focus:ring-4 focus:ring-green-300 transition duration-300 ease-in-out transform hover:scale-105">
                        Enviar
                    </button>
                </form>
                </div>
                <button onclick="openModal()" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                + Cadastrar Novo Estudante
                </button>
            </div>
        </div>
    <div class="overflow-x-auto"> <!-- Adicionando altura máxima e overflow -->
        <table class="w-full border-collapse bg-white shadow-lg rounded-lg border border-gray-200">
            <thead class="text-gray-100 bg-emerald-600 shadow-lg">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">CPF</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Organização</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr class="border-b hover:bg-gray-100 transition duration-300">
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $student->cpf }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $student->organization_id }}</td>
                    <td class="px-6 py-4">
                        @if($student->status == 1)
                            <button class="px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition duration-300">Pendente</button>
                        @elseif($student->status == 0)
                            <button class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-green-600 transition duration-300">Aluno registrado</button>
                        @else
                            <button class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300">Status desconhecido</button>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('director.pre-register.delete', $student->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="text-white bg-red-500 hover:bg-red-700 rounded-full p-2 transition duration-300">
                                <i class="fas fa-trash"></i> <!-- Ícone de lixeira -->
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Navegação de paginação -->
        <div class="mt-4">
            {{ $students->links('pagination::tailwind') }} <!-- Isso cria a navegação da paginação -->
        </div>
    </div>

    </div>




    <!-- Modal de Cadastro -->
<div id="preRegisterModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-red-500">
            &times;
        </button>
        <h2 class="text-xl font-semibold mb-4">Pré Cadastro do Aluno</h2>

        <form id="preRegisterForm" action="{{ route('director.pre-register.post') }}" method="POST">
            @csrf

            <!-- Campo CPF -->
            <div class="mb-4">
                <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                <input type="text" name="cpf" id="cpf" required class="mt-1 p-2 border rounded-lg w-full" placeholder="XXX.XXX.XXX-XX">
            </div>

            <div class="flex justify-between">
                <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">Fechar</button>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg">Salvar</button>
            </div>
        </form>
    </div>
</div>


<script>
document.getElementById('cpf').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número
    if (value.length > 3) value = value.replace(/^(\d{3})/, '$1.');
    if (value.length > 6) value = value.replace(/^(\d{3})\.(\d{3})/, '$1.$2.');
    if (value.length > 9) value = value.replace(/^(\d{3})\.(\d{3})\.(\d{3})/, '$1.$2.$3-');
    e.target.value = value;
});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Seleciona todos os elementos com a classe 'cpf'
    const cpfs = document.querySelectorAll('.cpf');
    
    // Função para aplicar a máscara de CPF
    function formatCPF(cpf) {
        return cpf.replace(/\D/g, '')                     // Remove qualquer caractere não numérico
                  .replace(/(\d{3})(\d)/, '$1.$2')       // Adiciona o ponto após os três primeiros dígitos
                  .replace(/(\d{3})(\d)/, '$1.$2')       // Adiciona o ponto após os três próximos
                  .replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona o hífen e os dois últimos dígitos
    }

    // Aplica a máscara para cada CPF
    cpfs.forEach(function(cpfElement) {
        cpfElement.textContent = formatCPF(cpfElement.textContent);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    function validarCPF(cpf) {
        cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos
        
        if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;

        let soma = 0, resto;
        
        for (let i = 1; i <= 9; i++) soma += parseInt(cpf[i - 1]) * (11 - i);
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf[9])) return false;

        soma = 0;
        for (let i = 1; i <= 10; i++) soma += parseInt(cpf[i - 1]) * (12 - i);
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        
        return resto === parseInt(cpf[10]);
    }

    document.getElementById("cpf").addEventListener("input", function () {
        let cpfInput = this.value;
        let cpfError = document.getElementById("cpfError");

        if (!validarCPF(cpfInput)) {
            cpfError.classList.remove("hidden");
        } else {
            cpfError.classList.add("hidden");
        }
    });
});
</script>

<script>
    function openModal() {
        document.getElementById('preRegisterModal').classList.remove('hidden');
        document.getElementById('preRegisterModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('preRegisterModal').classList.add('hidden');
        document.getElementById('preRegisterModal').classList.remove('flex');
    }

    document.addEventListener('click', function(event) {
        const modal = document.getElementById('preRegisterModal');
        if (event.target === modal) {
            closeModal();
        }
    });
</script>

<script>
    document.getElementById('profileButton').addEventListener('click', function () {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    });
    
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('edit-responsible')) {
            const responsible = JSON.parse(event.target.getAttribute('data-responsible'));
            openModal(true, responsible);
        }
    });
</script>

@endsection









