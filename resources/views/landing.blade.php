<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SELECT SEGUROS</title>
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
  </style>
</head>
<body class="bg-black text-white">
  <!-- Header -->
  <header class="fixed w-full z-50 bg-black/90 backdrop-blur-lg border-b border-white/10">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <div class="flex items-center gap-2">
        <span class="text-select-lime font-bold text-3xl tracking-tight">S</span>
        <span class="text-select-blue font-bold text-3xl tracking-tight">ELECT</span>
        <span class="text-white/60 text-xl">SEGUROS</span>
      </div>
      <nav class="hidden md:flex items-center gap-8">
        <a href="#" class="text-white/80 hover:text-select-lime transition-colors">Sobre</a>
        <a href="#" class="text-white/80 hover:text-select-lime transition-colors">Coberturas</a>
        <a href="#" class="text-white/80 hover:text-select-lime transition-colors">Contato</a>
        <a href="/cotacao" class="bg-select-lime text-black px-6 py-2 rounded-full hover:bg-select-lime/90 transition-colors flex items-center gap-2">
  Fazer Cotação
  <i data-lucide="arrow-right" class="w-4 h-4"></i>
</a>

      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="min-h-screen relative overflow-hidden pt-32 pb-16">
    <!-- Background Gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-black via-black to-select-blue/20"></div>
    
    <div class="container mx-auto px-4 relative z-10">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-8">
          <h1 class="text-6xl lg:text-7xl font-bold leading-tight">
            <span class="gradient-text">Segurança</span> que cabe na sua vida.
          </h1>
          <p class="text-xl text-white/80">
            A Select Seguros não vende apenas proteção, ela entrega tranquilidade, liberdade e inovação. Nosso compromisso é tornar o seguro simples, rápido e flexível.
          </p>
          <div class="flex flex-wrap gap-4">
            <a href="/cotacao" class="bg-select-lime text-black px-8 py-4 rounded-full text-lg hover:bg-select-lime/90 transition-colors flex items-center gap-2 font-medium">
              Fazer cotação agora
              <i data-lucide="arrow-right" class="w-5 h-5"></i>
            </a>

            <button class="border border-white/20 bg-white/5 backdrop-blur-sm text-white px-8 py-4 rounded-full text-lg hover:bg-white/10 transition-colors flex items-center gap-2">
              Saiba mais
              <i data-lucide="chevron-right" class="w-5 h-5"></i>
            </button>
          </div>
        </div>
        
        <div class="relative">
          <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent z-10"></div>
          <img 
            src="https://images.unsplash.com/photo-1617788138017-80ad40651399?auto=format&fit=crop&q=80&w=800"
            alt="Luxury Car"
            class="rounded-2xl w-full object-cover shadow-2xl"
          />
          <!-- Stats Badge -->
          <div class="absolute bottom-8 left-8 right-8 bg-black/50 backdrop-blur-md rounded-xl p-6 z-20 border border-white/10">
            <div class="flex justify-between items-center">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-select-lime rounded-full flex items-center justify-center">
                  <i data-lucide="shield" class="w-6 h-6 text-black"></i>
                </div>
                <div>
                  <p class="text-white font-medium">Seguro autorizado</p>
                  <p class="text-white/60">SUSEP em todo Brasil</p>
                </div>
              </div>
              <div class="text-right">
                <p class="text-select-lime text-2xl font-bold">40k+</p>
                <p class="text-white/60">Clientes satisfeitos</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="py-24 bg-black">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold mb-4">Por que escolher a <span class="text-select-lime">Select</span>?</h2>
        <p class="text-white/60 text-lg max-w-2xl mx-auto">
          Combinamos tecnologia e experiência para oferecer o melhor serviço em seguros do mercado.
        </p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:border-select-lime/50 transition-colors">
          <div class="w-12 h-12 bg-select-lime rounded-full flex items-center justify-center mb-6">
            <i data-lucide="zap" class="w-6 h-6 text-black"></i>
          </div>
          <h3 class="text-xl font-bold mb-4">Cotação Instantânea</h3>
          <p class="text-white/60">
            Receba sua cotação em menos de 5 minutos, 100% online e sem burocracia.
          </p>
        </div>

        <!-- Feature 2 -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:border-select-lime/50 transition-colors">
          <div class="w-12 h-12 bg-select-lime rounded-full flex items-center justify-center mb-6">
            <i data-lucide="shield-check" class="w-6 h-6 text-black"></i>
          </div>
          <h3 class="text-xl font-bold mb-4">Cobertura Completa</h3>
          <p class="text-white/60">
            Proteção abrangente para seu veículo com as melhores condições do mercado.
          </p>
        </div>

        <!-- Feature 3 -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:border-select-lime/50 transition-colors">
          <div class="w-12 h-12 bg-select-lime rounded-full flex items-center justify-center mb-6">
            <i data-lucide="headphones" class="w-6 h-6 text-black"></i>
          </div>
          <h3 class="text-xl font-bold mb-4">Suporte 24/7</h3>
          <p class="text-white/60">
            Assistência técnica e atendimento disponível 24 horas por dia, 7 dias por semana.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-select-blue/10"></div>
    <div class="container mx-auto px-4 relative z-10">
      <div class="bg-gradient-to-r from-black to-select-blue/20 rounded-3xl p-12 border border-white/10">
        <div class="max-w-2xl">
          <h2 class="text-4xl font-bold mb-6">
            Pronto para ter o melhor seguro do mercado?
          </h2>
          <p class="text-white/80 text-lg mb-8">
            Faça sua cotação agora mesmo e garanta a proteção que você merece.
          </p>
          <div class="flex flex-wrap gap-4">
            <button class="bg-select-lime text-black px-8 py-4 rounded-full text-lg hover:bg-select-lime/90 transition-colors flex items-center gap-2 font-medium">
              Fazer cotação
              <i data-lucide="arrow-right" class="w-5 h-5"></i>
            </button>
            <button class="bg-white/10 text-white px-8 py-4 rounded-full text-lg hover:bg-white/20 transition-colors">
              Falar com consultor
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-12 border-t border-white/10">
    <div class="container mx-auto px-4">
      <div class="grid md:grid-cols-4 gap-8">
        <div>
          <div class="flex items-center gap-2 mb-6">
            <span class="text-select-lime font-bold text-2xl tracking-tight">S</span>
            <span class="text-select-blue font-bold text-2xl tracking-tight">ELECT</span>
          </div>
          <p class="text-white/60">
            Segurança de verdade é aquela que cabe na sua vida.
          </p>
        </div>
        
        <div>
          <h4 class="font-bold mb-4">Produtos</h4>
          <ul class="space-y-2 text-white/60">
            <li><a href="#" class="hover:text-select-lime">Seguro Auto</a></li>
            <li><a href="#" class="hover:text-select-lime">Seguro Residencial</a></li>
            <li><a href="#" class="hover:text-select-lime">Seguro Vida</a></li>
          </ul>
        </div>

        <div>
          <h4 class="font-bold mb-4">Empresa</h4>
          <ul class="space-y-2 text-white/60">
            <li><a href="#" class="hover:text-select-lime">Sobre nós</a></li>
            <li><a href="#" class="hover:text-select-lime">Carreiras</a></li>
            <li><a href="#" class="hover:text-select-lime">Contato</a></li>
          </ul>
        </div>

        <div>
          <h4 class="font-bold mb-4">Legal</h4>
          <ul class="space-y-2 text-white/60">
            <li><a href="#" class="hover:text-select-lime">Privacidade</a></li>
            <li><a href="#" class="hover:text-select-lime">Termos</a></li>
            <li><a href="#" class="hover:text-select-lime">Regulamentação</a></li>
          </ul>
        </div>
      </div>

      <div class="border-t border-white/10 mt-12 pt-8 flex flex-wrap justify-between items-center">
        <p class="text-white/60">© 2025 Select Seguros. Todos os direitos reservados.</p>
        <div class="flex gap-4">
          <a href="#" class="text-white/60 hover:text-select-lime">
            <i data-lucide="instagram" class="w-5 h-5"></i>
          </a>
          <a href="#" class="text-white/60 hover:text-select-lime">
            <i data-lucide="linkedin" class="w-5 h-5"></i>
          </a>
          <a href="#" class="text-white/60 hover:text-select-lime">
            <i data-lucide="facebook" class="w-5 h-5"></i>
          </a>
        </div>
      </div>
    </div>
  </footer>

  <script>
    // Initialize Lucide icons
    lucide.createIcons();
  </script>
</body>
</html>