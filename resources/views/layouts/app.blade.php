<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- SweetAlert -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
       /* Ocultar o texto quando o sidebar estiver reduzido */
#sidebar.reduced .menu-label {
    display: none; /* Esconde o texto */
}

/* Garantir que o ícone ocupe o espaço correto */
#sidebar.reduced .menu-icon {
    font-size: 24px; /* Ajuste no tamanho do ícone */
}

/* Ajustar o botão de menu para quando o sidebar estiver reduzido */
#menuButton.reduced {
    padding: 8px;
    width: 50px; /* Tamanho fixo para os botões quando o sidebar for reduzido */
    justify-content: center; /* Centraliza o ícone */
}
#userMenuDropdown.hidden {
    display: none;
}

#userMenuDropdown {
    display: block;
}

    </style>
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
    <div class="flex">
    <aside id="sidebar" class="fixed top-0 left-0 h-screen w-64 bg-[#252f3f] text-gray-100 flex flex-col transition-all duration-300">
        <div class="flex justify-between items-center px-4 py-5 bg-[#1E1E1E]">
            <img src="{{ asset('/img/pacface.png') }}" alt="Logo" class="w-32 h-auto">
            <button id="toggleSidebar" class="text-gray-600 hover:text-gray-800 focus:outline-none text-sm">
                &#9776;
            </button>
        </div>
        @if(auth()->check())
            @if(auth()->user()->adm())
                @include('layouts.menu.adm')
            @elseif(auth()->user()->student())
                @include('menu.student')
            @elseif(auth()->user()->director())
            @include('menu.director')
            @endif
        @endif
    </aside>
    <main id="mainContent" class="flex-1 md:ml-64 sm:ml-0 transition-all duration-300">
        @if (isset($header))
        <header class="bg-white shadow dark:bg-gray-800 flex items-center justify-between px-4 sm:px-6 lg:px-8 py-6">
    <div>
        {{ $header }}
    </div>
    
    <!-- Avatar do usuário, botão de alterar tema e menu dropdown -->
    <div class="flex items-center space-x-4">
        <!-- Botão de Alterar Tema -->
        <button id="themeToggle2" class="flex items-center justify-center w-10 h-10 bg-gray-200 dark:bg-gray-700 rounded-full shadow-md hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-300">
            <i class="fas fa-moon text-gray-800 dark:text-gray-200"></i>
        </button>

        <!-- Avatar e Nome do Usuário -->
        <button id="userMenuButton" class="flex items-center space-x-3 focus:outline-none">
            <div class="relative">
                <img 
                    src="{{ asset('/img/user-circle.png') }}" 
                    alt="User Avatar" 
                    class="w-10 h-10 rounded-full border-inside"
                />
            </div>
            <div class="flex flex-col items-start hidden md:flex">
                <span class="text-[16px] font-medium text-gray-800 dark:text-gray-200">
                    {{ Auth::user()->name }}
                </span>
                <span class="text-[13px] text-gray-500 dark:text-gray-400 -mt-2">
                    {{ Auth::user()->profile_name ?? 'Perfil Desconhecido' }}
                </span>
            </div>
        </button>

        <!-- Dropdown -->
        @if(auth()->check())
            @if(auth()->user()->adm())
                @include('layouts.menu.dropdownAdm')
            @elseif(auth()->user()->cliente())
                @include('layouts.menu.dropdownCliente')
            @endif
        @endif
    </div>
</header>

    @endif

    <div class="py-6 px-4">
        {{ $slot }}
    </div>
</main>

    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function (e) {
                e.preventDefault();

                tabs.forEach(t => t.classList.remove('border-blue-500', 'text-blue-500'));
                tab.classList.add('border-blue-500', 'text-blue-500');

                tabContents.forEach(content => content.classList.add('hidden'));
                document.querySelector(tab.getAttribute('href')).classList.remove('hidden');
            });
        });

        // Ativar a primeira aba por padrão
        if (tabs.length > 0) {
            tabs[0].classList.add('border-blue-500', 'text-blue-500');
            tabContents[0].classList.remove('hidden');
        }
    });
</script>
    <script>
    // Alternar Sidebar
    const toggleSidebar = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');

    // Função para atualizar a margem dependendo do tamanho da tela e do estado do sidebar
    function updateMainContentMargin() {
        if (window.innerWidth >= 640) {
            // Se o sidebar estiver expandido, adicionar a margem ml-64
            if (sidebar.classList.contains('w-64')) {
                mainContent.classList.add('ml-64');
            } else {
                mainContent.classList.remove('ml-64');
            }
        } else {
            // Em telas pequenas, remover a margem ml-64
            mainContent.classList.remove('ml-64');
        }
    }

    toggleSidebar.addEventListener('click', function () {
        if (sidebar.classList.contains('w-64')) {
            sidebar.classList.remove('w-64');
            sidebar.classList.add('w-20');
            sidebar.classList.add('reduced'); // Adiciona a classe reduzida ao sidebar
            mainContent.classList.add('ml-16');
            mainContent.classList.remove('ml-64');
        } else {
            sidebar.classList.remove('w-20');
            sidebar.classList.add('w-64');
            sidebar.classList.remove('reduced'); // Remove a classe reduzida
            mainContent.classList.add('ml-64');
            mainContent.classList.remove('ml-16');
        }
        
        // Atualizar a margem após a mudança no estado do sidebar
        updateMainContentMargin();
    });

    // Chamar a função no carregamento para garantir que a margem esteja correta
    window.addEventListener('resize', updateMainContentMargin);
    updateMainContentMargin();
</script>

 <script>
        document.addEventListener('DOMContentLoaded', () => {
            const htmlElement = document.documentElement; // Elemento <html>
            const themeToggle = document.getElementById('themeToggle');
            const themeToggle2 = document.getElementById('themeToggle2');

            // Função para alternar tema
            const toggleTheme = () => {
                if (htmlElement.classList.contains('dark')) {
                    htmlElement.classList.remove('dark'); // Remove o modo escuro
                    localStorage.setItem('theme', 'light'); // Salva a preferência no localStorage
                } else {
                    htmlElement.classList.add('dark'); // Ativa o modo escuro
                    localStorage.setItem('theme', 'dark'); // Salva a preferência no localStorage
                }
            };

            // Verifica o tema salvo no localStorage
            if (localStorage.getItem('theme') === 'dark') {
                htmlElement.classList.add('dark');
            } else {
                htmlElement.classList.remove('dark');
            }

            // Evento para alternar tema
            themeToggle.addEventListener('click', toggleTheme);
            themeToggle2.addEventListener('click', toggleTheme);
        });
    </script>
    
    <script>
        // SweetAlert Mensagens
        const successMessage = "{{ session('success') ?? '' }}";
        const errorMessage = "{{ session('error') ?? '' }}";

        if (successMessage.trim() !== '') {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: successMessage,
                timer: 3000,
                showConfirmButton: false
            });
        }

        if (errorMessage.trim() !== '') {
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: errorMessage,
                timer: 3000,
                showConfirmButton: false
            });
        }
    </script>

    <script>
        
        // Inicializar Select2
        $(document).ready(function() {
            $('#controllers').select2({
                placeholder: "Selecione controladores",
                allowClear: true
            });
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const userMenuButton = document.getElementById('userMenuButton');
        const userMenuDropdown = document.getElementById('userMenuDropdown');

        userMenuButton.addEventListener('click', () => {
            userMenuDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!userMenuButton.contains(e.target) && !userMenuDropdown.contains(e.target)) {
                userMenuDropdown.classList.add('hidden');
            }
        });
    });
</script>
</body>
</html>



