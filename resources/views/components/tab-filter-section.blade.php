@props(['filters' => []])

@once
    <style>
        .hub-search {
            position: relative;
        }

        .hub-search-input {
            min-height: 2.75rem;
            padding-left: 2.5rem;
            border-color: #cfe2ff;
            background-color: #f8fbff;
            font-size: .875rem;
        }

        .hub-search-input:focus {
            border-color: #86b7fe;
            background-color: #fff;
            box-shadow: 0 0 0 .2rem rgba(13, 110, 253, .12);
        }

        .hub-search-icon {
            position: absolute;
            z-index: 4;
            top: 50%;
            left: .875rem;
            color: #6c9bd2;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .hub-filter {
            border: 1px solid #cfe2ff;
            color: #17477f;
            font-size: .75rem;
            white-space: nowrap;
        }

        .hub-filter:hover,
        .hub-filter:focus-visible {
            border-color: #0d6efd;
            color: #0d6efd;
        }

        .hub-filter.active,
        .hub-filter.active:hover {
            border-color: #0b5ed7;
            background-color: #0b5ed7;
            color: #fff;
        }
    </style>
@endonce

<nav class="d-flex flex-wrap gap-2" aria-label="Filter systems by category">
    @foreach ($filters as $tab)
        <a
            class="btn btn-sm rounded-pill px-3 hub-filter{{ $tab['active'] ? ' active' : '' }}"
            href="{{ $tab['url'] }}"
            @if ($tab['active']) aria-current="page" @endif>
            {{ $tab['label'] }}
        </a>
    @endforeach
</nav>