{{-- Componente para encabezados de sección administrativa --}}
<header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-800">
            {{ $title }}
        </h2>
        
        <div class="flex items-center space-x-4">
            @if(isset($actions))
                {{ $actions }}
            @endif
        </div>
    </div>
</header>