<nav class="flex-1 px-4 py-6 space-y-2">
        <a href="/dashboard" id="menuButton" class="block px-4 py-2 text-gray-200 
            @unless(Route::is('dashboard')) 
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#1E1E1E] hover:to-[#6affe2] 
            @endunless
            rounded-[10px] text-sm
            @if(Route::is('dashboard')) 
                bg-gradient-to-r from-[#50a8f2] to-[#6affe2] text-white 
            @endif">
            <i class="fas fa-tachometer-alt mr-2 "></i><span class="menu-label">Dashboard</span> 
        </a>      
        <a href="/profile" id="menuButton" class="block px-4 py-2 text-gray-200 
            @unless(Route::is('profile.edit')) 
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#1E1E1E] hover:to-[#6affe2] 
            @endunless
            rounded-[10px] text-sm
            @if(Route::is('profile.edit')) 
                bg-gradient-to-r from-[#50a8f2] to-[#6affe2] text-white 
            @endif">
            <i class="fas fa-user-circle mr-2"></i><span class="menu-label">Meu Perfil</span>
        </a>
        <a href="/users" id="menuButton" class="block px-4 py-2 text-gray-200 
            @unless(Route::is('users')) 
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#1E1E1E] hover:to-[#6affe2]  
            @endunless
            rounded-[10px] text-sm
            @if(Route::is('users')) 
                bg-gradient-to-r from-[#50a8f2] to-[#6affe2] text-white 
            @endif">
            <i class="fas fa-user-friends mr-2"></i> <span class="menu-label">Gestão de Usuários</span>
        </a>
        <a href="/settings" id="menuButton" class="block px-4 py-2 text-gray-200 
            @unless(Route::is('settings')) 
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#1E1E1E] hover:to-[#6affe2]  
            @endunless
            rounded-[10px] text-sm
            @if(Route::is('settings')) 
                bg-gradient-to-r from-[#50a8f2] to-[#6affe2] text-white 
            @endif">
            <i class="fas fa-cogs mr-2"></i> <span class="menu-label">Configurações</span>
        </a>
        <div class="flex items-center">
            <button id="themeToggle" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg shadow-md hover:bg-gray-700 transition duration-300 text-sm">
                <i class="fas fa-moon mr-2"></i> <span class="menu-label">ALTERAR TEMA</span>
            </button>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full px-4 py-2 text-gray-200 hover:bg-gradient-to-r hover:from-[#6affe2] hover:to-[#6affe2]  rounded-[10px] text-sm text-left">
                <i class="fas fa-sign-out-alt mr-2"></i>Sair
            </button>
        </form>
    </nav>