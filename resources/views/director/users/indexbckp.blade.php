@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="p-0">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
      <div>
        <h1 class="text-2xl font-semibold">Clientes</h1>
        <p class="text-gray-400 mt-1">Gerencie todos os seus clientes em um só lugar</p>
      </div>
      <div class="flex items-center gap-4">
        <button class="p-2 hover:bg-dark-light rounded-full tooltip" data-tooltip="Notificações">
          <i class="fas fa-bell text-gray-300"></i>
        </button>
        <button class="p-2 hover:bg-dark-light rounded-full tooltip" data-tooltip="Configurações">
          <i class="fas fa-cog text-gray-300"></i>
        </button>
        <button id="openUserModal" class="flex items-center gap-2 bg-primary hover:bg-primary-dark transition-colors rounded-full px-4 py-2">
            <i class="fas fa-plus text-sm"></i>
            <span class="text-sm font-medium">Novo Usuário</span>
          </button>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="bg-dark-lighter border border-border-dark rounded-xl p-6 hover:border-primary/50 transition-colors">
        <div class="flex justify-between items-start">
          <div>
            <p class="text-gray-400 text-sm">Total de Clientes</p>
            <h3 class="text-2xl font-bold mt-2">{{ $totalUsers }}</h3>
            <p class="text-success text-xs mt-2 flex items-center">
              <i class="fas fa-arrow-up mr-1"></i> 12% este mês
            </p>
          </div>
          <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
            <i class="fas fa-users text-primary"></i>
          </div>
        </div>
      </div>
      
      <div class="bg-dark-lighter border border-border-dark rounded-xl p-6 hover:border-success/50 transition-colors">
        <div class="flex justify-between items-start">
          <div>
            <p class="text-gray-400 text-sm">Novos Clientes</p>
            <h3 class="text-2xl font-bold mt-2">{{ $newClientsThisMonth }}</h3>
            <p class="text-success text-xs mt-2 flex items-center">
              <i class="fas fa-arrow-up mr-1"></i> {{ number_format($percentageNewClients, 2) }}% este mês
            </p>
          </div>
          <div class="w-12 h-12 bg-success/10 rounded-lg flex items-center justify-center">
            <i class="fas fa-user-plus text-success"></i>
          </div>
        </div>
      </div>
      
      <div class="bg-dark-lighter border border-border-dark rounded-xl p-6 hover:border-warning/50 transition-colors">
        <div class="flex justify-between items-start">
          <div>
            <p class="text-gray-400 text-sm">Renovações Pendentes</p>
            <h3 class="text-2xl font-bold mt-2">18</h3>
            <p class="text-warning text-xs mt-2 flex items-center">
              <i class="fas fa-clock mr-1"></i> Próximos 30 dias
            </p>
          </div>
          <div class="w-12 h-12 bg-warning/10 rounded-lg flex items-center justify-center">
            <i class="fas fa-sync-alt text-warning"></i>
          </div>
        </div>
      </div>
      
      <div class="bg-dark-lighter border border-border-dark rounded-xl p-6 hover:border-info/50 transition-colors">
        <div class="flex justify-between items-start">
          <div>
            <p class="text-gray-400 text-sm">Valor Total Segurado</p>
            <h3 class="text-2xl font-bold mt-2">R$ 4.2M</h3>
            <p class="text-info text-xs mt-2 flex items-center">
              <i class="fas fa-arrow-up mr-1"></i> 15% este ano
            </p>
          </div>
          <div class="w-12 h-12 bg-info/10 rounded-lg flex items-center justify-center">
            <i class="fas fa-shield-alt text-info"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Search and Filter Bar -->
    <div class="flex flex-col md:flex-row gap-4 mb-6">
    <div class="flex-1 relative">
    <input id="searchInput" type="text" placeholder="Buscar clientes por nome, email e cpf" 
           class="w-full bg-dark-lighter border border-border-dark rounded-lg px-4 py-3 pl-10 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
    <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
</div>

<div class="flex gap-3">
    <button id="openFilter" class="flex items-center gap-2 bg-[#252525] border border-[#333] rounded-lg px-4 py-3 hover:bg-[#1A1A1A] transition-colors">
        <i class="fas fa-filter text-gray-300"></i>
        <span class="text-white">Filtrar</span>
    </button>
</div>
        <button class="flex items-center gap-2 bg-dark-lighter border border-border-dark rounded-lg px-4 py-3 hover:bg-dark-light transition-colors">
          <i class="fas fa-download text-gray-300"></i>
          <span>Exportar</span>
        </button>
      </div>
    </div>

    <!-- Clients Table -->
    <div class="bg-dark-lighter rounded-xl border border-border-dark overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full">
            <table class="w-full mt-4 border border-border-dark">
                <thead>
                    <tr class="bg-dark-light text-white">
                        <th class="p-5 text-left">Cliente</th>
                        <th class="p-5 text-left">WhatsApp</th>
                        <th class="p-5 text-left">CPF</th>
                        <th class="p-5 text-left">Nascimento</th>
                        <th class="p-5 text-left">Status</th>
                        <th class="p-5 text-left">Ações</th>
                    </tr>
                </thead>
                <tbody id="usersList">
                    @include('director.users.create-user-partial')
                </tbody>
            </table>
      </div>
      
      <!-- Pagination -->
      <div class="flex items-center justify-between border-t border-border-dark p-4">
        <div class="text-sm text-gray-400">
          Mostrando <span class="font-medium text-white">1</span> a <span class="font-medium text-white">5</span> de <span class="font-medium text-white">248</span> resultados
        </div>
        <div class="flex items-center gap-2">
          <button class="p-2 bg-dark-light rounded-lg text-gray-400 hover:text-white disabled:opacity-50 disabled:cursor-not-allowed">
            <i class="fas fa-chevron-left text-sm"></i>
          </button>
          <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-white">1</button>
          <button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-dark-light text-gray-300">2</button>
          <button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-dark-light text-gray-300">3</button>
          <button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-dark-light text-gray-300">4</button>
          <button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-dark-light text-gray-300">5</button>
          <button class="p-2 bg-dark-light rounded-lg text-gray-400 hover:text-white">
            <i class="fas fa-chevron-right text-sm"></i>
          </button>
        </div>
      </div>
    </div>
  </div>


  
  <div id="userModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/60 backdrop-blur"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
      <div class="bg-dark-lighter border border-border-dark rounded-xl shadow-xl w-full max-w-md relative modal-fade-in">
        <!-- Modal Header -->
        <div class="flex justify-between items-center p-6 border-b border-border-dark">
          <h3 class="text-xl font-semibold text-white">Cadastrar Novo Usuário</h3>
          <button id="closeUserModal" class="text-gray-400 hover:text-white">
            <i class="fas fa-times"></i>
          </button>
        </div>
        
        <!-- Modal Body -->
        <div class="p-6">
        <form action="{{ route('diretor.users.store') }}" method="POST" class="space-y-4">
        @csrf    
        <!-- Nome -->
            <div>
              <label for="name" class="block text-gray-300 font-medium mb-1">Nome</label>
              <input 
                type="text" 
                name="name" 
                id="name" 
                class="border border-border-dark rounded-lg w-full px-4 py-2 bg-dark text-white focus:ring-1 focus:ring-primary focus:border-primary" 
                required>
              <p class="text-red-500 text-sm mt-1 hidden" id="nameError"></p>
            </div>

            <!-- Email -->
            <div>
              <label for="email" class="block text-gray-300 font-medium mb-1">Email</label>
              <input 
                type="email" 
                name="email" 
                id="email" 
                class="border border-border-dark rounded-lg w-full px-4 py-2 bg-dark text-white focus:ring-1 focus:ring-primary focus:border-primary" 
                required>
              <p class="text-red-500 text-sm mt-1 hidden" id="emailError"></p>
            </div>

            <!-- Senha -->
            <div>
              <label for="password" class="block text-gray-300 font-medium mb-1">Senha</label>
              <input 
                type="password" 
                name="password" 
                id="password" 
                class="border border-border-dark rounded-lg w-full px-4 py-2 bg-dark text-white focus:ring-1 focus:ring-primary focus:border-primary" 
                required>
              <p class="text-red-500 text-sm mt-1 hidden" id="passwordError"></p>
            </div>

            <!-- Confirmação de Senha -->
            <div>
              <label for="password_confirmation" class="block text-gray-300 font-medium mb-1">Confirme a Senha</label>
              <input 
                type="password" 
                name="password_confirmation" 
                id="password_confirmation" 
                class="border border-border-dark rounded-lg w-full px-4 py-2 bg-dark text-white focus:ring-1 focus:ring-primary focus:border-primary" 
                required>
              <p class="text-red-500 text-sm mt-1 hidden" id="passwordConfirmError"></p>
            </div>

            <div>
            <label for="profile_id" class="block text-gray-300 font-medium mb-1">Perfil</label>
            <select 
                name="profile_id" 
                id="profile_id" 
                class="border border-border-dark rounded-lg w-full px-4 py-2 bg-dark text-white focus:ring-1 focus:ring-primary focus:border-primary" 
                required>
                @foreach ($profiles as $profile)
                <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                @endforeach
            </select>
            <p class="text-red-500 text-sm mt-1 hidden" id="profileError"></p>
            </div>

            <div class="flex gap-4">
                <!-- Campo CPF -->
                <div class="w-1/2">
                    <label for="cpf" class="block text-gray-300 font-medium mb-1">CPF</label>
                    <div class="relative">
                    <input 
                        type="text" 
                        name="cpf" 
                        id="cpf" 
                        placeholder="Digite o CPF"
                        class="border border-border-dark rounded-lg w-full px-4 py-3 pl-12 bg-dark text-white focus:ring-1 focus:ring-primary focus:border-primary" 
                        required
                    >
                    <i class="fas fa-id-card absolute left-3 top-3.5 text-gray-400"></i>
                    </div>
                    <p class="text-red-500 text-sm mt-1 hidden" id="cpfError"></p>
                </div>

                <!-- Campo WhatsApp -->
                <div class="w-1/2">
                    <label for="whatsapp" class="block text-gray-300 font-medium mb-1">WhatsApp</label>
                    <div class="relative">
                    <input 
                        type="text" 
                        name="whatsapp" 
                        id="whatsapp" 
                        placeholder="Digite o WhatsApp"
                        class="border border-border-dark rounded-lg w-full px-4 py-3 pl-12 bg-dark text-white focus:ring-1 focus:ring-primary focus:border-primary" 
                        required
                    >
                    <i class="fab fa-whatsapp absolute left-3 top-3.5 text-gray-400"></i>
                    </div>
                    <p class="text-red-500 text-sm mt-1 hidden" id="whatsappError"></p>
                </div>
                </div>



            <!-- Botões -->
            <div class="flex justify-end gap-3 pt-4">
              <button type="button" id="cancelUserModal" class="px-4 py-2 border border-border-dark text-gray-300 rounded-lg hover:bg-dark-light transition-colors">
                Cancelar
              </button>
              <button type="submit" class="px-4 py-2 bg-primary hover:bg-primary-dark text-white rounded-lg transition-colors">
                Salvar
              </button>
            </div>
          </form>
        </div>
      </div>
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