<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Gradient Sidebar Layout</title>
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
        <a href="#" class="block py-2 px-4 rounded-xl text-lg font-medium bg-blue-100 hover:bg-blue-200 transition">
          Dashboard
        </a>
        <a href="#" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Produtos
        </a>
        <a href="#" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Vendas
        </a>
        <a href="#" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Clientes
        </a>
        <a href="#" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Configurações
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 bg-white rounded-tl-3xl relative">
      <header class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-blue-500">Bem-vindo!</h1>
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
                <li class="py-1 border-b">Nova venda registrada</li>
                <li class="py-1 border-b">Atualização de inventário</li>
                <li class="py-1">Mensagem de cliente</li>
              </ul>
            </div>
          </div>

          <!-- Profile Icon -->
          <div class="relative">
            <button id="profileButton" class="flex items-center gap-2 p-2 bg-blue-100 rounded-full hover:bg-blue-200">
              <img src="https://via.placeholder.com/40" alt="Profile" class="h-10 w-10 rounded-full">
            </button>
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-xl rounded-xl p-4 hidden">
              <ul>
                <li class="py-1 hover:bg-blue-100 rounded-md"><a href="#">Perfil</a></li>
                <li class="py-1 hover:bg-blue-100 rounded-md"><a href="#">Configurações</a></li>
                <li class="py-1 hover:bg-blue-100 rounded-md"><a href="#">Sair</a></li>
              </ul>
            </div>
          </div>
        </div>
      </header>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
       
        <!-- Facial Biometrics Card -->
        
        @if ($user->status == 1)
        <div class="p-6 bg-white rounded-2xl shadow-xl border-t-4 border-blue-500">
          <h2 class="text-xl font-semibold mb-2 text-blue-500">Cadastro de Biometria Facial</h2>
          <p class="text-gray-700 mb-4">Realize o cadastro da sua biometria facial para aumentar a segurança de sua conta.</p>
          <button class="w-full py-2 px-4 bg-blue-500 text-white rounded-xl hover:bg-blue-600 transition font-medium">
            Cadastrar Biometria Facial
          </button>
        </div>
        @elseif ($user->status == 2)
        <div class="p-6 bg-yellow-100 rounded-2xl shadow-xl border-t-4 border-yellow-500">
          <h2 class="text-xl font-semibold mb-2 text-yellow-600">Aguardando Análise</h2>
          <p class="text-gray-700 mb-4">Sua biometria facial está em processo de análise.</p>
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1 4h.01M12 18a9 9 0 110-18 9 9 0 010 18z" />
            </svg>
            <span class="text-yellow-600 font-medium">Em Análise</span>
          </div>
        </div>
        @elseif ($user->status == 3)
        <div class="p-6 bg-red-100 rounded-2xl shadow-xl border-t-4 border-red-500">
          <h2 class="text-xl font-semibold mb-2 text-red-600">Biometria Recusada</h2>
          <p class="text-gray-700 mb-4">Houve um problema com a verificação da sua biometria facial.</p>
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span class="text-red-600 font-medium">Recusado</span>
          </div>
        </div>
        @elseif ($user->status == 4)
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
</body>
</html>
