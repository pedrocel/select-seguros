@extends('student.layout')

@section('title', 'Dashboard')

@section('content')
<div class="bg-[#000] min-h-screen py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white/10 backdrop-blur-lg rounded-xl shadow-2xl overflow-hidden">
            <!-- Profile Header -->
            <div class="relative">
                <!-- Background Pattern -->
                <div class="absolute inset-0 bg-emerald-800/30 backdrop-blur-sm"></div>
                
                <!-- Profile Content -->
                <div class="relative p-8 text-center">
                    <!-- Profile Image -->
                    <div class="relative inline-block">
                        <div class="w-32 h-32 rounded-full bg-emerald-500/20 flex items-center justify-center border-4 border-emerald-400/30 mb-4 mx-auto relative">
                        @if ($user->facial_image_base64)
                        <img src="{{ $user->facial_image_base64 ? 'data:image/png;base64,' . $user->facial_image_base64 : 'https://via.placeholder.com/128' }}" alt="Imagem Facial"
                                class="border-4 border-solid border-white rounded-full object-cover rounded-full w-40 h-40">
                        @else
                        <i class="fas fa-user text-5xl text-emerald-400"></i>
                        @endif
                            <!-- Status Indicator -->
                            <div class="absolute -bottom-2 -right-2 bg-orange-500 text-white text-xs px-3 py-1 rounded-full flex items-center">
                                <i class="fas fa-camera-retro mr-1"></i>
                                Pendente
                            </div>
                        </div>
                    </div>

                    <!-- Name -->
                    <h1 class="text-3xl font-bold text-white mb-2">{{ $user->name }}</h1>
                    
                    @if (!$user->facial_image_base64)
                    <button id="openModal" 
                        class="inline-flex items-center bg-orange-500/20 text-orange-300 px-4 py-2 rounded-full text-sm shadow-sm transition-all duration-500 hover:bg-orange-500/30">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.3011 8.69881L8.17808 11.8219M8.62402 12.5906L8.79264 12.8819C10.3882 15.6378 11.1859 17.0157 12.2575 16.9066C13.3291 16.7974 13.8326 15.2869 14.8397 12.2658L16.2842 7.93214C17.2041 5.17249 17.6641 3.79266 16.9357 3.0643C16.2073 2.33594 14.8275 2.79588 12.0679 3.71577L7.73416 5.16033C4.71311 6.16735 3.20259 6.67086 3.09342 7.74246C2.98425 8.81406 4.36221 9.61183 7.11813 11.2074L7.40938 11.376C7.79182 11.5974 7.98303 11.7081 8.13747 11.8625C8.29191 12.017 8.40261 12.2082 8.62402 12.5906Z"
                                stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                        </svg>
                        <span class="px-2 font-semibold text-sm leading-7">Biometria Facial - Pendente de envio</span>
                    </button>
                @elseif($user->facial_image_base64)
                <button id="openModal" 
                    class="py-3.5 px-5 flex rounded-full bg-green-500 items-center shadow-sm shadow-transparent transition-all duration-500 hover:bg-green-600">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.3011 8.69881L8.17808 11.8219M8.62402 12.5906L8.79264 12.8819C10.3882 15.6378 11.1859 17.0157 12.2575 16.9066C13.3291 16.7974 13.8326 15.2869 14.8397 12.2658L16.2842 7.93214C17.2041 5.17249 17.6641 3.79266 16.9357 3.0643C16.2073 2.33594 14.8275 2.79588 12.0679 3.71577L7.73416 5.16033C4.71311 6.16735 3.20259 6.67086 3.09342 7.74246C2.98425 8.81406 4.36221 9.61183 7.11813 11.2074L7.40938 11.376C7.79182 11.5974 7.98303 11.7081 8.13747 11.8625C8.29191 12.017 8.40261 12.2082 8.62402 12.5906Z"
                            stroke="white" stroke-width="1.6" stroke-linecap="round" />
                    </svg>
                    <span class="px-2 font-semibold text-base leading-7 text-white">Biometria Facial - Verificada</span>
                </button>
                @endif
                </div>
            </div>

            <!-- Profile Information -->
            <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Contact Information -->
                <div class="space-y-6">
                    <h2 class="text-xl font-semibold text-white mb-4">
                        <i class="fas fa-address-card mr-2 text-emerald-300"></i>
                        Informações de Contato
                    </h2>

                    <!-- WhatsApp -->
                    <div class="bg-emerald-900/30 p-4 rounded-lg border border-emerald-600/30">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-emerald-500/20 flex items-center justify-center">
                                <i class="fab fa-whatsapp text-emerald-400"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-white">WhatsApp</p>
                                <p class="text-white">{{ $user->whatsapp ?? 'Não informado' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- CPF -->
                    <div class="bg-emerald-900/30 p-4 rounded-lg border border-emerald-600/30">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-emerald-500/20 flex items-center justify-center">
                                <i class="fas fa-id-card text-emerald-400"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-white">CPF</p>
                                <p class="text-white">{{ $user->cpf ?? 'Não informado' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Birth Date -->
                    <div class="bg-emerald-900/30 p-4 rounded-lg border border-emerald-600/30">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-emerald-500/20 flex items-center justify-center">
                                <i class="fas fa-calendar text-emerald-400"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-white">Data de Nascimento</p>
                                <p class="text-white"> {{ $user->birthdate ? \Carbon\Carbon::parse($user->birthdate)->format('d/m/Y') : 'Não informado' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Emancipation Status -->
                    <div class="bg-emerald-900/30 p-4 rounded-lg border border-emerald-600/30">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-emerald-500/20 flex items-center justify-center">
                                <i class="fas fa-user-graduate text-emerald-400"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-white">Status de Emancipação</p>
                                <p class="text-white">{{ $user->is_emancipated ? 'Sim' : 'Não' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Academic Information -->
                <div class="space-y-6">
                    <h2 class="text-xl font-semibold text-white mb-4">
                        <i class="fas fa-graduation-cap mr-2 text-emerald-300"></i>
                        Informações Acadêmicas
                    </h2>

                    <!-- Shift -->
                    <div class="bg-emerald-900/30 p-4 rounded-lg border border-emerald-600/30">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-emerald-500/20 flex items-center justify-center">
                                <i class="fas fa-clock text-emerald-400"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-white">Turno</p>
                                <div class="flex items-center space-x-2 mt-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300">
                                        <i class="fas fa-sun mr-2"></i>
                                        Matutino
                                    </span>
                                    <span class="text-xs text-white">07:00 - 12:00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="bg-emerald-900/30 p-4 rounded-lg border border-emerald-600/30">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-emerald-500/20 flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-emerald-400"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-white">Endereço</p>
                                <p class="text-white">Rua Exemplo, 123</p>
                                <p class="text-white text-sm">Cidade - Estado</p>
                                <p class="text-white text-sm">CEP: 13000-000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Profile Button -->
                    <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 flex items-center justify-center">
                        <i class="fas fa-edit mr-2"></i>
                        Editar Perfil
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
        <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-lg relative">
            <button id="closeModal" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 text-lg font-bold">&times;</button>
            <h1 class="text-2xl text-center font-bold text-blue-600 mb-4">Atualizar Biometria Facial</h1>
            <h3 class="text-lg font-medium text-gray-900 text-center">Biometria Facial</h3>
            <img id="facialImagePreview" 
                >
            <p id="statusMessage" class="text-gray-700 mb-4">
                
            </p>
            <button id="captureButton" class="bg-green-500 text-center hover:bg-green-600 text-white py-2 px-4 rounded">
                Tirar Foto com a Câmera do dispositivo
            </button>
        </div>
    </div>

<!-- Modal de captura de imagem -->
<div id="captureModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-4 rounded-md w-96">
        <div class="relative">
            <!-- Vídeo de captura -->
            <video id="video" class="rounded w-full mb-4" autoplay></video>
            <!-- Canvas para exibir a imagem capturada -->
            <canvas id="canvas" class="hidden rounded w-full mb-4"></canvas>
            
            <!-- Botões de controle -->
            <div class="flex justify-center space-x-4">
                <button id="snap" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                    Tirar Foto
                </button>
                <button id="retake" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-yellow-300 hidden">
                    Tirar Outra Foto
                </button>
                <button id="save" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-green-300 hidden">
                    Salvar
                </button>
            </div>
        </div>

        <!-- Formulário de envio -->
        <form id="uploadForm" action="{{ route('student.updateImage') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            <input type="file" id="facialImageFile" name="facial_image_file" class="mb-2 hidden">
            <input type="hidden" id="facialImageBase64" name="facial_image_base64">
            <button type="submit" id="uploadButton" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300 hidden">
                Enviar para Análise
            </button>
        </form>

        <!-- Fechar Modal -->
        <button id="closeModal" class="absolute top-2 right-2 text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>


<!-- SCRIPS -->
<script>
    // Toggle profile dropdown
    document.getElementById('profileButton').addEventListener('click', function () {
      const dropdown = document.getElementById('profileDropdown');
      dropdown.classList.toggle('hidden');
    });
    </script>
    <script>
 // Abrir modal de captura
document.getElementById('captureButton').addEventListener('click', () => {
    const captureModal = document.getElementById('captureModal');
    const video = document.getElementById('video');

    // Remover controles e configurar autoplay
    video.removeAttribute('controls');
    video.setAttribute('autoplay', true);
    video.setAttribute('playsinline', true); // Evita tela cheia em dispositivos móveis

    captureModal.classList.remove('hidden');

    // Ativar a câmera
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(error => {
            console.error('Erro ao acessar a câmera:', error);
            Swal.fire('Erro!', 'Não foi possível acessar a câmera. Verifique as permissões.', 'error');
        });
});

// Capturar imagem da câmera
document.getElementById('snap').addEventListener('click', () => {
    const canvas = document.getElementById('canvas');
    const video = document.getElementById('video');
    const saveButton = document.getElementById('save');
    const snapButton = document.getElementById('snap');
    const retakeButton = document.getElementById('retake');

    // Captura a imagem do vídeo e desenha no canvas
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

    // Ocultar o vídeo (desativar câmera)
    const stream = video.srcObject;
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
    video.srcObject = null;
    video.classList.add('hidden');

    // Exibir o botão "Salvar" e "Tirar outra foto"
    saveButton.classList.remove('hidden');
    retakeButton.classList.remove('hidden');
    snapButton.classList.add('hidden');

    canvas.classList.remove('hidden');
});

// Reativar câmera para tirar outra foto
document.getElementById('retake').addEventListener('click', () => {
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const saveButton = document.getElementById('save');
    const snapButton = document.getElementById('snap');
    const retakeButton = document.getElementById('retake');

    // Limpar canvas e ocultar novamente
    const context = canvas.getContext('2d');
    context.clearRect(0, 0, canvas.width, canvas.height);
    canvas.classList.add('hidden');

    // Ocultar botões de salvar e refazer, exibir "Tirar foto"
    saveButton.classList.add('hidden');
    retakeButton.classList.add('hidden');
    snapButton.classList.remove('hidden');

    // Reativar câmera
    video.classList.remove('hidden');
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(error => {
            console.error('Erro ao acessar a câmera:', error);
            Swal.fire('Erro!', 'Não foi possível acessar a câmera. Verifique as permissões.', 'error');
        });
});

// Salvar a imagem capturada em Base64 e enviar o formulário
document.getElementById('save').addEventListener('click', () => {
    const canvas = document.getElementById('canvas');
    const base64Image = canvas.toDataURL('image/png').split(',')[1];

    // Preencher o campo hidden com a imagem em Base64
    const facialImageBase64Input = document.getElementById('facialImageBase64');
    facialImageBase64Input.value = base64Image;

    // Atualizar a visualização da imagem
    const facialImagePreview = document.getElementById('facialImagePreview');
    facialImagePreview.src = `data:image/png;base64,${base64Image}`;

    // Enviar o formulário de upload
    const uploadForm = document.getElementById('uploadForm');
    uploadForm.submit();

    // Fechar modal
    const captureModal = document.getElementById('captureModal');
    captureModal.classList.add('hidden');

    Swal.fire('Sucesso!', 'Imagem capturada e enviada com sucesso!', 'success');
});

// Fechar o modal de captura
document.getElementById('closeModal').addEventListener('click', () => {
    const captureModal = document.getElementById('captureModal');
    const video = document.getElementById('video');
    const stream = video.srcObject;

    if (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
    video.srcObject = null;
    captureModal.classList.add('hidden');
});

    </script>
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
@endsection

