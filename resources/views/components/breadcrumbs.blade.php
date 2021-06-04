<nav class="d-block mb-4">
    <ol class="breadcrumb bg-transparent m-0 p-0">

        @foreach ($breadcrumbs as $breadcrumb)
            <li class="breadcrumb-item">

                @if (isset($breadcrumb['link']))
                    <a href="{{ $breadcrumb['link'] }}">{{ $breadcrumb['label'] }}</a>
                @else
                    {{ $breadcrumb['label'] }}
                @endif

            </li>
        @endforeach

    </ol>
</nav>