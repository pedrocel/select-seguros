<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento Concluído - SELECT SEGUROS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        neon: '#c5ff00',
                        dark: '#1a1d21',
                        'dark-light': '#2a2d35',
                    }
                }
            }
        }
    </script>
    <style>
      .qr-code-container {
             background-color: white;
             padding: 16px;
             border-radius: 8px;
             width: 200px;
             height: 200px;
             margin: 0 auto;
             display: flex;
             align-items: center;
             justify-content: center;
             overflow: hidden;
         }
         
         .qr-code-container img {
             max-width: 100%;
             max-height: 100%;
             object-fit: contain;
         }
         
         /* PIX code container */
         .pix-code-container {
             background-color: #2A2F35;
             border-radius: 8px;
             padding: 12px;
             margin-top: 16px;
             display: flex;
             align-items: center;
             justify-content: space-between;
         }
         
         .pix-code-text {
             color: #9CA3AF;
             font-size: 14px;
             overflow: hidden;
             text-overflow: ellipsis;
             white-space: nowrap;
             flex: 1;
             margin-right: 8px;
         }
        .qr-code-pix {
            background-image: url("data:image/png;base64,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");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            width: 180px;
            height: 180px;
        }
    </style>
</head>
<body class="bg-[#1a1d21] text-white min-h-screen">
    <div class="container mx-auto px-4 py-6 max-w-5xl">
        <!-- Logo -->
        <div class="mb-12">
            <h1 class="text-3xl font-bold"><span class="text-neon">SELECT</span> SEGUROS</h1>
        </div>

        <!-- Mensagem de Sucesso -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-500 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold mb-2">Obrigado pela sua compra!</h2>
            <p class="text-gray-400">Seu pagamento foi processado com sucesso.</p>
        </div>

        <!-- Detalhes do Pagamento -->
        <div class="bg-[#22252a] rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold mb-6">Detalhes do Pagamento</h3>
            
            <!-- Tabs para métodos de pagamento -->
            <div class="mb-6 border-b border-gray-700">
                <div class="flex">
                    <button id="tab-pix" onclick="showTab('pix')" class="px-4 py-2 border-b-2 border-neon text-neon">PIX</button>
                    <button id="tab-boleto" onclick="showTab('boleto')" class="px-4 py-2 border-b-2 border-transparent">Boleto</button>
                    <button id="tab-cartao" onclick="showTab('cartao')" class="px-4 py-2 border-b-2 border-transparent">Cartão</button>
                </div>
            </div>
            
            <div id="pixSection" class="py-8">
                <div class="qr-code-container">
                   <div class="qr-code-pix"></div>
                </div>
                <p class="text-white text-center my-4">Escaneie o QR Code para pagar</p>
                <div class="pix-code-container">
                   <span class="pix-code-text" id="pixCodeText">00020126580014BR.GOV.BCB.PIX0136a629532e-7693-4846-b028-f142082d7b0752040000530398654041.005802BR5925NOME DA EMPRESA AQUI6008BRASILIA</span>
                   <button id="copyPixCode" class="bg-neon text-black px-3 py-1 rounded-md text-sm font-medium gradient-bg">
                      Copiar
                   </button>
                </div>
                
                <div class="bg-yellow-900/20 border border-yellow-700/30 text-yellow-500 p-3 rounded-lg text-sm mt-4">
                   <p class="font-medium">Importante:</p>
                   <p>O pagamento via PIX é processado instantaneamente. Após o pagamento, você receberá a confirmação por e-mail.</p>
                </div>
            </div>
            
            <!-- Conteúdo Boleto -->
            <div id="content-boleto" class="tab-content hidden">
                <div class="flex flex-col gap-4">
                    <div class="bg-white p-4 rounded-lg">
                        <!-- Código de barras (placeholder) -->
                        <svg class="w-full h-20" viewBox="0 0 400 80">
                            <!-- Simulação de código de barras -->
                            <rect x="10" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="15" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="20" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="25" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="30" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="35" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="42" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="47" y="10" width="4" height="60" fill="black"></rect>
                            <rect x="54" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="58" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="64" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="70" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="75" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="80" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="87" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="92" y="10" width="4" height="60" fill="black"></rect>
                            <rect x="99" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="103" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="109" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="115" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="120" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="125" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="132" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="137" y="10" width="4" height="60" fill="black"></rect>
                            <rect x="144" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="148" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="154" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="160" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="165" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="170" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="177" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="182" y="10" width="4" height="60" fill="black"></rect>
                            <rect x="189" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="193" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="199" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="205" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="210" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="215" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="222" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="227" y="10" width="4" height="60" fill="black"></rect>
                            <rect x="234" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="238" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="244" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="250" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="255" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="260" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="267" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="272" y="10" width="4" height="60" fill="black"></rect>
                            <rect x="279" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="283" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="289" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="295" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="300" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="305" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="312" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="317" y="10" width="4" height="60" fill="black"></rect>
                            <rect x="324" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="328" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="334" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="340" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="345" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="350" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="357" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="362" y="10" width="4" height="60" fill="black"></rect>
                            <rect x="369" y="10" width="1" height="60" fill="black"></rect>
                            <rect x="373" y="10" width="2" height="60" fill="black"></rect>
                            <rect x="379" y="10" width="3" height="60" fill="black"></rect>
                            <rect x="385" y="10" width="2" height="60" fill="black"></rect>
                        </svg>
                    </div>
                    <div class="bg-[#2a2d35] p-3 rounded-lg flex items-center mb-4">
                        <span class="text-sm text-gray-300 truncate flex-1">34191.79001 01043.510047 91020.150008 9 89110000219700</span>
                        <button class="bg-neon text-black px-3 py-1 rounded-md text-sm font-medium ml-2">Copiar</button>
                    </div>
                    <div class="bg-blue-900/20 border border-blue-700/30 text-blue-500 p-3 rounded-lg text-sm">
                        <p class="font-medium">Informações do Boleto:</p>
                        <ul class="list-disc pl-5 mt-1 space-y-1">
                            <li>Valor: R$ 219,70</li>
                            <li>Data de vencimento: 25/03/2025</li>
                            <li>O boleto foi enviado para seu e-mail</li>
                            <li>Após o pagamento, a compensação pode levar até 3 dias úteis</li>
                        </ul>
                    </div>
                    <div class="mt-2">
                        <button class="bg-neon text-black px-4 py-2 rounded-md text-sm font-medium inline-block">Baixar Boleto</button>
                    </div>
                </div>
            </div>
            
            <!-- Conteúdo Cartão -->
            <div id="content-cartao" class="tab-content hidden">
                <div class="flex flex-col gap-4">
                    <div class="bg-green-900/20 border border-green-700/30 text-green-500 p-4 rounded-lg">
                        <div class="flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="font-bold">Pagamento Aprovado</span>
                        </div>
                        <p>Seu pagamento com cartão foi aprovado e processado com sucesso.</p>
                    </div>
                    
                    <div class="bg-[#22252a] border border-gray-700 rounded-lg overflow-hidden">
                        <div class="p-4 border-b border-gray-700">
                            <h4 class="font-medium">Detalhes da Transação</h4>
                        </div>
                        <div class="p-4 space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Cartão</span>
                                <span>•••• •••• •••• 4242</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Titular</span>
                                <span>Pedro Vinicius de Souza Novais</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Bandeira</span>
                                <span>Visa</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Parcelas</span>
                                <span>1x de R$ 219,70</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">ID da Transação</span>
                                <span>TRX123456789</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Data/Hora</span>
                                <span>20/03/2025 17:38</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Resumo da Compra -->
        <div class="bg-[#22252a] rounded-lg p-6">
            <h3 class="text-xl font-semibold mb-4">Resumo da Compra</h3>
            <div class="space-y-3">
                <div class="flex justify-between py-2 border-b border-gray-700">
                    <span>Seguro Mensal</span>
                    <span>R$ 169,90</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-700">
                    <span>Assistência 24h</span>
                    <span>R$ 29,90</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-700">
                    <span>Proteção para Vidros</span>
                    <span>R$ 19,90</span>
                </div>
                <div class="flex justify-between font-bold text-lg pt-2">
                    <span>Total</span>
                    <span>R$ 219,70</span>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar a página com a aba PIX ativa
            showTab('pix');
            
            // Configurar o botão de copiar código PIX
            const copyPixCode = document.getElementById('copyPixCode');
            const pixCodeText = document.getElementById('pixCodeText');
            
            if (copyPixCode && pixCodeText) {
                copyPixCode.addEventListener('click', function() {
                    navigator.clipboard.writeText(pixCodeText.textContent).then(function() {
                        copyPixCode.textContent = 'Copiado!';
                        setTimeout(function() {
                            copyPixCode.textContent = 'Copiar';
                        }, 2000);
                    });
                });
            }
        });
        
        function showTab(tabName) {
            // Esconde todos os conteúdos
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => {
                content.classList.add('hidden');
            });
            
            // Esconde a seção PIX se não for a aba selecionada
            if (tabName !== 'pix') {
                document.getElementById('pixSection').classList.add('hidden');
            } else {
                document.getElementById('pixSection').classList.remove('hidden');
            }
            
            // Remove a classe ativa de todas as abas
            const tabs = document.querySelectorAll('[id^="tab-"]');
            tabs.forEach(tab => {
                tab.classList.remove('border-neon', 'text-neon');
                tab.classList.add('border-transparent');
            });
            
            // Mostra o conteúdo selecionado
            if (tabName !== 'pix') {
                document.getElementById('content-' + tabName).classList.remove('hidden');
            }
            
            // Ativa a aba selecionada
            document.getElementById('tab-' + tabName).classList.remove('border-transparent');
            document.getElementById('tab-' + tabName).classList.add('border-neon', 'text-neon');
        }
    </script>
</body>
</html>