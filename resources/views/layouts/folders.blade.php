
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto  folders_container container">
           
            
            
            @yield('folder_cards')
            
            </div>
            
        
           
        
    </div>



</x-app-layout>