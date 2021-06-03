<div class="d-flex mb-4">
    <h1 class="mb-0">{{ $title }}</h1>
    @if ($action)
        <a href="{{ $action['link'] }}" class="btn btn-primary ml-auto d-flex align-items-center">{{ $action['label'] }}</a>
    @endif
</div>
