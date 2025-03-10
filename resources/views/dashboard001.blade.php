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
        <main class="ml-64 p-8 w-full">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-semibold dark:text-white text-gray-800">Dashboard</h2>
                <div class="flex items-center space-x-4">
                    <!-- Theme Toggle Button -->
                    <button onclick="toggleTheme()" class="p-2 rounded-lg dark:bg-[#1A1A1A] bg-white border dark:border-[#333333] border-gray-200 dark:text-white text-gray-800 hover:bg-brand-green/10 transition-colors">
                        <i class="fas fa-moon dark:hidden"></i>
                        <i class="fas fa-sun hidden dark:block"></i>
                    </button>
                    <div class="flex items-center dark:bg-[#1A1A1A] bg-white px-4 py-2 rounded-lg dark:border-[#333333] border-gray-200 border">
                        <span class="mr-4 dark:text-gray-300 text-gray-600">Admin</span>
                        <img src="https://ui-avatars.com/api/?name=Admin&background=9FE870&color=fff" alt="Admin" class="w-10 h-10 rounded-full">
                    </div>
                </div>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="gradient-card rounded-xl shadow-lg p-6 dark:border-[#333333] border-gray-200 border hover-scale">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="dark:text-gray-400 text-gray-600">Vendas Hoje</h3>
                        <div class="w-10 h-10 rounded-full bg-brand-green/10 flex items-center justify-center">
                            <i class="fas fa-dollar-sign text-brand-green"></i>
                        </div>
                    </div>
                    <p class="text-3xl font-bold dark:text-white text-gray-800 mb-2">R$ 12.450</p>
                    <p class="text-sm text-brand-green flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i>
                        3 vendas realizadas hoje
                    </p>
                </div>

                <div class="gradient-card rounded-xl shadow-lg p-6 dark:border-[#333333] border-gray-200 border hover-scale">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="dark:text-gray-400 text-gray-600">Vendas no Mês</h3>
                        <div class="w-10 h-10 rounded-full bg-brand-green/10 flex items-center justify-center">
                            <i class="fas fa-chart-line text-brand-green"></i>
                        </div>
                    </div>
                    <p class="text-3xl font-bold dark:text-white text-gray-800 mb-2">R$ 125.430</p>
                    <p class="text-sm text-brand-green flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i>
                        15% em relação ao mês anterior
                    </p>
                </div>

                <div class="gradient-card rounded-xl shadow-lg p-6 dark:border-[#333333] border-gray-200 border hover-scale">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="dark:text-gray-400 text-gray-600">Ticket Médio</h3>
                        <div class="w-10 h-10 rounded-full bg-brand-green/10 flex items-center justify-center">
                            <i class="fas fa-tags text-brand-green"></i>
                        </div>
                    </div>
                    <p class="text-3xl font-bold dark:text-white text-gray-800 mb-2">R$ 4.150</p>
                    <p class="text-sm text-brand-blue flex items-center">
                        Últimos 30 dias
                    </p>
                </div>

                <div class="gradient-card rounded-xl shadow-lg p-6 dark:border-[#333333] border-gray-200 border hover-scale">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="dark:text-gray-400 text-gray-600">Total de Clientes</h3>
                        <div class="w-10 h-10 rounded-full bg-brand-green/10 flex items-center justify-center">
                            <i class="fas fa-users text-brand-green"></i>
                        </div>
                    </div>
                    <p class="text-3xl font-bold dark:text-white text-gray-800 mb-2">847</p>
                    <p class="text-sm text-brand-green flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i>
                        12 novos este mês
                    </p>
                </div>
            </div>

            <!-- Top Plans & Recent Clients -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="gradient-card rounded-xl shadow-lg p-6 dark:border-[#333333] border-gray-200 border">
                    <h3 class="text-xl font-semibold dark:text-white text-gray-800 mb-6">Top 5 Planos Mais Vendidos</h3>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="w-8 h-8 flex items-center justify-center bg-brand-green/20 text-brand-green rounded-full mr-3">1</span>
                                <div>
                                    <p class="font-medium dark:text-white text-gray-800">Plano Premium Total</p>
                                    <p class="text-sm dark:text-gray-400 text-gray-600">32 vendas este mês</p>
                                </div>
                            </div>
                            <span class="text-brand-green font-semibold">R$ 45.600</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="w-8 h-8 flex items-center justify-center bg-brand-green/20 text-brand-green rounded-full mr-3">2</span>
                                <div>
                                    <p class="font-medium dark:text-white text-gray-800">Cobertura Completa Plus</p>
                                    <p class="text-sm dark:text-gray-400 text-gray-600">28 vendas este mês</p>
                                </div>
                            </div>
                            <span class="text-brand-green font-semibold">R$ 38.400</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="w-8 h-8 flex items-center justify-center bg-brand-green/20 text-brand-green rounded-full mr-3">3</span>
                                <div>
                                    <p class="font-medium dark:text-white text-gray-800">Básico Plus</p>
                                    <p class="text-sm dark:text-gray-400 text-gray-600">25 vendas este mês</p>
                                </div>
                            </div>
                            <span class="text-brand-green font-semibold">R$ 25.000</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="w-8 h-8 flex items-center justify-center bg-brand-green/20 text-brand-green rounded-full mr-3">4</span>
                                <div>
                                    <p class="font-medium dark:text-white text-gray-800">Terceiros Avançado</p>
                                    <p class="text-sm dark:text-gray-400 text-gray-600">20 vendas este mês</p>
                                </div>
                            </div>
                            <span class="text-brand-green font-semibold">R$ 18.000</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="w-8 h-8 flex items-center justify-center bg-brand-green/20 text-brand-green rounded-full mr-3">5</span>
                                <div>
                                    <p class="font-medium dark:text-white text-gray-800">Básico Essencial</p>
                                    <p class="text-sm dark:text-gray-400 text-gray-600">18 vendas este mês</p>
                                </div>
                            </div>
                            <span class="text-brand-green font-semibold">R$ 12.600</span>
                        </div>
                    </div>
                </div>

                <div class="gradient-card rounded-xl shadow-lg p-6 dark:border-[#333333] border-gray-200 border">
                    <h3 class="text-xl font-semibold dark:text-white text-gray-800 mb-6">Últimos 5 Clientes</h3>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=Pedro+Oliveira&background=9FE870&color=fff" alt="Cliente" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <p class="font-medium dark:text-white text-gray-800">Pedro Oliveira</p>
                                    <p class="text-sm dark:text-gray-400 text-gray-600">Plano Premium Total - Fiat Pulse 2024</p>
                                </div>
                            </div>
                            <span class="text-sm text-brand-green">Hoje</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=Ana+Costa&background=9FE870&color=fff" alt="Cliente" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <p class="font-medium dark:text-white text-gray-800">Ana Costa</p>
                                    <p class="text-sm dark:text-gray-400 text-gray-600">Cobertura Completa Plus - Jeep Compass 2023</p>
                                </div>
                            </div>
                            <span class="text-sm dark:text-gray-400 text-gray-600">Ontem</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=Carlos+Santos&background=9FE870&color=fff" alt="Cliente" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <p class="font-medium dark:text-white text-gray-800">Carlos Santos</p>
                                    <p class="text-sm dark:text-gray-400 text-gray-600">Básico Plus - Honda City 2023</p>
                                </div>
                            </div>
                            <span class="text-sm dark:text-gray-400 text-gray-600">2 dias atrás</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=Marina+Silva&background=9FE870&color=fff" alt="Cliente" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <p class="font-medium dark:text-white text-gray-800">Marina Silva</p>
                                    <p class="text-sm dark:text-gray-400 text-gray-600">Terceiros Avançado - Toyota Corolla 2024</p>
                                </div>
                            </div>
                            <span class="text-sm dark:text-gray-400 text-gray-600">3 dias atrás</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=Roberto+Lima&background=9FE870&color=fff" alt="Cliente" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <p class="font-medium dark:text-white text-gray-800">Roberto Lima</p>
                                    <p class="text-sm dark:text-gray-400 text-gray-600">Básico Essencial - Chevrolet Onix 2023</p>
                                </div>
                            </div>
                            <span class="text-sm dark:text-gray-400 text-gray-600">4 dias atrás</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>