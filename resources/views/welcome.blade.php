<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bummp - Impulsione Suas Vendas Digitais</title>
    <style>
        /* Animação suave para o card */
        .animated-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .animated-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        @keyframes fade-in-down {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-down {
            animation: fade-in-down 0.5s ease-out;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-900 font-sans">

    <!-- Header -->
    <header class="bg-gradient-to-br from-[#D350F2] to-[#AB66FF]">
        <div class="container mx-auto flex justify-between items-center p-6">
            <h1 class="text-2xl font-bold text-white">Bummp</h1>
            <nav>
                <ul class="flex space-x-4 text-lg text-white">
                    <li><a href="#taxas" class="hover:underline">Taxas</a></li>
                    <li><a href="#features" class="hover:underline">Funcionalidades</a></li>
                    <li><a href="#benefits" class="hover:underline">Vantagens</a></li>
                    <li><a href="#faq" class="hover:underline">FAQ</a></li>
                    <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                    <li><a href="{{ route('register') }}" class="bg-white text-purple-800 px-4 py-2 rounded hover:bg-purple-50">Cadastrar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-16">
        <div class="container mx-auto flex flex-col-reverse md:flex-row items-center justify-between px-16">
            <!-- Texto -->
            <div class="md:w-1/2 text-left animate-fade-in-down">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Venda com Mais Liberdade</h2>
                <p class="text-lg text-gray-700 mb-6">O Bummp é a plataforma perfeita para você vender produtos digitais de forma simples, rápida e segura. Cadastre-se e comece a vender agora mesmo!</p>
                <a href="#" class="bg-[#D350F2] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#AB66FF]">Quero Começar</a>
            </div>
            <!-- Imagem -->
            <div class="md:w-1/2 flex justify-center">
                <img src="/img/foguete.png" alt="Imagem ilustrativa" class="w-full max-w-md md:max-w-lg">
            </div>
        </div>
    </section>

    <!-- New Section: Simples, confiável, lucrativa, para pessoas ambiciosas -->
    <section class="bg-gradient-to-br from-[#D350F2] to-[#AB66FF] py-16 text-center">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold text-white">Simples, Confiável, Lucrativa, para Pessoas Ambiciosas</h3>
            <p class="mt-4 text-lg text-white">Crie produtos e serviços digitais como e-books, cursos online, mentorias — e venda com a menor taxa do mercado.</p>
            <a href="#register" class="mt-6 inline-block bg-white text-purple-800 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">Cadastre-se Agora</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="bg-white py-16">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold text-gray-900">Por que Escolher o Bummp?</h3>
            <p class="mt-4 text-gray-700">Funcionalidades projetadas para o sucesso do seu negócio.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
                <div class="bg-[#D350F2] p-6 rounded-lg text-white">
                    <div class="text-white text-4xl mb-4">💳</div>
                    <h4 class="text-xl font-semibold">Pagamentos Seguros</h4>
                    <p class="mt-2">Tenha tranquilidade em todas as transações.</p>
                </div>
                <div class="bg-[#D350F2] p-6 rounded-lg text-white">
                    <div class="text-white text-4xl mb-4">⏱️</div>
                    <h4 class="text-xl font-semibold">Processamento Rápido</h4>
                    <p class="mt-2">Receba seus pagamentos rapidamente.</p>
                </div>
                <div class="bg-[#D350F2] p-6 rounded-lg text-white">
                    <div class="text-white text-4xl mb-4">📈</div>
                    <h4 class="text-xl font-semibold">Dashboard Intuitiva</h4>
                    <p class="mt-2">Gerencie vendas com clareza e eficiência.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- New Section: Área de Membros Premium -->
    <section class="bg-gradient-to-br from-[#D350F2] to-[#AB66FF] py-16 text-center">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold text-white">Área de Membros Premium</h3>
            <p class="mt-4 text-lg text-white">Ofereça uma experiência verdadeiramente exclusiva e atraente através das nossas ferramentas de personalização.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
                <div class="bg-white p-6 rounded-lg text-gray-900">
                    <h4 class="text-xl font-semibold">Conteúdo e Comunidade Juntos</h4>
                    <p class="mt-2">Crie assinaturas para conteúdos exclusivos.</p>
                </div>
                <div class="bg-white p-6 rounded-lg text-gray-900">
                    <h4 class="text-xl font-semibold">Gestão Ativa com Dados</h4>
                    <p class="mt-2">Utilize dados e inteligência para uma gestão eficiente.</p>
                </div>
                <div class="bg-white p-6 rounded-lg text-gray-900">
                    <h4 class="text-xl font-semibold">Customize o que você Precisa</h4>
                    <p class="mt-2">Adapte a plataforma às suas necessidades.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="py-16 text-center">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold text-gray-900">Sem Complicações, Apenas Resultados</h3>
            <p class="mt-4 text-gray-700">Comissões transparentes e pagamentos simplificados.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
                <div class="bg-[#D350F2] p-6 rounded-lg text-white">
                    <h4 class="text-2xl font-semibold">Pix</h4>
                    <p class="mt-2">D+0</p>
                </div>
                <div class="bg-[#D350F2] p-6 rounded-lg text-white">
                    <h4 class="text-2xl font-semibold">Boleto</h4>
                    <p class="mt-2">D+1</p>
                </div>
                <div class="bg-[#D350F2] p-6 rounded-lg text-white">
                    <h4 class="text-2xl font-semibold">Cartão</h4>
                    <p class="mt-2">D+7</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Payment Methods & Recovery Section -->
    <section class="bg-gradient-to-br from-[#D350F2] to-[#AB66FF] py-16 text-center">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold text-white">Pagamentos Recorrentes Facilitados</h3>
            <p class="mt-4 text-lg text-white">Aumente suas vendas personalizando planos com diversas frequências, tudo para atender às necessidades específicas dos seus clientes.</p>
            <a href="#create-subscription" class="mt-6 inline-block bg-white text-purple-800 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">Explore Agora</a>
        </div>
    </section>

     <!-- FAQ Section -->
     <section id="faq" class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold text-gray-900 text-center">Perguntas Frequentes</h3>
            <div class="mt-10">
                <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                    <h4 class="text-xl font-semibold">Como funciona a plataforma?</h4>
                    <p class="mt-2 text-gray-700">O Bummp permite criar, gerenciar e vender produtos digitais com facilidade, oferecendo uma experiência intuitiva e taxas competitivas.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                    <h4 class="text-xl font-semibold">Quais são as taxas de transação?</h4>
                    <p class="mt-2 text-gray-700">Trabalhamos com taxas justas, adaptadas às necessidades de criadores e empreendedores digitais.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                    <h4 class="text-xl font-semibold">Como posso receber suporte?</h4>
                    <p class="mt-2 text-gray-700">Você pode entrar em contato com nossa equipe de suporte 24/7 através do painel da plataforma.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-[#D350F2] to-[#AB66FF] py-10 text-white">
        <div class="container mx-auto text-center">
            <h4 class="text-lg font-semibold">Bummp - Impulsionando Suas Vendas Digitais</h4>
            <p class="mt-4">© 2025 Bummp. Todos os direitos reservados.</p>
            <div class="mt-6 flex justify-center space-x-4">
                <a href="#" class="hover:underline">Termos de Serviço</a>
                <a href="#" class="hover:underline">Política de Privacidade</a>
                <a href="#" class="hover:underline">Contato</a>
            </div>
        </div>
    </footer>
</body>
</html>
