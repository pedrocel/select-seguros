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
    .event-day:hover {
        background-color: #f472b6;
        color: white;
      }

      .course-card {
        position: relative;
        cursor: pointer;
        overflow: hidden;
      }
      .course-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
      .course-card .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease;
      }
      .course-card:hover .overlay {
        opacity: 1;
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
        <h1 class="text-2xl font-bold text-black">PacSchool - Play</h1>
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

        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6">
       
            <div class="w-full  mx-auto p-4 bg-white shadow-lg rounded-xl">
                <h1 class="text-3xl font-bold text-center mb-6">Biblioteca</h1>

                <div class="grid grid-cols-4 gap-4">
                    <!-- Card de Curso -->
                    <div class="course-card relative">
                    <img src="https://i.pinimg.com/736x/cc/08/01/cc0801541e8db072f919ec03f1d858c4.jpg" alt="Curso 1" />
                    <div class="overlay">
                        <button onclick="openCourseModal('Curso 1', 'Descrição do curso 1', 4, 75, 5, 20, 5, 'Professor 1')" class="bg-pink-500 text-white font-bold py-2 px-4 rounded">Detalhes</button>
                    </div>
                    </div>

                </div>
            </div>
        </div>

      </div>
    </main>
  </div>
  <div id="courseModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
      <div class="bg-white p-6 rounded-lg max-w-md w-full">
        <h2 id="courseName" class="text-xl font-bold mb-4"></h2>
        <img id="courseImage" src="" alt="Curso" class="w-full h-48 object-cover rounded-lg mb-4" />
        <p id="courseDescription" class="text-gray-700 mb-4"></p>
        <div class="flex items-center mb-4">
          <span id="courseRating" class="text-yellow-400">⭐⭐⭐⭐</span>
          <span class="ml-2">Avaliação</span>
        </div>
        <div class="mb-4">
          <label class="block font-semibold">Progresso</label>
          <div class="w-full bg-gray-300 h-2 rounded-full">
            <div id="progressBar" class="h-2 bg-pink-500 rounded-full" style="width: 50%"></div>
          </div>
        </div>
        <p id="courseModules" class="mb-4"></p>
        <p id="courseLessons" class="mb-4"></p>
        <p id="courseInstructor" class="mb-4"></p>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Assistir</button>
        <button onclick="closeCourseModal()" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded mt-4">Fechar</button>
      </div>
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
   <script>
      function openCourseModal(name, description, rating, progress, modules, lessons, instructor) {
        document.getElementById('courseName').textContent = name;
        document.getElementById('courseImage').src = 'https://via.placeholder.com/300x200'; // Use a real image URL here
        document.getElementById('courseDescription').textContent = description;
        document.getElementById('courseRating').textContent = '⭐⭐⭐⭐'.slice(0, rating * 2);
        document.getElementById('progressBar').style.width = progress + '%';
        document.getElementById('courseModules').textContent = `Módulos: ${modules}`;
        document.getElementById('courseLessons').textContent = `Aulas: ${lessons}`;
        document.getElementById('courseInstructor').textContent = `Professor: ${instructor}`;
        document.getElementById('courseModal').classList.remove('hidden');
        document.getElementById('courseModal').classList.add('flex');
      }

      function closeCourseModal() {
        document.getElementById('courseModal').classList.add('hidden');
        document.getElementById('courseModal').classList.remove('flex');
      }
    </script>
</body>
</html>
