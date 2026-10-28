@props([
    'search' => '',
    'filter' => 'all',
])

<div class="hub-search mb-3">
    <label class="visually-hidden" for="system-search">Search systems</label>
    <i class="ri-search-line hub-search-icon" aria-hidden="true"></i>
    <form action="{{ route('hub') }}" method="GET" role="search">
        <input
            id="system-search"
            class="form-control hub-search-input rounded-3"
            type="search"
            name="search"
            value="{{ $search }}"
            placeholder="Search by system title or description"
            autocomplete="off">
        <button type="submit" class="visually-hidden">Search systems</button>
        @if ($filter !== 'all')
            <input type="hidden" name="filter" value="{{ $filter }}">
        @endif
    </form>
</div>
