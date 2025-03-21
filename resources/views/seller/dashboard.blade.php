@extends('seller.layout')

@section('title', 'Dashboard')

@section('content')
      <!-- Top Navigation -->
      <header class="bg-[#1a1a1a] border-b border-gray-800">
        <div class="px-6 py-4 flex items-center justify-between">
          <!-- Mobile Menu Button -->
          <div class="flex items-center">
            <button id="sidebarToggleBtn" class="p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-800 md:hidden">
              <i class="fas fa-bars text-xl"></i>
            </button>
            <h1 class="text-2xl font-semibold ml-2">Dashboard</h1>
          </div>
          
          <div class="flex items-center space-x-4">
            <button class="p-2 rounded-full text-gray-400 hover:text-white hover:bg-gray-800">
              <i class="fas fa-bell"></i>
            </button>
            
            
          </div>
        </div>
      </header>
      
      <!-- Content -->
      <main class="flex-1 overflow-y-auto bg-[#242424] p-6">

      </main>
@endsection
