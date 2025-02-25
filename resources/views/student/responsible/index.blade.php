<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pacsafe - Aluno</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="h-screen bg-gradient-custom text-gray-800">
  <div class="flex h-full">
    <!-- Sidebar -->
    <aside class="bg-[url('https://wallpapers.com/images/hd/green-gradient-background-1080-x-1920-1d34ljvp9yi0en92.jpg')] w-64 bg-white shadow-2xl flex flex-col p-4 hidden md:block">
      <h2 class="text-xl text-white font-bold mb-8">Escola Municipal Zumbi dos Palmares</h2>
      <nav>

        <ul>
          <li class="mb-4">
            <a href="{{ route('student.dashboard') }}" class="flex items-center p-2 rounded transition-all duration-300 
                @unless(Route::is('student.dashboard'))
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#00c800] 
                @endunless
                      hover:text-white hover:shadow-lg
                @if(Route::is('student.dashboard'))
                      bg-gradient-to-r from-[#a0f0c5] to-[#00c800] text-white
                @endif">
                <svg class="w-5 h-5 mr-2 transition-all duration-300 text-black hover:text-white" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Dashboard
            </a>
          </li>
          <li class="mb-4">
            <a href="{{ route('student.profile.index') }}" class="flex items-center p-2 rounded transition-all duration-300 
                @unless(Route::is('student.profile.index'))
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#00c800] 
                @endunless
                      hover:text-white hover:shadow-lg
                @if(Route::is('student.profile.index'))
                      bg-gradient-to-r from-[#a0f0c5] to-[#00c800] text-white
                @endif">
                <svg class="w-5 h-5 mr-2 transition-all duration-300 text-black hover:text-white" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Meu Perfil
            </a>
          </li>
          <li class="mb-4">
            <a href="{{ route('student.responsible.index') }}" class="flex items-center p-2 rounded transition-all duration-300 
                @unless(Route::is('student.profile.index'))
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#00c800] 
                @endunless
                      hover:text-white hover:shadow-lg
                @if(Route::is('student.responsible.index'))
                      bg-gradient-to-r from-[#a0f0c5] to-[#00c800] text-white
                @endif">
                <svg class="w-5 h-5 mr-2 transition-all duration-300 text-black hover:text-white" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Responsaveis
            </a>
          </li>
        </ul>

        <div class="absolute bottom-0 left-0 w-full bg-black p-4 flex justify-center">
        <img src="https://api-eventos.pacsafe.com.br/logo-branca-1024x500.png" alt="Logo Pacsafe" class="h-12">
      </div>
      </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header class="bg-white p-6 shadow-md">
        <div class="flex justify-between items-center">
          <h2 class="text-2xl font-bold text-[#2C3E50]">Dashboard</h2>
          <div class="flex items-center">
            <div class="relative">
            <button id="profileButton" class="flex items-center gap-2 p-2 bg-blue-100 rounded-full hover:bg-blue-200">
              <img id="profileImage" src="data:image/png;base64,<?= htmlspecialchars($user->facial_image_base64) ?>" alt="Profile" class="h-10 w-10 rounded-full">
            </button>
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-xl rounded-xl p-4 hidden">
              <ul>
                <a href="{{ route('student.dashboard') }}" class="block py-2 px-4 rounded-xl text-lg font-medium bg-blue-100 hover:bg-blue-200 transition">
                  Dashboard
                </a>
                <a href="{{ route('student.profile.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
                  Meu Perfil
                </a>
                <a href="{{ route('student.responsible.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
                  Responsáveis
                </a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
                        Sair
                    </button>
                </form>
              </ul>
            </div>
          </div>
          </div>
        </div>
      </header>

      <!-- Cards e Métricas -->
      <main class="p-6 flex-1">
          <!-- Card: Quantidade de Alunos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card de Criar Novo Responsável -->
            <div onclick="openModal()" class="bg-blue-100 rounded-2xl shadow-lg p-6 flex flex-col items-center justify-center hover:bg-blue-200 transition cursor-pointer">
                <div class="w-16 h-16 bg-blue-500 text-white flex items-center justify-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m-8-8h16" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-blue-700 mt-4">Criar Responsável</h3>
            </div>

            @forelse ($responsibles as $responsavel)
            <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition relative">
                <div class="w-24 h-24 mb-4">
                    @if ($responsavel->student->facial_image_base64)
                        <img src="data:image/png;base64,<?= htmlspecialchars($responsavel->responsible->facial_image_base64) ?>" class="rounded-full object-cover w-full h-full">
                    @else
                        <img src="https://img.freepik.com/psd-gratuitas/ilustracao-de-icone-de-contacto-isolada_23-2151903337.jpg" class="rounded-full object-cover w-full h-full">
                    @endif
                </div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $responsavel->responsible->name }}</h3>
                <p class="text-gray-700 mb-4">{{ $responsavel->responsible->email }}</p>
                
                <!-- Botão de ações -->
                <div class="absolute top-2 right-2">
                    <button onclick="toggleDropdown(this)" class="p-2 border border-gray-400 text-gray-700 rounded-full hover:bg-blue-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <circle cx="12" cy="6" r="2"/>
                            <circle cx="12" cy="12" r="2"/>
                            <circle cx="12" cy="18" r="2"/>
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div class="hidden absolute right-0 mt-2 w-40 bg-white border border-gray-300 rounded-lg shadow-lg overflow-hidden">
                    <button class="edit-responsible" data-responsible='{"id":1,"name":"João Silva","email":"joao@email.com","responsible_type_id":2,"whatsapp":"(99) 99999-9999","cpf":"000.000.000-00","birthdate":"1990-01-01"}'>
                        Editar
                    </button>
                        <button class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100 transition">Excluir</button>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-700 text-center col-span-full">Nenhum responsável encontrado.</p>
        @endforelse 
        </div>

        <div id="createResponsibleModal" class="z-50 fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 id="modalTitle" class="text-xl font-semibold mb-4">Cadastrar Responsável</h2>

        <form id="responsibleForm" action="{{ route('student.responsible.store') }}" method="POST">
            @csrf
            <input type="hidden" name="_method" id="formMethod" value="POST">
            <input type="hidden" name="id" id="responsibleId">

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="name" id="name" required class="mt-1 p-2 border rounded-lg w-full">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" name="email" id="email" required class="mt-1 p-2 border rounded-lg w-full">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                <input type="password" name="password" id="password" class="mt-1 p-2 border rounded-lg w-full">
            </div>

            <div class="mb-4">
                <label for="responsible_type_id" class="block text-sm font-medium text-gray-700">Tipo de Responsável</label>
                <select name="responsible_type_id" id="responsible_type_id" required class="mt-1 p-2 border rounded-lg w-full">
                    <option value="" disabled selected>Selecione um tipo</option>
                    @foreach (\App\Models\ResponsibleType::all() as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="whatsapp" class="block text-sm font-medium text-gray-700">WhatsApp</label>
                <input type="text" name="whatsapp" id="whatsapp" required class="mt-1 p-2 border rounded-lg w-full" placeholder="(99) 99999-9999">
            </div>

            <div class="mb-4">
                <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                <input type="text" name="cpf" id="cpf" required class="mt-1 p-2 border rounded-lg w-full" placeholder="000.000.000-00">
            </div>

            <div class="mb-4">
                <label for="birthdate" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                <input type="date" name="birthdate" id="birthdate" required class="mt-1 p-2 border rounded-lg w-full">
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg">Salvar</button>
                <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">Fechar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(isEdit = false, responsible = null) {
        const modal = document.getElementById('createResponsibleModal');
        const form = document.getElementById('responsibleForm');
        const modalTitle = document.getElementById('modalTitle');
        const formMethod = document.getElementById('formMethod');

        if (isEdit && responsible) {
            modalTitle.textContent = "Editar Responsável";
            form.action = `/student/responsible/${responsible.id}`; // Ajuste a rota para sua API
            formMethod.value = "PUT"; // Para Laravel usar método PUT

            // Preenche os campos
            document.getElementById('responsibleId').value = responsible.id;
            document.getElementById('name').value = responsible.name;
            document.getElementById('email').value = responsible.email;
            document.getElementById('responsible_type_id').value = responsible.responsible_type_id;
            document.getElementById('whatsapp').value = responsible.whatsapp;
            document.getElementById('cpf').value = responsible.cpf;
            document.getElementById('birthdate').value = responsible.birthdate;
        } else {
            modalTitle.textContent = "Cadastrar Responsável";
            form.action = "{{ route('student.responsible.store') }}";
            formMethod.value = "POST";

            // Limpa os campos
            form.reset();
            document.getElementById('responsibleId').value = '';
        }

        modal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('createResponsibleModal').classList.add('hidden');
    }

    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('edit-responsible')) {
            const responsible = JSON.parse(event.target.getAttribute('data-responsible'));
            openModal(true, responsible);
        }
    });
</script>
<script>
    document.getElementById('profileButton').addEventListener('click', function () {
      const dropdown = document.getElementById('profileDropdown');
      dropdown.classList.toggle('hidden');
    });
</script>
      </main>
    </div>
  </div>
</body>
</html>









































