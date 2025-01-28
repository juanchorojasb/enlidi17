<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
    <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-48 object-cover">
    <div class="p-6">
        <span class="text-sm text-gray-500">{{ $date }}</span>
        <h3 class="text-xl font-bold text-gray-800 mt-2">{{ $title }}</h3>
        <p class="text-gray-600 mt-4">{{ $slot }}</p>
        <a href="#" class="mt-4 inline-block text-primary hover:text-primary-dark font-medium">Leer más →</a>
    </div>
</div>