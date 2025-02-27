<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SELECT Seguros - CRM Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    
    body {
      font-family: 'Inter', sans-serif;
      background-color: #242424;
      color: rgba(255, 255, 255, 0.87);
    }
    
    .sidebar-item.active {
      background-color: rgba(100, 108, 255, 0.1);
      border-left: 3px solid #646cff;
    }
    
    .status-badge {
      padding: 0.25rem 0.75rem;
      border-radius: 9999px;
      font-size: 0.75rem;
      font-weight: 500;
    }
    
    .avatar {
      width: 2.5rem;
      height: 2.5rem;
      border-radius: 9999px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 600;
    }

    /* Mobile sidebar transition */
    .sidebar-transition {
      transition: transform 0.3s ease-in-out;
    }

    @media (max-width: 768px) {
      .sidebar-closed {
        transform: translateX(-100%);
      }
    }
  </style>
</head>
<body>
  <div class="flex h-screen overflow-hidden">
    <div id="sidebar" class="w-64 bg-[#1a1a1a] border-r border-gray-800 flex flex-col fixed h-full z-40 sidebar-transition md:relative md:translate-x-0">
      <!-- Logo -->
      <div class="p-4 border-b border-gray-800">
        <div class="flex items-center">
          <span class="text-2xl font-bold">
            <span class="text-green-500">S</span><span class="text-primary">ELECT</span>
          </span>
        </div>
        <div class="text-sm text-gray-400 mt-1">SEGUROS</div>
      </div>
      
      <!-- Navigation -->
      <div class="flex-1 overflow-y-auto py-4">
        <nav class="px-2 space-y-1">
          <a href="{{ route('director.dashboard') }}" class="sidebar-item active flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-800">
            <i class="fas fa-home w-5 h-5 mr-3"></i>
            <span>Dashboard</span>
          </a>
          
          <a href="{{ route('diretor.users.index') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-800">
            <i class="fas fa-users w-5 h-5 mr-3"></i>
            <span>Clientes</span>
          </a>
          
          <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-800">
            <i class="fas fa-chart-line w-5 h-5 mr-3"></i>
            <span>CRM</span>
          </a>
          
          <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-800">
            <i class="fas fa-file-contract w-5 h-5 mr-3"></i>
            <span>Apólices</span>
          </a>
          
          <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-800">
            <i class="fas fa-car w-5 h-5 mr-3"></i>
            <span>Veículos</span>
          </a>
          
          <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-800">
            <i class="fas fa-calendar w-5 h-5 mr-3"></i>
            <span>Agenda</span>
          </a>
        </nav>
        
        <div class="mt-8 px-4">
          <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">
            RELATÓRIOS
          </h3>
          <nav class="mt-2 space-y-1">
            <a href="{{ route('director.vendas') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-800">
              <i class="fas fa-shopping-cart w-5 h-5 mr-3"></i>
              <span>Vendas</span>
            </a>
            
            <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-800">
              <i class="fas fa-money-bill-wave w-5 h-5 mr-3"></i>
              <span>Financeiro</span>
            </a>
          </nav>
        </div>
      </div>
      
      <!-- User -->
      <div class="p-4 border-t border-gray-800">
        <div class="flex items-center">
          <div class="avatar bg-green-500">
            <span>AD</span>
          </div>
          <div class="ml-3">
            <p class="text-sm font-medium text-white">Admin</p>
            <p class="text-xs text-gray-400">admin@select.com</p>
          </div>
        </div>
      </div>

      <!-- Mobile Close Button -->
      <button id="closeSidebarBtn" class="absolute top-4 right-4 text-gray-400 hover:text-white md:hidden">
        <i class="fas fa-times text-xl"></i>
      </button>
    </div>



        <main class="flex-1 flex flex-col overflow-hidden">
            @yield('content')
        </main>



        @if(session('status') === 'success')
            <div id="successNotification" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 flex items-center gap-3">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('message') }}</span>
            </div>
        @endif

        @if(session('status') === 'error')
            <div id="errorNotification" class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 flex items-center gap-3">
                <i class="fas fa-times-circle"></i>
                <span>{{ session('message') }}</span>
            </div>
        @endif
        </div>
    <script>
    // Mobile Sidebar Toggle
    const sidebar = document.getElementById('sidebar');
    const sidebarToggleBtn = document.getElementById('sidebarToggleBtn');
    const closeSidebarBtn = document.getElementById('closeSidebarBtn');
    
    // On mobile, hide sidebar by default
    function initSidebar() {
      if (window.innerWidth < 768) {
        sidebar.classList.add('sidebar-closed');
      } else {
        sidebar.classList.remove('sidebar-closed');
      }
    }
    
    // Initialize sidebar state
    initSidebar();
    
    // Toggle sidebar on button click
    sidebarToggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('sidebar-closed');
    });
    
    // Close sidebar when close button is clicked
    closeSidebarBtn.addEventListener('click', () => {
      sidebar.classList.add('sidebar-closed');
    });
    
    // Handle window resize
    window.addEventListener('resize', () => {
      initSidebar();
    });

    // Funnel Chart
    const funnelCtx = document.getElementById('funnelChart').getContext('2d');
    const funnelChart = new Chart(funnelCtx, {
      type: 'bar',
      data: {
        labels: ['Leads', 'Qualificados', 'Cotação', 'Negociação', 'Fechados'],
        datasets: [{
          label: 'Quantidade',
          data: [124, 86, 78, 52, 42],
          backgroundColor: [
            '#646cff',
            '#3b82f6',
            '#f59e0b',
            '#10b981',
            '#8b5cf6'
          ],
          borderWidth: 0,
          borderRadius: 4
        }]
      },
      options: {
        indexAxis: 'y',
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
              display: false
            },
            ticks: {
              color: 'rgba(255, 255, 255, 0.7)'
            }
          }
        }
      }
    });
    
    // Source Chart
    const sourceCtx = document.getElementById('sourceChart').getContext('2d');
    const sourceChart = new Chart(sourceCtx, {
      type: 'doughnut',
      data: {
        labels: ['Site', 'Indicação', 'Redes Sociais', 'Google Ads', 'Outros'],
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
    
    // Performance Chart
    const performanceCtx = document.getElementById('performanceChart').getContext('2d');
    const performanceChart = new Chart(performanceCtx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [
          {
            label: 'Leads',
            data: [65, 78, 82, 75, 92, 98, 104, 110, 115, 124, 0, 0],
            borderColor: '#646cff',
            backgroundColor: 'rgba(100, 108, 255, 0.1)',
            tension: 0.3,
            fill: true
          },
          {
            label: 'Conversões',
            data: [25, 28, 32, 30, 35, 38, 40, 38, 40, 42, 0, 0],
            borderColor: '#10b981',
            backgroundColor: 'rgba(16, 185, 129, 0.1)',
            tension: 0.3,
            fill: true
          },
          {
            label: 'Receita (R$ mil)',
            data: [45, 52, 58, 60, 68, 72, 78, 82, 90, 98, 0, 0],
            borderColor: '#f59e0b',
            backgroundColor: 'rgba(245, 158, 11, 0.1)',
            tension: 0.3,
            fill: true
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
</body>
</html>