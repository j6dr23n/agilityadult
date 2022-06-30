@props(['item'])

@if ($item->type === 'free')
    <span class="notify-badge">{{ $item->type }}</span>
@endif
