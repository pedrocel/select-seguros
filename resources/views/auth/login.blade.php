<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Reconhecimento Facial</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-[#000] min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-8 bg-white/10 backdrop-blur-lg rounded-xl shadow-2xl">
        <!-- Header with Facial Recognition Icon -->
        <div class="text-center mb-8">
            <div class="inline-block p-6 rounded-full bg-emerald-500/20 mb-4 relative">
                <i class="fas fa-camera text-4xl text-emerald-400"></i>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-full h-full border-4 border-emerald-400/30 rounded-full animate-pulse"></div>
                </div>
                <div class="absolute -top-1 -right-1 w-3 h-3 bg-emerald-400 rounded-full"></div>
                <div class="absolute -bottom-1 -left-1 w-3 h-3 bg-emerald-400 rounded-full"></div>
            </div>
            <h1 class="text-3xl font-bold text-white">PACSAFE</h1>
            <p class="text-emerald-200 mt-2">Acesse sua conta com segurança</p>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <!-- email Field -->
            <div>
                <label class="block text-sm font-medium text-emerald-200 mb-2" for="email">
                    Email
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-id-card text-emerald-400"></i>
                    </div>
                    <input type="text" id="email" name="email" 
                        class="block w-full pl-10 pr-3 py-2 border border-emerald-600 rounded-lg
                        bg-emerald-900/30 text-white placeholder-emerald-400/70
                        focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                        placeholder="Digite seu Email">
                </div>
            </div>

            <!-- Password Field -->
            <div>
                <label class="block text-sm font-medium text-emerald-200 mb-2" for="password">
                    Senha
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-emerald-400"></i>
                    </div>
                    <input type="password" id="password" name="password"
                        class="block w-full pl-10 pr-3 py-2 border border-emerald-600 rounded-lg
                        bg-emerald-900/30 text-white placeholder-emerald-400/70
                        focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                        placeholder="••••••••">
                </div>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" id="remember_me" name="remember"
                        class="h-4 w-4 text-emerald-500 focus:ring-emerald-500 border-emerald-600 rounded bg-emerald-900/30">
                    <label for="remember_me" class="ml-2 block text-sm text-emerald-200">
                        Lembrar de mim
                    </label>
                </div>
                <a href="#" class="text-sm text-emerald-400 hover:text-emerald-300">
                    Recuperar senha
                </a>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full flex items-center justify-center px-4 py-3 border border-transparent
                rounded-lg shadow-sm text-white bg-emerald-600 hover:bg-emerald-700
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500
                transition duration-300 text-sm font-semibold">
                <i class="fas fa-sign-in-alt mr-2"></i>
                ACESSAR PLATAFORMA
            </button>

            <!-- Facial Recognition Option -->
            <!-- <div class="flex items-center justify-between p-4 border border-emerald-600/30 rounded-lg bg-emerald-900/20">
                <div class="flex items-center">
                    <i class="fas fa-face-viewfinder text-2xl text-emerald-400 mr-3"></i>
                    <div>
                        <h3 class="text-sm font-medium text-emerald-200">Login Facial</h3>
                        <p class="text-xs text-emerald-400/70">Usar reconhecimento facial</p>
                    </div>
                </div>
                <button type="button" class="p-2 rounded-lg bg-emerald-500/20 hover:bg-emerald-500/30 transition-colors">
                    <i class="fas fa-camera text-emerald-400"></i>
                </button>
            </div> -->

            <!-- Alternative Login Methods -->
            <!-- <div class="grid grid-cols-2 gap-4">
                <button type="button"
                    class="flex items-center justify-center px-4 py-2 border border-emerald-600/30
                    rounded-lg shadow-sm text-emerald-200 bg-emerald-900/30 hover:bg-emerald-800/50
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500
                    transition duration-300">
                    <i class="fas fa-fingerprint mr-2"></i>
                    Digital
                </button>
                <button type="button"
                    class="flex items-center justify-center px-4 py-2 border border-emerald-600/30
                    rounded-lg shadow-sm text-emerald-200 bg-emerald-900/30 hover:bg-emerald-800/50
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500
                    transition duration-300">
                    <i class="fas fa-qrcode mr-2"></i>
                    QR Code
                </button>
            </div> -->
        </form>
    </div>

</body>
</html>