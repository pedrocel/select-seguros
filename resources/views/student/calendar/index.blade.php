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
          Frequência
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
        <h1 class="text-2xl font-bold text-blue-500">Meu Calendário</h1>
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

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
       
        <div class="w-full  mx-auto p-4 bg-white shadow-lg rounded-xl">
            <h1 class="text-3xl font-bold text-center mb-6">Calendário de Eventos 2025</h1>
            <div class="flex justify-between mb-4">
                <button id="prevMonth" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Anterior</button>
                <span id="currentMonth" class="text-xl font-semibold"></span>
                <button id="nextMonth" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Próximo</button>
            </div>
            <!-- Cabeçalho com os nomes dos dias da semana -->
            <div class="grid grid-cols-7 gap-4 text-center font-bold">
                <div>Dom</div>
                <div>Seg</div>
                <div>Ter</div>
                <div>Qua</div>
                <div>Qui</div>
                <div>Sex</div>
                <div>Sáb</div>
            </div>
            <div id="calendar" class="grid grid-cols-7 gap-4 text-center mt-2"></div>
        </div>
    
        <div class="w-full  mx-auto p-4 bg-white shadow-lg rounded-xl">
            <h2 class="text-2xl font-semibold mb-4">Linha do Tempo de Eventos</h2>
            <div id="timeline" class="space-y-6 border-l-2 border-pink-500 pl-6">
                <!-- Timeline events will be appended here -->
            </div>
        </div>

    <!-- Modal -->
    <div id="eventModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
      <div class="bg-white p-6 rounded-lg max-w-md w-full">
        <h2 id="eventDate" class="text-xl font-bold mb-4"></h2>
        <ul id="eventList" class="list-disc ml-5 mb-4"></ul>
        <button onclick="closeModal()" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Fechar</button>
      </div>
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
   <script>
      const calendarEl = document.getElementById('calendar');
      const currentMonthEl = document.getElementById('currentMonth');
      const timelineEl = document.getElementById('timeline');
      let currentDate = new Date(2025, 0, 1); // January 2025

      const events = {
        '2025-02-10': ['Jogos Interclass', 'Aula especial'],
        '2025-02-15': ['Reunião Escolar'],
        '2025-05-01': ['Dia do Trabalho'],
        '2025-08-15': ['Feriado Nacional'],
        '2025-12-25': ['Natal'],
      };

      function renderCalendar(date) {
        calendarEl.innerHTML = '';
        const year = date.getFullYear();
        const month = date.getMonth();
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        currentMonthEl.textContent = date.toLocaleDateString('pt-BR', { month: 'long', year: 'numeric' });

        // Preenche os dias vazios antes do primeiro dia do mês
        for (let i = 0; i < firstDay; i++) {
          calendarEl.insertAdjacentHTML('beforeend', '<div></div>');
        }

        // Renderiza os dias do mês
        for (let day = 1; day <= daysInMonth; day++) {
          const fullDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
          const dayEvents = events[fullDate] || [];

          const dayEl = document.createElement('div');
          dayEl.className = `p-4 rounded-md relative cursor-pointer ${dayEvents.length ? 'bg-gray-200 event-day' : 'bg-gray-100'}`;
          dayEl.innerHTML = `<span class="absolute top-1 right-2 text-sm font-semibold">${day}</span>`;

          if (dayEvents.length) {
            dayEl.innerHTML += `<div class="text-xs mt-8">${dayEvents.length} Evento(s)</div>`;
            dayEl.onclick = () => showEvents(`${day} de ${date.toLocaleDateString('pt-BR', { month: 'long', year: 'numeric' })}`, dayEvents);
          }

          calendarEl.appendChild(dayEl);
        }
      }

      function renderTimeline() {
        timelineEl.innerHTML = '';
        Object.keys(events).sort().forEach(date => {
          events[date].forEach(event => {
            const eventEl = document.createElement('div');
            eventEl.className = 'mb-4';
            eventEl.innerHTML = `
              <div class="bg-white p-4 rounded-xl shadow-lg">
                <h3 class="text-lg font-bold">${event}</h3>
                <p class="text-gray-700">Data: ${new Date(date).toLocaleDateString('pt-BR')}</p>
              </div>
            `;
            timelineEl.appendChild(eventEl);
          });
        });
      }

      document.getElementById('prevMonth').onclick = () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
      };

      document.getElementById('nextMonth').onclick = () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
      };

      function showEvents(date, events) {
        document.getElementById('eventDate').textContent = date;
        const eventList = document.getElementById('eventList');
        eventList.innerHTML = '';
        events.forEach(event => {
          const listItem = document.createElement('li');
          listItem.textContent = event;
          eventList.appendChild(listItem);
        });
        document.getElementById('eventModal').classList.remove('hidden');
        document.getElementById('eventModal').classList.add('flex');
      }

      function closeModal() {
        document.getElementById('eventModal').classList.add('hidden');
        document.getElementById('eventModal').classList.remove('flex');
      }

      // Inicializa o calendário e a linha do tempo
      renderCalendar(currentDate);
      renderTimeline();
    </script>
</body>
</html>
