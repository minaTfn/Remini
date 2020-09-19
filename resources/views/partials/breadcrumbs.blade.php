@if (count($breadcrumbs))

    <nav aria-label="breadcrumb" class="pl-3">
        <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item"><a class="text-muted hover-teal font-size-sm" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="breadcrumb-item text-muted active font-size-sm" aria-current="page">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
        </ol>
    </nav>

@endif

