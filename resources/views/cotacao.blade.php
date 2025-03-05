<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Cotação de Seguro | Select Seguros</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
  <style>
    body {
      background-color: #121212;
      color: white;
      font-family: 'Inter', sans-serif;
    }
    
    .wizard-container {
      max-width: 800px;
      margin: 0 auto;
      padding: 2rem;
    }
    
    .wizard-step {
      display: flex;
      align-items: center;
      gap: 1rem;
    }
    
    .step-circle {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }
    
    .step-active {
      background-color: #84cc16;
      color: #000000;
    }
    
    .step-completed {
      background-color: #84cc16;
      color: #000000;
    }
    
    .step-pending {
      background-color: #374151;
      color: #9ca3af;
    }
    
    .step-line {
      flex: 1;
      height: 2px;
      background-color: #374151;
      transition: all 0.3s ease;
    }
    
    .step-line-active {
      background-color: #84cc16;
    }
    
    .form-input {
      width: 100%;
      padding: 0.75rem 1rem;
      background-color: #1f2937;
      border: 1px solid #374151;
      border-radius: 0.5rem;
      color: #e5e7eb;
      transition: all 0.3s ease;
    }
    
    .form-input:focus {
      outline: none;
      border-color: #2563eb;
      box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
    }
    
    .form-label {
      display: block;
      font-size: 0.875rem;
      font-weight: 500;
      color: #9ca3af;
      margin-bottom: 0.5rem;
    }
    
    .btn {
      padding: 0.75rem 1.5rem;
      border-radius: 0.5rem;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .btn-primary {
      background-color: #84cc16;
      color: #000000;
    }
    
    .btn-primary:hover {
      background-color: #65a30d;
    }
    
    .btn-secondary {
      background-color: #1f2937;
      color: #e5e7eb;
    }
    
    .btn-secondary:hover {
      background-color: #374151;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center">
  <div class="wizard-container">
    <!-- Logo -->
    <div class="text-center mb-8">
      <div class="flex items-center justify-center gap-2">
        <i data-lucide="shield" class="text-green-500 text-3xl"></i>
        <span class="text-green-500 font-bold text-3xl">S</span>
        <span class="text-blue-500 font-bold text-3xl">ELECT</span>
      </div>
      <div class="text-gray-400 text-sm">SEGUROS</div>
    </div>

    <!-- Progress Steps -->
    <div class="flex items-center justify-between mb-12">
      <div class="wizard-step">
        <div id="step1Icon" class="step-circle step-active">
          <i data-lucide="user" class="w-5 h-5"></i>
        </div>
        <span class="text-sm font-medium text-gray-300">Dados Pessoais</span>
      </div>
      <div id="line1" class="step-line"></div>
      
      <div class="wizard-step">
        <div id="step2Icon" class="step-circle step-pending">
          <i data-lucide="car" class="w-5 h-5"></i>
        </div>
        <span class="text-sm font-medium text-gray-300">Veículo</span>
      </div>
      <div id="line2" class="step-line"></div>
      
      <div class="wizard-step">
        <div id="step3Icon" class="step-circle step-pending">
          <i data-lucide="map-pin" class="w-5 h-5"></i>
        </div>
        <span class="text-sm font-medium text-gray-300">Endereço</span>
      </div>
    </div>

    <!-- Form -->
    <form id="wizardForm" class="bg-gray-900 rounded-xl p-8 shadow-xl border border-gray-800">
      <!-- Step 1: Dados Pessoais -->
      <div id="step1" class="step-content">
        <h2 class="text-2xl font-bold mb-2">Dados Pessoais</h2>
        <p class="text-gray-400 mb-6">Preencha seus dados para começar</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-input" required>
            </div>
            <div>
                <label class="form-label">Sobrenome</label>
                <input type="text" name="sobrenome" class="form-input" required>
            </div>
        </div>
        
        <div class="mt-6">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-input" required>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div>
                <label class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-input" placeholder="000.000.000-00" required>
            </div>
            <div>
                <label class="form-label">Telefone</label>
                <input type="tel" name="telefone" id="telefone" class="form-input" placeholder="(00) 00000-0000" required>
            </div>
        </div>
      </div>

      <!-- Step 2: Veículo -->
      <div id="step2" class="step-content hidden">
          <h2 class="text-2xl font-bold mb-2">Dados do Veículo</h2>
          <p class="text-gray-400 mb-6">Informe os dados do seu veículo</p>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                  <label class="form-label">Marca</label>
                  <input type="text" name="marca_veiculo" class="form-input" required>
              </div>
              <div>
                  <label class="form-label">Modelo</label>
                  <input type="text" name="modelo_veiculo" class="form-input" required>
              </div>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
              <div>
                  <label class="form-label">Ano</label>
                  <input type="number" name="ano_veiculo" class="form-input" required>
              </div>
              <div>
                  <label class="form-label">Placa</label>
                  <input type="text" name="placa_veiculo" class="form-input" required>
              </div>
              <div>
                  <label class="form-label">Quilometragem</label>
                  <input type="number" name="quilometragem_veiculo" class="form-input" required>
              </div>
          </div>
      </div>

      <!-- Step 3: Endereço -->
      <div id="step3" class="step-content hidden">
          <h2 class="text-2xl font-bold mb-2">Endereço</h2>
          <p class="text-gray-400 mb-6">Informe seu endereço completo</p>
          
          <div class="grid grid-cols-2 gap-6">
              <div class="col-span-2 md:col-span-1">
                  <label class="form-label">CEP</label>
                  <input type="text" name="cep" id="cep" class="form-input" placeholder="00000-000" required>
              </div>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
              <div>
                  <label class="form-label">Rua</label>
                  <input type="text" name="rua" class="form-input" required>
              </div>
              <div>
                  <label class="form-label">Número</label>
                  <input type="text" name="numero" class="form-input" required>
              </div>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
              <div>
                  <label class="form-label">Bairro</label>
                  <input type="text" name="bairro" class="form-input" required>
              </div>
              <div>
                  <label class="form-label">Cidade</label>
                  <input type="text" name="cidade" class="form-input" required>
              </div>
          </div>
          
          <div class="mt-6">
              <label class="form-label">Complemento (opcional)</label>
              <input type="text" name="complemento" class="form-input">
          </div>
      </div>

      <!-- Navigation Buttons -->
      <div class="flex justify-between mt-8">
        <button type="button" id="prevBtn" class="btn btn-secondary hidden">
          Anterior
        </button>
        <button type="button" id="nextBtn" class="btn btn-primary ml-auto">
          Próximo
        </button>
        <button type="submit" id="submitBtn" class="btn btn-primary hidden">
          Finalizar
        </button>
      </div>
    </form>
  </div>

  <script>
    // Inicializa os ícones do Lucide
    lucide.createIcons();

    let currentStep = 1;
    const totalSteps = 3;

    // Mask inputs
    document.getElementById('cpf').addEventListener('input', function(e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 11) value = value.slice(0, 11);
      
      if (value.length > 9) {
        value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2}).*/, '$1.$2.$3-$4');
      } else if (value.length > 6) {
        value = value.replace(/^(\d{3})(\d{3})(\d{0,3}).*/, '$1.$2.$3');
      } else if (value.length > 3) {
        value = value.replace(/^(\d{3})(\d{0,3}).*/, '$1.$2');
      }
      
      e.target.value = value;
    });

    document.getElementById('telefone').addEventListener('input', function(e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 11) value = value.slice(0, 11);
      
      if (value.length > 10) {
        value = value.replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');
      } else if (value.length > 6) {
        value = value.replace(/^(\d{2})(\d{0,5})(\d{0,4}).*/, '($1) $2-$3');
      } else if (value.length > 2) {
        value = value.replace(/^(\d{2})(\d{0,5}).*/, '($1) $2');
      }
      
      e.target.value = value;
    });

    document.getElementById('cep').addEventListener('input', function(e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 8) value = value.slice(0, 8);
      
      if (value.length > 5) {
        value = value.replace(/^(\d{5})(\d{0,3}).*/, '$1-$2');
      }
      
      e.target.value = value;
    });

    // Navigation functions
    function showStep(step) {
      document.querySelectorAll('.step-content').forEach(el => el.classList.add('hidden'));
      document.getElementById(`step${step}`).classList.remove('hidden');
      
      for (let i = 1; i <= totalSteps; i++) {
        const icon = document.getElementById(`step${i}Icon`);
        const line = document.getElementById(`line${i}`);
        
        if (i < step) {
          icon.classList.remove('step-pending');
          icon.classList.add('step-completed');
          if (line) line.classList.add('step-line-active');
        } else if (i === step) {
          icon.classList.remove('step-pending');
          icon.classList.add('step-active');
          if (line) line.classList.remove('step-line-active');
        } else {
          icon.classList.remove('step-active', 'step-completed');
          icon.classList.add('step-pending');
          if (line) line.classList.remove('step-line-active');
        }
      }
      
      document.getElementById('prevBtn').classList.toggle('hidden', step === 1);
      document.getElementById('nextBtn').classList.toggle('hidden', step === totalSteps);
      document.getElementById('submitBtn').classList.toggle('hidden', step !== totalSteps);
    }

    document.getElementById('nextBtn').addEventListener('click', () => {
      if (currentStep < totalSteps) {
        currentStep++;
        showStep(currentStep);
      }
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
      if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
      }
    });

    document.getElementById('wizardForm').addEventListener('submit', function(e) {
      e.preventDefault();

      // Criando o objeto FormData com os dados do formulário
      const formData = new FormData(this);  // Certifique-se de que a variável está aqui

      // Convertendo o FormData em um objeto simples para visualizar os dados
      const formDataObj = {};
      formData.forEach((value, key) => {
          formDataObj[key] = value;
      });

      // Exibir os dados no console ou na página
      console.log("Dados que serão enviados:", formDataObj);

      // Exibir na página, caso deseje mostrar na interface
      const dataDisplayDiv = document.getElementById('dataDisplay');
      const dataDisplayContent = document.getElementById('dataDisplayContent');
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      if (dataDisplayDiv && dataDisplayContent) {
          dataDisplayContent.textContent = JSON.stringify(formDataObj, null, 2);
      }

      // Enviar os dados para o servidor
      fetch('/lead-create', {
          method: 'POST',
          body: formData,
          headers: {
            'X-CSRF-TOKEN': csrfToken  // Enviar o token CSRF junto com a requisição
        }
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              // Caso a criação do lead seja bem-sucedida, redireciona
              window.location.href = '/obrigado';
          } else {
              console.log(data);
              alert('Ocorreu um erro ao enviar os dados. Por favor, tente novamente.');
          }
      })
      .catch(error => {
          console.log('Error:', error);
          alert('Ocorreu um erro ao enviar os dados. Por favor, tente novamente.');
      });
  });

    showStep(1);
  </script>
</body>
</html>