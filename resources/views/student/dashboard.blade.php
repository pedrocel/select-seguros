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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Card: Quantidade de Alunos -->
          @if (!$user->facial_image_base64)
        <div class="p-6 bg-white rounded-2xl shadow-xl border-t-4 border-blue-500">
          <h2 class="text-xl font-semibold mb-2 text-blue-500">Cadastro de Biometria Facial</h2>
          <p class="text-gray-700 mb-4">Realize o cadastro da sua biometria facial para aumentar a segurança de sua conta.</p>
          <button class="w-full py-2 px-4 bg-blue-500 text-white rounded-xl hover:bg-blue-600 transition font-medium">
            Cadastrar Biometria Facial
          </button>
        </div>
        @elseif ($user->facial_image_base64)
        <!-- Verified Biometrics Card -->
        <div class="p-6 bg-green-100 rounded-2xl shadow-xl border-t-4 border-green-500">
          <h2 class="text-xl font-semibold mb-2 text-green-600">Biometria Verificada</h2>
          <p class="text-gray-700 mb-4">Sua biometria facial foi verificada com sucesso.</p>
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span class="text-green-600 font-medium">Verificado</span>
          </div>
        </div>
        @endif
        </div>
      </main>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const progressBar = document.getElementById('progress-bar');
      const targetWidth = 80; // Largura final da barra (80% no seu exemplo)
  
      let currentWidth = 0;
      const interval = setInterval(() => {
        currentWidth++;
        progressBar.style.width = currentWidth + '%';
        if (currentWidth >= targetWidth) {
          clearInterval(interval);
        }
      }, 15); // Ajuste o valor 15 para controlar a velocidade da animação
    });
  </script>
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
    // Gráfico de Entradas Faciais
    const ctx = document.getElementById('entradasChart').getContext('2d');
    const entradasChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
        datasets: [{
          label: 'Entradas Faciais - Turno Matutino',
          data: [150, 250, 350, 200, 450, 800],
          borderColor: '#2ECC71',
          backgroundColor: 'rgba(46, 204, 113, 0.2)',
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const ctx1 = document.getElementById('entradasChartVespetino').getContext('2d');
    const entradasChartVespetino = new Chart(ctx1, {
      type: 'line',
      data: {
        labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
        datasets: [{
          label: 'Entradas Faciais - Turno Matutino',
          data: [150, 250, 350, 200, 450, 800],
          borderColor: '#0097FF',
          backgroundColor: 'rgba(46, 204, 113, 0.2)',
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
    
  </script>
  <script>
    document.getElementById('profileButton').addEventListener('click', function () {
      const dropdown = document.getElementById('profileDropdown');
      dropdown.classList.toggle('hidden');
    });
</script>
</body>
</html>
