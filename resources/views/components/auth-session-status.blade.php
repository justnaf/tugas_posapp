@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert alert-warning alert-dismissible fade show']) }}>
        {{ $status }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
