<!DOCTYPE html>
<html lang="pt-BR">
   <head>
          
      <meta charset="UTF-8">
          
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
          
      <title>Select Seguros - Checkout</title>
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
                 .payment-option {
                     transition: all 0.3s ease;
                     border: 2px solid transparent;
                 }
                 .payment-option:hover {
                     border-color: rgb(204, 255, 0);
                     transform: translateY(-2px);
                 }
                 .payment-option.selected {
                     border-color: rgb(204, 255, 0);
                     background: rgba(204, 255, 0, 0.1);
                 }
                 .card-input {
                     background-color: #2A2F35;
                     border: 2px solid #4B5563;
                     border-radius: 0.5rem;
                     height: 48px;
                     padding: 8px 16px;
                     width: 100%;
                     color: #fff;
                     transition: all 0.2s ease-in-out;
                 }
                 .card-input:focus {
                     border-color: rgb(204, 255, 0);
                     box-shadow: 0 0 0 1px rgb(204, 255, 0);
                     outline: none;
                 }
                 .card-input::placeholder {
                     color: #9CA3AF;
                 }
                 .card-container {
                     perspective: 1000px;
                 }
                 .card {
                     position: relative;
                     width: 100%;
                     height: 200px;
                     transition: transform 0.6s;
                     transform-style: preserve-3d;
                 }
                 .card.flipped {
                     transform: rotateY(180deg);
                 }
                 .card-front,
                 .card-back {
                     position: absolute;
                     width: 100%;
                     height: 100%;
                     backface-visibility: hidden;
                     border-radius: 1rem;
                     padding: 1.5rem;
                 }
                 .card-front {
                     background: linear-gradient(135deg, #2A2F35 0%, #1A1D21 100%);
                 }
                 .card-back {
                     background: linear-gradient(135deg, #1A1D21 0%, #2A2F35 100%);
                     transform: rotateY(180deg);
                 }
                 .magnetic-stripe {
                     background: #000;
                     height: 40px;
                     margin: 20px 0;
                 }
                 @keyframes pulse {
                     0% { transform: scale(1); }
                     50% { transform: scale(1.05); }
                     100% { transform: scale(1); }
                 }
                 .payment-success {
                     animation: pulse 2s infinite;
                 }
             
      </style>
   </head>
   <body class="min-h-screen bg-[#1A1D21]">
          
      <div class="min-h-screen flex flex-col">
                 
         <main class="flex-1 py-6 px-4 sm:px-6 lg:px-8">
                        
            <div class="max-w-4xl mx-auto">
                               
               <div class="mb-8">
                                      
                  <h1 class="text-4xl font-bold flex items-center">
                                             <span class="logo-text">SELECT</span>
                                             <span class="text-gray-400 ml-2">SEGUROS</span>
                                         
                  </h1>
                                  
               </div>
                               
               <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                      <!-- Left Column - Payment Form -->
                                      
                  <div class="bg-[#1E2227] rounded-xl shadow-xl p-6">
                                             
                     <h2 class="text-2xl font-bold text-white mb-6">Informações de Pagamento</h2>
                                             
                                             <!-- Personal Info -->
                                             
                     <div class="space-y-4 mb-8">

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Nome</label>
                            <input type="nome" class="card-input" placeholder="seu nome" value="{{$quotation->name}}" disabled >
                        </div>
                        <caption></caption>

                        <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">WhatsApp</label>
                        <input
                            type="tel"
                            id="whatsapp"
                            class="card-input"
                            placeholder="(82) 9-9999-9999"
                            maxlength="16"
                            value="{{$quotation->whatsapp}}"
                            disabled
                            >
                            </div>


                        <div>
                                                           <label class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                                                           <input type="email" class="card-input" placeholder="seu@email.com">
                                                       
                        </div>
                                                    
                        <div>
                                                           <label class="block text-sm font-medium text-gray-300 mb-2">CPF</label>
                                                           <input type="text" class="card-input" placeholder="000.000.000-00" id="cpf">
                                                       
                        </div>
                                                
                     </div>
                                             <!-- Payment Methods -->
                                             
                     <div class="space-y-4 mb-8">
                                                    
                        <h3 class="text-lg font-semibold text-white">Método de Pagamento</h3>
                                                    
                        <div class="grid grid-cols-3 gap-4">
                                                           
                           <div class="payment-option bg-[#2A2F35] p-4 rounded-lg cursor-pointer" data-method="credit">
                                                                  
                              <div class="flex flex-col items-center">
                                                                         <i data-lucide="credit-card" class="w-6 h-6 text-gray-400 mb-2"></i>
                                                                         <span class="text-sm text-white">Cartão</span>
                                                                     
                              </div>
                                                              
                           </div>
                                                           
                           <div class="payment-option bg-[#2A2F35] p-4 rounded-lg cursor-pointer" data-method="pix">
                                                                  
                              <div class="flex flex-col items-center">
                                                                         <i data-lucide="qr-code" class="w-6 h-6 text-gray-400 mb-2"></i>
                                                                         <span class="text-sm text-white">PIX</span>
                                                                     
                              </div>
                                                              
                           </div>
                                                           
                           <div class="payment-option bg-[#2A2F35] p-4 rounded-lg cursor-pointer" data-method="boleto">
                                                                  
                              <div class="flex flex-col items-center">
                                                                         <i data-lucide="barcode" class="w-6 h-6 text-gray-400 mb-2"></i>
                                                                         <span class="text-sm text-white">Boleto</span>
                                                                     
                              </div>
                                                              
                           </div>
                                                       
                        </div>
                                                
                     </div>
                                             <!-- Credit Card Form -->
                                             
                     <div id="creditCardForm" class="space-y-6">
                                                    
                        <div class="card-container">
                                                           
                           <div class="card">
                                                                  
                              <div class="card-front">
                                                                         
                                 <div class="flex justify-between items-start">
                                                                                
                                    <div class="text-gray-400">
                                                                                       <i data-lucide="credit-card" class="w-8 h-8"></i>
                                                                                   
                                    </div>
                                                                                
                                    <div class="text-gray-400">
                                                                                       <i data-lucide="wifi" class="w-6 h-6"></i>
                                                                                   
                                    </div>
                                                                            
                                 </div>
                                                                         
                                 <div class="mt-8">
                                                                                
                                    <div id="cardNumber" class="text-xl text-white font-mono">•••• •••• •••• ••••</div>
                                                                            
                                 </div>
                                                                         
                                 <div class="mt-8 flex justify-between">
                                                                                
                                    <div>
                                                                                       
                                       <div class="text-xs text-gray-400">Titular</div>
                                                                                       
                                       <div id="cardName" class="text-white font-mono">NOME DO TITULAR</div>
                                                                                   
                                    </div>
                                                                                
                                    <div>
                                                                                       
                                       <div class="text-xs text-gray-400">Validade</div>
                                                                                       
                                       <div id="cardExpiry" class="text-white font-mono">MM/AA</div>
                                                                                   
                                    </div>
                                                                            
                                 </div>
                                                                     
                              </div>
                                                                  
                              <div class="card-back">
                                                                         
                                 <div class="magnetic-stripe"></div>
                                                                         
                                 <div class="flex justify-end mt-4">
                                                                                
                                    <div>
                                                                                       
                                       <div class="text-xs text-gray-400">CVV</div>
                                                                                       
                                       <div id="cardCvv" class="text-white font-mono">•••</div>
                                                                                   
                                    </div>
                                                                            
                                 </div>
                                                                     
                              </div>
                                                              
                           </div>
                                                       
                        </div>
                                                    
                        <div class="space-y-4">
                                                           
                           <div>
                                                                  <label class="block text-sm font-medium text-gray-300 mb-2">Número do Cartão</label>
                                                                  <input type="text" class="card-input" placeholder="0000 0000 0000 0000" id="cardNumberInput">
                                                              
                           </div>
                                                           
                           <div>
                                                                  <label class="block text-sm font-medium text-gray-300 mb-2">Nome do Titular</label>
                                                                  <input type="text" class="card-input" placeholder="Nome como está no cartão" id="cardNameInput">
                                                              
                           </div>
                                                           
                           <div class="grid grid-cols-2 gap-4">
                                                                  
                              <div>
                                                                         <label class="block text-sm font-medium text-gray-300 mb-2">Validade</label>
                                                                         <input type="text" class="card-input" placeholder="MM/AA" id="cardExpiryInput">
                                                                     
                              </div>
                                                                  
                              <div>
                                                                         <label class="block text-sm font-medium text-gray-300 mb-2">CVV</label>
                                                                         <input type="text" class="card-input" placeholder="000" id="cardCvvInput" maxlength="3">
                                                                     
                              </div>
                                                              
                           </div>
                                                       
                        </div>
                                                
                     </div>
                                             <!-- PIX Section (hidden by default) -->
                                             
                     <div id="pixSection" class="hidden text-center py-8">
                                                    <i data-lucide="qr-code" class="w-32 h-32 mx-auto text-gray-400 mb-4"></i>
                                                    
                        <p class="text-white mb-4">Escaneie o QR Code para pagar</p>
                                                    <button class="text-gray-400 hover:text-white flex items-center justify-center gap-2 mx-auto">
                                                        <i data-lucide="copy" class="w-4 h-4"></i>
                                                        Copiar código PIX
                                                    </button>
                                                
                     </div>
                                             <!-- Boleto Section (hidden by default) -->
                                             
                     <div id="boletoSection" class="hidden text-center py-8">
                                                    <i data-lucide="file-text" class="w-32 h-32 mx-auto text-gray-400 mb-4"></i>
                                                    
                        <p class="text-white mb-4">Seu boleto foi gerado</p>
                                                    <button class="text-gray-400 hover:text-white flex items-center justify-center gap-2 mx-auto">
                                                        <i data-lucide="download" class="w-4 h-4"></i>
                                                        Baixar boleto
                                                    </button>
                                                
                     </div>
                                         
                  </div>
                                      <!-- Right Column - Summary -->
                                      
                  <div class="bg-[#1E2227] rounded-xl shadow-xl p-6">
                                             
                     <h2 class="text-2xl font-bold text-white mb-6">Resumo da Compra</h2>
                                             
                                             
                     <div class="space-y-4 mb-8">
                                                    
                        <div class="flex justify-between text-gray-400">
                                                           <span>Seguro Mensal</span>
                                                           <span>R$ 169,90</span>
                                                       
                        </div>
                                                    
                        <div class="flex justify-between text-gray-400">
                                                           <span>Assistência 24h</span>
                                                           <span>R$ 29,90</span>
                                                       
                        </div>
                                                    
                        <div class="flex justify-between text-gray-400">
                                                           <span>Proteção para Vidros</span>
                                                           <span>R$ 19,90</span>
                                                       
                        </div>
                                                
                     </div>
                                             
                     <div class="border-t border-gray-700 pt-4 mb-8">
                                                    
                        <div class="flex justify-between text-xl font-bold text-white">
                                                           <span>Total</span>
                                                           <span>R$ 219,70</span>
                                                       
                        </div>
                                                    
                        <p class="text-gray-400 text-sm mt-2">ou 12x de R$ 18,31</p>
                                                
                     </div>
                                             <button class="w-full px-6 py-3 gradient-bg text-[#1A1D21] font-bold rounded-md hover:gradient-hover transition-all duration-300">
                                                 Finalizar Pagamento
                                             </button>
                                             
                     <div class="mt-6 flex items-center justify-center gap-2 text-gray-400">
                                                    <i data-lucide="shield-check" class="w-5 h-5"></i>
                                                    <span class="text-sm">Pagamento 100% seguro</span>
                                                
                     </div>
                                         
                  </div>
                                  
               </div>
                           
            </div>
                    
         </main>
             
      </div>
          <script>
                 document.addEventListener('DOMContentLoaded', function() {
                     // Initialize Lucide icons
                     lucide.createIcons();
         
                     // Payment method selection
                     const paymentOptions = document.querySelectorAll('.payment-option');
                     const creditCardForm = document.getElementById('creditCardForm');
                     const pixSection = document.getElementById('pixSection');
                     const boletoSection = document.getElementById('boletoSection');
         
                     paymentOptions.forEach(option => {
                         option.addEventListener('click', () => {
                             // Remove selection from all options
                             paymentOptions.forEach(opt => opt.classList.remove('selected'));
                             // Add selection to clicked option
                             option.classList.add('selected');
         
                             // Show/hide payment sections
                             const method = option.dataset.method;
                             creditCardForm.style.display = method === 'credit' ? 'block' : 'none';
                             pixSection.style.display = method === 'pix' ? 'block' : 'none';
                             boletoSection.style.display = method === 'boleto' ? 'block' : 'none';
                         });
                     });
         
                     // Credit card form interaction
                     const card = document.querySelector('.card');
                     const cardCvvInput = document.getElementById('cardCvvInput');
         
                     cardCvvInput.addEventListener('focus', () => {
                         card.classList.add('flipped');
                     });
         
                     cardCvvInput.addEventListener('blur', () => {
                         card.classList.remove('flipped');
                     });
         
                     // Card number formatting
                     const cardNumberInput = document.getElementById('cardNumberInput');
                     cardNumberInput.addEventListener('input', (e) => {
                         let value = e.target.value.replace(/\D/g, '');
                         value = value.replace(/(.{4})/g, '$1 ').trim();
                         e.target.value = value;
                         document.getElementById('cardNumber').textContent = value || '•••• •••• •••• ••••';
                     });
         
                     // Card name formatting
                     const cardNameInput = document.getElementById('cardNameInput');
                     cardNameInput.addEventListener('input', (e) => {
                         const value = e.target.value.toUpperCase();
                         document.getElementById('cardName').textContent = value || 'NOME DO TITULAR';
                     });
         
                     // Card expiry formatting
                     const cardExpiryInput = document.getElementById('cardExpiryInput');
                     cardExpiryInput.addEventListener('input', (e) => {
                         let value = e.target.value.replace(/\D/g, '');
                         if (value.length >= 2) {
                             value = value.slice(0, 2) + '/' + value.slice(2, 4);
                         }
                         e.target.value = value;
                         document.getElementById('cardExpiry').textContent = value || 'MM/AA';
                     });
         
                     // Card CVV
                     cardCvvInput.addEventListener('input', (e) => {
                         const value = e.target.value.replace(/\D/g, '').slice(0, 3);
                         e.target.value = value;
                         document.getElementById('cardCvv').textContent = value || '•••';
                     });
         
                     // CPF formatting
                     const cpfInput = document.getElementById('cpf');
                     cpfInput.addEventListener('input', (e) => {
                         let value = e.target.value.replace(/\D/g, '');
                         value = value.replace(/(\d{3})(\d)/, '$1.$2');
                         value = value.replace(/(\d{3})(\d)/, '$1.$2');
                         value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                         e.target.value = value;
                     });
                 });
             
      </script>
   </body>
</html>