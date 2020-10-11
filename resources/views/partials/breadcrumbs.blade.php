@if(Breadcrumbs::has())
<nav aria-label="breadcrumbs" class="pl-3">
    <ol class="breadcrumb">
        @foreach (Breadcrumbs::current() as $crumbs)
            @if ($crumbs->url() && !$loop->last)
                <li class="breadcrumb-item">
                    <a class="text-muted hover-teal font-size-sm" href="{{ $crumbs->url() }}">
                        {{ $crumbs->title() }}
                    </a>
                </li>
            @else
                <li class="breadcrumb-item text-muted active font-size-sm">
                    {{ $crumbs->title() }}
                </li>
            @endif
        @endforeach
    </ol>
</nav>
@endif

