<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Obrigado | Select Seguros</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
  <style>
    body {
      background-color: #121212;
      color: white;
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
  <div class="max-w-2xl mx-auto text-center">
    <!-- Logo -->
    <div class="mb-8">
      <div class="flex items-center justify-center gap-2">
        <i data-lucide="shield" class="text-green-500 text-3xl"></i>
        <span class="text-green-500 font-bold text-3xl">S</span>
        <span class="text-blue-500 font-bold text-3xl">ELECT</span>
      </div>
      <div class="text-gray-400 text-sm">SEGUROS</div>
    </div>

    <!-- Success Icon -->
    <div class="mb-8">
      <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto">
        <i data-lucide="check" class="w-12 h-12 text-green-500"></i>
      </div>
    </div>

    <!-- Thank You Message -->
    <div class="bg-gray-900 rounded-xl p-8 shadow-xl border border-gray-800">
      <h1 class="text-3xl font-bold mb-4">Obrigado pelo seu interesse!</h1>
      
      <p class="text-gray-400 text-lg mb-6">
        Recebemos seus dados e nossa equipe entrará em contato em breve para prosseguir com a cotação do seu seguro.
      </p>

      <div class="bg-gray-800/50 rounded-lg p-6 mb-8">
        <i data-lucide="construction" class="w-8 h-8 text-amber-500 mx-auto mb-4"></i>
        <h2 class="text-xl font-semibold mb-3">Estamos em construção!</h2>
        <p class="text-gray-400">
          Em breve, nossa plataforma permitirá que você faça todo o processo de contratação do seu seguro de forma automática e com poucos cliques.
        </p>
      </div>

      <div class="space-y-4">
        <div class="flex items-center gap-3 justify-center text-gray-400">
          <i data-lucide="clock" class="w-5 h-5"></i>
          <span>Resposta em até 24 horas úteis</span>
        </div>
        <div class="flex items-center gap-3 justify-center text-gray-400">
          <i data-lucide="shield-check" class="w-5 h-5"></i>
          <span>Seus dados estão protegidos</span>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <div class="mt-8">
      <a href="/" class="inline-flex items-center gap-2 text-gray-400 hover:text-white transition-colors">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        <span>Voltar para o início</span>
      </a>
    </div>

    <!-- Footer -->
    <div class="mt-12 text-gray-500 text-sm">
      &copy; 2025 Select Seguros. Todos os direitos reservados.
    </div>
  </div>

  <script>
    // Inicializa os ícones do Lucide
    lucide.createIcons();
  </script>
</body>
</html>