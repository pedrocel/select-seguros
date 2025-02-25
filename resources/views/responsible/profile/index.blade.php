<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PacFace - Responsável</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <a href="{{ route('responsible.dashboard') }}" class="block py-2 px-4 rounded-xl text-lg font-medium bg-blue-100 hover:bg-blue-200 transition">
          Dashboard
        </a>
        <a href="{{ route('responsible.profile.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Meu Perfil
        </a>
        <a href="{{ route('responsible.students.index') }}" class="block py-2 px-4 rounded-xl text-lg font-medium hover:bg-blue-200 transition">
          Alunos
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 bg-white rounded-tl-3xl relative">
        <section class="relative pt-8  pb-24">
        <img src="https://pagedone.io/asset/uploads/1705473908.png" alt="cover-image" class="w-full absolute top-0 left-0 z-0 h-60 object-cover">
        <header class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-blue-500 "></h1>
        <div class="flex items-center gap-4 ">
          <!-- Notification Icon -->
          <div class="relative right-2">
            <button id="notificationButton" class="relative p-2 bg-blue-100 rounded-full hover:bg-blue-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-5-5.917V4a1 1 0 00-2 0v1.083A6.002 6.002 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0a3 3 0 11-6 0h6z" />
              </svg>
            </button>
            <div id="notificationModal" class="absolute  mt-2 w-64 bg-white shadow-xl rounded-xl p-4 hidden right-8 ">
              <h2 class="text-lg font-semibold mb-2">Notificações</h2>
              <ul>
              </ul>
            </div>
          </div>

          <!-- Profile Icon -->
          <div class="relative  right-4">
            <button id="profileButton" class="flex items-center gap-2 p-2 bg-blue-100 rounded-full hover:bg-blue-200 right-0">
              <img id="profileImage" src="data:image/png;base64,<?= htmlspecialchars($user->facial_image_base64 ) ?>" alt="Profile" class="h-10 w-10 rounded-full">
            </button>
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-xl rounded-xl p-4 hidden z-50">
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
        <div class="w-full max-w-7xl mx-auto px-6 md:px-8">
            <div class="flex items-center justify-center sm:justify-start relative z-10 mb-5">
                <img src="{{ $user->facial_image_base64 ? 'data:image/png;base64,' . $user->facial_image_base64 : 'https://via.placeholder.com/128' }}" alt="Imagem Facial"
                    class="border-4 border-solid border-white rounded-full object-cover rounded-full w-40 h-40">
            </div>
            <div class="flex items-center justify-center flex-col sm:flex-row max-sm:gap-5 sm:justify-between mb-5">
                <div class="block">
                    <h3 class="font-manrope font-bold text-4xl text-gray-900 mb-1 max-sm:text-center">{{$user->name}}</h3>
                    <p class="font-normal text-base leading-7 text-gray-500  max-sm:text-center">Endereço <br class="hidden sm:block">União dos palmanres - AL</p>
                </div>
                <button id="openModal" 
                    class="py-3.5 px-5 flex rounded-full bg-indigo-600 items-center shadow-sm shadow-transparent transition-all duration-500 hover:bg-indigo-700">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.3011 8.69881L8.17808 11.8219M8.62402 12.5906L8.79264 12.8819C10.3882 15.6378 11.1859 17.0157 12.2575 16.9066C13.3291 16.7974 13.8326 15.2869 14.8397 12.2658L16.2842 7.93214C17.2041 5.17249 17.6641 3.79266 16.9357 3.0643C16.2073 2.33594 14.8275 2.79588 12.0679 3.71577L7.73416 5.16033C4.71311 6.16735 3.20259 6.67086 3.09342 7.74246C2.98425 8.81406 4.36221 9.61183 7.11813 11.2074L7.40938 11.376C7.79182 11.5974 7.98303 11.7081 8.13747 11.8625C8.29191 12.017 8.40261 12.2082 8.62402 12.5906Z"
                            stroke="white" stroke-width="1.6" stroke-linecap="round" />
                    </svg>
                    <span class="px-2 font-semibold text-base leading-7 text-white">Biometria Facial</span>
                </button>
            </div>
            <div class="flex max-sm:flex-wrap max-sm:justify-center items-center gap-4">
                <a href="javascript:;" class="rounded-full py-3 px-6 bg-stone-100 text-gray-700 font-semibold text-sm leading-6 transition-all duration-500 hover:bg-stone-200 hover:text-gray-900">Ux Research</a>
                <a href="javascript:;" class="rounded-full py-3 px-6 bg-stone-100 text-gray-700 font-semibold text-sm leading-6 transition-all duration-500 hover:bg-stone-200 hover:text-gray-900">CX Strategy</a>
                <a href="javascript:;" class="rounded-full py-3 px-6 bg-stone-100 text-gray-700 font-semibold text-sm leading-6 transition-all duration-500 hover:bg-stone-200 hover:text-gray-900">Project Manager</a>
            </div>
        </div>
    </section>

    <!-- modal  -->
    <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-lg relative">
        <!-- Botão para fechar a modal -->
        <button id="closeModal" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 text-lg font-bold">&times;</button>

        <h1 class="text-2xl text-center font-bold text-blue-600 mb-4">Atualizar Biometria Facial</h1>
        <h3 class="text-lg font-medium text-gray-900 text-center">Biometria Facial</h3>

        <!-- Verifica se a imagem facial existe -->
        <div class="text-center mb-4">
            <img id="facialImagePreview" 
                src="{{ $user->facial_image_base64 ? 'data:image/png;base64,' . $user->facial_image_base64 : 'https://via.placeholder.com/128' }}" 
                alt="Imagem Facial" class="mx-auto mb-4 rounded-full w-32 h-32 object-cover">
            
            <p id="statusMessage" class="text-gray-700 mb-4">
                {{ $user->facial_image_base64 ? 'O usuário já possui uma biometria facial cadastrada.' : 'Nenhuma biometria cadastrada. Faça o upload ou capture uma nova imagem.' }}
            </p>

            <div class="flex justify-center items-center space-x-4">
                <button id="uploadButton" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                    Fazer Upload da Imagem
                </button>
                <button id="captureButton" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-green-300">
                    Tirar Foto com a Câmera
                </button>
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
// Referências dos elementos
const facialImageInput = document.getElementById('facialImage');
const facialPreview = document.getElementById('facialPreview');
const facialImageForm = document.getElementById('facialImageForm');
const facialImageBase64Input = document.createElement('input');

// Configurar campo oculto para armazenar Base64
facialImageBase64Input.type = 'hidden';
facialImageBase64Input.name = 'facial_image_base64';
facialImageForm.appendChild(facialImageBase64Input);

// Função para pré-visualizar a imagem e definir valor Base64
facialImageInput.addEventListener('change', function (event) {
  const file = event.target.files[0];

  if (file) {
    const reader = new FileReader();

    reader.onload = function (e) {
      facialPreview.src = e.target.result;

      // Armazena o Base64 sem o prefixo "data:image/png;base64,"
      facialImageBase64Input.value = e.target.result.split(',')[1];
    };

    reader.readAsDataURL(file);
  }
});

// Substituir o envio padrão do formulário
facialImageForm.addEventListener('submit', function (event) {
  event.preventDefault();

  if (!facialImageBase64Input.value) {
    Swal.fire({
      icon: 'warning',
      title: 'Atenção',
      text: 'Por favor, selecione uma imagem válida antes de enviar!'
    });
    return;
  }

  // Simulação de envio
  fetch(facialImageForm.action, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      facial_image_base64: facialImageBase64Input.value
    })
  })
  .then(response => response.json())
  .then(data => {
    Swal.fire({
      icon: 'success',
      title: 'Sucesso',
      text: 'Imagem enviada com sucesso!'
    });
  })
  .catch(error => {
    alert(error);
    Swal.fire({
      icon: 'error',
      title: 'Erro',
      text: 'Falha ao enviar a imagem!'
    });
  });
});


  </script>
  
  <script>
        // Exibir Upload Section
        document.getElementById('uploadButton').addEventListener('click', () => {
            document.getElementById('uploadSection').classList.toggle('hidden');
        });

        // Capturar Imagem com Câmera
        const captureModal = document.getElementById('captureModal');
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const snapButton = document.getElementById('snap');
        const saveButton = document.getElementById('save');

        document.getElementById('captureButton').addEventListener('click', () => {
            captureModal.classList.remove('hidden');
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(stream => {
                    video.srcObject = stream;
                    video.play();
                });
        });

        // Captura a imagem
        snapButton.addEventListener('click', () => {
            canvas.classList.remove('hidden');
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            saveButton.classList.remove('hidden');
        });

        // Salva a imagem capturada em base64
        function saveImage() {
            const base64Image = canvas.toDataURL('image/png').split(',')[1];
            document.getElementById('facialImageBase64').value = base64Image;
            document.getElementById('facialImagePreview').src = `data:image/png;base64,${base64Image}`;
            captureModal.classList.add('hidden');
            Swal.fire('Sucesso!', 'Imagem capturada com sucesso!', 'success');
        }

        // Fecha o modal
        document.getElementById('closeModal').addEventListener('click', () => {
            captureModal.classList.add('hidden');
        });

        // Função para fazer upload e converter em base
        
    </script>
        <script>
    const uploadForm = document.getElementById('uploadForm');
    const fileInput = document.getElementById('facialImageFile');
    const base64Input = document.getElementById('facialImageBase64');

    uploadForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const file = fileInput.files[0];
        if (!file) {
            Swal.fire('Erro!', 'Selecione uma imagem primeiro!', 'error');
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            const base64Image = e.target.result.split(',')[1];
            base64Input.value = base64Image;

            // Envia o formulário após a conversão
            uploadForm.submit();
        };
        reader.readAsDataURL(file);
    });
</script>
    <script>
    document.getElementById("openModal").addEventListener("click", function() {
        document.getElementById("modal").classList.remove("hidden");
    });

    document.getElementById("closeModal").addEventListener("click", function() {
        document.getElementById("modal").classList.add("hidden");
    });

    window.addEventListener("click", function(event) {
        let modal = document.getElementById("modal");
        if (event.target === modal) {
            modal.classList.add("hidden");
        }
    });
</script>
</body>

</html>
