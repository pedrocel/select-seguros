<!DOCTYPE html>
<html lang="pt-BR">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Select Seguros - Cotação de Veículos</title>
      <script src="https://cdn.tailwindcss.com"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
      <style>
         .gradient-bg {
         background: linear-gradient(135deg, rgb(204, 255, 0) 0%, rgb(163, 204, 0) 100%);
         }
         .gradient-hover {
         background: linear-gradient(135deg, rgb(163, 204, 0) 0%, rgb(204, 255, 0) 100%);
         }
         .logo-text {
         background: linear-gradient(90deg, rgb(204, 255, 0) 0%, rgb(163, 204, 0) 100%);
         -webkit-background-clip: text;
         -webkit-text-fill-color: transparent;
         }
         .custom-input {
         background-color: #2A2F35 !important;
         border: 2px solid #4B5563 !important;
         border-radius: 0.5rem !important;
         height: 48px !important;
         padding: 8px 16px !important;
         width: 100% !important;
         color: #fff !important;
         transition: all 0.2s ease-in-out;
         }
         .custom-input:focus {
         border-color: rgb(204, 255, 0) !important;
         box-shadow: 0 0 0 1px rgb(204, 255, 0) !important;
         outline: none;
         }
         .custom-input::placeholder {
         color: #9CA3AF !important;
         }
         .select2-container--default {
         width: 100% !important;
         }
         .select2-container--default .select2-selection--single {
         background-color: #2A2F35 !important;
         border: 2px solid #4B5563 !important;
         border-radius: 0.5rem !important;
         height: 48px !important;
         padding: 8px !important;
         }
         .select2-container--default .select2-selection--single .select2-selection__rendered {
         color: #fff !important;
         line-height: 28px !important;
         }
         .select2-container--default .select2-selection--single .select2-selection__arrow {
         height: 46px !important;
         right: 8px !important;
         }
         .select2-container--default .select2-selection--single .select2-selection__arrow b {
         border-color: #fff transparent transparent transparent !important;
         }
         .select2-dropdown {
         background-color: #2A2F35 !important;
         border: 2px solid rgb(204, 255, 0) !important;
         border-radius: 0.5rem !important;
         }
         .select2-container--default .select2-search--dropdown .select2-search__field {
         background-color: #1A1D21 !important;
         border: 1px solid #4B5563 !important;
         color: #fff !important;
         border-radius: 0.25rem !important;
         padding: 8px !important;
         }
         .select2-container--default .select2-results__option {
         padding: 8px 12px !important;
         color: #fff !important;
         }
         .select2-container--default .select2-results__option--highlighted[aria-selected] {
         background: linear-gradient(135deg, rgba(204, 255, 0, 0.1) 0%, rgba(163, 204, 0, 0.1) 100%) !important;
         color: rgb(204, 255, 0) !important;
         }
         .select2-container--default .select2-results__option[aria-selected=true] {
         background: linear-gradient(135deg, rgb(204, 255, 0) 0%, rgb(163, 204, 0) 100%) !important;
         color: #1A1D21 !important;
         }
         .loading-spinner {
         display: none;
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(26, 29, 33, 0.8);
         z-index: 9999;
         justify-content: center;
         align-items: center;
         }
         .spinner {
         width: 50px;
         height: 50px;
         border: 4px solid rgba(204, 255, 0, 0.1);
         border-left-color: rgb(204, 255, 0);
         border-radius: 50%;
         animation: spin 1s linear infinite;
         }
         @keyframes spin {
         to {
         transform: rotate(360deg);
         }
         }
         .headline {
         font-size: 4rem;
         line-height: 1.1;
         font-weight: 700;
         }
         .gradient-text {
         background: linear-gradient(90deg, rgb(204, 255, 0) 0%, rgb(163, 204, 0) 100%);
         -webkit-background-clip: text;
         -webkit-text-fill-color: transparent;
         }
         .form-step {
         display: none;
         opacity: 0;
         transform: translateY(10px);
         transition: all 0.3s ease-in-out;
         }
         .form-step.active {
         display: block;
         opacity: 1;
         transform: translateY(0);
         }
         .next-btn {
         opacity: 0.5;
         pointer-events: none;
         }
         .next-btn.active {
         opacity: 1;
         pointer-events: auto;
         }
         .error-message {
         color: #ef4444;
         font-size: 0.875rem;
         margin-top: 0.5rem;
         display: none;
         }
      </style>
   </head>
   <body class="min-h-screen bg-[#1A1D21]">
      <div class="loading-spinner" id="loadingSpinner">
         <div class="spinner"></div>
      </div>
      <div class="flex min-h-screen">
         <div class="w-1/2 p-12 flex flex-col justify-center">
            <div class="mb-12">
               <h1 class="text-4xl font-bold flex items-center">
                  <span class="logo-text">SELECT</span>
               </h1>
               <p class="text-gray-400 mt-2">SEGUROS</p>
            </div>
            <h2 class="headline text-white mb-6">
               Seguro é <span class="gradient-text">pra você também</span>
            </h2>
            <p class="text-xl text-gray-300 mb-8">
               A única com seguro auto por assinatura sem análise de perfil, crédito e ainda com pagamento por boleto.
            </p>
            <div class="flex items-center space-x-4">
               <div class="flex -space-x-4">
                  <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=50&h=50&fit=crop&crop=faces" class="w-12 h-12 rounded-full border-2 border-[#1A1D21]" alt="User">
                  <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=50&h=50&fit=crop&crop=faces" class="w-12 h-12 rounded-full border-2 border-[#1A1D21]" alt="User">
                  <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=50&h=50&fit=crop&crop=faces" class="w-12 h-12 rounded-full border-2 border-[#1A1D21]" alt="User">
               </div>
               <p class="text-gray-400">Faça parte da comunidade</p>
            </div>
         </div>
         <div class="w-1/2 bg-[#1E2227] p-12 flex items-center">
            <div class="w-full max-w-md mx-auto">
               <h3 class="text-2xl font-bold text-white mb-8">Faça sua cotação em 30 segundos!</h3>
               <div class="space-y-6">
                  <div id="step1" class="form-step active">
                     <label class="block text-sm font-medium text-gray-300 mb-2">Nome Completo</label>
                     <input
                        type="text"
                        id="name"
                        class="custom-input"
                        placeholder="Digite seu nome completo"
                        >
                     <button id="nextStep1" class="w-full px-6 py-3 mt-6 gradient-bg text-[#1A1D21] font-bold rounded-md hover:gradient-hover transition-all duration-300 next-btn">
                     Continuar
                     </button>
                  </div>
                  <div id="step2" class="form-step">
                     <label class="block text-sm font-medium text-gray-300 mb-2">WhatsApp</label>
                     <input
                        type="tel"
                        id="whatsapp"
                        class="custom-input"
                        placeholder="(82) 9-9999-9999"
                        maxlength="16"
                        >
                     <span id="whatsappError" class="error-message">Digite um número de WhatsApp válido</span>
                     <button id="nextStep2" class="w-full px-6 py-3 mt-6 gradient-bg text-[#1A1D21] font-bold rounded-md hover:gradient-hover transition-all duration-300 next-btn">
                     Continuar
                     </button>
                  </div>
                  <div id="step3" class="form-step">
                     <label class="block text-sm font-medium text-gray-300 mb-2">Marca</label>
                     <select id="brandSelect" class="w-full"></select>
                     <button id="nextStep3" class="w-full px-6 py-3 mt-6 gradient-bg text-[#1A1D21] font-bold rounded-md hover:gradient-hover transition-all duration-300 next-btn">
                     Continuar
                     </button>
                  </div>
                  <div id="step4" class="form-step">
                     <label class="block text-sm font-medium text-gray-300 mb-2">Modelo</label>
                     <select id="modelSelect" class="w-full"></select>
                     <button id="nextStep4" class="w-full px-6 py-3 mt-6 gradient-bg text-[#1A1D21] font-bold rounded-md hover:gradient-hover transition-all duration-300 next-btn">
                     Continuar
                     </button>
                  </div>
                  <div id="step5" class="form-step">
                     <label class="block text-sm font-medium text-gray-300 mb-2">Versão</label>
                     <select id="versionSelect" class="w-full"></select>
                     <button id="submitBtn" class="w-full px-6 py-3 mt-6 gradient-bg text-[#1A1D21] font-bold rounded-md hover:gradient-hover transition-all duration-300 next-btn">
                     Realizar Cotação
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
         document.addEventListener('DOMContentLoaded', function() {
             const selectedData = {
                 type: '1',
                 name: '',
                 whatsapp: '',
                 brand: '',
                 model: '',
                 version: ''
             };
         
             const loadingSpinner = document.getElementById('loadingSpinner');
             const nameInput = document.getElementById('name');
             const whatsappInput = document.getElementById('whatsapp');
             const whatsappError = document.getElementById('whatsappError');
         
             $('#brandSelect, #modelSelect, #versionSelect').select2({
                 placeholder: "Digite para buscar...",
                 allowClear: true,
                 theme: "default",
                 width: '100%',
                 language: {
                     noResults: () => "Nenhum resultado encontrado"
                 }
             });
         
             function showLoading() {
                 loadingSpinner.style.display = 'flex';
             }
         
             function hideLoading() {
                 loadingSpinner.style.display = 'none';
             }
         
             function showStep(stepNumber) {
                 document.querySelectorAll('.form-step').forEach(step => {
                     step.classList.remove('active');
                 });
                 document.getElementById(`step${stepNumber}`).classList.add('active');
             }
         
             nameInput.addEventListener('input', (e) => {
                 const nextBtn = document.getElementById('nextStep1');
                 if (e.target.value.length >= 3) {
                     nextBtn.classList.add('active');
                     selectedData.name = e.target.value;
                 } else {
                     nextBtn.classList.remove('active');
                 }
             });
         
             whatsappInput.addEventListener('input', function(e) {
                 let value = e.target.value.replace(/\D/g, '');
                 const nextBtn = document.getElementById('nextStep2');
                
                 if (value.length <= 11) {
                     let formattedValue = '';
                    
                     if (value.length > 0) {
                         formattedValue = '(' + value.substring(0, 2);
                        
                         if (value.length > 2) {
                             formattedValue += ') ';
                             if (value.length > 3) {
                                 formattedValue += value.substring(2, 3) + '-';
                                 if (value.length > 3) {
                                     formattedValue += value.substring(3, 7);
                                     if (value.length > 7) {
                                         formattedValue += '-' + value.substring(7);
                                     }
                                 }
                             } else {
                                 formattedValue += value.substring(2);
                             }
                         }
                     }
                    
                     e.target.value = formattedValue;
                    
                     if (value.length === 11 && value.substring(2, 3) === '9') {
                         nextBtn.classList.add('active');
                         whatsappError.style.display = 'none';
                         selectedData.whatsapp = formattedValue;
                     } else {
                         nextBtn.classList.remove('active');
                         if (value.length > 0) {
                             whatsappError.style.display = 'block';
                         } else {
                             whatsappError.style.display = 'none';
                         }
                     }
                 }
             });
         
             document.getElementById('nextStep1').addEventListener('click', () => {
                 if (selectedData.name) {
                     showStep(2);
                 }
             });
         
             document.getElementById('nextStep2').addEventListener('click', () => {
                 if (selectedData.whatsapp) {
                     showStep(3);
                     fetchBrands();
                 }
             });
         
             async function fetchBrands() {
                 try {
                     showLoading();
                     const response = await fetch(`/api/modelos?type=1`);
                     const brands = await response.json();
                    
                     $('#brandSelect').empty().append('<option></option>');
                    
                     brands.forEach(brand => {
                         const option = new Option(brand.Label, brand.Value, false, false);
                         $('#brandSelect').append(option);
                     });
                    
                     $('#brandSelect').trigger('change');
                     hideLoading();
                 } catch (error) {
                     console.error('Erro ao carregar marcas:', error);
                     hideLoading();
                 }
             }
         
             $('#brandSelect').on('change', async function() {
                 const brandValue = $(this).val();
                 const nextBtn = document.getElementById('nextStep3');
                
                 if (brandValue) {
                     selectedData.brand = brandValue;
                     nextBtn.classList.add('active');
                     await fetchModels(brandValue);
                 } else {
                     nextBtn.classList.remove('active');
                     selectedData.brand = '';
                 }
             });
         
             document.getElementById('nextStep3').addEventListener('click', () => {
                 if (selectedData.brand) {
                     showStep(4);
                 }
             });
         
             async function fetchModels(brandId) {
                 try {
                     showLoading();
                     const response = await fetch(`/api/lista-modelos?type=1&id=${brandId}`);
                     const models = await response.json();
                    
                     $('#modelSelect').empty().append('<option></option>');
                    
                     models.forEach(model => {
                         const option = new Option(model.Label, model.Value, false, false);
                         $('#modelSelect').append(option);
                     });
                    
                     $('#modelSelect').trigger('change');
                     hideLoading();
                 } catch (error) {
                     console.error('Erro ao carregar modelos:', error);
                 }
             }
         
             $('#modelSelect').on('change', async function() {
                 const modelValue = $(this).val();
                 const nextBtn = document.getElementById('nextStep4');
                
                 if (modelValue) {
                     selectedData.model = modelValue;
                     nextBtn.classList.add('active');
                     await fetchVersions(selectedData.brand, modelValue);
                 } else {
                     nextBtn.classList.remove('active');
                     selectedData.model = '';
                 }
             });
         
             document.getElementById('nextStep4').addEventListener('click', () => {
                 if (selectedData.model) {
                     showStep(5);
                 }
             });
         
             async function fetchVersions(brandId, modelId) {
                 try {
                     showLoading();
                     const response = await fetch(`/api/versoes?type=1&brand=${brandId}&model=${modelId}`);
                     const versions = await response.json();
                    
                     $('#versionSelect').empty().append('<option></option>');
                    
                     versions.forEach(version => {
                         const option = new Option(version.Label, version.Value, false, false);
                         $('#versionSelect').append(option);
                     });
                    
                     $('#versionSelect').trigger('change');
                     hideLoading();
                 } catch (error) {
                     console.error('Erro ao carregar versões:', error);
                 }
             }
         
             $('#versionSelect').on('change', function() {
                const versionValue = $(this).val();
                const versionLabel = $('#versionSelect option:selected').text(); // Captura o nome da versão selecionada
                const submitBtn = document.getElementById('submitBtn');

                if (versionValue) {
                    selectedData.version = versionValue;
                    selectedData.versionLabel = versionLabel; // Adiciona o label ao objeto
                    submitBtn.classList.add('active');
                } else {
                    submitBtn.classList.remove('active');
                    selectedData.version = '';
                    selectedData.versionLabel = '';
                }
            });
         
             document.getElementById('submitBtn').addEventListener('click', async () => {
                 if (!selectedData.name || !selectedData.whatsapp || !selectedData.brand ||
                     !selectedData.model || !selectedData.version) {
                     alert('Por favor, preencha todos os campos necessários');
                     return;
                 }
         
                 try {
            showLoading();
            const response = await fetch('/api/realizar-cotacao', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(selectedData)
            });

            // Verificar o status da resposta
            if (!response.ok) {
                const errorResponse = await response.json();
                console.error('Erro no servidor:', errorResponse);
                throw new Error('Erro ao realizar cotação');
            }

            const result = await response.json();
            hideLoading();
            console.log('Cotação realizada com sucesso:', result);

            // Redireciona para a URL fornecida pela resposta
            if (result.redirect_url) {
                window.location.href = result.redirect_url;  // Redirecionamento
            } else {
                console.error('URL de redirecionamento não fornecida');
            }

        } catch (error) {
            hideLoading();
            console.error('Erro ao realizar cotação:', error);
            alert('Erro ao realizar a cotação. Por favor, tente novamente.');
        }
             });
         });
      </script>
   </body>
</html>