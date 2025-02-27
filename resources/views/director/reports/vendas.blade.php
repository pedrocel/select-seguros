@extends('director.layout')

@section('title', 'Dashboard')

@section('content')
<header class="bg-[#1a1a1a] border-b border-gray-800">
    
        <div class="px-6 py-4 flex items-center justify-between">
        <div class="flex items-center">
            <button id="sidebarToggleBtn" class="p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-800 md:hidden">
              <i class="fas fa-bars text-xl"></i>
            </button>
            <h1 class="text-2xl font-semibold ml-2">Relatório de vendas</h1>
          </div>
          
          <div class="flex items-center space-x-4">
            <button class="ml-2 px-4 py-2 bg-primary hover:bg-primary-dark text-white rounded-lg flex items-center">
              <i class="fas fa-download mr-2"></i>
              <span>Exportar</span>
            </button>
          </div>
        </div>
      </header>
      
      <!-- Content -->
      <main class="flex-1 overflow-y-auto bg-[#242424] p-6">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
          <!-- Total de Vendas -->
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-gray-400 text-sm">Total de Vendas</p>
                <h3 class="text-3xl font-bold mt-1">156</h3>
                <p class="text-green-500 text-sm mt-2">
                  <i class="fas fa-arrow-up mr-1"></i>
                  <span>18% este mês</span>
                </p>
              </div>
              <div class="p-3 bg-primary bg-opacity-10 rounded-full">
                <i class="fas fa-shopping-cart text-primary"></i>
              </div>
            </div>
          </div>
          
          <!-- Receita Total -->
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-gray-400 text-sm">Receita Total</p>
                <h3 class="text-3xl font-bold mt-1">R$ 342K</h3>
                <p class="text-green-500 text-sm mt-2">
                  <i class="fas fa-arrow-up mr-1"></i>
                  <span>22% este mês</span>
                </p>
              </div>
              <div class="p-3 bg-green-500 bg-opacity-10 rounded-full">
                <i class="fas fa-dollar-sign text-green-500"></i>
              </div>
            </div>
          </div>
          
          <!-- Ticket Médio -->
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-gray-400 text-sm">Ticket Médio</p>
                <h3 class="text-3xl font-bold mt-1">R$ 2.192</h3>
                <p class="text-green-500 text-sm mt-2">
                  <i class="fas fa-arrow-up mr-1"></i>
                  <span>5% este mês</span>
                </p>
              </div>
              <div class="p-3 bg-yellow-500 bg-opacity-10 rounded-full">
                <i class="fas fa-tag text-yellow-500"></i>
              </div>
            </div>
          </div>
          
          <!-- Taxa de Conversão -->
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-gray-400 text-sm">Taxa de Conversão</p>
                <h3 class="text-3xl font-bold mt-1">32.8%</h3>
                <p class="text-green-500 text-sm mt-2">
                  <i class="fas fa-arrow-up mr-1"></i>
                  <span>3.2% este mês</span>
                </p>
              </div>
              <div class="p-3 bg-blue-500 bg-opacity-10 rounded-full">
                <i class="fas fa-chart-pie text-blue-500"></i>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
          <!-- Vendas por Mês -->
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Vendas por Mês</h3>
            <div class="h-80">
              <canvas id="salesChart"></canvas>
            </div>
          </div>
          
          <!-- Vendas por Categoria -->
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Vendas por Categoria</h3>
            <div class="h-80">
              <canvas id="categoryChart"></canvas>
            </div>
          </div>
        </div>
        
        <!-- Vendas por Vendedor -->
        <div class="grid grid-cols-1 gap-6 mb-6">
          <div class="bg-[#1a1a1a] rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Desempenho por Vendedor</h3>
            <div class="h-80">
              <canvas id="salesPersonChart"></canvas>
            </div>
          </div>
        </div>
        
        <!-- Vendas Table -->
        <div class="bg-[#1a1a1a] rounded-lg shadow-lg overflow-hidden">
          <div class="p-6 border-b border-gray-800 flex justify-between items-center">
            <h3 class="text-lg font-semibold">Últimas Vendas</h3>
            
            <div class="flex space-x-2">
              <div class="relative">
                <input type="text" placeholder="Buscar vendas..." class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary">
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
                    ID
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Cliente
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Produto
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Valor
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Data
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Status
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Vendedor
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Ações
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-800">
                <!-- Venda 1 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    #VD-2025-001
                  </td>
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
                    <div class="text-sm text-gray-300">Seguro Auto Premium</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    R$ 2.450,00
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    10/05/2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="status-badge bg-green-500 bg-opacity-10 text-green-500">
                      Pago
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    Ana Oliveira
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-print"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-ellipsis-v"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                
                <!-- Venda 2 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    #VD-2025-002
                  </td>
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
                    <div class="text-sm text-gray-300">Seguro Residencial</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    R$ 1.850,00
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    08/05/2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="status-badge bg-green-500 bg-opacity-10 text-green-500">
                      Pago
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    Carlos Santos
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-print"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-ellipsis-v"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                
                <!-- Venda 3 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    #VD-2025-003
                  </td>
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
                    <div class="text-sm text-gray-300">Seguro Viagem</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    R$ 850,00
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    05/05/2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="status-badge bg-yellow-500 bg-opacity-10 text-yellow-500">
                      Pendente
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    Ana Oliveira
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-print"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-ellipsis-v"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                
                <!-- Venda 4 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    #VD-2025-004
                  </td>
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
                    <div class="text-sm text-gray-300">Seguro Auto Básico</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    R$ 1.650,00
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    03/05/2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="status-badge bg-green-500 bg-opacity-10 text-green-500">
                      Pago
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    Carlos Santos
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-print"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-ellipsis-v"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                
                <!-- Venda 5 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    #VD-2025-005
                  </td>
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
                    <div class="text-sm text-gray-300">Seguro Vida</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    R$ 3.200,00
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    01/05/2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="status-badge bg-red-500 bg-opacity-10 text-red-500">
                      Cancelado
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                    Mariana Lima
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-print"></i>
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
                  Mostrando <span class="font-medium">1</span> a <span class="font-medium">5</span> de <span class="font-medium">156</span> resultados
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
      <script>
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [{
          label: 'Vendas',
          data: [65, 78, 82, 75, 92, 98, 104, 110, 115, 124, 132, 156],
          backgroundColor: '#646cff',
          borderWidth: 0,
          borderRadius: 4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            grid: {
              color: 'rgba(255, 255, 255, 0.1)'
            },
            ticks: {
              color: 'rgba(255, 255, 255, 0.7)'
            }
          },
          y: {
            grid: {
              color: 'rgba(255, 255, 255, 0.1)'
            },
            ticks: {
              color: 'rgba(255, 255, 255, 0.7)'
            }
          }
        }
      }
    });
    
    // Category Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    const categoryChart = new Chart(categoryCtx, {
      type: 'doughnut',
      data: {
        labels: ['Auto', 'Residencial', 'Vida', 'Viagem', 'Empresarial'],
        datasets: [{
          data: [42, 23, 18, 31, 10],
          backgroundColor: [
            '#646cff',
            '#10b981',
            '#f59e0b',
            '#3b82f6',
            '#8b5cf6'
          ],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'right',
            labels: {
              color: 'rgba(255, 255, 255, 0.7)',
              padding: 20,
              font: {
                size: 12
              }
            }
          }
        }
      }
    });
    
    // Sales Person Chart
    const salesPersonCtx = document.getElementById('salesPersonChart').getContext('2d');
    const salesPersonChart = new Chart(salesPersonCtx, {
      type: 'bar',
      data: {
        labels: ['Ana Oliveira', 'Carlos Santos', 'Mariana Lima', 'Roberto Alves', 'Juliana Mendes'],
        datasets: [
          {
            label: 'Vendas',
            data: [42, 38, 32, 28, 16],
            backgroundColor: '#646cff',
            borderWidth: 0,
            borderRadius: 4
          },
          {
            label: 'Meta',
            data: [40, 40, 40, 40, 40],
            type: 'line',
            borderColor: '#f59e0b',
            borderWidth: 2,
            pointBackgroundColor: '#f59e0b',
            fill: false
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'top',
            labels: {
              color: 'rgba(255, 255, 255, 0.7)',
              padding: 20,
              font: {
                size: 12
              }
            }
          }
        },
        scales: {
          x: {
            grid: {
              color: 'rgba(255, 255, 255, 0.1)'
            },
            ticks: {
              color: 'rgba(255, 255, 255, 0.7)'
            }
          },
          y: {
            grid: {
              color: 'rgba(255, 255, 255, 0.1)'
            },
            ticks: {
              color: 'rgba(255, 255, 255, 0.7)'
            }
          }
        }
      }
    });
  </script>
@endsection