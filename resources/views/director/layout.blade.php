<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Serguros - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        <aside id="sidebar" class="fixed md:relative w-64 h-full bg-[#1a1a1a] text-white transform transition-transform duration-300 ease-in-out md:transform-none -translate-x-full md:translate-x-0 z-40">
            <div class="flex flex-col h-full">
                <!-- Logo Section -->
                <div class="p-6 bg-emerald-600">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white rounded-lg">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold tracking-wider">{{ $org->organization->name }}</h1>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                    <a href="{{ route('director.dashboard') }}" 
                    class="flex items-center px-4 py-3 rounded-lg sidebar-hover 
                    {{ request()->routeIs('director.dashboard') ? 'text-gray-100 bg-emerald-600 shadow-lg' : 'text-gray-300' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span class="ml-3 font-medium">Dashboard</span>
                    </a>

                    <a href="{{ route('director.frequency.dashboard.get') }}" 
                    class="flex items-center px-4 py-3 rounded-lg sidebar-hover 
                    {{ request()->routeIs('director.frequency.dashboard.get') ? 'text-gray-100 bg-emerald-600 shadow-lg' : 'text-gray-300' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                            <line x1="12" y1="12" x2="12" y2="6" stroke="currentColor" stroke-width="2"/>
                            <line x1="12" y1="12" x2="16" y2="12" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span class="ml-3 font-medium">Frequência Escolar</span>
                    </a>

                    <a href="{{ route('director.profile.index') }}" 
                    class="flex items-center px-4 py-3 rounded-lg sidebar-hover 
                    {{ request()->routeIs('director.profile.index') ? 'text-gray-100 bg-emerald-600 shadow-lg' : 'text-gray-300' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span class="ml-3 font-medium">Ponto Digital</span>
                    </a>

                    <a href="{{ route('director.students.index') }}" 
                    class="flex items-center px-4 py-3 rounded-lg sidebar-hover 
                    {{ request()->routeIs('director.students.index') ? 'text-gray-100 bg-emerald-600 shadow-lg' : 'text-gray-300' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <span class="ml-3 font-medium">Alunos</span>
                    </a>

                    <a href="{{ route('director.pre-register.get') }}" 
                    class="flex items-center px-4 py-3 rounded-lg sidebar-hover 
                    {{ request()->routeIs('director.pre-register.get') ? 'text-gray-100 bg-emerald-600 shadow-lg' : 'text-gray-300' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        <span class="ml-3 font-medium">Pré-cadastro</span>
                    </a>
                    <div class="pt-4 mt-4 border-t border-gray-700">
                        <a href="#" class="flex items-center px-4 py-3 text-gray-300 sidebar-hover rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="ml-3 font-medium">Configurações</span>
                        </a>
                        <a href="{{ route('director.snack.dashboard.get') }}" class="flex items-center px-4 py-3 rounded-lg sidebar-hover 
                        {{ request()->routeIs('director.snack.dashboard.get') ? 'text-gray-100 bg-emerald-600 shadow-lg' : 'text-gray-300' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a10 10 0 100 20 10 10 0 000-20zM8 12h8M9 15h6M10 18h4M7 9h10M5 6h14"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4L20 8M20 4L16 8"/>
                            </svg>
                            <span class="ml-3 font-medium">Merenda</span>
                        </a>
                        <a href="{{ route('director.notifications.dashboard.get') }}" class="flex items-center px-4 py-3 rounded-lg sidebar-hover 
                        {{ request()->routeIs('director.notifications.dashboard.get') ? 'text-gray-100 bg-emerald-600 shadow-lg' : 'text-gray-300' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a10 10 0 100 20 10 10 0 000-20zM8 12h8M9 15h6M10 18h4M7 9h10M5 6h14"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4L20 8M20 4L16 8"/>
                            </svg>
                            <span class="ml-3 font-medium">Notificações</span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="flex items-center px-4 py-3 text-gray-300 sidebar-hover rounded-lg w-full text-left">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                <span class="ml-3 font-medium">Sair</span>
                            </button>
                        </form>
                    </div>
                </nav>
            </div>
        </aside>

        <div id="loading-screen" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900">
            <div class="text-center">
                <div class="inline-block p-8 rounded-full bg-emerald-600 shadow-lg">
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
</body>
</html>