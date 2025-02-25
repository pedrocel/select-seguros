<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PacFace - Aluno</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Gradient background utility */
    .bg-gradient-custom {
      background: linear-gradient(to bottom, #58c5ed, #61e3e8);
    }
  </style>
</head>
<body class="h-screen bg-gradient-custom text-gray-800">
  <div class="flex h-full">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-2xl flex flex-col p-4 hidden md:block">
      <h1 class="text-xl font-bold text-center mb-6">Menu</h1>
      <nav class="flex flex-col gap-4">
        <a href="{{ route('student.dashboard') }}" class="block py-2 px-4 rounded-xl text-lg font-medium bg-blue-100 hover:bg-blue-200 transition">
          Dashboard
        </a>
        <a href="{{ route('student.profile.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Meu Perfil
        </a>
        <a href="{{ route('student.responsible.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Responsáveis
        </a>
        <a href="{{ route('student.document.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Documentos
        </a>
        <a href="{{ route('student.calendar.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Calendário
        </a>
        <a href="{{ route('student.calendar.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Calendário
        </a>
        <a href="{{ route('student.courses.index') }}" class="block py-2 px-5 rounded-xl text-lg font-medium bg-red-600 hover:bg-red-500 transition flex items-center justify-center space-x-3 border border-gray-300 shadow-md hover:shadow-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" style="width: 1.5em; height: 1.5em; vertical-align: middle; fill: currentColor; overflow: hidden;" viewBox="0 0 1024 1024" version="1.1">
            <path d="M852.727563 392.447107C956.997809 458.473635 956.941389 565.559517 852.727563 631.55032L281.888889 993.019655C177.618644 1059.046186 93.090909 1016.054114 93.090909 897.137364L93.090909 126.860063C93.090909 7.879206 177.675064-35.013033 281.888889 30.977769L852.727563 392.447107 852.727563 392.447107Z"/>
          </svg>
          <!-- Texto do botão -->
          <span class="text-white font-semibold">PacSchool - Play</span>
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 bg-white rounded-tl-3xl relative">
      <header class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-blue-500">Documentos</h1>
      <div class="flex items-center gap-4">
          <!-- Notification Icon -->
          <div class="relative">
            <button id="notificationButton" class="relative p-2 bg-blue-100 rounded-full hover:bg-blue-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-5-5.917V4a1 1 0 00-2 0v1.083A6.002 6.002 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0a3 3 0 11-6 0h6z" />
              </svg>
            </button>
            <div id="notificationModal" class="absolute right-0 mt-2 w-64 bg-white shadow-xl rounded-xl p-4 hidden">
              <h2 class="text-lg font-semibold mb-2">Notificações</h2>
              <ul>
              </ul>
            </div>
          </div>

          <!-- Profile Icon -->
          <div class="relative">
            <button id="profileButton" class="flex items-center gap-2 p-2 bg-blue-100 rounded-full hover:bg-blue-200">
              <img id="profileImage" src="data:image/png;base64,<?= htmlspecialchars($user->facial_image_base64) ?>" alt="Profile" class="h-10 w-10 rounded-full">
            </button>
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-xl rounded-xl p-4 hidden">
              <ul>
              <a href="{{ route('student.dashboard') }}" class="block py-2 px-4 rounded-xl text-lg font-medium bg-blue-100 hover:bg-blue-200 transition">
          Dashboard
        </a>
        <a href="{{ route('student.profile.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Meu Perfil
        </a>
        <a href="{{ route('student.responsible.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Responsáveis
        </a>
        <a href="{{ route('student.calendar.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Calendário
        </a>
        <form method="POST" action="/logout">
              @csrf
              <button type="submit" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
                  Sair
              </button>
          </form>
              </ul>
            </div>
          </div>
        </div>
      </header>

      <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-1 gap-6">
    <div id="documentos" class="tab-content p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            @foreach($documents as $document)
                @php
                    // Definir as cores da borda e do título baseado no status do documento
                    $borderColor = '';
                    $titleColor = '';
                    $statusText = '';
                    $statusClass = '';
                    
                    if ($document['status'] == 1) {
                        $borderColor = 'border-yellow-500';
                        $titleColor = 'text-yellow-500';
                        $statusText = 'Aguardando aprovação';
                        $statusClass = 'text-yellow-500';
                    } elseif ($document['status'] == 2) {
                        $borderColor = 'border-green-500';
                        $titleColor = 'text-green-500';
                        $statusText = 'Aprovado';
                        $statusClass = 'text-green-500';
                    } elseif ($document['status'] == 3) {
                        $borderColor = 'border-red-500';
                        $titleColor = 'text-red-500';
                        $statusText = 'Reprovado';
                        $statusClass = 'text-red-500';
                    } else {
                        $borderColor = 'border-blue-500'; // Para quando o status for 'not_env' ou não for encontrado
                        $titleColor = 'text-blue-500';
                        $statusText = 'Realize o upload do seu documento para análise.';
                        $statusClass = 'text-gray-600 dark:text-gray-400';
                    }
                @endphp

                <div class="p-6 bg-white rounded-2xl shadow-xl border-t-4 {{ $borderColor }}">
                    <h2 class="text-xl font-semibold mb-2 {{ $titleColor }}">{{ $document['document_type']->name }}</h2>
                    
                    @if($document['status'] === 'not_env')
                        <p class="text-gray-700 mb-4">{{ $statusText }}</p>
                        <form action="{{ route('student.documents.store', [$document['document_type']->id, $user]) }}" method="POST" enctype="multipart/form-data" class="w-full">
                            @csrf
                            <label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Escolher Arquivo</label>
                            <input type="file" name="file" id="file" class="block w-full text-sm text-gray-800 border border-gray-300 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4">
                            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded-xl hover:bg-blue-600 transition font-medium">
                                Enviar
                            </button>
                        </form>
                    @else
                        <p class="text-gray-600 dark:text-gray-400 mt-2 {{ $statusClass }}">
                            {{ $statusText }}
                        </p>
                        <a href="{{ route('student.documents.download', $document['id']) }}" class="mt-4 text-blue-500 hover:underline">Baixar Documento</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>



    </main>
  </div>

  <script>
    // Toggle notification modal
    document.getElementById('notificationButton').addEventListener('click', function () {
      const modal = document.getElementById('notificationModal');
      modal.classList.toggle('hidden');
    });

    // Toggle profile dropdown
    document.getElementById('profileButton').addEventListener('click', function () {
      const dropdown = document.getElementById('profileDropdown');
      dropdown.classList.toggle('hidden');
    });
  </script>
</body>
</html>
