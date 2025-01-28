<div class="text-center">
    @if(isset($icon))
        <div class="text-primary text-4xl mb-4">
            <i class="fa {{ $icon }}"></i>
        </div>
    @endif
    <h4 class="text-3xl font-bold text-gray-800">
        {{ $title }}
    </h4>
    @if(isset($subtitle))
        <p class="mt-4 text-5xl font-bold text-primary">
            {{ $subtitle }}
        </p>
    @endif
    <div class="mt-2 text-gray-600">
        {{ $slot }}
    </div>
</div>