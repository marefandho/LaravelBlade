@php
    $bgColors = [
        'success' => 'bg-green-100',
        'error' => 'bg-red-100',
        'warning' => 'bg-yellow-100',
        'info' => 'bg-blue-100',
    ];
    $textColors = [
        'success' => 'text-green-800',
        'error' => 'text-red-800',
        'warning' => 'text-yellow-800',
        'info' => 'text-blue-800',
    ];
    $bgColor = $bgColors[$type] ?? $bgColors['info'];
    $textColor = $textColors[$type] ?? $textColors['info'];
    $hoverColor = str_replace('800', '900', $textColor);
@endphp

@if ($message)
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 3000)"
        x-transition class="container mx-auto mb-2">
        <div class="flex items-center text-sm font-bold px-4 py-3 rounded relative 
            {{ $bgColor }} {{ $textColor }} role="alert">
            @switch($type)
                @case('success')
                    <x-fluentui-info-shield-20-o class="w-7 h-7 {{ $textColor }} mr-4" />
                    @break
                @case('error')
                    <x-fluentui-warning-shield-20-o class="w-7 h-7 {{ $textColor }} mr-4" />
                    @break
                @case('warning')
                    <x-fluentui-warning-shield-20-o class="w-7 h-7 {{ $textColor }} mr-4" />
                    @break
                @case('info')
                    <x-fluentui-info-shield-20-o class="w-7 h-7 {{ $textColor }} mr-4" />
                    @break
            @endswitch
            <p class="flex-1">{{ $message }}</p>
            <button @click="show = false"
                type="button"
                class="ml-4 {{ $textColor }} hover:{{ $hoverColor }} focus:outline-none 
                    cursor-pointer">
                <x-fontisto-close-a class="w-3 h-3 hover:w-4 hover:h-4 {{ $textColor }}" />
            </button>
        </div>
    </div>
@endif