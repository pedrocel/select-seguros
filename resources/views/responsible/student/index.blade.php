<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PacFace - Responsável</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Gradient background utility */
    .bg-gradient-custom {
      background: linear-gradient(to bottom, #58c5ed, #61e3e8);
    }
  </style>
</head>
<body class="h-screen bg-gradient-custom text-gray-800">
  <div class="flex h-full">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-2xl flex flex-col p-4 hidden md:block">
      <h1 class="text-xl font-bold text-center mb-6">Menu</h1>
      <nav class="flex flex-col gap-4">
        <a href="{{ route('responsible.dashboard') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Dashboard
        </a>
        <a href="{{ route('responsible.profile.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Meu Perfil
        </a>
        <a href="{{ route('responsible.students.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium bg-blue-100  hover:bg-blue-200 transition">
          Alunos Vinculados
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 bg-white rounded-tl-3xl relative">
    <header class="flex justify-between items-center mb-6">
    <div class="flex items-center gap-2">
        <h1 class="text-2xl font-bold text-blue-500">Alunos</h1>
        <button id="filterButton" class="p-2 border border-gray-400 text-gray-700 rounded-full hover:bg-blue-200 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18M6 12h12m-9 6h6" />
            </svg>
        </button>
    </div>

    <div class="flex items-center gap-4">
        <!-- Notification Icon -->
        <div class="relative">
            <button id="notificationButton" class="relative p-2 bg-blue-100 rounded-full hover:bg-blue-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-5-5.917V4a1 1 0 00-2 0v1.083A6.002 6.002 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0a3 3 0 11-6 0h6z" />
                </svg>
            </button>
            <div id="notificationModal" class="absolute right-0 mt-2 w-64 bg-white shadow-xl rounded-xl p-4 hidden">
                <h2 class="text-lg font-semibold mb-2">Notificações</h2>
                <ul>
                    <li class="py-1 border-b">Lorem Ipsum</li>
                </ul>
            </div>
        </div>

        <!-- Profile Icon -->
        <div class="relative">
            <button id="profileButton" class="flex items-center gap-2 p-2 bg-blue-100 rounded-full hover:bg-blue-200">
                <img id="profileImage" src="data:image/png;base64,<?= htmlspecialchars($user->facial_image_base64) ?>" alt="Profile" class="h-10 w-10 rounded-full">
            </button>
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-xl rounded-xl p-4 hidden">
                <ul>
                    <a href="{{ route('responsible.dashboard') }}" class="block py-2 px-4 rounded-xl text-lg font-medium bg-blue-100 hover:bg-blue-200 transition">
                        Dashboard
                    </a>
                    <a href="{{ route('responsible.profile.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
                        Meu Perfil
                    </a>
                    <a href="{{ route('responsible.students.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
                        Alunos
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
</header>


      @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
          {{ session('success') }}
        </div>
      @endif

      <!-- Modal -->
      <div id="createStudentModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
          <h2 class="text-xl font-semibold mb-4">Cadastrar Aluno</h2>

          <form id="studentForm" action="{{ route('responsible.students.store') }}" method="POST">
            @csrf
            <input type="hidden" name="responsible_id" value="{{ auth()->id() }}">

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
              <input type="password" name="password" id="password" required class="mt-1 p-2 border rounded-lg w-full">
            </div>

            <div class="flex justify-between">
              <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg">Salvar</button>
              <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">Fechar</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Lista de Alunos -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card de Criar Novo Aluno -->
        <div onclick="openModal()" class="bg-blue-100 rounded-2xl shadow-lg p-6 flex flex-col items-center justify-center hover:bg-blue-200 transition cursor-pointer">
          <div class="w-16 h-16 bg-blue-500 text-white flex items-center justify-center rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m-8-8h16" />
            </svg>
          </div>
          <h3 class="text-lg font-semibold text-blue-700 mt-4">Criar Aluno</h3>
        </div>

        @forelse ($students as $student)
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition relative">
            <div class="w-24 h-24 mb-4">
              @if ($student->student->facial_image_base64)
              <img src="data:image/png;base64,<?= htmlspecialchars($student->student->facial_image_base64) ?>" class="rounded-full object-cover w-full h-full">
              @else
              <img src="https://img.freepik.com/psd-gratuitas/ilustracao-de-icone-de-contacto-isolada_23-2151903337.jpg" class="rounded-full object-cover w-full h-full">
              @endif
            </div>
            <div class="text-xl font-semibold text-blue-700">{{ $student->student->name }}</div>
            <div class="text-sm text-gray-600 mt-2">{{ $student->student->email }}</div>

            <!-- Botão de ações -->
            <div class="absolute top-2 right-2">
            <button id="actionButton" class="p-2 border border-gray-400 text-gray-700 rounded-full hover:bg-blue-200 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                <circle cx="12" cy="6" r="2"/>
                <circle cx="12" cy="12" r="2"/>
                <circle cx="12" cy="18" r="2"/>
            </svg>
        </button>

        <!-- Dropdown -->
        <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-40 bg-white border border-gray-300 rounded-lg shadow-lg overflow-hidden">
            <button class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100 transition">Editar</button>
            <button class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100 transition">Excluir</button>
        </div>
    </div>
</div>




        @empty
          <div class="col-span-full text-center text-lg text-gray-600">Nenhum aluno cadastrado.</div>
        @endforelse
      </div>
    </main>
  </div>
  <div id="filterModal" class="fixed top-0 right-0 h-full w-80 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out z-50">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-blue-700">Filtrar Alunos</h2>
            <button id="closeFilterModal" class="text-gray-500 hover:text-gray-800">
                ✖
            </button>
        </div>

        <label class="block text-sm font-medium text-gray-600">Nome:</label>
        <input type="text" class="w-full p-2 border rounded-lg mb-4" placeholder="Digite o nome">

        <label class="block text-sm font-medium text-gray-600">E-mail:</label>
        <input type="text" class="w-full p-2 border rounded-lg mb-4" placeholder="Digite o e-mail">

        <div class="flex justify-end gap-2">
            <button id="closeFilterModalBtn" class="px-4 py-2 bg-gray-300 rounded-lg">Cancelar</button>
            <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Buscar</button>
        </div>
    </div>
</div>
  <script>
    // Toggle notification modal
    document.getElementById('notificationButton').addEventListener('click', function () {
      const modal = document.getElementById('notificationModal');
      modal.classList.toggle('hidden');
    });

    // Toggle profile dropdown
    document.getElementById('profileButton').addEventListener('click', function () {
      const dropdown = document.getElementById('profileDropdown');
      dropdown.classList.toggle('hidden');
    });
  </script>
  <script>
    // Modal toggle
    function openModal() {
      document.getElementById('createStudentModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('createStudentModal').classList.add('hidden');
    }
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
        const actionButton = document.getElementById("actionButton");
        const dropdownMenu = document.getElementById("dropdownMenu");

        actionButton.addEventListener("click", function(event) {
            dropdownMenu.classList.toggle("hidden");
            event.stopPropagation(); // Evita que o clique feche imediatamente
        });

        document.addEventListener("click", function(event) {
            if (!actionButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    });
</script>
<script>
document.getElementById("filterButton").addEventListener("click", function() {
    document.getElementById("filterModal").classList.remove("translate-x-full");
});

document.getElementById("closeFilterModal").addEventListener("click", function() {
    document.getElementById("filterModal").classList.add("translate-x-full");
});

document.getElementById("closeFilterModalBtn").addEventListener("click", function() {
    document.getElementById("filterModal").classList.add("translate-x-full");
});
</script>
</body>
</html>
