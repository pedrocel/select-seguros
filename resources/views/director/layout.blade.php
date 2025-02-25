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

        <main class="flex-1 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>