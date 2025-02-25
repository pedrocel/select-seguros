<!DOCTYPE html>
<html lang="pt-BR" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Seguros - Login</title>
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
    </style>
</head>
<body class="dark:bg-[#121212] bg-gray-50 min-h-screen flex items-center justify-center">
    <!-- Theme Toggle Button (Absolute Position) -->
    <button onclick="toggleTheme()" class="fixed top-4 right-4 p-2 rounded-lg dark:bg-[#1A1A1A] bg-white border dark:border-[#333333] border-gray-200 dark:text-white text-gray-800 hover:bg-brand-green/10 transition-colors">
        <i class="fas fa-moon dark:hidden"></i>
        <i class="fas fa-sun hidden dark:block"></i>
    </button>

    <!-- Login Container -->
    <div class="w-full max-w-md p-8">
        <!-- Logo -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold inline-block">
                <span class="text-brand-green">S</span><span class="text-brand-blue">ELECT</span>
                <span class="dark:text-white text-gray-800 block text-lg mt-1">SEGUROS</span>
            </h1>
        </div>

        <!-- Login Form -->
        <div class="gradient-card rounded-xl shadow-lg p-8 dark:border-[#333333] border-gray-200 border">
            <h2 class="text-2xl font-semibold dark:text-white text-gray-800 mb-6 text-center">Bem-vindo de volta</h2>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-medium dark:text-gray-300 text-gray-700 mb-2">
                            Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" 
                                class="block w-full pl-10 pr-3 py-2 border dark:border-[#333333] border-gray-300 rounded-lg 
                                dark:bg-[#1A1A1A] bg-white
                                dark:text-white text-gray-900
                                focus:ring-2 focus:ring-brand-green focus:border-transparent
                                placeholder-gray-400"
                                placeholder="seu@email.com">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium dark:text-gray-300 text-gray-700 mb-2">
                            Senha
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" id="password" name="password" 
                                class="block w-full pl-10 pr-3 py-2 border dark:border-[#333333] border-gray-300 rounded-lg 
                                dark:bg-[#1A1A1A] bg-white
                                dark:text-white text-gray-900
                                focus:ring-2 focus:ring-brand-green focus:border-transparent
                                placeholder-gray-400"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" name="remember"
                                class="h-4 w-4 text-brand-green focus:ring-brand-green border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm dark:text-gray-300 text-gray-700">
                                Lembrar-me
                            </label>
                        </div>
                        <a href="#" class="text-sm text-brand-blue hover:underline">
                            Esqueceu a senha?
                        </a>
                    </div>

                    <button type="submit" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg
                        text-sm font-medium text-white bg-brand-blue hover:bg-brand-blue/90
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-green
                        transition-colors">
                        Entrar
                    </button>

                    <div class="text-center">
                        <span class="text-sm dark:text-gray-400 text-gray-600">
                            Não tem uma conta?
                            <a href="#" class="text-brand-blue hover:underline">Cadastre-se</a>
                        </span>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <p class="text-center mt-8 text-sm dark:text-gray-400 text-gray-600">
            © 2025 Select Seguros. Todos os direitos reservados.
        </p>
    </div>
</body>
</html>