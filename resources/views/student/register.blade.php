<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Sistema de Reconhecimento Facial</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-[#000] min-h-screen py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white/10 backdrop-blur-lg rounded-xl shadow-2xl overflow-hidden">
            <!-- Header with Icon -->
            <div class="text-center py-6 bg-emerald-900/30">
                <div class="inline-block p-4 rounded-full bg-emerald-500/20 mb-4 relative">
                    <i class="fas fa-user-plus text-3xl text-emerald-400"></i>
                    <div class="absolute -top-1 -right-1 w-3 h-3 bg-emerald-400 rounded-full"></div>
                    <div class="absolute -bottom-1 -left-1 w-3 h-3 bg-emerald-400 rounded-full"></div>
                </div>
                <h2 class="text-2xl font-bold text-white">{{$organization->name}}</h2>
                <h3 class="text-xl font-semibold text-emerald-200">Cadastro de Aluno</h3>
            </div>

            <!-- Form Container -->
            <div class="p-6">
                <form id="responsibleForm" action="{{ route('pre-register-student.register') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="id_organization" id="id_organization" value="{{ $organization->id }}">
                    <input type="hidden" name="cpf" id="cpf" value="{{ $student->cpf }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nome do Aluno -->
                        <div>
                            <label for="student_name" class="block text-sm font-medium text-emerald-200">Nome do Aluno</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-emerald-400"></i>
                                </div>
                                <input type="text" name="student_name" id="student_name" required 
                                    class="block w-full pl-10 pr-3 py-2 border border-emerald-600 rounded-lg
                                    bg-emerald-900/30 text-white placeholder-emerald-400/70
                                    focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            </div>
                        </div>

                        <!-- E-mail -->
                        <div>
                            <label for="student_email" class="block text-sm font-medium text-emerald-200">E-mail</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-emerald-400"></i>
                                </div>
                                <input type="email" name="student_email" id="student_email" required 
                                    class="block w-full pl-10 pr-3 py-2 border border-emerald-600 rounded-lg
                                    bg-emerald-900/30 text-white placeholder-emerald-400/70
                                    focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            </div>
                        </div>

                        <!-- Senha -->
                        <div>
                            <label for="student_password" class="block text-sm font-medium text-emerald-200">Senha</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-emerald-400"></i>
                                </div>
                                <input type="password" name="student_password" id="student_password" required 
                                    class="block w-full pl-10 pr-3 py-2 border border-emerald-600 rounded-lg
                                    bg-emerald-900/30 text-white placeholder-emerald-400/70
                                    focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div>
                            <label for="student_whatsapp" class="block text-sm font-medium text-emerald-200">WhatsApp</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fab fa-whatsapp text-emerald-400"></i>
                                </div>
                                <input type="text" name="student_whatsapp" id="student_whatsapp" required 
                                    class="block w-full pl-10 pr-3 py-2 border border-emerald-600 rounded-lg
                                    bg-emerald-900/30 text-white placeholder-emerald-400/70
                                    focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                    placeholder="(99) 99999-9999">
                            </div>
                        </div>

                        <!-- CPF -->
                        <div>
                            <label for="cpf" class="block text-sm font-medium text-emerald-200">CPF</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-id-card text-emerald-400"></i>
                                </div>
                                <input type="text" name="cpf" id="cpf" disabled value="{{ old('cpf', $student->cpf) }}" required 
                                    class="block w-full pl-10 pr-3 py-2 border border-emerald-600 rounded-lg
                                    bg-emerald-900/30 text-white placeholder-emerald-400/70
                                    focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            </div>
                        </div>

                        <!-- Data de Nascimento -->
                        <div>
                            <label for="student_birthdate" class="block text-sm font-medium text-emerald-200">Data de Nascimento</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar text-emerald-400"></i>
                                </div>
                                <input type="date" name="student_birthdate" id="student_birthdate" required 
                                    class="block w-full pl-10 pr-3 py-2 border border-emerald-600 rounded-lg
                                    bg-emerald-900/30 text-white placeholder-emerald-400/70
                                    focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            </div>
                        </div>

                        <!-- CEP -->
                        <div>
                            <label for="student_cep" class="block text-sm font-medium text-emerald-200">CEP</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-map-marker-alt text-emerald-400"></i>
                                </div>
                                <input type="text" name="student_cep" id="student_cep" required 
                                    class="block w-full pl-10 pr-3 py-2 border border-emerald-600 rounded-lg
                                    bg-emerald-900/30 text-white placeholder-emerald-400/70
                                    focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                    placeholder="00000-000" onblur="fetchAddress('student')">
                            </div>
                        </div>

                        <!-- Endereço -->
                        <div class="md:col-span-2">
                            <label for="student_address" class="block text-sm font-medium text-emerald-200">Endereço</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-home text-emerald-400"></i>
                                </div>
                                <input type="text" name="student_address" id="student_address" required 
                                    class="block w-full pl-10 pr-3 py-2 border border-emerald-600 rounded-lg
                                    bg-emerald-900/30 text-white placeholder-emerald-400/70
                                    focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                    placeholder="Logradouro">
                            </div>
                        </div>

                        <!-- Cidade -->
                        <div>
                            <label for="student_city" class="block text-sm font-medium text-emerald-200">Cidade</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-city text-emerald-400"></i>
                                </div>
                                <input type="text" name="student_city" id="student_city" required 
                                    class="block w-full pl-10 pr-3 py-2 border border-emerald-600 rounded-lg
                                    bg-emerald-900/30 text-white placeholder-emerald-400/70
                                    focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            </div>
                        </div>

                        <!-- Estado -->
                        <div>
                            <label for="student_state" class="block text-sm font-medium text-emerald-200">Estado</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-map text-emerald-400"></i>
                                </div>
                                <input type="text" name="student_state" id="student_state" required 
                                    class="block w-full pl-10 pr-3 py-2 border border-emerald-600 rounded-lg
                                    bg-emerald-900/30 text-white placeholder-emerald-400/70
                                    focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            </div>
                        </div>

                        <!-- Número -->
                        <div>
                            <label for="student_number" class="block text-sm font-medium text-emerald-200">Número</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-hashtag text-emerald-400"></i>
                                </div>
                                <input type="text" name="student_number" id="student_number" required 
                                    class="block w-full pl-10 pr-3 py-2 border border-emerald-600 rounded-lg
                                    bg-emerald-900/30 text-white placeholder-emerald-400/70
                                    focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            </div>
                        </div>

                        <!-- Turno -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-emerald-200 mb-4">Turno</label>
                            <div class="grid grid-cols-3 gap-2 md:gap-4">
                                <!-- Matutino -->
                                <label class="cursor-pointer">
                                    <input type="radio" name="turno" value="matutino" class="hidden peer" required>
                                    <div class="border-2 border-emerald-600 rounded-lg p-2 md:p-4 text-center transition-all duration-300 hover:bg-emerald-600/20
                                        peer-checked:bg-emerald-600 peer-checked:border-emerald-400 group h-full">
                                        <i class="fas fa-sun text-xl md:text-3xl text-emerald-400 mb-1 md:mb-2 group-hover:text-emerald-300"></i>
                                        <p class="text-emerald-200 font-medium text-sm md:text-base">Matutino</p>
                                        <p class="text-emerald-400/70 text-xs md:text-sm hidden md:block">07:00 - 12:00</p>
                                    </div>
                                </label>

                                <!-- Vespertino -->
                                <label class="cursor-pointer">
                                    <input type="radio" name="turno" value="vespertino" class="hidden peer" required>
                                    <div class="border-2 border-emerald-600 rounded-lg p-2 md:p-4 text-center transition-all duration-300 hover:bg-emerald-600/20
                                        peer-checked:bg-emerald-600 peer-checked:border-emerald-400 group h-full">
                                        <i class="fas fa-cloud-sun text-xl md:text-3xl text-emerald-400 mb-1 md:mb-2 group-hover:text-emerald-300"></i>
                                        <p class="text-emerald-200 font-medium text-sm md:text-base">Vespertino</p>
                                        <p class="text-emerald-400/70 text-xs md:text-sm hidden md:block">13:00 - 18:00</p>
                                    </div>
                                </label>

                                <!-- Noturno -->
                                <label class="cursor-pointer">
                                    <input type="radio" name="turno" value="noturno" class="hidden peer" required>
                                    <div class="border-2 border-emerald-600 rounded-lg p-2 md:p-4 text-center transition-all duration-300 hover:bg-emerald-600/20
                                        peer-checked:bg-emerald-600 peer-checked:border-emerald-400 group h-full">
                                        <i class="fas fa-moon text-xl md:text-3xl text-emerald-400 mb-1 md:mb-2 group-hover:text-emerald-300"></i>
                                        <p class="text-emerald-200 font-medium text-sm md:text-base">Noturno</p>
                                        <p class="text-emerald-400/70 text-xs md:text-sm hidden md:block">19:00 - 22:30</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Emancipado -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-emerald-200 mb-2">Emancipado</label>
                            <div class="flex space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="emancipated" value="yes" 
                                        class="form-radio text-emerald-500 focus:ring-emerald-500 border-emerald-600 bg-emerald-900/30">
                                    <span class="ml-2 text-emerald-200">Sim</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="emancipated" value="no" checked 
                                        class="form-radio text-emerald-500 focus:ring-emerald-500 border-emerald-600 bg-emerald-900/30">
                                    <span class="ml-2 text-emerald-200">Não</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <input type="checkbox" id="termos" class="mr-2" onchange="toggleModal()">
                        <label for="termos" class="text-gray-800 dark:text-gray-200 cursor-pointer">
                            Eu aceito os <span class="text-emerald-600 underline">termos de uso</span>
                        </label>
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button id="submitBtn" type="submit" disabled
                            class="w-full flex items-center justify-center px-4 py-3 border border-transparent
                            rounded-lg shadow-sm text-white bg-gray-400 cursor-not-allowed
                            transition duration-300 text-sm font-semibold">
                            <i class="fas fa-user-plus mr-2"></i>
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Termos de Uso</h2>
        <div class="mt-4 max-h-80 overflow-y-auto p-2 bg-gray-100 dark:bg-gray-700 rounded">
            <p class="text-sm text-gray-700 dark:text-gray-300"><strong>Última atualização:</strong>21/02/2025</p>
            <p class="text-sm text-gray-700 dark:text-gray-300"><strong>PACSAFE - CNPJ: 19.085.289/0001-17</strong></p>
            <p class="text-sm text-gray-700 dark:text-gray-300">Bem-vindo ao <strong>PACSAFE</strong>, um sistema de reconhecimento facial desenvolvido para escolas, que permite o cadastramento dos alunos e responsáveis, incluindo dados pessoais e fotos para identificação.</p>
            
            <h3 class="mt-4 font-semibold text-gray-800 dark:text-gray-200">1. COLETA DE DADOS</h3>
            <p class="text-sm text-gray-700 dark:text-gray-300">Para fornecer nossos serviços, coletamos os seguintes dados:</p>
            <ul class="list-disc ml-5">
                <li class="text-sm text-gray-700 dark:text-gray-300"><strong>Dados do responsável:</strong> Nome completo, CPF, e-mail, telefone.</li>
                <li class="text-sm text-gray-700 dark:text-gray-300"><strong>Dados do aluno:</strong> Nome completo, data de nascimento, série escolar, turma.</li>
                <li class="text-sm text-gray-700 dark:text-gray-300"><strong>Dados biométricos:</strong> Foto do rosto do aluno para identificação via reconhecimento facial.</li>
                <li class="text-sm text-gray-700 dark:text-gray-300"><strong>Dados de acesso:</strong> Registros de login, horários de entrada e saída na escola.</li>
            </ul>

            <h3 class="mt-4 font-semibold text-gray-800 dark:text-gray-200">2. FINALIDADE DO TRATAMENTO DE DADOS</h3>
            <p class="text-sm text-gray-700 dark:text-gray-300">Os dados coletados serão utilizados exclusivamente para:</p>
            <ul class="list-disc ml-5">
                <li class="text-sm text-gray-700 dark:text-gray-300">Identificação e controle de acesso dos alunos às dependências da escola.</li>
                <li class="text-sm text-gray-700 dark:text-gray-300">Garantia da segurança escolar, evitando acessos não autorizados.</li>
                <li class="text-sm text-gray-700 dark:text-gray-300">Comunicação com os responsáveis, enviando alertas sobre a entrada e saída dos alunos.</li>
                <li class="text-sm text-gray-700 dark:text-gray-300">Cumprimento de obrigações legais ou solicitações de autoridades.</li>
            </ul>

            <h3 class="mt-4 font-semibold text-gray-800 dark:text-gray-200">3. COMPARTILHAMENTO DE DADOS</h3>
            <p class="text-sm text-gray-700 dark:text-gray-300">Os dados coletados <strong>não serão vendidos ou compartilhados</strong> com terceiros, exceto:</p>
            <ul class="list-disc ml-5">
                <li class="text-sm text-gray-700 dark:text-gray-300">Com a escola contratante, para a gestão acadêmica e segurança.</li>
                <li class="text-sm text-gray-700 dark:text-gray-300">Com órgãos públicos, caso seja necessário para cumprimento de obrigações legais.</li>
                <li class="text-sm text-gray-700 dark:text-gray-300">Com prestadores de serviço, exclusivamente para manutenção e suporte técnico do PACSAFE.</li>
            </ul>

            <h3 class="mt-4 font-semibold text-gray-800 dark:text-gray-200">4. ARMAZENAMENTO E SEGURANÇA</h3>
            <p class="text-sm text-gray-700 dark:text-gray-300">Adotamos medidas técnicas e organizacionais para proteger os dados, incluindo:</p>
            <ul class="list-disc ml-5">
                <li class="text-sm text-gray-700 dark:text-gray-300">Criptografia para armazenamento seguro das informações.</li>
                <li class="text-sm text-gray-700 dark:text-gray-300">Controle de acesso restrito apenas a usuários autorizados.</li>
                <li class="text-sm text-gray-700 dark:text-gray-300">Monitoramento e auditoria para prevenir acessos indevidos.</li>
            </ul>

            <h3 class="mt-4 font-semibold text-gray-800 dark:text-gray-200">5. DIREITOS DO TITULAR DE DADOS (LGPD)</h3>
            <p class="text-sm text-gray-700 dark:text-gray-300">Conforme a LGPD, o titular (ou responsável legal) pode solicitar:</p>
            <ul class="list-disc ml-5">
                <li class="text-sm text-gray-700 dark:text-gray-300">Confirmação de que seus dados estão sendo processados.</li>
                <li class="text-sm text-gray-700 dark:text-gray-300">Correção de dados incorretos ou desatualizados.</li>
                <li class="text-sm text-gray-700 dark:text-gray-300">Exclusão dos dados, quando permitido por lei.</li>
            </ul>
            <p class="text-sm text-gray-700 dark:text-gray-300">Para exercer seus direitos, entre em contato pelo e-mail <strong>[seuemail@pacsafe.com]</strong>.</p>
        </div>

            </p>
        <div class="mt-4 flex justify-end">
            <button onclick="closeModal()" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">
                Aceitar e Fechar
            </button>
        </div>
    </div>
</div>
    <script>
        function toggleModal() {
            const checkbox = document.getElementById('termos');
            const modal = document.getElementById('modal');

            if (checkbox.checked) {
                modal.classList.remove('hidden'); // Abre a modal
            }
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.add('hidden'); // Fecha a modal

            // Habilita o botão de envio
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = false;
            submitBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
            submitBtn.classList.add('bg-emerald-600', 'hover:bg-emerald-700');
        }
    </script>
    <!-- Scripts -->
    <script>
        // Máscara para WhatsApp
        document.getElementById('student_whatsapp').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 11) value = value.slice(0, 11);
            
            if (value.length > 2) value = '(' + value.slice(0,2) + ') ' + value.slice(2);
            if (value.length > 9) value = value.slice(0,10) + '-' + value.slice(10);
            
            e.target.value = value;
        });

        // Máscara para CEP
        document.getElementById('student_cep').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 8) value = value.slice(0, 8);
            
            if (value.length > 5) value = value.slice(0,5) + '-' + value.slice(5);
            
            e.target.value = value;
        });

        // Busca endereço pelo CEP
        function fetchAddress(type) {
            const cep = document.getElementById(type + "_cep").value.replace(/\D/g, '');
            if (cep.length === 8) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            document.getElementById(type + "_address").value = data.logradouro;
                            document.getElementById(type + "_city").value = data.localidade;
                            document.getElementById(type + "_state").value = data.uf;
                        }
                    });
            }
        }

        // Highlight selected turno card
        document.querySelectorAll('input[name="turno"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // Remove highlight from all cards
                document.querySelectorAll('input[name="turno"]').forEach(r => {
                    r.nextElementSibling.classList.remove('bg-emerald-600', 'border-emerald-400');
                });
                
                // Add highlight to selected card
                if (this.checked) {
                    this.nextElementSibling.classList.add('bg-emerald-600', 'border-emerald-400');
                }
            });
        });
    </script>
</body>
</html>