@props(['icon', 'title', 'value', 'color', 'iconBg', 'link' => '#'])

<a href="{{ $link }}" class="block">
    <div class="bg-white rounded-lg shadow p-6 flex items-center hover:shadow-lg transition duration-200 ease-in-out">
        <div class="{{ $iconBg }} p-3 rounded-full mr-4">
            <i class="fa {{ $icon }} {{ $color }} text-2xl"></i>
        </div>
        <div>
            <p class="text-gray-600 text-sm">{{ $title }}</p>
            <p class="text-2xl font-bold text-gray-800">{{ $value }}</p>
        </div>
    </div>
</a>