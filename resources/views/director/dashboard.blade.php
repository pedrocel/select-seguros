@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
      <!-- Top Navigation -->
      <header class="bg-[#1a1a1a] border-b border-gray-800">
        <div class="px-6 py-4 flex items-center justify-between">
          <!-- Mobile Menu Button -->
          <div class="flex items-center">
            <button id="sidebarToggleBtn" class="p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-800 md:hidden">
              <i class="fas fa-bars text-xl"></i>
            </button>
            <h1 class="text-2xl font-semibold ml-2">CRM Dashboard</h1>
          </div>
          
          <div class="flex items-center space-x-4">
            <button class="p-2 rounded-full text-gray-400 hover:text-white hover:bg-gray-800">
              <i class="fas fa-bell"></i>
            </button>
            
            
          </div>
        </div>
      </header>
      
      <!-- Content -->
      <main class="flex-1 overflow-y-auto bg-[#242424] p-6">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
          <!-- Total Leads -->
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-gray-400 text-sm">Total de Leads</p>
                <h3 class="text-3xl font-bold mt-1">124</h3>
                <p class="text-green-500 text-sm mt-2">
                  <i class="fas fa-arrow-up mr-1"></i>
                  <span>12% este mês</span>
                </p>
              </div>
              <div class="p-3 bg-primary bg-opacity-10 rounded-full">
                <i class="fas fa-user-plus text-primary"></i>
              </div>
            </div>
          </div>
          
          <!-- Leads Convertidos -->
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-gray-400 text-sm">Leads Convertidos</p>
                <h3 class="text-3xl font-bold mt-1">42</h3>
                <p class="text-green-500 text-sm mt-2">
                  <i class="fas fa-arrow-up mr-1"></i>
                  <span>8% este mês</span>
                </p>
              </div>
              <div class="p-3 bg-green-500 bg-opacity-10 rounded-full">
                <i class="fas fa-user-check text-green-500"></i>
              </div>
            </div>
          </div>
          
          <!-- Cotações Geradas -->
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-gray-400 text-sm">Cotações Geradas</p>
                <h3 class="text-3xl font-bold mt-1">78</h3>
                <p class="text-yellow-500 text-sm mt-2">
                  <i class="fas fa-arrow-up mr-1"></i>
                  <span>15% este mês</span>
                </p>
              </div>
              <div class="p-3 bg-yellow-500 bg-opacity-10 rounded-full">
                <i class="fas fa-file-invoice-dollar text-yellow-500"></i>
              </div>
            </div>
          </div>
          
          <!-- Pagamentos Realizados -->
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-gray-400 text-sm">Pagamentos Realizados</p>
                <h3 class="text-3xl font-bold mt-1">R$ 156K</h3>
                <p class="text-green-500 text-sm mt-2">
                  <i class="fas fa-arrow-up mr-1"></i>
                  <span>22% este mês</span>
                </p>
              </div>
              <div class="p-3 bg-blue-500 bg-opacity-10 rounded-full">
                <i class="fas fa-credit-card text-blue-500"></i>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
          <!-- Conversion Funnel -->
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Funil de Conversão</h3>
            <div class="h-80">
              <canvas id="funnelChart"></canvas>
            </div>
          </div>
          
          <!-- Lead Sources -->
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Origem dos Leads</h3>
            <div class="h-80">
              <canvas id="sourceChart"></canvas>
            </div>
          </div>
        </div>
        
        <!-- Lead Performance -->
        <div class="grid grid-cols-1 gap-6 mb-6">
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Desempenho Mensal</h3>
            <div class="h-80">
              <canvas id="performanceChart"></canvas>
            </div>
          </div>
        </div>
        
        <!-- Lead Table -->
        <div class="bg-[#1a1a1a] rounded-lg shadow-lg overflow-hidden">
          <div class="p-6 border-b border-gray-800 flex justify-between items-center">
            <h3 class="text-lg font-semibold">Leads Recentes</h3>
            
            <div class="flex space-x-2">
              <div class="relative">
                <input type="text" placeholder="Buscar leads..." class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary">
                <i class="fas fa-search absolute right-3 top-2.5 text-gray-400"></i>
              </div>
              
              <button class="px-3 py-2 bg-gray-800 text-white rounded-lg text-sm hover:bg-gray-700">
                <i class="fas fa-filter mr-1"></i>
                <span>Filtrar</span>
              </button>
              
              <button class="px-3 py-2 bg-gray-800 text-white rounded-lg text-sm hover:bg-gray-700">
                <i class="fas fa-download mr-1"></i>
                <span>Exportar</span>
              </button>
            </div>
          </div>
          
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-800">
              <thead class="bg-gray-800">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Nome
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Email
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Telefone
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Estágio
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Valor
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Data
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Ações
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-800">
                <!-- Lead 1 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="avatar bg-primary">
                        <span>JD</span>
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-white">João da Silva</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-300">joao.silva@email.com</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-300">(11) 98765-4321</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="status-badge bg-blue-500 bg-opacity-10 text-blue-500">
                      Lead
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    -
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    10/05/2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-ellipsis-v"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                
                <!-- Lead 2 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="avatar bg-green-500">
                        <span>MC</span>
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-white">Maria Costa</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-300">maria.costa@email.com</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-300">(11) 91234-5678</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="status-badge bg-green-500 bg-opacity-10 text-green-500">
                      Cliente
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    R$ 2.450,00
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    08/05/2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-ellipsis-v"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                
                <!-- Lead 3 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="avatar bg-yellow-500">
                        <span>PS</span>
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-white">Pedro Santos</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-300">pedro.santos@email.com</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-300">(11) 99876-5432</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="status-badge bg-yellow-500 bg-opacity-10 text-yellow-500">
                      Cotação
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    R$ 1.850,00
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    05/05/2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-ellipsis-v"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                
                <!-- Lead 4 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="avatar bg-purple-500">
                        <span>AR</span>
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-white">Ana Rodrigues</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-300">ana.rodrigues@email.com</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-300">(11) 97654-3210</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="status-badge bg-purple-500 bg-opacity-10 text-purple-500">
                      Pagamento
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    R$ 3.200,00
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    03/05/2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-ellipsis-v"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                
                <!-- Lead 5 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="avatar bg-red-500">
                        <span>LO</span>
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-white">Lucas Oliveira</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-300">lucas.oliveira@email.com</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-300">(11) 95432-1098</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="status-badge bg-blue-500 bg-opacity-10 text-blue-500">
                      Lead
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    -
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    01/05/2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-ellipsis-v"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <!-- Pagination -->
          <div class="px-6 py-4 flex items-center justify-between border-t border-gray-800">
            <div class="flex-1 flex justify-between sm:hidden">
              <button class="relative inline-flex items-center px-4 py-2 border border-gray-700 text-sm font-medium rounded-md text-gray-300 bg-gray-800 hover:bg-gray-700">
                Anterior
              </button>
              <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-700 text-sm font-medium rounded-md text-gray-300 bg-gray-800 hover:bg-gray-700">
                Próximo
              </button>
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
              <div>
                <p class="text-sm text-gray-400">
                  Mostrando <span class="font-medium">1</span> a <span class="font-medium">5</span> de <span class="font-medium">42</span> resultados
                </p>
              </div>
              <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                  <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
                    <span class="sr-only">Anterior</span>
                    <i class="fas fa-chevron-left"></i>
                  </button>
                  <button class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-primary text-sm font-medium text-white hover:bg-primary-dark">
                    1
                  </button>
                  <button class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
                    2
                  </button>
                  <button class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
                    3
                  </button>
                  <span class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400">
                    ...
                  </span>
                  <button class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
                    8
                  </button>
                  <button class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
                    9
                  </button>
                  <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
                    <span class="sr-only">Próximo</span>
                    <i class="fas fa-chevron-right"></i>
                  </button>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </main>
@endsection
