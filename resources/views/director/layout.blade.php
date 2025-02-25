<!DOCTYPE html>
<html lang="pt-BR" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Seguros - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            green: '#9FE870',
                            blue: '#0000FF'
                        }
                    }
                }
            }
        }

        function toggleTheme() {
            const html = document.documentElement;
            html.classList.toggle('dark');
        }
    </script>
    <style>
        .gradient-card {
            @apply dark:bg-gradient-to-br dark:from-[#1a1a1a] dark:to-[#2a2a2a] bg-white;
        }
        .hover-scale {
            transition: transform 0.2s;
        }
        .hover-scale:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body class="dark:bg-[#121212] bg-gray-50">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="dark:bg-[#1A1A1A] bg-white w-64 min-h-screen fixed dark:border-[#333333] border-gray-200 border-r">
            <div class="p-6">
                <h1 class="text-2xl font-bold">
                    <span class="text-brand-green">S</span><span class="text-brand-blue">ELECT</span>
                    <span class="dark:text-white text-gray-800 block text-sm mt-1">SEGUROS</span>
                </h1>
            </div>
            <nav class="mt-6">
                <a href="#" class="flex items-center px-6 py-4 dark:text-white text-gray-800 bg-brand-green/10 border-l-4 border-brand-green">
                    <i class="fas fa-home mr-3 text-brand-green"></i>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-6 py-4 dark:text-gray-400 text-gray-600 hover:bg-brand-green/5 dark:hover:text-white hover:text-gray-900 transition-colors">
                    <i class="fas fa-users mr-3"></i>
                    Clientes
                </a>
                <a href="#" class="flex items-center px-6 py-4 dark:text-gray-400 text-gray-600 hover:bg-brand-green/5 dark:hover:text-white hover:text-gray-900 transition-colors">
                    <i class="fas fa-handshake mr-3"></i>
                    CRM
                </a>
                <a href="#" class="flex items-center px-6 py-4 dark:text-gray-400 text-gray-600 hover:bg-brand-green/5 dark:hover:text-white hover:text-gray-900 transition-colors">
                    <i class="fas fa-file-contract mr-3"></i>
                    Propostas
                </a>
                <a href="#" class="flex items-center px-6 py-4 dark:text-gray-400 text-gray-600 hover:bg-brand-green/5 dark:hover:text-white hover:text-gray-900 transition-colors">
                    <i class="fas fa-calculator mr-3"></i>
                    Cotações
                </a>
                <a href="#" class="flex items-center px-6 py-4 dark:text-gray-400 text-gray-600 hover:bg-brand-green/5 dark:hover:text-white hover:text-gray-900 transition-colors">
                    <i class="fas fa-car mr-3"></i>
                    Veículos
                </a>
                <a href="#" class="flex items-center px-6 py-4 dark:text-gray-400 text-gray-600 hover:bg-brand-green/5 dark:hover:text-white hover:text-gray-900 transition-colors">
                    <i class="fas fa-chart-line mr-3"></i>
                    Relatórios
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        
    </div>
</body>
</html>




<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Serguros - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .sidebar-hover {
            transition: all 0.3s ease;
        }
        .sidebar-hover:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(4px);
        }
        @media (max-width: 768px) {
            .sidebar-collapsed {
                width: 0;
                overflow: hidden;
            }
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .loader {
            animation: spin 1s linear infinite;
        }
        .fade-out {
            opacity: 0;
            transition: opacity 0.5s ease-out;
            pointer-events: none;
        }
        .fade-in {
            opacity: 1;
            transition: opacity 0.5s ease-in;
            pointer-events: auto;
        }
        .gradient-card {
            @apply dark:bg-gradient-to-br dark:from-[#1a1a1a] dark:to-[#2a2a2a] bg-white;
        }
        .hover-scale {
            transition: transform 0.2s;
        }
        .hover-scale:hover {
            transform: scale(1.02);
        }
    </style>
   
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="md:hidden fixed top-4 left-4 z-50 bg-green-600 text-white p-2 rounded-lg shadow-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Sidebar -->
        <aside class="dark:bg-[#1A1A1A] bg-white w-64 min-h-screen fixed dark:border-[#333333] border-gray-200 border-r">
            <div class="p-6">
                <h1 class="text-2xl font-bold">
                    <span class="text-brand-green">S</span><span class="text-brand-blue">ELECT</span>
                    <span class="dark:text-white text-gray-800 block text-sm mt-1">SEGUROS</span>
                </h1>
            </div>
            <nav class="mt-6">
                <a href="#" class="flex items-center px-6 py-4 dark:text-white text-gray-800 bg-brand-green/10 border-l-4 border-brand-green">
                    <i class="fas fa-home mr-3 text-brand-green"></i>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-6 py-4 dark:text-gray-400 text-gray-600 hover:bg-brand-green/5 dark:hover:text-white hover:text-gray-900 transition-colors">
                    <i class="fas fa-users mr-3"></i>
                    Clientes
                </a>
                <a href="#" class="flex items-center px-6 py-4 dark:text-gray-400 text-gray-600 hover:bg-brand-green/5 dark:hover:text-white hover:text-gray-900 transition-colors">
                    <i class="fas fa-handshake mr-3"></i>
                    CRM
                </a>
                <a href="#" class="flex items-center px-6 py-4 dark:text-gray-400 text-gray-600 hover:bg-brand-green/5 dark:hover:text-white hover:text-gray-900 transition-colors">
                    <i class="fas fa-file-contract mr-3"></i>
                    Propostas
                </a>
                <a href="#" class="flex items-center px-6 py-4 dark:text-gray-400 text-gray-600 hover:bg-brand-green/5 dark:hover:text-white hover:text-gray-900 transition-colors">
                    <i class="fas fa-calculator mr-3"></i>
                    Cotações
                </a>
                <a href="#" class="flex items-center px-6 py-4 dark:text-gray-400 text-gray-600 hover:bg-brand-green/5 dark:hover:text-white hover:text-gray-900 transition-colors">
                    <i class="fas fa-car mr-3"></i>
                    Veículos
                </a>
                <a href="#" class="flex items-center px-6 py-4 dark:text-gray-400 text-gray-600 hover:bg-brand-green/5 dark:hover:text-white hover:text-gray-900 transition-colors">
                    <i class="fas fa-chart-line mr-3"></i>
                    Relatórios
                </a>
            </nav>
        </aside>

        <div id="loading-screen" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900">
            <div class="text-center">
                <div class="inline-block p-8 rounded-full bg-[  #ccff00] shadow-lg">
                    <svg class="w-16 h-16 text-gray-100 loader" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
                <h2 class="mt-4 text-xl font-semibold text-gray-100">Carregando...</h2>
            </div>
        </div>
        <!-- Content -->
        <main class="flex-1 overflow-y-auto">
            @yield('content')
        </main>
    </div>
    <script>
        // Mobile menu functionality
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const sidebar = document.getElementById('sidebar');
        let isSidebarOpen = false;

        mobileMenuButton.addEventListener('click', () => {
            isSidebarOpen = !isSidebarOpen;
            if (isSidebarOpen) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
            } else {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
    <script>
        window.addEventListener('load', () => {
            const loadingScreen = document.getElementById('loading-screen');
            const mainContent = document.getElementById('main-content');
            
            setTimeout(() => {
                loadingScreen.classList.add('fade-out');
                mainContent.classList.add('fade-in');
                
                setTimeout(() => {
                    loadingScreen.style.display = 'none';
                }, 500);
            }, 1200);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script> 
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'select-cream': '#F5F2ED',
            'select-blue': '#0000FF',
            'select-lime': '#CCFF00',
            'select-black': '#000000'
          },
          fontFamily: {
            'space': ['Space Grotesk', 'sans-serif'],
          },
        }
      }
    }
  </script>
   <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            green: '#9FE870',
                            blue: '#0000FF'
                        }
                    }
                }
            }
        }

        function toggleTheme() {
            const html = document.documentElement;
            html.classList.toggle('dark');
        }
    </script>
</body>
</html>