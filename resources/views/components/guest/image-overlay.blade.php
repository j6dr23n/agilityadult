@props(['item'])

@if ($item->embed_link !== null)
    <div class="overlay">
        <a href="#" class="icon">
            <i class="fa fa-video"></i>
        </a>
    </div>
@else
    <div class="overlay">
        <a href="#" class="icon">
            <i class="fa fa-image"></i>
        </a>
    </div>
@endif
