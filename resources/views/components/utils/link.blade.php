@props(['active' => '', 'text' => '', 'hide' => false, 'icon' => false, 'permission' => false, 'sidebar' => false])

@if ($permission)
    @if ($logged_in_user->can($permission))
        @if (!$hide)
            <a {{ $attributes->merge(['href' => '#', 'class' => $active]) }}>@if ($icon)<i class="{{ $icon }}"></i> @endif{{ strlen($text) ? $text : $slot }}</a>
        @endif
    @endif
@elseif($sidebar)
    @if (!$hide)
        <a {{ $attributes->merge(['href' => '#', 'class' => $active]) }}>@if ($icon)<i class="{{ $icon }}"></i> @endif <p>{{ strlen($text) ? $text : $slot }}</p> </a>
    @endif
@else
    @if (!$hide)
        <a {{ $attributes->merge(['href' => '#', 'class' => $active]) }}>@if ($icon)<i class="{{ $icon }}"></i> @endif{{ strlen($text) ? $text : $slot }}</a>
    @endif
@endif
