<!DOCTYPE html>
<html lang="pt-BR">
   <head>
          
      <meta charset="UTF-8">
          
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
          
      <title>Select Seguros - Coberturas</title>
          <script src="https://cdn.tailwindcss.com"></script>
          <script src="https://unpkg.com/lucide@latest"></script>
          
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
                 .coverage-option {
                     border: 2px solid transparent;
                     transition: all 0.2s ease-in-out;
                 }
                 .coverage-option:hover {
                     border-color: rgb(204, 255, 0);
                 }
                 .coverage-option.selected {
                     border-color: rgb(204, 255, 0);
                     background: rgba(204, 255, 0, 0.1);
                 }
                 .wizard-step {
                     display: none;
                 }
                 .wizard-step.active {
                     display: block;
                     animation: fadeIn 0.3s ease-in-out;
                 }
                 .wizard-nav-item {
                     cursor: pointer;
                     transition: all 0.3s ease;
                 }
                 .wizard-nav-item.completed {
                     color: rgb(204, 255, 0);
                 }
                 .wizard-nav-item.active {
                     color: rgb(204, 255, 0);
                     transform: scale(1.1);
                 }
                 .wizard-nav-item:not(.active):not(.completed) {
                     opacity: 0.5;
                 }
                 @keyframes fadeIn {
                     from {
                         opacity: 0;
                         transform: translateY(10px);
                     }
                     to {
                         opacity: 1;
                         transform: translateY(0);
                     }
                 }
                 @media (max-width: 640px) {
                     .coverage-option {
                         padding: 1rem;
                     }
                     
                     .coverage-option .flex {
                         flex-direction: column;
                         gap: 0.5rem;
                     }
                     
                     .coverage-option .text-white {
                         font-size: 0.875rem;
                     }
                 }
             
      </style>
   </head>
   <body class="min-h-screen bg-[#1A1D21]">
          
      <div class="min-h-screen flex flex-col">
                 
         <main class="flex-1 py-6 px-4 sm:px-6 lg:px-8">
                        
            <div class="max-w-7xl mx-auto">
                               
               <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                      <!-- Left Column - Coverage Options -->
                                      
                  <div class="bg-[#1E2227] rounded-xl shadow-xl p-4 sm:p-6 lg:p-8">
                                             <!-- Wizard Navigation -->
                                             
                     <div class="flex justify-between mb-8">
                                                    
                        <div class="wizard-nav-item flex flex-col items-center gap-2" data-step="1">
                                                           <i data-lucide="shield" class="w-8 h-8"></i>
                                                           <span class="text-sm">Básicas</span>
                                                       
                        </div>
                                                    
                        <div class="wizard-nav-item flex flex-col items-center gap-2" data-step="2">
                                                           <i data-lucide="phone" class="w-8 h-8"></i>
                                                           <span class="text-sm">Assistência</span>
                                                       
                        </div>
                                                    
                        <div class="wizard-nav-item flex flex-col items-center gap-2" data-step="3">
                                                           <i data-lucide="car" class="w-8 h-8"></i>
                                                           <span class="text-sm">Carro Reserva</span>
                                                       
                        </div>
                                                    
                        <div class="wizard-nav-item flex flex-col items-center gap-2" data-step="4">
                                                           <i data-lucide="glasses" class="w-8 h-8"></i>
                                                           <span class="text-sm">Vidros</span>
                                                       
                        </div>
                                                    
                        <div class="wizard-nav-item flex flex-col items-center gap-2" data-step="5">
                                                           <i data-lucide="plus-circle" class="w-8 h-8"></i>
                                                           <span class="text-sm">Opcionais</span>
                                                       
                        </div>
                                                
                     </div>
                                             <!-- Wizard Steps -->
                                             
                     <div class="wizard-steps">
                                                    
                        <div class="wizard-step active" data-step="1">
                                                           
                           <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">Coberturas básicas</h2>
                                                           
                           <p class="text-sm sm:text-base text-gray-400 mb-6">Selecione uma opção de coberturas básicas</p>
                                                           
                           <div id="basicCoverages" class="space-y-3"></div>
                                                       
                        </div>
                                                    
                        <div class="wizard-step" data-step="2">
                                                           
                           <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">Assistência 24h</h2>
                                                           
                           <p class="text-sm sm:text-base text-gray-400 mb-6">Escolha o tipo de assistência</p>
                                                           
                           <div id="supportCoverages" class="space-y-3"></div>
                                                       
                        </div>
                                                    
                        <div class="wizard-step" data-step="3">
                                                           
                           <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">Carro Reserva</h2>
                                                           
                           <p class="text-sm sm:text-base text-gray-400 mb-6">Selecione a duração do carro reserva</p>
                                                           
                           <div id="replacementCoverages" class="space-y-3"></div>
                                                       
                        </div>
                                                    
                        <div class="wizard-step" data-step="4">
                                                           
                           <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">Cobertura para Vidros</h2>
                                                           
                           <p class="text-sm sm:text-base text-gray-400 mb-6">Escolha a proteção para seus vidros</p>
                                                           
                           <div id="glassCoverages" class="space-y-3"></div>
                                                       
                        </div>
                                                    
                        <div class="wizard-step" data-step="5">
                                                           
                           <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">Coberturas Opcionais</h2>
                                                           
                           <p class="text-sm sm:text-base text-gray-400 mb-6">Personalize com coberturas adicionais</p>
                                                           
                           <div id="optionalCoverages" class="space-y-3"></div>
                                                       
                        </div>
                                                
                     </div>
                                             <!-- Navigation Buttons -->
                                             
                     <div class="flex justify-between mt-8">
                                                    <button id="prevStep" class="px-4 py-2 bg-[#2A2F35] text-white rounded-md hover:bg-[#353A41] transition-all duration-300">
                                                        Anterior
                                                    </button>
                                                    <button id="nextStep" class="px-4 py-2 gradient-bg text-[#1A1D21] font-bold rounded-md hover:gradient-hover transition-all duration-300">
                                                        Próximo
                                                    </button>
                                                
                     </div>
                                         
                  </div>
                                      <!-- Right Column - Summary -->
                                      
                  <div class="bg-[#1E2227] rounded-xl shadow-xl p-4 sm:p-6 lg:p-8">
                                             
                     <div class="mb-6">
                                                    
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4">
                                                           
                           <div class="mb-2 sm:mb-0">
                                                                  
                              <h3 class="text-white font-medium">Seu veículo</h3>
                                                                  
                              <p class="text-base sm:text-lg text-white font-bold break-words" id="vehicleName"></p>
                                                                  
                              <p class="text-sm text-gray-400" id="vehicleDetails"></p>
                                                              
                           </div>
                                                           
                           <div class="bg-black rounded-full px-3 py-1 sm:px-4 sm:py-2 self-start sm:self-auto">
                                                                  
                              <p class="text-white text-xs sm:text-sm">Fipe: R$ <span id="fipeValue"></span></p>
                                                              
                           </div>
                                                       
                        </div>
                                                    
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-400 text-sm sm:text-base">
                                                           
                           <div>
                                                                  
                              <p>Franquia (10%)</p>
                                                                  
                              <p class="text-white" id="franchise"></p>
                                                              
                           </div>
                                                           
                           <div>
                                                                  
                              <p>Limite de indenização (LMI)</p>
                                                                  
                              <p class="text-white" id="limit"></p>
                                                              
                           </div>
                                                       
                        </div>
                                                
                     </div>
                                             <!-- Selected Coverages Summary -->
                                             
                     <div class="mb-6 p-4 bg-[#2A2F35] rounded-lg">
                                                    
                        <h4 class="text-white font-medium mb-3">Coberturas selecionadas</h4>
                                                    
                        <div id="selectedCoveragesList" class="space-y-2 text-sm">
                                                           <!-- Selected coverages will be listed here -->
                                                       
                        </div>
                                                
                     </div>
                                             
                     <div class="mb-6">
                                                    
                        <div class="relative">
                                                           <input type="text" 
                                                                  placeholder="Cupom de desconto" 
                                                                  class="w-full px-3 sm:px-4 py-2 sm:py-3 bg-[#2A2F35] text-white text-sm sm:text-base rounded-lg border-2 border-gray-600 focus:border-[rgb(204,255,0)] focus:outline-none"
                                                           >
                                                           <button class="absolute right-2 top-1/2 transform -translate-y-1/2 px-3 sm:px-4 py-1 text-[rgb(204,255,0)] hover:text-[rgb(163,204,0)] text-sm sm:text-base">
                                                               Aplicar
                                                           </button>
                                                       
                        </div>
                                                
                     </div>
                                             
                     <div class="flex justify-between items-start sm:items-center mb-6 text-sm sm:text-base">
                                                    
                        <div>
                                                           
                           <p class="text-gray-400">Valor do seguro</p>
                                                           
                           <p class="text-gray-400">Desconto</p>
                                                           
                           <p class="text-lg sm:text-xl font-bold text-white mt-2">Mensalidade</p>
                                                       
                        </div>
                                                    
                        <div class="text-right">
                                                           
                           <p class="text-white" id="insuranceValue">R$ 0,00</p>
                                                           
                           <p class="text-white" id="discountValue">R$ 0,00</p>
                                                           
                           <p class="text-lg sm:text-xl font-bold text-white mt-2" id="totalValue">R$ 0,00</p>
                                                       
                        </div>
                                                
                     </div>
                                             <button id="contratarButton" class="w-full px-6 py-3 gradient-bg text-[#1A1D21] font-bold rounded-md hover:gradient-hover transition-all duration-300">
                                                 Contratar seguro
                                             </button>
                                         
                  </div>
                                  
               </div>
                           
            </div>
                    
         </main>
             
      </div>
          <script>
                 document.addEventListener('DOMContentLoaded', function() {
                     // Initialize Lucide icons
                     lucide.createIcons();
         
                     const quotation = {!! json_encode($quotation) !!};
         
                     // Initialize selected coverages tracking
                     const selectedCoverages = {
                         basic: null,
                         support: null, // Changed from Set to single value
                         replacement_car: null, // Changed from Set to single value
                         glass: new Set(),
                         optional: new Set()
                     };
         
                     function createCoverageOption(coverage, type) {
                         const div = document.createElement('div');
                         div.className = 'coverage-option p-3 sm:p-4 rounded-lg bg-[#2A2F35] cursor-pointer';
                         div.dataset.id = coverage.id;
                         div.dataset.type = type;
         
                         const content = `
                             <div class="flex justify-between items-center">
                                 <div class="flex items-center gap-2">
                                     <span class="text-white text-sm sm:text-base">${coverage.name}</span>
                                     ${coverage.lmi ? `
                                         <i data-lucide="info" class="w-4 h-4 text-gray-400"></i>
                                     ` : ''}
                                 </div>
                                 <span class="text-white font-medium">
                                     ${type === 'basic' ? 
                                         `${coverage.percent}%` : 
                                         coverage.value ? `${formatCurrency(coverage.value)}/mês` : ''}
                                 </span>
                             </div>
                             ${coverage.lmi ? `<p class="text-gray-400 text-sm mt-2">Limite: ${formatCurrency(coverage.lmi)}</p>` : ''}
                         `;
         
                         div.innerHTML = content;
                         lucide.createIcons({
                             icons: {
                                 info: true
                             }
                         });
         
                         div.addEventListener('click', () => {
                             if (type === 'basic') {
                                 document.querySelectorAll(`[data-type="basic"]`).forEach(el => el.classList.remove('selected'));
                                 selectedCoverages.basic = coverage;
                                 div.classList.add('selected');
                             } else if (type === 'support' || type === 'replacement_car') {
                                 // Handle single selection for support and replacement_car
                                 const currentSelection = selectedCoverages[type];
                                 document.querySelectorAll(`[data-type="${type}"]`).forEach(el => el.classList.remove('selected'));
                                 
                                 if (currentSelection && currentSelection.id === coverage.id) {
                                     // If clicking the same option, deselect it
                                     selectedCoverages[type] = null;
                                 } else {
                                     // Select new option
                                     selectedCoverages[type] = coverage;
                                     div.classList.add('selected');
                                 }
                             } else {
                                 // Multiple selection for other types
                                 div.classList.toggle('selected');
                                 if (div.classList.contains('selected')) {
                                     selectedCoverages[type].add(coverage);
                                 } else {
                                     selectedCoverages[type].delete(coverage);
                                 }
                             }
                             updateSummary();
                             updateWizardNav();
                         });
         
                         return div;
                     }
         
                     function updateSummary() {
                         const selectedList = document.getElementById('selectedCoveragesList');
                         selectedList.innerHTML = '';
                         let total = 0;
         
                         // Add basic coverage if selected (but don't add to total)
                         if (selectedCoverages.basic) {
                             const basic = selectedCoverages.basic;
                             selectedList.appendChild(createSummaryItem(basic.name, `${basic.percent}%`));
                         }
         
                         // Add single selection coverages
                         if (selectedCoverages.support) {
                             selectedList.appendChild(createSummaryItem(selectedCoverages.support.name, selectedCoverages.support.value));
                             total += selectedCoverages.support.value;
                         }
         
                         if (selectedCoverages.replacement_car) {
                             selectedList.appendChild(createSummaryItem(selectedCoverages.replacement_car.name, selectedCoverages.replacement_car.value));
                             total += selectedCoverages.replacement_car.value;
                         }
         
                         // Add multiple selection coverages
                         ['glass', 'optional'].forEach(type => {
                             if (selectedCoverages[type].size > 0) {
                                 selectedCoverages[type].forEach(coverage => {
                                     if (coverage.value) {
                                         selectedList.appendChild(createSummaryItem(coverage.name, coverage.value));
                                         total += coverage.value;
                                     }
                                 });
                             }
                         });
         
                         // Update total values
                         document.getElementById('insuranceValue').textContent = formatCurrency(total);
                         document.getElementById('totalValue').textContent = formatCurrency(total);
                     }
         
                     function createSummaryItem(name, value) {
                         const div = document.createElement('div');
                         div.className = 'flex justify-between text-gray-400';
                         div.innerHTML = `
                             <span>${name}</span>
                             <span>${typeof value === 'number' ? formatCurrency(value) : value}</span>
                         `;
                         return div;
                     }
         
                     function formatCurrency(value) {
                         return new Intl.NumberFormat('pt-BR', {
                             style: 'currency',
                             currency: 'BRL'
                         }).format(value);
                     }
         
                     let currentStep = 1;
                     const totalSteps = 5;
         
                     function updateWizardNav() {
                         document.querySelectorAll('.wizard-nav-item').forEach(item => {
                             const step = parseInt(item.dataset.step);
                             item.classList.remove('active', 'completed');
                             
                             if (step === currentStep) {
                                 item.classList.add('active');
                             } else if (step < currentStep) {
                                 item.classList.add('completed');
                             }
                         });
         
                         document.querySelectorAll('.wizard-step').forEach(step => {
                             step.classList.remove('active');
                             if (parseInt(step.dataset.step) === currentStep) {
                                 step.classList.add('active');
                             }
                         });
         
                         // Update navigation buttons
                         document.getElementById('prevStep').style.display = currentStep === 1 ? 'none' : 'block';
                         document.getElementById('nextStep').textContent = currentStep === totalSteps ? 'Veja o resumo' : 'Próximo';
                     }
         
                     // Navigation event listeners
                     document.getElementById('prevStep').addEventListener('click', () => {
                         if (currentStep > 1) {
                             currentStep--;
                             updateWizardNav();
                         }
                     });
         
                     document.getElementById('nextStep').addEventListener('click', () => {
                         if (currentStep < totalSteps) {
                             currentStep++;
                             updateWizardNav();
                         }
                     });
         
                     // Wizard navigation click handlers
                     document.querySelectorAll('.wizard-nav-item').forEach(item => {
                         item.addEventListener('click', () => {
                             const step = parseInt(item.dataset.step);
                             if (step <= currentStep) {
                                 currentStep = step;
                                 updateWizardNav();
                             }
                         });
                     });
         
                     // Initialize vehicle information
                     document.getElementById('vehicleName').textContent = `${quotation.brand} ${quotation.model}`;
                     document.getElementById('vehicleDetails').textContent = `${quotation.year} - ${quotation.fuel}`;
                     document.getElementById('fipeValue').textContent = formatCurrency(quotation.value);
                     document.getElementById('franchise').textContent = formatCurrency(quotation.value * 0.1);
                     document.getElementById('limit').textContent = formatCurrency(quotation.value);
         
                     // Populate coverage sections
                     const coverageTypes = {
                         basic: document.getElementById('basicCoverages'),
                         support: document.getElementById('supportCoverages'),
                         replacement_car: document.getElementById('replacementCoverages'),
                         glass: document.getElementById('glassCoverages'),
                         optional: document.getElementById('optionalCoverages')
                     };
         
                     // Populate each coverage section
                     Object.entries(coverageTypes).forEach(([type, container]) => {
                         if (quotation.coverage[type] && container) {
                             quotation.coverage[type].forEach(coverage => {
                                 if (coverage.enabled && (!coverage.show || coverage.show === true)) {
                                     container.appendChild(createCoverageOption(coverage, type));
                                 }
                             });
                         }
                     });
         
                     // Initialize wizard navigation
                     updateWizardNav();
                     
                     function sendToApi() {
            // Collecting data from selectedCoverages and other necessary info
            const requestData = {
                quotationId: quotation.id,
                selectedCoverages: {
                    basic: selectedCoverages.basic,
                    support: selectedCoverages.support,
                    replacement_car: selectedCoverages.replacement_car,
                    glass: Array.from(selectedCoverages.glass),
                    optional: Array.from(selectedCoverages.optional)
                },
                totalAmount: document.getElementById('totalValue').textContent
            };

            fetch('/api/contratar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(requestData)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Sucesso:', data);
                window.location.href = data.redirect_url;
            })
            .catch(error => {
                console.error('Erro na requisição:', error);
                alert('Erro na requisição, tente novamente.');
            });
        }

        // When user clicks the "Contratar agora" button
        document.getElementById('contratarButton').addEventListener('click', function() {
            sendToApi();
        });
                 });


               
      </script>
   </body>
</html>