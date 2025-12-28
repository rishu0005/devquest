@props([
    'modal_id',
    'title',
    'btn_label'
])

<div    {{ $attributes->merge([
            'class' => 'modal fade',
            ]) 
    
        }} id="{{ $modal_id }}" tabindex="-1" aria-labelledby="{{ $modal_id.'Label' }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header accent">
        <h1 class="modal-title text-white fs-4" id="{{ $modal_id.'Label' }}">{{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{ $slot    }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn accent text-white">{{ $btn_label }}</button>
      </div>
    </div>
  </div>
</div>