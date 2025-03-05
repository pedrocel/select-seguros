@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
      
      <!-- Content -->
      <main class="flex-1 overflow-y-auto bg-[#242424] p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
        <div class="flex items-center">
            <button id="sidebarToggleBtn" class="p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-800 md:hidden">
              <i class="fas fa-bars text-xl"></i>
            </button>
            <h1 class="text-2xl font-semibold ml-2">Gestão de usuarios</h1>
          </div>
          <div class="flex items-center gap-4">
           
            <button id="openUserModal" class="flex items-center gap-2 bg-primary hover:bg-primary-dark transition-colors rounded-full px-4 py-2">
              <i class="fas fa-plus text-sm"></i>
              <span class="text-sm font-medium">Novo</span>
            </button>
          </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-gray-400 text-sm">Total de Usuários</p>
                <h3 class="text-3xl font-bold mt-1">{{ $totalUsers }}</h3>
                <p class="text-green-500 text-sm mt-2">
                  <i class="fas fa-arrow-up mr-1"></i>
                  <span>{{ number_format($percentageNewClients, 2) }}% este mês</span>
                </p>
              </div>
              <div class="p-3 bg-primary bg-opacity-10 rounded-full">
                <i class="fas fa-users text-primary"></i>
              </div>
            </div>
          </div>
          
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-gray-400 text-sm">Novos Clientes</p>
                <h3 class="text-3xl font-bold mt-1">{{ $newClientsThisMonth }}</h3>
                <p class="text-green-500 text-sm mt-2">
                  <i class="fas fa-arrow-up mr-1"></i>
                  <span>este mês</span>
                </p>
              </div>
              <div class="p-3 bg-green-500 bg-opacity-10 rounded-full">
                <i class="fas fa-user-plus text-green-500"></i>
              </div>
            </div>
          </div>
          
          <!-- <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-gray-400 text-sm">Renovações Pendentes</p>
                <h3 class="text-3xl font-bold mt-1">18</h3>
                <p class="text-yellow-500 text-sm mt-2">
                  <i class="fas fa-clock mr-1"></i>
                  <span>Próximos 30 dias</span>
                </p>
              </div>
              <div class="p-3 bg-yellow-500 bg-opacity-10 rounded-full">
                <i class="fas fa-sync-alt text-yellow-500"></i>
              </div>
            </div>
          </div> -->
          
          <!-- <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-gray-400 text-sm">Valor Total Segurado</p>
                <h3 class="text-3xl font-bold mt-1">R$ 4.2M</h3>
                <p class="text-blue-500 text-sm mt-2">
                  <i class="fas fa-arrow-up mr-1"></i>
                  <span>15% este ano</span>
                </p>
              </div>
              <div class="p-3 bg-blue-500 bg-opacity-10 rounded-full">
                <i class="fas fa-shield-alt text-blue-500"></i>
              </div>
            </div>
          </div> -->
        </div>


        <div class="flex flex-col md:flex-row gap-4 mb-6">
          <div class="flex-1 relative">
            <input id="searchInput" type="text" placeholder="Buscar clientes por nome, email e cpf" 
                  class="w-full bg-[#1a1a1a] border border-gray-800 rounded-lg px-4 py-3 pl-10 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
            <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
          </div>

          <div class="flex gap-3">
              <button id="openFilter" class="flex items-center gap-2 bg-[#252525] border border-[#333] rounded-lg px-4 py-3 hover:bg-[#1A1A1A] transition-colors">
                  <i class="fas fa-filter text-gray-300"></i>
                  <span class="text-white">Filtrar</span>
              </button>
          </div>
        </div>

        <!-- Clients Table -->
        <div class="bg-[#1a1a1a] rounded-lg shadow-lg overflow-hidden">
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-800">
              <thead class="bg-gray-800">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Cliente
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    WhatsApp
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    CPF
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Nascimento
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Status
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Ações
                  </th>
                </tr>
              </thead>
              <tbody id="usersList">
                    @include('director.users.create-user-partial')
                </tbody>
            </table>
            
          </div><br>
          {{ $users->links() }}
          <br>
        </div>
      </main>
  
      <div id="userModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-[#1a1a1a] rounded-lg shadow-xl w-full max-w-md p-6 border border-gray-800">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-semibold">Novo Usuario</h3>
        <button id="closeUserModal" class="text-gray-400 hover:text-white">
          <i class="fas fa-times"></i>
        </button>
      </div>
      
      <form action="{{ route('diretor.users.store') }}" method="POST" class="space-y-4 bg-[#242424] p-6 rounded-lg border border-gray-800">
    @csrf    
    <!-- Nome -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-400 mb-1">Nome Completo</label>
        <input 
            type="text" 
            name="name" 
            id="name" 
            class="w-full bg-[#242424] border border-gray-800 rounded-lg px-4 py-2 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" 
            required>
        <p class="text-red-500 text-sm mt-1 hidden" id="nameError"></p>
    </div>

    <!-- Email -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-400 mb-1">Email</label>
        <input 
            type="email" 
            name="email" 
            id="email" 
            class="w-full bg-[#242424] border border-gray-800 rounded-lg px-4 py-2 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" 
            required>
        <p class="text-red-500 text-sm mt-1 hidden" id="emailError"></p>
    </div>

    <!-- Senha -->
    <div>
        <label for="password" class="block text-sm font-medium text-gray-400 mb-1">Senha</label>
        <input 
            type="password" 
            name="password" 
            id="password" 
            class="w-full bg-[#242424] border border-gray-800 rounded-lg px-4 py-2 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" 
            required>
        <p class="text-red-500 text-sm mt-1 hidden" id="passwordError"></p>
    </div>

    <!-- Confirmação de Senha -->
    <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-400 mb-1">Confirme a Senha</label>
        <input 
            type="password" 
            name="password_confirmation" 
            id="password_confirmation" 
            class="w-full bg-[#242424] border border-gray-800 rounded-lg px-4 py-2 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" 
            required>
        <p class="text-red-500 text-sm mt-1 hidden" id="passwordConfirmError"></p>
    </div>

    <!-- Perfil -->
    <div>
        <label for="profile_id" class="block text-sm font-medium text-gray-400 mb-1">Perfil</label>
        <select 
            name="profile_id" 
            id="profile_id" 
            class="w-full bg-[#242424] border border-gray-800 rounded-lg px-4 py-2 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" 
            required>
            @foreach ($profiles as $profile)
                <option value="{{ $profile->id }}">{{ $profile->name }}</option>
            @endforeach
        </select>
        <p class="text-red-500 text-sm mt-1 hidden" id="profileError"></p>
    </div>

    <!-- CPF e WhatsApp -->
    <div class="flex gap-4">
        <div class="w-1/2">
            <label for="cpf" class="block text-sm font-medium text-gray-400 mb-1">CPF</label>
            <input 
                type="text" 
                name="cpf" 
                id="cpf" 
                placeholder="Digite o CPF"
                class="w-full bg-[#242424] border border-gray-800 rounded-lg px-4 py-2 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" 
                required>
            <p class="text-red-500 text-sm mt-1 hidden" id="cpfError"></p>
        </div>

        <div class="w-1/2">
            <label for="whatsapp" class="block text-sm font-medium text-gray-400 mb-1">WhatsApp</label>
            <input 
                type="text" 
                name="whatsapp" 
                id="whatsapp" 
                placeholder="Digite o WhatsApp"
                class="w-full bg-[#242424] border border-gray-800 rounded-lg px-4 py-2 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" 
                required>
            <p class="text-red-500 text-sm mt-1 hidden" id="whatsappError"></p>
        </div>
    </div>

    <!-- Data de Nascimento -->
    <div>
        <label for="birthdate" class="block text-sm font-medium text-gray-400 mb-1">Data de Nascimento</label>
        <input 
            type="date" 
            id="birthdate" 
            name="birthdate" 
            class="w-full bg-[#242424] border border-gray-800 rounded-lg px-4 py-2 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
    </div>

    <!-- Botões -->
    <div class="mt-6 flex justify-end space-x-3">
        <button type="button" id="cancelUserModal" class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors">
            Cancelar
        </button>
        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors">
            Salvar
        </button>
    </div>
</form>

    </div>
  </div>
  <!-- JavaScript for interactions -->
  <script>

function openUserModalEditar(button) {
    // Obter os dados do botão
    const name = button.getAttribute('data-name');
    const email = button.getAttribute('data-email');
    const cpf = button.getAttribute('data-cpf');
    const whatsapp = button.getAttribute('data-whatsapp');
    const profile = button.getAttribute('data-profile');
    const userId = button.getAttribute('data-id');

    // Preencher os campos do modal com os dados
    document.getElementById('modal-name').value = name;
    document.getElementById('modal-email').value = email;
    document.getElementById('modal-cpf').value = cpf;
    document.getElementById('modal-whatsapp').value = whatsapp;
    document.getElementById('modal-profile_id').value = profile; // Assumindo que você tem um `id` no select de perfil

    // Exibir o modal
    document.getElementById('userModalEditar').classList.remove('hidden');
}

function closeUserModal() {
    // Fechar o modal
    document.getElementById('userModal').classList.add('hidden');
}


    // Função para exibir a notificação de sucesso
    document.addEventListener('DOMContentLoaded', function() {
    // Exibir a notificação de sucesso, se existir
    if (document.getElementById('successNotification')) {
        showNotification('successNotification');
    }

    // Exibir a notificação de erro, se existir
    if (document.getElementById('errorNotification')) {
        showNotification('errorNotification');
    }

    // Função para mostrar a notificação
    function showNotification(notificationId) {
        const notification = document.getElementById(notificationId);

        // Adiciona a animação de deslizar para a tela
        notification.classList.remove('translate-x-full');
        notification.classList.add('translate-x-0');

        // Depois de 5 segundos, a notificação desaparecerá
        setTimeout(() => {
            notification.classList.remove('translate-x-0');
            notification.classList.add('translate-x-full');
        }, 5000); // 5000 milissegundos = 5 segundos
    }
});


// Chama a função quando você deseja exibir a notificação
showSuccessNotification();

    // Toggle dropdown menus
    document.addEventListener('DOMContentLoaded', function() {
      // Add any JavaScript functionality here
      
      // Example: Close any dropdown when clicking outside
      document.addEventListener('click', function(event) {
        const dropdowns = document.querySelectorAll('.dropdown-content');
        dropdowns.forEach(dropdown => {
          if (!event.target.closest('.dropdown')) {
            dropdown.classList.add('hidden');
          }
        });
      });
      
      // Example: Show a notification when clicking the notification bell
      const notificationBtn = document.querySelector('[data-tooltip="Notificações"]');
      if (notificationBtn) {
        notificationBtn.addEventListener('click', function() {
          // Show notification logic would go here
          console.log('Notification button clicked');
        });
      }
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const modal = document.getElementById('userModal');
      const openModalBtn = document.getElementById('openUserModal');
      const closeModalBtn = document.getElementById('closeUserModal');
      const cancelBtn = document.getElementById('cancelUserModal');
      const successNotification = document.getElementById('successNotification');
      
      // Open modal
      openModalBtn.addEventListener('click', function() {
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
      });
      
      // Close modal functions
      function closeModal() {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
        
        // Hide all error messages
        document.querySelectorAll('.text-red-500').forEach(el => {
          el.classList.add('hidden');
          el.textContent = '';
        });
      }
      
      closeModalBtn.addEventListener('click', closeModal);
      cancelBtn.addEventListener('click', closeModal);
      
      // Close modal when clicking outside
      modal.addEventListener('click', function(e) {
        if (e.target === modal || e.target.classList.contains('backdrop-blur')) {
          closeModal();
        }
      });
      
    });
  </script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const usersList = document.getElementById("usersList");  // Lista de usuários, provavelmente uma <table> ou <div>

        // Função de busca e atualização da lista
        searchInput.addEventListener("input", function () {
            let searchQuery = searchInput.value;  // Pegando o valor do campo de pesquisa

            // Montando a URL com a pesquisa
            let url = "{{ route('diretor.users.index') }}" + "?search=" + encodeURIComponent(searchQuery);

            // Realizando a requisição para buscar os dados filtrados
            fetch(url, {
                method: "GET",
                headers: { "X-Requested-With": "XMLHttpRequest" }
            })
            .then(response => response.json())
            .then(data => {
                // Atualizando a lista com os dados filtrados
                usersList.innerHTML = data.html;
            })
            .catch(error => console.error("Erro ao buscar usuários:", error));
        });
    });
</script>
@endsection