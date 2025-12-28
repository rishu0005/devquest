@props([
    'target',
    
])

    <button 
        {{ 
            $attributes->merge([
                'type' => 'button'
            ]) 
        }}
        data-bs-toggle="modal"
        data-bs-target="{{ '#'.$target }}"> 
            {{ $slot }}
    </button>
