<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Select Seguros - Segurança que cabe na sua vida</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
      body {
        font-family: 'Inter', sans-serif;
      }
      .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
      }
      .faq-item.active .faq-answer {
        max-height: 200px;
      }
      .faq-item.active .fa-plus {
        transform: rotate(45deg);
      }
      .transition-height {
          transition: all 0.3s ease-in-out;
      }
      .checkmark {
          width: 28px;
          height: 28px;
          border-radius: 50%;
          background-color: rgb(204, 255, 0);
          position: relative;
      }
      .checkmark::after {
          content: '✓';
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          color: #000;
          font-weight: bold;
      }
    </style>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              'select-beige': '#E9E2D0',
              'select-blue': '#0000FF',
              'select-green': '#CCFF00',
              'select-black': '#000000'
            }
          }
        }
      }
    </script>
  </head>
  <body class="bg-select-black text-white">
    <!-- Header/Navbar -->
    <header class="py-4 px-6 border-b border-gray-800">
      <div class="container mx-auto">
        <div class="flex justify-between items-center">
          <div class="flex items-center">
            <span class="text-select-green font-bold text-xl">S</span>
            <span class="text-select-blue font-bold text-xl">ELECT</span>
            <span class="text-select-beige text-sm ml-1">SEGUROS</span>
          </div>
          
          <div class="hidden md:flex items-center space-x-8">
            <a href="#sobre" class="text-sm text-select-beige hover:text-white">Sobre</a>
            <a href="#coberturas" class="text-sm text-select-beige hover:text-white">Coberturas</a>
            <a href="#" class="text-sm text-select-beige hover:text-white">Contato</a>
          </div>
          
          <div class="flex items-center space-x-4">
            <a href="cotacao" class="bg-select-green text-black px-4 py-2 rounded-full text-sm font-medium hover:bg-opacity-90 transition-colors">
              Fazer Cotação<i class="fas fa-arrow-right ml-1"></i>
            </a>
            <a href="/login" class="bg-transparent border border-select-blue text-select-blue px-4 py-2 rounded-full text-sm font-medium hover:bg-select-blue hover:bg-opacity-10 transition-colors">
              Painel do Cliente<i class="fas fa-user-shield ml-1"></i>
            </a>
          </div>
        </div>
      </div>
    </header>

    <!-- Hero Section -->
    <section class="py-16 md:py-24">
      <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center">
          <div class="md:w-1/2 mb-10 md:mb-0">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">
              <span class="text-select-green">Segu</span><span class="text-select-blue">rança</span> que cabe<br>na sua vida.
            </h1>
            
            <p class="text-select-beige mb-8 max-w-lg">
              A Select Seguros não vende apenas proteção, ela entrega tranquilidade, liberdade e inovação. Nosso compromisso é tornar o seguro simples, rápido e flexível.
            </p>
            
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
              <a href="cotacao" class="bg-select-green text-black px-6 py-3 rounded-full text-sm font-medium hover:bg-opacity-90 transition-colors flex items-center justify-center">
                Fazer cotação agora <i class="fas fa-arrow-right ml-2"></i>
              </a>
              <a href="#" class="text-white px-6 py-3 text-sm font-medium hover:text-select-green transition-colors flex items-center justify-center">
                Saiba mais <i class="fas fa-arrow-right ml-2"></i>
              </a>
            </div>
          </div>
          
          <div class="md:w-1/2">
            <div class="relative rounded-lg overflow-hidden">
              <img src="https://images.unsplash.com/photo-1619767886558-efdc259cde1a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="Tesla Model 3" class="w-full h-auto rounded-lg">
              
              <div class="absolute bottom-4 left-4 bg-black bg-opacity-70 p-3 rounded-lg flex items-center">
                <div class="w-8 h-8 bg-select-green rounded-full flex items-center justify-center mr-3">
                  <i class="fas fa-shield-alt text-black"></i>
                </div>
                <div>
                  <p class="text-xs text-white">Seguro autorizado</p>
                  <p class="text-xs text-select-beige">SUSEP</p>
                </div>
              </div>
              
              <div class="absolute bottom-4 right-4 bg-black bg-opacity-70 p-3 rounded-lg">
                <p class="text-select-green font-bold">40k+</p>
                <p class="text-xs text-select-beige">Clientes satisfeitos</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Why Choose Us Section -->
    <section id="sobre" class="py-16 bg-select-black">
      <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-2">Por que escolher a <span class="text-select-green">Select</span>?</h2>
        <p class="text-select-beige mb-12 max-w-2xl mx-auto">
          Combinamos tecnologia e experiência para oferecer o melhor serviço em seguros do mercado.
        </p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-gray-900 p-8 rounded-lg">
            <div class="w-12 h-12 bg-select-green rounded-full flex items-center justify-center mx-auto mb-6">
              <i class="fas fa-bolt text-black"></i>
            </div>
            <h3 class="text-xl font-bold mb-4">Cotação Instantânea</h3>
            <p class="text-select-beige">
              Receba sua cotação em menos de 5 minutos, 100% online e sem burocracia.
            </p>
          </div>
          
          <div class="bg-gray-900 p-8 rounded-lg">
            <div class="w-12 h-12 bg-select-green rounded-full flex items-center justify-center mx-auto mb-6">
              <i class="fas fa-shield-alt text-black"></i>
            </div>
            <h3 class="text-xl font-bold mb-4">Cobertura Completa</h3>
            <p class="text-select-beige">
              Proteção abrangente para seu veículo com as melhores condições do mercado.
            </p>
          </div>
          
          <div class="bg-gray-900 p-8 rounded-lg">
            <div class="w-12 h-12 bg-select-green rounded-full flex items-center justify-center mx-auto mb-6">
              <i class="fas fa-headset text-black"></i>
            </div>
            <h3 class="text-xl font-bold mb-4">Suporte 24/7</h3>
            <p class="text-select-beige">
              Assistência técnica e atendimento disponível 24 horas por dia, 7 dias por semana.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Auto Insurance Benefits Section -->
    <section id="coberturas" class="py-16 bg-gray-900">
      <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-8 text-center">Coberturas<br>
         <span class="text-select-green">Seguros garantidos pela SUSEP</span></h2>
        
        <div class="max-w-3xl mx-auto space-y-4">
          <div class="flex flex-col gap-6">
            <div class="border-b border-b-[#E9EBFF]">
                                  
              <button onclick="toggleContent('furto')" class="w-full flex items-center py-3 cursor-pointer">
                                          
                  <div class="w-[54px]">
                                                
                    <div class="checkmark"></div>
                                            
                  </div>
                                          
                  <h4 class="flex-grow text-left font-semibold">Furto e Roubo</h4>
                                          
                  <div class="w-[24px]">
                                                
                    <svg id="arrow-furto" class="transform transition-transform" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        
                        <path d="M6 9l6 6 6-6"/>
                                                    
                    </svg>
                                            
                  </div>
                                      
              </button>
                                  
              <div id="furto" class="h-0 opacity-0 overflow-hidden transition-height">
                                          
                  <h4 class="text-sm">Cobrimos até 100% do valor do seu carro na tabela FIPE em casos de:*</h4>
                                          
                  <p class="text-sm">• Roubo</p>
                                          
                  <p class="text-sm">• Furto</p>
                                          
                  <p class="text-sm pt-4 text-right">Regulados pela SUSEP</p>
                                      
              </div>
                              
            </div>
                            <!-- Assistência 24h -->
                            
            <div class="border-b border-b-[#E9EBFF]">
                                  
              <button onclick="toggleContent('assistencia')" class="w-full flex items-center py-3 cursor-pointer">
                                          
                  <div class="w-[54px]">
                                                
                    <div class="checkmark"></div>
                                            
                  </div>
                                          
                  <h4 class="flex-grow text-left font-semibold">Assistência 24h</h4>
                                          
                  <div class="w-[24px]">
                                                
                    <svg id="arrow-assistencia" class="transform transition-transform" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        
                        <path d="M6 9l6 6 6-6"/>
                                                    
                    </svg>
                                            
                  </div>
                                      
              </button>
                                  
              <div id="assistencia" class="h-0 opacity-0 overflow-hidden transition-height">
                                          
                  <h4 class="text-sm">Assistência 24h completa via 0800 em todo o território nacional, contendo:</h4>
                                          
                  <p class="text-sm">• Reboque</p>
                                          
                  <p class="text-sm">• Hotel para até 5 pessoas</p>
                                          
                  <p class="text-sm">• Chaveiro</p>
                                          
                  <p class="text-sm">• Assistência para pane elétrica</p>
                                          
                  <p class="text-sm">• Assistência para pane mecânica</p>
                                          
                  <p class="text-sm">• Auxílio na falta de combustível</p>
                                          
                  <p class="text-sm">• Táxi ou transporte alternativo</p>
                                          
                  <p class="text-sm">• Troca de pneus</p>
                                          
                  <p class="text-sm">• Recarga de bateria</p>
                                      
              </div>
                              
            </div>
                            <!-- Carro Reserva -->
                            
            <div class="border-b border-b-[#E9EBFF]">
                                  
              <button onclick="toggleContent('carro-reserva')" class="w-full flex items-center py-3 cursor-pointer">
                                          
                  <div class="w-[54px]">
                                                
                    <div class="checkmark"></div>
                                            
                  </div>
                                          
                  <h4 class="flex-grow text-left font-semibold">Carro Reserva</h4>
                                          
                  <div class="w-[24px]">
                                                
                    <svg id="arrow-carro-reserva" class="transform transition-transform" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        
                        <path d="M6 9l6 6 6-6"/>
                                                    
                    </svg>
                                            
                  </div>
                                      
              </button>
                                  
              <div id="carro-reserva" class="h-0 opacity-0 overflow-hidden transition-height">
                                          
                  <h4 class="text-sm">Carro reserva:</h4>
                                          
                  <p class="text-sm">• Carro reserva por 7 dias em caso de colisão, incêndio, roubo ou furto.</p>
                                      
              </div>
                              
            </div>
                            <!-- Colisão -->
                            
            <div class="border-b border-b-[#E9EBFF]">
                                  
              <button onclick="toggleContent('colisao')" class="w-full flex items-center py-3 cursor-pointer">
                                          
                  <div class="w-[54px]">
                                                
                    <div class="checkmark"></div>
                                            
                  </div>
                                          
                  <h4 class="flex-grow text-left font-semibold">Colisão</h4>
                                          
                  <div class="w-[24px]">
                                                
                    <svg id="arrow-colisao" class="transform transition-transform" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        
                        <path d="M6 9l6 6 6-6"/>
                                                    
                    </svg>
                                            
                  </div>
                                      
              </button>
                                  
              <div id="colisao" class="h-0 opacity-0 overflow-hidden transition-height">
                                          
                  <h4 class="text-sm">Colisão:*</h4>
                                          
                  <p class="text-sm">• Pagamento integral ou parcial em caso de colisão</p>
                                          
                  <h4 class="text-sm mt-2">Fenômenos da natureza:*</h4>
                                          
                  <p class="text-sm">• Alagamento</p>
                                          
                  <p class="text-sm">• Granizo</p>
                                          
                  <p class="text-sm">• Queda de árvore e suas consequências</p>
                                          
                                          
                  <p class="text-sm pt-2 pl-2">Franquia reduzida:</p>
                                          
                  <p class="text-sm pl-2">i) VEÍCULOS DE PASSEIO: 5% (cinco por cento) do valor correspondente à Tabela Fipe do veículo à data do ocorrido, não podendo este ser inferior a R$2.500,00 (dois mil e quinhentos reais);</p>
                                          
                  <p class="text-sm pl-2">ii) VEÍCULOS DIFERENCIADOS: 8% (oito por cento) do valor correspondente à Tabela Fipe do veículo à data do ocorrido, não podendo este ser inferior a R$3.500,00 (três mil e quinhentos reais);</p>
                                          
                  <p class="text-sm pl-2">iii) VEÍCULOS IMPORTADOS: 10% (dez por cento) do valor correspondente à Tabela Fipe do veículo à data do ocorrido, não podendo este ser inferior a R$5.000,00 (cinco mil reais);</p>
                                          
                                          
                  <p class="text-sm pt-4 text-right">* Regulados pela SUSEP</p>
                                      
              </div>
                              
            </div>
                            <!-- Terceiros -->
                            
            <div class="border-b border-b-[#E9EBFF]">
                                  
              <button onclick="toggleContent('terceiros')" class="w-full flex items-center py-3 cursor-pointer">
                                          
                  <div class="w-[54px]">
                                                
                    <div class="checkmark"></div>
                                            
                  </div>
                                          
                  <h4 class="flex-grow text-left font-semibold">Terceiros</h4>
                                          
                  <div class="w-[24px]">
                                                
                    <svg id="arrow-terceiros" class="transform transition-transform" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        
                        <path d="M6 9l6 6 6-6"/>
                                                    
                    </svg>
                                            
                  </div>
                                      
              </button>
                                  
              <div id="terceiros" class="h-0 opacity-0 overflow-hidden transition-height">
                                          
                  <h4 class="text-sm">Danos a terceiros:*</h4>
                                          
                  <p class="text-sm">• Danos materiais</p>
                                          
                  <p class="text-sm">• Danos corporais</p>
                                          
                  <p class="text-sm">• Reparo ou indenização em até R$100.000,00</p>
                                          
                  <p class="text-sm pt-4 text-right">* Regulados pela SUSEP</p>
                                      
              </div>
                              
            </div>
                            <!-- APP -->
                            
            <div class="border-b border-b-[#E9EBFF]">
                                  
              <button onclick="toggleContent('app')" class="w-full flex items-center py-3 cursor-pointer">
                                          
                  <div class="w-[54px]">
                                                
                    <div class="checkmark"></div>
                                            
                  </div>
                                          
                  <h4 class="flex-grow text-left font-semibold">APP</h4>
                                          
                  <div class="w-[24px]">
                                                
                    <svg id="arrow-app" class="transform transition-transform" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        
                        <path d="M6 9l6 6 6-6"/>
                                                    
                    </svg>
                                            
                  </div>
                                      
              </button>
                                  
              <div id="app" class="h-0 opacity-0 overflow-hidden transition-height">
                                          
                  <h4 class="text-sm">Seguros Acidentes Pessoais a Passageiros (APP):*</h4>
                                          
                  <p class="text-sm">• Indenização de R$10.000,00 em caso se morte ou invalidez</p>
                                          
                  <p class="text-sm">• Reembolso de despesas hospitalares até R$3.000,00</p>
                                          
                  <p class="text-sm pt-4 text-right">* Regulados pela SUSEP</p>
                                      
              </div>
                              
            </div>
                            <!-- Vidros Completo -->
                            
            <div class="border-b border-b-[#E9EBFF]">
                                  
              <button onclick="toggleContent('vidros')" class="w-full flex items-center py-3 cursor-pointer">
                                          
                  <div class="w-[54px]">
                                                
                    <div class="checkmark"></div>
                                            
                  </div>
                                          
                  <h4 class="flex-grow text-left font-semibold">Vidros Completo</h4>
                                          
                  <div class="w-[24px]">
                                                
                    <svg id="arrow-vidros" class="transform transition-transform" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        
                        <path d="M6 9l6 6 6-6"/>
                                                    
                    </svg>
                                            
                  </div>
                                      
              </button>
                                  
              <div id="vidros" class="h-0 opacity-0 overflow-hidden transition-height">
                                          
                  <h4 class="text-sm">Troca ou reparo de:</h4>
                                          
                  <p class="text-sm">• Vidros laterais</p>
                                          
                  <p class="text-sm">• Vidro traseiro</p>
                                          
                  <p class="text-sm">• Para-brisa</p>
                                          
                  <p class="text-sm">• Retrovisores</p>
                                          
                  <p class="text-sm">• Lanternas</p>
                                          
                  <p class="text-sm">• Faróis</p>
                                      
              </div>
                              
            </div>
                            <!-- Botão Saiba Mais -->
                            
            <div class="text-center mt-8">
                                  
            <a href="#cotacao" class="bg-select-green text-black px-6 py-3 rounded-full text-sm font-medium hover:bg-opacity-90 transition-colors flex items-center justify-center">
              Fazer cotação agora<i class="fas fa-arrow-right ml-2"></i>
            </a>
                              
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gray-900">
      <div class="container mx-auto px-6">
        <div class="bg-select-black p-10 rounded-xl max-w-4xl mx-auto">
          <h2 class="text-3xl font-bold mb-4">Pronto para ter o melhor seguro auto do mercado?</h2>
          <p class="text-select-beige mb-8">
            Faça sua cotação agora mesmo e garanta a proteção que você e seu veículo merecem.
          </p>
          
          <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="#" class="bg-select-green text-black px-6 py-3 rounded-full text-sm font-medium hover:bg-opacity-90 transition-colors flex items-center justify-center">
              Fazer cotação <i class="fas fa-arrow-right ml-2"></i>
            </a>
            <a href="#" class="border border-select-blue text-white px-6 py-3 rounded-full text-sm font-medium hover:border-select-green hover:text-select-green transition-colors flex items-center justify-center">
              Falar com consultor
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ Section with Collapse -->
    <section class="py-16 bg-select-black">
      <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-12 text-center">Perguntas Frequentes</h2>
        
        <div class="max-w-3xl mx-auto space-y-4">
          <div class="faq-item bg-gray-900 rounded-lg overflow-hidden">
            <button class="faq-question flex justify-between items-center w-full text-left p-4">
              <p class="font-medium">Como funciona o processo de cotação do seguro auto?</p>
              <i class="fas fa-plus text-select-green transition-transform duration-300"></i>
            </button>
            <div class="faq-answer px-4">
              <p class="text-select-beige">
                Nosso processo de cotação é 100% digital e leva menos de 5 minutos. Basta informar os dados do seu veículo e suas informações pessoais. Nossa tecnologia analisa instantaneamente as melhores opções e apresenta a cotação ideal para o seu perfil.
              </p>
            </div>
          </div>
          
          <div class="faq-item bg-gray-900 rounded-lg overflow-hidden">
            <button class="faq-question flex justify-between items-center w-full text-left p-4">
              <p class="font-medium">Quais são as coberturas incluídas no seguro auto da Select?</p>
              <i class="fas fa-plus text-select-green transition-transform duration-300"></i>
            </button>
            <div class="faq-answer px-4">
              <p class="text-select-beige">
                Nosso seguro auto inclui cobertura contra colisão, roubo, furto, incêndio, danos a terceiros, assistência 24h com guincho ilimitado, carro reserva, cobertura para vidros, faróis e lanternas, indenização por perda total conforme tabela FIPE e muito mais. Você pode personalizar sua apólice de acordo com suas necessidades.
              </p>
            </div>
          </div>
          
          <div class="faq-item bg-gray-900 rounded-lg overflow-hidden">
            <button class="faq-question flex justify-between items-center w-full text-left p-4">
              <p class="font-medium">Como acionar o seguro em caso de sinistro ou emergência?</p>
              <i class="fas fa-plus text-select-green transition-transform duration-300"></i>
            </button>
            <div class="faq-answer px-4">
              <p class="text-select-beige">
                Em caso de sinistro ou emergência, você pode acionar o seguro de três formas: pelo nosso aplicativo Select Seguros (mais rápido), pelo telefone 0800 disponível 24h ou pelo WhatsApp. Nossa central de atendimento está preparada para dar todo o suporte necessário e enviar assistência imediata.
              </p>
            </div>
          </div>
          
          <div class="faq-item bg-gray-900 rounded-lg overflow-hidden">
            <button class="faq-question flex justify-between items-center w-full text-left p-4">
              <p class="font-medium">Quais são as vantagens de ter um seguro auto?</p>
              <i class="fas fa-plus text-select-green transition-transform duration-300"></i>
            </button>
            <div class="faq-answer px-4">
              <p class="text-select-beige">
                Ter um seguro auto proporciona tranquilidade financeira e emocional. Você estará protegido contra prejuízos causados por acidentes, roubos, furtos e danos naturais. Além disso, conta com assistência 24h para qualquer emergência, garantindo que você nunca fique desamparado na estrada. Com o seguro Select, você ainda tem benefícios exclusivos como descontos progressivos e programa de fidelidade.
              </p>
            </div>
          </div>
          
          <div class="faq-item bg-gray-900 rounded-lg overflow-hidden">
            <button class="faq-question flex justify-between items-center w-full text-left p-4">
              <p class="font-medium">O seguro cobre danos causados por eventos naturais?</p>
              <i class="fas fa-plus text-select-green transition-transform duration-300"></i>
            </button>
            <div class="faq-answer px-4">
              <p class="text-select-beige">
                Sim, nosso seguro auto cobre danos causados por eventos naturais como enchentes, granizo, queda de árvores, deslizamentos e outros fenômenos da natureza. Esta é uma cobertura essencial, especialmente considerando as mudanças climáticas e eventos extremos cada vez mais frequentes.
              </p>
            </div>
          </div>
          
          <div class="faq-item bg-gray-900 rounded-lg overflow-hidden">
            <button class="faq-question flex justify-between items-center w-full text-left p-4">
              <p class="font-medium">Posso transferir meu seguro para um novo veículo?</p>
              <i class="fas fa-plus text-select-green transition-transform duration-300"></i>
            </button>
            <div class="faq-answer px-4">
              <p class="text-select-beige">
                Sim, é possível transferir seu seguro para um novo veículo. Basta entrar em contato com nosso atendimento ou acessar o app Select Seguros para solicitar a transferência. Dependendo das características do novo veículo, pode haver ajustes no valor do prêmio, mas todo o processo é simples e rápido.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-900">
      <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-12 text-center">O que nossos clientes dizem</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-select-black p-8 rounded-lg">
            <div class="flex items-center mb-4">
              <div class="w-10 h-10 bg-select-blue rounded-full flex items-center justify-center mr-3">
                <span class="font-bold text-white">M</span>
              </div>
              <div>
                <p class="font-medium">Marcos Silva</p>
                <div class="flex text-select-green">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
            <p class="text-select-beige">
              "Processo super rápido e sem burocracia. Consegui fazer minha cotação em menos de 5 minutos e o preço foi excelente! Quando precisei acionar o guincho, o atendimento foi imediato."
            </p>
          </div>
          
          <div class="bg-select-black p-8 rounded-lg">
            <div class="flex items-center mb-4">
              <div class="w-10 h-10 bg-select-blue rounded-full flex items-center justify-center mr-3">
                <span class="font-bold text-white">C</span>
              </div>
              <div>
                <p class="font-medium">Carla Oliveira</p>
                <div class="flex text-select-green">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
            <p class="text-select-beige">
              "Meu carro foi atingido por uma árvore durante uma tempestade. A Select resolveu tudo rapidamente e o atendimento foi excepcional. Recomendo a todos os meus amigos e familiares."
            </p>
          </div>
          
          <div class="bg-select-black p-8 rounded-lg">
            <div class="flex items-center mb-4">
              <div class="w-10 h-10 bg-select-blue rounded-full flex items-center justify-center mr-3">
                <span class="font-bold text-white">R</span>
              </div>
              <div>
                <p class="font-medium">Rafael Costa</p>
                <div class="flex text-select-green">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
            <p class="text-select-beige">
              "Melhor custo-benefício do mercado. Coberturas completas por um preço justo. O app é muito prático e facilita muito o acompanhamento da minha apólice e solicitações."
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 bg-select-black border-t border-gray-800">
      <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
          <div>
            <div class="flex items-center mb-4">
              <span class="text-select-green font-bold text-xl">S</span>
              <span class="text-select-blue font-bold text-xl">ELECT</span>
            </div>
            <p class="text-select-beige text-sm mb-4">
              Segurança de verdade é aquela que cabe na sua vida.
            </p>
          </div>
          
          <div>
            <h3 class="font-bold mb-4">Empresa</h3>
            <ul class="space-y-2">
              <li><a href="#" class="text-select-beige hover:text-select-green text-sm">Sobre nós</a></li>
              <li><a href="#" class="text-select-beige hover:text-select-green text-sm">Carreiras</a></li>
              <li><a href="#" class="text-select-beige hover:text-select-green text-sm">Contato</a></li>
            </ul>
          </div>
          
          <div>
            <h3 class="font-bold mb-4">Legal</h3>
            <ul class="space-y-2">
              <li><a href="#" class="text-select-beige hover:text-select-green text-sm">Privacidade</a></li>
              <li><a href="#" class="text-select-beige hover:text-select-green text-sm">Termos</a></li>
              <li><a href="#" class="text-select-beige hover:text-select-green text-sm">Regulamentação</a></li>
            </ul>
          </div>
        </div>
        
        <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
          <p class="text-select-beige text-sm mb-4 md:mb-0">© 2025 Select Seguros. Todos os direitos reservados.</p>
          
          <div class="flex space-x-4">
            <a href="#" class="text-select-beige hover:text-select-green">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="text-select-beige hover:text-select-green">
              <i class="fab fa-facebook"></i>
            </a>
            <a href="#" class="text-select-beige hover:text-select-green">
              <i class="fab fa-twitter"></i>
            </a>
          </div>
        </div>
      </div>
    </footer>

    <script>
      // FAQ Collapse functionality
      document.addEventListener('DOMContentLoaded', function() {
        const faqQuestions = document.querySelectorAll('.faq-question');
        
        faqQuestions.forEach(question => {
          question.addEventListener('click', () => {
            const faqItem = question.parentElement;
            
            // Close all other FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
              if (item !== faqItem) {
                item.classList.remove('active');
              }
            });
            
            // Toggle current FAQ item
            faqItem.classList.toggle('active');
          });
        });
      });

      function toggleContent(id) {
                     const content = document.getElementById(id);
                     content.classList.toggle('h-0');
                     content.classList.toggle('h-auto');
                     content.classList.toggle('py-5');
                     content.classList.toggle('opacity-0');
                     content.classList.toggle('opacity-100');
         
                     const arrow = document.getElementById(`arrow-${id}`);
                     arrow.classList.toggle('rotate-180');
                 }
    </script>
  </body>
</html>