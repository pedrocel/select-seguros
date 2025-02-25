<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cotação - SELECT SEGUROS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'select-cream': '#F5F2ED',
            'select-blue': '#0000FF',
            'select-lime': '#CCFF00',
            'select-black': '#000000'
          },
          fontFamily: {
            'space': ['Space Grotesk', 'sans-serif'],
          },
        }
      }
    }
  </script>
  <style>
    body {
      font-family: 'Space Grotesk', sans-serif;
      background-color: #000000;
    }
    .gradient-text {
      background: linear-gradient(90deg, #CCFF00 0%, #0000FF 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .step-progress {
      transition: all 0.3s ease;
    }
  </style>
</head>
<body class="bg-black text-white">
  <!-- Header -->
  <header class="fixed w-full z-50 bg-black/90 backdrop-blur-lg border-b border-white/10">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <a href="/" class="flex items-center gap-2">
        <span class="text-select-lime font-bold text-3xl tracking-tight">S</span>
        <span class="text-select-blue font-bold text-3xl tracking-tight">ELECT</span>
        <span class="text-white/60 text-xl">SEGUROS</span>
      </a>
      <nav class="hidden md:flex items-center gap-8">
        <a href="#" class="text-white/80 hover:text-select-lime transition-colors">Sobre</a>
        <a href="#" class="text-white/80 hover:text-select-lime transition-colors">Coberturas</a>
        <a href="#" class="text-white/80 hover:text-select-lime transition-colors">Contato</a>
        <a href="cotacao.html" class="bg-select-lime text-black px-6 py-2 rounded-full hover:bg-select-lime/90 transition-colors flex items-center gap-2">
          Fazer Cotação
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="min-h-screen pt-20">
    <!-- Progress Steps -->
    <div class="container mx-auto px-4 py-8">
      <div class="max-w-4xl mx-auto">
        <div class="flex justify-between relative">
          <!-- Progress Line -->
          <div class="absolute top-5 left-0 right-0 h-0.5 bg-white/10">
            <div class="h-full bg-select-lime transition-all duration-300 step-progress" style="width: 0%"></div>
          </div>

          <!-- Step 1: Personal Data -->
          <div class="relative z-10 flex flex-col items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-select-lime text-black flex items-center justify-center">
              <i data-lucide="user" class="w-5 h-5"></i>
            </div>
            <span class="text-sm font-medium">Dados Pessoais</span>
          </div>

          <!-- Step 2: Vehicle -->
          <div class="relative z-10 flex flex-col items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-white/10 text-white/40 flex items-center justify-center">
              <i data-lucide="car" class="w-5 h-5"></i>
            </div>
            <span class="text-sm font-medium text-white/40">Veículo</span>
          </div>

          <!-- Step 3: Coverage -->
          <div class="relative z-10 flex flex-col items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-white/10 text-white/40 flex items-center justify-center">
              <i data-lucide="shield" class="w-5 h-5"></i>
            </div>
            <span class="text-sm font-medium text-white/40">Coberturas</span>
          </div>

          <!-- Step 4: Payment -->
          <div class="relative z-10 flex flex-col items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-white/10 text-white/40 flex items-center justify-center">
              <i data-lucide="credit-card" class="w-5 h-5"></i>
            </div>
            <span class="text-sm font-medium text-white/40">Pagamento</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Form Container -->
    <div class="container mx-auto px-4 pb-16">
      <div class="max-w-2xl mx-auto">
        <!-- Step 1: Personal Data -->
        <div id="step1" class="space-y-8">
          <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 rounded-full bg-select-lime flex items-center justify-center">
              <i data-lucide="user" class="w-6 h-6 text-black"></i>
            </div>
            <div>
              <h2 class="text-2xl font-bold">Dados Pessoais</h2>
              <p class="text-white/60">Preencha seus dados para começar</p>
            </div>
          </div>

          <div class="space-y-6">
            <div class="grid grid-cols-2 gap-6">
              <div class="space-y-2">
                <label class="block text-sm font-medium text-white/80">Nome</label>
                <input
                  type="text"
                  class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:border-select-lime"
                  placeholder="Seu nome"
                />
              </div>
              <div class="space-y-2">
                <label class="block text-sm font-medium text-white/80">Sobrenome</label>
                <input
                  type="text"
                  class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:border-select-lime"
                  placeholder="Seu sobrenome"
                />
              </div>
            </div>

            <div class="space-y-2">
              <label class="block text-sm font-medium text-white/80">Email</label>
              <input
                type="email"
                class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:border-select-lime"
                placeholder="seu@email.com"
              />
            </div>

            <div class="grid grid-cols-2 gap-6">
              <div class="space-y-2">
                <label class="block text-sm font-medium text-white/80">CPF</label>
                <input
                  type="text"
                  class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:border-select-lime"
                  placeholder="000.000.000-00"
                />
              </div>
              <div class="space-y-2">
                <label class="block text-sm font-medium text-white/80">Telefone</label>
                <input
                  type="tel"
                  class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:border-select-lime"
                  placeholder="(00) 00000-0000"
                />
              </div>
            </div>
          </div>

          <!-- Form Navigation -->
          <div class="flex justify-end pt-8 border-t border-white/10">
            <button 
              onclick="nextStep()"
              class="bg-select-lime text-black px-8 py-3 rounded-full hover:bg-select-lime/90 transition-colors flex items-center gap-2"
            >
              Próximo
              <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </button>
          </div>
        </div>

        <!-- Step 2: Vehicle Data -->
        <div id="step2" class="hidden space-y-8">
          <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 rounded-full bg-select-lime flex items-center justify-center">
              <i data-lucide="car" class="w-6 h-6 text-black"></i>
            </div>
            <div>
              <h2 class="text-2xl font-bold">Dados do Veículo</h2>
              <p class="text-white/60">Informações sobre seu veículo</p>
            </div>
          </div>

          <div class="space-y-6">
            <div class="grid grid-cols-2 gap-6">
              <div class="space-y-2">
                <label class="block text-sm font-medium text-white/80">Marca</label>
                <select class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-select-lime">
                  <option value="">Selecione a marca</option>
                  <option value="volkswagen">Volkswagen</option>
                  <option value="fiat">Fiat</option>
                  <option value="chevrolet">Chevrolet</option>
                  <option value="honda">Honda</option>
                  <option value="toyota">Toyota</option>
                </select>
              </div>
              <div class="space-y-2">
                <label class="block text-sm font-medium text-white/80">Modelo</label>
                <select class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-select-lime">
                  <option value="">Selecione o modelo</option>
                  <option value="gol">Gol</option>
                  <option value="onix">Onix</option>
                  <option value="civic">Civic</option>
                  <option value="corolla">Corolla</option>
                </select>
              </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
              <div class="space-y-2">
                <label class="block text-sm font-medium text-white/80">Ano</label>
                <select class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-select-lime">
                  <option value="">Selecione o ano</option>
                  <option value="2024">2024</option>
                  <option value="2023">2023</option>
                  <option value="2022">2022</option>
                  <option value="2021">2021</option>
                  <option value="2020">2020</option>
                </select>
              </div>
              <div class="space-y-2">
                <label class="block text-sm font-medium text-white/80">Versão</label>
                <select class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-select-lime">
                  <option value="">Selecione a versão</option>
                  <option value="basic">Básico</option>
                  <option value="comfort">Comfort</option>
                  <option value="premium">Premium</option>
                </select>
              </div>
            </div>

            <div class="space-y-2">
              <label class="block text-sm font-medium text-white/80">Placa</label>
              <input
                type="text"
                class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:border-select-lime"
                placeholder="ABC-1234"
              />
            </div>
          </div>

          <!-- Form Navigation -->
          <div class="flex justify-between items-center pt-8 border-t border-white/10">
            <button 
              onclick="prevStep()"
              class="text-white/60 hover:text-white flex items-center gap-2"
            >
              <i data-lucide="arrow-left" class="w-4 h-4"></i>
              Voltar
            </button>
            <button 
              onclick="nextStep()"
              class="bg-select-lime text-black px-8 py-3 rounded-full hover:bg-select-lime/90 transition-colors flex items-center gap-2"
            >
              Próximo
              <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </button>
          </div>
        </div>

        <!-- Step 3: Coverage -->
        <div id="step3" class="hidden space-y-8">
          <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 rounded-full bg-select-lime flex items-center justify-center">
              <i data-lucide="shield" class="w-6 h-6 text-black"></i>
            </div>
            <div>
              <h2 class="text-2xl font-bold">Coberturas</h2>
              <p class="text-white/60">Escolha as coberturas desejadas</p>
            </div>
          </div>

          <div class="space-y-4">
            <!-- Coverage Option 1 -->
            <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:border-select-lime/50 transition-all">
              <div class="flex items-start gap-4">
                <input 
                  type="checkbox" 
                  class="mt-1 text-select-lime focus:ring-select-lime/20"
                  checked
                />
                <div class="flex-1">
                  <div class="flex justify-between items-start">
                    <div>
                      <h3 class="font-medium">Cobertura Completa</h3>
                      <p class="text-white/60 text-sm">Proteção total para seu veículo</p>
                    </div>
                    <span class="text-select-lime font-medium">R$ 1.299,90</span>
                  </div>
                  <ul class="mt-4 space-y-2 text-sm text-white/60">
                    <li class="flex items-center gap-2">
                      <i data-lucide="check" class="w-4 h-4 text-select-lime"></i>
                      Colisão, incêndio e roubo
                    </li>
                    <li class="flex items-center gap-2">
                      <i data-lucide="check" class="w-4 h-4 text-select-lime"></i>
                      Danos a terceiros
                    </li>
                    <li class="flex items-center gap-2">
                      <i data-lucide="check" class="w-4 h-4 text-select-lime"></i>
                      Assistência 24h básica
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- Coverage Option 2 -->
            <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:border-select-lime/50 transition-all">
              <div class="flex items-start gap-4">
                <input 
                  type="checkbox" 
                  class="mt-1 text-select-lime focus:ring-select-lime/20"
                  checked
                />
                <div class="flex-1">
                  <div class="flex justify-between items-start">
                    <div>
                      <h3 class="font-medium">Vidros Completo</h3>
                      <p class="text-white/60 text-sm">Proteção para todos os vidros</p>
                    </div>
                    <span class="text-select-lime font-medium">R$ 199,90</span>
                  </div>
                  <ul class="mt-4 space-y-2 text-sm text-white/60">
                    <li class="flex items-center gap-2">
                      <i data-lucide="check" class="w-4 h-4 text-select-lime"></i>
                      Para-brisa e vidros laterais
                    </li>
                    <li class="flex items-center gap-2">
                      <i data-lucide="check" class="w-4 h-4 text-select-lime"></i>
                      Retrovisores
                    </li>
                    <li class="flex items-center gap-2">
                      <i data-lucide="check" class="w-4 h-4 text-select-lime"></i>
                      Faróis e lanternas
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- Coverage Option 3 -->
            <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:border-select-lime/50 transition-all">
              <div class="flex items-start gap-4">
                <input 
                  type="checkbox" 
                  class="mt-1 text-select-lime focus:ring-select-lime/20"
                  checked
                />
                <div class="flex-1">
                  <div class="flex justify-between items-start">
                    <div>
                      <h3 class="font-medium">Assistência 24h Premium</h3>
                      <p class="text-white/60 text-sm">Suporte completo onde você estiver</p>
                    </div>
                    <span class="text-select-lime font-medium">R$ 149,90</span>
                  </div>
                  <ul class="mt-4 space-y-2 text-sm text-white/60">
                    <li class="flex items-center gap-2">
                      <i data-lucide="check" class="w-4 h-4 text-select-lime"></i>
                      Guincho sem limite de km
                    </li>
                    <li class="flex items-center gap-2">
                      <i data-lucide="check" class="w-4 h-4 text-select-lime"></i>
                      Carro reserva por 30 dias
                    </li>
                    <li class="flex items-center gap-2">
                      <i data-lucide="check" class="w-4 h-4 text-select-lime"></i>
                      Hospedagem em caso de pane
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Form Navigation -->
          <div class="flex justify-between items-center pt-8 border-t border-white/10">
            <button 
              onclick="prevStep()"
              class="text-white/60 hover:text-white flex items-center gap-2"
            >
              <i data-lucide="arrow-left" class="w-4 h-4"></i>
              Voltar
            </button>
            <button 
              onclick="nextStep()"
              class="bg-select-lime text-black px-8 py-3 rounded-full hover:bg-select-lime/90 transition-colors flex items-center gap-2"
            >
              Próximo
              <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </button>
          </div>
        </div>

        <!-- Step 4: Payment -->
        <div id="step4" class="hidden space-y-8">
          <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 rounded-full bg-select-lime flex items-center justify-center">
              <i data-lucide="credit-card" class="w-6 h-6 text-black"></i>
            </div>
            <div>
              <h2 class="text-2xl font-bold">Pagamento</h2>
              <p class="text-white/60">Escolha a forma de pagamento</p>
            </div>
          </div>

          <!-- Payment Summary -->
          <div class="bg-white/5 rounded-xl p-6 border border-white/10">
            <h3 class="text-lg font-semibold mb-4">Resumo da Cotação</h3>
            <div class="space-y-3">
              <div class="flex justify-between text-white/80">
                <span>Cobertura Completa</span>
                <span>R$ 1.299,90</span>
              </div>
              <div class="flex justify-between text-white/80">
                <span>Vidros Completo</span>
                <span>R$ 199,90</span>
              </div>
              <div class="flex justify-between text-white/80">
                <span>Assistência 24h Premium</span>
                <span>R$ 149,90</span>
              </div>
              <div class="flex justify-between text-white/80">
                <span>IOF</span>
                <span>R$ 98,90</span>
              </div>
              <div class="pt-3 border-t border-white/10 flex justify-between items-center">
                <span class="font-medium">Total</span>
                <span class="text-2xl font-bold text-select-lime">R$ 1.748,60</span>
              </div>
            </div>
          </div>

          <!-- Payment Methods -->
          <div class="space-y-4">
            <h3 class="text-lg font-semibold">Forma de Pagamento</h3>
            
            <!-- Credit Card Option -->
            <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:border-select-lime/50 transition-all cursor-pointer">
              <div class="flex items-center gap-4">
                <input 
                  type="radio" 
                  name="payment_method" 
                  value="credit_card"
                  class="text-select-lime focus:ring-select-lime/20"
                  checked
                />
                <div class="flex-1">
                  <div class="flex justify-between items-center">
                    <div>
                      <h4 class="font-medium">Cartão de Crédito</h4>
                      <p class="text-white/60 text-sm">Parcele em até 12x sem juros</p>
                    </div>
                    <i data-lucide="credit-card" class="w-6 h-6 text-white/40"></i>
                  </div>
                </div>
              </div>

              <!-- Credit Card Form -->
              <div class="mt-6 space-y-4">
                <div class="space-y-2">
                  <label class="block text-sm font-medium text-white/80">Número do Cartão</label>
                  <input
                    type="text"
                    class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:border-select-lime"
                    placeholder="0000 0000 0000 0000"
                  />
                </div>
                
                <div class="space-y-2">
                  <label class="block text-sm font-medium text-white/80">Nome no Cartão</label>
                  <input
                    type="text"
                    class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:border-select-lime"
                    placeholder="Nome como está no cartão"
                  />
                </div>

                <div class="grid grid-cols-2 gap-4">
                  <div class="space-y-2">
                    <label class="block text-sm font-medium text-white/80">Validade</label>
                    <input
                      type="text"
                      class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:border-select-lime"
                      placeholder="MM/AA"
                    />
                  </div>
                  <div class="space-y-2">
                    <label class="block text-sm font-medium text-white/80">CVV</label>
                    <input
                      type="text"
                      class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:border-select-lime"
                      placeholder="000"
                    />
                  </div>
                </div>

                <div class="space-y-2">
                  <label class="block text-sm font-medium text-white/80">Parcelas</label>
                  <select class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-select-lime">
                    <option value="1">À vista - R$ 1.748,60</option>
                    <option value="6">6x de R$ 291,43 sem juros</option>
                    <option value="12">12x de R$ 145,71 sem juros</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- PIX Option -->
            <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:border-select-lime/50 transition-all cursor-pointer">
              <div class="flex items-center gap-4">
                <input 
                  type="radio" 
                  name="payment_method" 
                  value="pix"
                  class="text-select-lime focus:ring-select-lime/20"
                />
                <div class="flex-1">
                  <div class="flex justify-between items-center">
                    <div>
                      <h4 class="font-medium">PIX</h4>
                      <p class="text-white/60 text-sm">10% de desconto no pagamento à vista</p>
                    </div>
                    <i data-lucide="qr-code" class="w-6 h-6 text-white/40"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Form Navigation -->
          <div class="flex justify-between items-center pt-8 border-t border-white/10">
            <button 
              onclick="prevStep()"
              class="text-white/60 hover:text-white flex items-center gap-2"
            >
              <i data-lucide="arrow-left" class="w-4 h-4"></i>
              Voltar
            </button>
            <button 
              onclick="finishPayment()"
              class="bg-select-lime text-black px-8 py-3 rounded-full hover:bg-select-lime/90 transition-colors flex items-center gap-2"
            >
              Finalizar Pagamento
              <i data-lucide="check" class="w-4 h-4"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
    // Initialize Lucide icons
    lucide.createIcons();

    // Step navigation
    let currentStep = 1;
    const totalSteps = 4;

    function updateProgress() {
      // Update progress bar
      const progressBar = document.querySelector('.step-progress');
      const progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
      progressBar.style.width = `${progressPercentage}%`;

      // Update step indicators
      const steps = document.querySelectorAll('.flex.flex-col.items-center');
      steps.forEach((step, index) => {
        const stepNum = index + 1;
        const icon = step.querySelector('.rounded-full');
        const text = step.querySelector('span');
        
        if (stepNum <= currentStep) {
          icon.classList.remove('bg-white/10', 'text-white/40');
          icon.classList.add('bg-select-lime', 'text-black');
          text.classList.remove('text-white/40');
          text.classList.add('text-white');
        } else {
          icon.classList.add('bg-white/10', 'text-white/40');
          icon.classList.remove('bg-select-lime', 'text-black');
          text.classList.add('text-white/40');
          text.classList.remove('text-white');
        }
      });
    }

    function showStep(step) {
      // Hide all steps
      for (let i = 1; i <= totalSteps; i++) {
        const stepElement = document.getElementById(`step${i}`);
        if (stepElement) {
          stepElement.classList.add('hidden');
        }
      }
      
      // Show current step
      const currentStepElement = document.getElementById(`step${step}`);
      if (currentStepElement) {
        currentStepElement.classList.remove('hidden');
      }
    }

    function nextStep() {
      if (currentStep < totalSteps) {
        currentStep++;
        showStep(currentStep);
        updateProgress();
      }
    }

    function prevStep() { if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
        updateProgress();
      }
    }
    
 
    function finishPayment() {
      alert('Pagamento finalizado com sucesso! Em breve você receberá um email com os detalhes da sua apólice.');
      window.location.href = 'index.html';
    }

    // Initialize first step
    updateProgress();
  </script>
</body>
</html>