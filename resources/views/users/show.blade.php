<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalhes do Usuário: {{ $user->name }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <div class="border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px">
                    <li class="mr-2">
                        <a href="#dados-pessoais" class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Dados Pessoais</a>
                    </li>
                    @if($user->perfis->contains('id', 7))
                        <li class="mr-2">
                            <a href="#responsaveis" class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Responsáveis</a>
                        </li>
                    @endif
                    @if($user->perfis->contains('id', 6))
                        <li class="mr-2">
                            <a href="#alunos" class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Alunos</a>
                        </li>
                    @endif
                    @if($user->perfis->contains('id', 7))
                    <li class="mr-2">
                        <a href="#documentos" class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Documentos</a>
                    </li>
                    
                    <li class="mr-2">
                        <a href="#notas" class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Notas</a>
                    </li>
                    <li class="mr-2">
                        <a href="#frequencia" class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Frequência</a>
                    </li>
                    <li class="mr-2">
                        <a href="#configuracoes" class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Opções avançadas</a>
                    </li>
                    @endif
                    <li class="mr-2">
                        <a href="#biometria-facial" class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Biometria Facial</a>
                    </li>
                </ul>
            </div>
            @if($user->perfis->contains('id', 7))
                <div id="dados-pessoais" class="tab-content p-4">
                    <div class="flex flex-wrap items-center">
                        <div class="w-full lg:w-1/5 flex flex-col items-center lg:items-start mb-4 lg:mb-0">
                            @if($user->facial_image_base64)
                                <img src="data:image/png;base64,{{ $user->facial_image_base64 }}" alt="Imagem Facial" class="rounded-full w-32 h-32 object-cover mb-4">
                            @else
                                <p class="text-center text-gray-700 dark:text-gray-300">Sem imagem facial</p>
                            @endif
                            <p class="text-gray-700 dark:text-gray-300"><strong>Nome:</strong> {{ $user->name }}</p>
                            <p class="text-gray-700 dark:text-gray-300"><strong>Email:</strong> {{ $user->email }}</p>
                            <button onclick="document.getElementById('biometria-facial-tab').click()" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300 mt-4">
                                @if($user->facial_image_base64)
                                    Atualizar Biometria
                                @else
                                    Adicionar Biometria
                                @endif
                            </button>
                        </div>
                        <!-- <div class="w-full lg:w-4/5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-4">
                                <h4 class="text-lg font-medium text-gray-900 dark:text-gray-200">Média Bimestral</h4>
                                <p class="text-gray-700 dark:text-gray-300">8.5</p>
                                <canvas id="mediaBimestralChart" width="100" height="100"></canvas>
                            </div>
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-4">
                                <h4 class="text-lg font-medium text-gray-900 dark:text-gray-200">Aproveitamento de Presença</h4>
                                <p class="text-gray-700 dark:text-gray-300">95%</p>
                                <canvas id="aproveitamentoPresencaChart" width="100" height="100"></canvas>
                            </div>
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-4">
                                <h4 class="text-lg font-medium text-gray-900 dark:text-gray-200">Dados da Turma</h4>
                                <p class="text-gray-700 dark:text-gray-300">Turma A - 3º Ano</p>
                                <canvas id="dadosTurmaChart" width="100" height="100"></canvas>
                            </div>
                            <div class="rounded-lg shadow p-4
                                @if($user->status == 1)
                                    bg-yellow-100 dark:bg-yellow-700
                                @elseif($user->status == 2)
                                    bg-yellow-100 dark:bg-yellow-700
                                @elseif($user->status == 3)
                                    bg-[rgb(253,255,168)] dark:bg-whiteco
                                @elseif($user->status == 4)
                                    bg-green-100 dark:bg-green-700
                                @endif">
                                <h4 class="text-lg font-medium text-gray-900 dark:text-gray-200">Status</h4>
                                <p class="text-gray-700 dark:text-gray-300">
                                    @if($user->status == 1)
                                        <span class="text-gray-700 dark:text-gray-300">Pendente de enviar o facial e de enviar todos os documentos</span>
                                    @elseif($user->status == 2)
                                        <span class="text-gray-700 dark:text-gray-300">Pendente de enviar os documentos</span>
                                    @elseif($user->status == 3)
                                        <span class="text-gray-700 dark:text-gray-300">Pendente de aprovação</span>
                                        <img src="{{ asset('img/clock.png') }}"  >
                                    @elseif($user->status == 4)
                                        <span class="text-gray-700 dark:text-gray-300">Aprovado</span>
                                    @endif
                                </p>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="mt-4">
                        <canvas id="bimestreChart" width="400" height="200"></canvas>
                    </div> -->
                </div>
            @endif
            @if($user->perfis->contains('id', 7))
                <div id="responsaveis" class="tab-content p-4 hidden">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">Responsáveis</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($user->responsibles as $responsible)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-4 flex flex-col items-center">
                                <div class="bg-blue-100 text-blue-500 p-3 rounded-full mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.879 6.196a9 9 0 01-13.758 11.608z" />
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <p class="text-lg block text-gray-700 dark:text-gray-200 font-medium">{{ $responsible->responsible->name }}</p>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $responsible->responsible->email }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button id="openModalButton" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300 mt-4">
                        Adicionar Responsável
                    </button>
                </div>
            @endif
            @if($user->perfis->contains('id', 6))
                <div id="alunos" class="tab-content p-4 hidden">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">Alunos</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($user->students as $student)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-4 flex flex-col items-center">
                                <div class="bg-blue-100 text-blue-500 p-3 rounded-full mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.879 6.196a9 9 0 01-13.758 11.608z" />
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <p class="text-lg block text-gray-700 dark:text-gray-200 font-medium">{{ $student->student->name }}</p>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $student->student->email }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button id="openStudentModalButton" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300 mt-4">
                        Adicionar Aluno
                    </button>
                    </div>
            @endif
            @if($user->perfis->contains('id', 7))
                <div id="documentos" class="tab-content p-4 hidden">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">Documentos</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($documents as $document)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-4 flex flex-col items-center">
                                <div class="text-center">
                                    <p class="text-lg block text-gray-700 dark:text-gray-200 font-medium">{{ $document['document_type']->name }}</p>
                                        @if($document['status'] === 'not_env')
                                            <form action="{{ route('documents.store', [$document['document_type']->id, $user]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file" class="mb-2">
                                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">Enviar</button>
                                            </form>
                                        @else
                                        <p class="text-gray-600 dark:text-gray-400">
                                            @if($document['status'] == 1)
                                                <span class="text-yellow-500">Aguardando aprovação</span>
                                            @elseif($document['status'] == 2)
                                                <span class="text-green-500">Aprovado</span>
                                            @elseif($document['status'] == 3)
                                                <span class="text-red-500">Reprovado</span>
                                            @endif
                                        </p>
                                        <a href="{{ route('documents.download', $document['id']) }}" class="text-blue-500 hover:underline">Baixar Documento</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div id="notas" class="tab-content p-4 hidden">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">Notas</h3>
                <!-- Conteúdo da aba de notas -->
            </div>
            @if($user->perfis->contains('id', 7))
                <div id="frequencia" class="tab-content p-4 hidden">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">Frequência</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                        @foreach($faceEvents as $event)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-4">
                                <h4 class="text-lg font-medium text-gray-900 dark:text-gray-200">{{ $event->name }}</h4>
                                <p class="text-gray-700 dark:text-gray-300">{{ $event->event }}</p>
                                <p class="text-gray-700 dark:text-gray-300">{{ $event->timestamp }}</p>
                                <button onclick="openModal('{{ $event->id }}')" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300 mt-4">Detalhes</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if($user->perfis->contains('id', 7))
                <div id="biometria-facial" class="tab-content p-4 hidden">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200 text-center">Biometria Facial</h3>
                    @if($user->facial_image_base64)
                        <div class="text-center mb-4">
                            <img src="data:image/png;base64,{{ $user->facial_image_base64 }}" alt="Imagem Facial" class="mx-auto mb-4 rounded-full w-32 h-32 object-cover">
                            <p class="text-gray-700 dark:text-gray-300 mb-4">O usuário já possui uma biometria facial cadastrada.</p>
                            <div class="flex justify-center items-center space-x-4">
                                <button id="uploadButton" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                                    Fazer Upload de Nova Biometria
                                </button>
                                <button id="captureButton" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-green-300">
                                    Tirar Nova Foto com a Câmera
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="text-center mb-4">
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Para garantir a melhor qualidade da sua biometria facial, siga as instruções abaixo:
                                <ul class="list-disc list-inside">
                                    <li>Certifique-se de que o seu rosto está bem iluminado.</li>
                                    <li>Evite usar óculos ou chapéus.</li>
                                    <li>Mantenha uma expressão neutra.</li>
                                    <li>Posicione o rosto no centro da câmera.</li>
                                </ul>
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
                    @endif
                    <div id="uploadSection" class="hidden mt-4">
                        <form id="uploadForm" action="{{ route('user.updateFacialImage', $user->id) }}" method="POST">
                            @csrf
                            <input type="file" id="facialImageFile" name="facial_image_file" class="mb-2">
                            <input type="hidden" id="facialImageBase64" name="facial_image_base64">
                            <button type="button" onclick="uploadImage()" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                                Enviar para Análise
                            </button>
                        </form>
                    </div>
                    <div id="captureModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-4">
                            <div class="text-center">
                                <p class="text-lg block text-gray-700 dark:text-gray-200 font-medium">Capturar Imagem</p>
                                <video id="video" width="320" height="240" autoplay></video>
                                <button id="snap" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300 mt-2">Capturar</button>
                                <canvas id="canvas" width="320" height="240" class="hidden"></canvas>
                                <button id="save" onclick="saveImage()" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-green-300 mt-2 hidden">Salvar</button>
                                <button id="closeModal" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-red-300 mt-2">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if($user->perfis->contains('id', 7))
            <div id="configuracoes" class="tab-content p-4 hidden">
    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200 text-center">Opções Avançadas</h3>

    @if($user->facial_image_base64 !== null) <!-- Verifica se a imagem facial existe -->
        <div class="text-center mt-4">
        <div class="mb-4">
                @if($user->status == 4)
                    <p class="text-green-600 font-medium">Imagem facial aprovada</p>
                @elseif($user->status == 3)
                    <p class="text-red-600 font-medium">Imagem facial reprovada</p>
                @else
                    <p class="text-yellow-600 font-medium">Imagem facial aguardando análise</p>
                @endif
            </div>
                <form action="{{ route('facial.reprove', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg">Reprovar Facial</button>
                </form>
                <form action="{{ route('facial.aprove', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg">Aprovar Facial</button>
                </form>
        </div>
    @endif
</div>

            @endif
        </div>
    </div>

    <!-- Modal para adicionar responsável -->
<div id="userModal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-lg">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">Adicionar Responsável</h3>
            <button id="closeUserModalButton" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form action="{{ route('admin.users.addResponsible', $user) }}" method="POST">
            @csrf
            <!-- Form fields -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                    Salvar
                </button>
                <button type="button" id="cancelUserModalButton" class="ml-4 text-gray-600 dark:text-gray-400 hover:underline">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

<div id="studentModal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black bg-opacity-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-lg">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">Adicionar Aluno</h3>
                <button id="closeStudentModalButton" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="{{ route('admin.users.addStudent', $user) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-200 font-medium">Nome</label>
                    <input type="text" name="name" id="name" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 dark:text-gray-200 font-medium">Email</label>
                    <input type="email" name="email" id="email" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 dark:text-gray-200 font-medium">Senha</label>
                    <input type="password" name="password" id="password" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 dark:text-gray-200 font-medium">Confirme a Senha</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="profile_id" class="block text-gray-700 dark:text-gray-200 font-medium">Perfil</label>
                    <select name="profile_id" id="profile_id" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" required>
                        @foreach($profiles as $profile)
                            <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                        @endforeach
                    </select>
                    @error('profile_id')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                        Salvar
                    </button>
                    <button type="button" id="cancelStudentModalButton" class="ml-4 text-gray-600 dark:text-gray-400 hover:underline">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200" id="modalTitle"></h3>
                <div class="mt-2">
                    <p class="text-sm text-gray-500 dark:text-gray-300" id="modalContent"></p>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="closeModalButton" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    const faceEvents = [
        { id: 1, name: 'Evento 1', event: 'face_detected', timestamp: '2025-01-28T13:14:40Z', user_id: 1, external_id: 'external123', organization_id: 1, group_id: 1, data: { additional_info: 'some info' } },
        { id: 2, name: 'Evento 2', event: 'face_detected', timestamp: '2025-01-28T13:14:40Z', user_id: 1, external_id: 'external123', organization_id: 1, group_id: 1, data: { additional_info: 'some info' } },
        { id: 3, name: 'Evento 3', event: 'face_detected', timestamp: '2025-01-28T13:14:40Z', user_id: 1, external_id: 'external123', organization_id: 1, group_id: 1, data: { additional_info: 'some info' } },
        { id: 4, name: 'Evento 4', event: 'face_detected', timestamp: '2025-01-28T13:14:40Z', user_id: 1, external_id: 'external123', organization_id: 1, group_id: 1, data: { additional_info: 'some info' } },
        { id: 5, name: 'Evento 5', event: 'face_detected', timestamp: '2025-01-28T13:14:40Z', user_id: 1, external_id: 'external123', organization_id: 1, group_id: 1, data: { additional_info: 'some info' } },
        { id: 6, name: 'Evento 6', event: 'face_detected', timestamp: '2025-01-28T13:14:40Z', user_id: 1, external_id: 'external123', organization_id: 1, group_id: 1, data: { additional_info: 'some info' } },
        { id: 7, name: 'Evento 7', event: 'face_detected', timestamp: '2025-01-28T13:14:40Z', user_id: 1, external_id: 'external123', organization_id: 1, group_id: 1, data: { additional_info: 'some info' } },
        { id: 8, name: 'Evento 8', event: 'face_detected', timestamp: '2025-01-28T13:14:40Z', user_id: 1, external_id: 'external123', organization_id: 1, group_id: 1, data: { additional_info: 'some info' } },
        { id: 9, name: 'Evento 9', event: 'face_detected', timestamp: '2025-01-28T13:14:40Z', user_id: 1, external_id: 'external123', organization_id: 1, group_id: 1, data: { additional_info: 'some info' } },
        { id: 10, name: 'Evento 10', event: 'face_detected', timestamp: '2025-01-28T13:14:40Z', user_id: 1, external_id: 'external123', organization_id: 1, group_id: 1, data: { additional_info: 'some info' } }
    ];

    function openModal(eventId) {
        const event = faceEvents.find(e => e.id === eventId);
        document.getElementById('modalTitle').innerText = event.name;
        document.getElementById('modalContent').innerHTML = `
            <p><strong>Evento:</strong> ${event.event}</p>
            <p><strong>Timestamp:</strong> ${event.timestamp}</p>
            <p><strong>User ID:</strong> ${event.user_id}</p>
            <p><strong>External ID:</strong> ${event.external_id}</p>
            <p><strong>Group ID:</strong> ${event.group_id}</p>
            <p><strong>Organization ID:</strong> ${event.organization_id}</p>
            <p><strong>Data:</strong> ${JSON.stringify(event.data)}</p>
        `;
        document.getElementById('detailsModal').classList.remove('hidden');
    }

    document.getElementById('closeModalButton').addEventListener('click', function() {
        document.getElementById('detailsModal').classList.add('hidden');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const openUserModalButton = document.getElementById('openModalButton');
        const closeUserModalButton = document.getElementById('closeUserModalButton');
        const cancelUserModalButton = document.getElementById('cancelUserModalButton');
        const userModal = document.getElementById('userModal');

        const openStudentModalButton = document.getElementById('openStudentModalButton');
        const closeStudentModalButton = document.getElementById('closeStudentModalButton');
        const cancelStudentModalButton = document.getElementById('cancelStudentModalButton');
        const studentModal = document.getElementById('studentModal');

        if (openUserModalButton) {
            openUserModalButton.addEventListener('click', function () {
                userModal.classList.remove('hidden');
            });
        }

        if (closeUserModalButton) {
            closeUserModalButton.addEventListener('click', function () {
                userModal.classList.add('hidden');
            });
        }

        if (cancelUserModalButton) {
            cancelUserModalButton.addEventListener('click', function () {
                userModal.classList.add('hidden');
            });
        }

        if (openStudentModalButton) {
            openStudentModalButton.addEventListener('click', function () {
                studentModal.classList.remove('hidden');
            });
        }

        if (closeStudentModalButton) {
            closeStudentModalButton.addEventListener('click', function () {
                studentModal.classList.add('hidden');
            });
        }

        if (cancelStudentModalButton) {
            cancelStudentModalButton.addEventListener('click', function () {
                studentModal.classList.add('hidden');
            });
        }

        // Fechar o modal ao clicar fora dele
        window.addEventListener('click', function (event) {
            if (event.target === userModal) {
                userModal.classList.add('hidden');
            }
            if (event.target === studentModal) {
                studentModal.classList.add('hidden');
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('bimestreChart').getContext('2d');
        const bimestreChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['1º Bimestre', '2º Bimestre', '3º Bimestre', '4º Bimestre'],
                datasets: [{
                    label: 'Média Geral',
                    data: [7.5, 8.0, 8.5, 9.0], // Dados fictícios
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(54, 162, 235, 1)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: getComputedStyle(document.documentElement).getPropertyValue('--text-color') || 'rgb(0, 0, 0)' // Cor dos ticks no modo claro e escuro
                        }
                    },
                    x: {
                        ticks: {
                            color: getComputedStyle(document.documentElement).getPropertyValue('--text-color') || 'rgb(0, 0, 0)' // Cor dos ticks no modo claro e escuro
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: getComputedStyle(document.documentElement).getPropertyValue('--text-color') || 'rgb(0, 0, 0)' // Cor das legendas no modo claro e escuro
                        }
                    }
                }
            }
        });

        const mediaBimestralCtx = document.getElementById('mediaBimestralChart').getContext('2d');
        const mediaBimestralChart = new Chart(mediaBimestralCtx, {
            type: 'doughnut',
            data: {
                labels: ['Média', 'Restante'],
                datasets: [{
                    data: [85, 15],
                    backgroundColor: ['rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 0.2)'],
                    borderWidth: 1
                }]
            },
            options: {
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        const aproveitamentoPresencaCtx = document.getElementById('aproveitamentoPresencaChart').getContext('2d');
        const aproveitamentoPresencaChart = new Chart(aproveitamentoPresencaCtx, {
            type: 'doughnut',
            data: {
                labels: ['Presença', 'Faltas'],
                datasets: [{
                    data: [95, 5],
                    backgroundColor: ['rgba(75, 192, 192, 1)', 'rgba(75, 192, 192, 0.2)'],
                    borderWidth: 1
                }]
            },
            options: {
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        const dadosTurmaCtx = document.getElementById('dadosTurmaChart').getContext('2d');
        const dadosTurmaChart = new Chart(dadosTurmaCtx, {
            type: 'doughnut',
            data: {
                labels: ['Turma A', 'Outras'],
                datasets: [{
                    data: [70, 30],
                    backgroundColor: ['rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 0.2)'],
                    borderWidth: 1
                }]
            },
            options: {
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        const statusCtx = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Aprovado', 'Pendente'],
                datasets: [{
                    data: [user.status == 4 ? 100 : 0, user.status != 4 ? 100 : 0],
                    backgroundColor: [user.status == 4 ? 'rgba(75, 192, 192, 1)' : 'rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 0.2)'],
                    borderWidth: 1
                }]
            },
            options: {
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });

    document.getElementById('uploadButton').addEventListener('click', function() {
        document.getElementById('uploadSection').classList.remove('hidden');
        document.getElementById('captureModal').classList.add('hidden');
    });

    document.getElementById('captureButton').addEventListener('click', function() {
        document.getElementById('captureModal').classList.remove('hidden');
        document.getElementById('uploadSection').classList.add('hidden');
    });

    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('captureModal').classList.add('hidden');
    });

    // Função para capturar imagem da câmera
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const snap = document.getElementById('snap');
    const save = document.getElementById('save');

    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(err => {
            console.error("Erro ao acessar a câmera: ", err);
        });

    snap.addEventListener('click', () => {
        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, 320, 240);
        canvas.classList.remove('hidden');
        save.classList.remove('hidden');
    });

    function saveImage() {
        const dataURL = canvas.toDataURL('image/png');
        document.getElementById('facialImageBase64').value = dataURL;
        document.getElementById('uploadForm').submit();
    }

    // Função para fazer upload da imagem
    function uploadImage() {
        const fileInput = document.getElementById('facialImageFile');
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.onloadend = function() {
            const base64String = reader.result.replace('data:', '').replace(/^.+,/, '');
            document.getElementById('facialImageBase64').value = base64String;
            document.getElementById('uploadForm').submit();
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>