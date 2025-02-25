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
      <h2 class="text-xl text-white font-bold mb-8">{{ $organizacao->organization->name }}</h2>
      <nav>

        <ul>
          <li class="mb-4">
            <a href="{{ route('director.dashboard') }}" class="flex items-center p-2 rounded transition-all duration-300 
                @unless(Route::is('director.dashboard'))
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#00c800] 
                @endunless
                      hover:text-white hover:shadow-lg
                @if(Route::is('director.dashboard'))
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
            <a href="{{ route('director.profile.index') }}" class="flex items-center p-2 rounded transition-all duration-300 
                @unless(Route::is('director.profile.index'))
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#00c800] 
                @endunless
                      hover:text-white hover:shadow-lg
                @if(Route::is('director.profile.index'))
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
            <a href="{{ route('director.students.index') }}" class="flex items-center p-2 rounded transition-all duration-300 
                @unless(Route::is('director.students.index'))
                      text-black bg-white hover:bg-gradient-to-r hover:from-[#a0f0c5] hover:to-[#00c800] 
                @endunless
                      hover:text-white hover:shadow-lg
                @if(Route::is('director.students.index'))
                      bg-gradient-to-r from-[#a0f0c5] to-[#00c800] text-white
                @endif">
                <svg class="w-5 h-5 mr-2 transition-all duration-300 text-black hover:text-white" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Alunos
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
          <h2 class="text-2xl font-bold text-[#2C3E50]">Alunos</h2>
          <div class="flex items-center">
            <div class="relative">
            <button id="profileButton" class="flex items-center gap-2 p-2 bg-blue-100 rounded-full hover:bg-blue-200">
              <img id="profileImage" src="data:image/png;base64,<?= htmlspecialchars($user->facial_image_base64) ?>" alt="Profile" class="h-10 w-10 rounded-full">
            </button>
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-xl rounded-xl p-4 hidden z-50">
              <ul>  
                <a href="{{ route('director.dashboard') }}" class="block py-2 px-4 rounded-xl text-lg font-medium bg-blue-100 hover:bg-blue-200 transition">
                  Dashboard
                </a>
                <a href="{{ route('director.profile.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
                  Meu Perfil
                </a>
                <a href="{{ route('director.students.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
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
        </div>
      </header>

      <!-- Cards e Métricas -->
      <main class="p-6 flex-1">

            <form id="responsibleForm" action="{{ route('director.students.store') }}"  method="POST">
                <input type="hidden" id="formMethod" name="_method" value="POST">
                
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="responsible_type_id">Tipo de Responsável:</label>
                <select id="responsible_type_id" name="responsible_type_id" required>
                    <option value="1">Pai</option>
                    <option value="2">Mãe</option>
                    <option value="3">Outro</option>
                </select>

                <label for="whatsapp">WhatsApp:</label>
                <input type="text" id="whatsapp" name="whatsapp" required>

                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" required>

                <label for="student_birthdate">Data de Nascimento:</label>
                <input type="date" id="student_birthdate" name="student_birthdate" required>

                <label for="emancipated">Emancipado:</label>
                <input type="checkbox" id="emancipated" name="emancipated">

                <button type="button" onclick="nextStep()">Próximo</button>
            </form>

            <div id="step2" class="hidden bg-gray-500">
                <h2>Dados do Responsável</h2>

                <label for="responsible_name">Nome do Responsável:</label>
                <input type="text" id="responsible_name" name="responsible_name" required>

                <label for="responsible_phone">Telefone do Responsável:</label>
                <input type="text" id="responsible_phone" name="responsible_phone" required>

                <button type="button" onclick="prevStep()">Voltar</button>
                <button type="submit" form="responsibleForm">Finalizar Cadastro</button>
            </div>

    </main>

    <script>
        function nextStep() {
            const emancipated = document.getElementById('emancipated').checked;

            if (emancipated) {
                document.getElementById("responsibleForm").submit();
            } else {
                document.getElementById("responsibleForm").classList.add("hidden");
                document.getElementById("step2").classList.remove("hidden");
            }
        }

        function prevStep() {
            document.getElementById("step2").classList.add("hidden");
            document.getElementById("responsibleForm").classList.remove("hidden");
        }
    </script>

</body>
</html>
