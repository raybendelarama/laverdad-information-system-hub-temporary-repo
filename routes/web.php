<?php

use App\Services\SystemsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $search = $request->query('search', '');
    $search = is_string($search) ? trim($search) : '';

    $systems = collect((new SystemsService)->getSystems())
        ->sortBy('title')
        ->values();
    $hasSystems = $systems->isNotEmpty();

    $departments = $systems
        ->map(fn (array $system) => trim((string) ($system['department'] ?? '')))
        ->filter()
        ->unique(fn (string $department) => mb_strtolower($department))
        ->values();
    $departmentKeys = $departments->mapWithKeys(
        fn (string $department) => [mb_strtolower($department) => $department]
    );

    $filter = $request->query('filter', 'all');
    $filter = is_string($filter) ? mb_strtolower(trim($filter)) : 'all';
    $filter = $filter === 'all' || $departmentKeys->has($filter) ? $filter : 'all';

    if ($search !== '') {
        $searchTerm = mb_strtolower($search);
        $systems = $systems->filter(function (array $system) use ($searchTerm) {
            $searchableText = mb_strtolower(implode(' ', [
                $system['title'] ?? '',
                $system['description'] ?? '',
            ]));

            return str_contains($searchableText, $searchTerm);
        });
    }

    if ($filter !== 'all') {
        $systems = $systems->filter(
            fn (array $system) => mb_strtolower(trim((string) ($system['department'] ?? ''))) === $filter
        );
    }

    $filterTabs = $departments
        ->map(function (string $department) use ($search, $filter) {
            $key = mb_strtolower($department);
            $query = array_filter([
                'search' => $search,
                'filter' => $key,
            ], fn ($value) => $value !== '');

            return [
                'key' => $key,
                'label' => $department,
                'url' => route('hub', $query),
                'active' => $filter === $key,
            ];
        })
        ->prepend([
            'key' => 'all',
            'label' => 'All work',
            'url' => route('hub', array_filter(['search' => $search], fn ($value) => $value !== '')),
            'active' => $filter === 'all',
        ])
        ->values()
        ->all();

    return view('hub', [
        'systems' => $systems->values(),
        'hasSystems' => $hasSystems,
        'search' => $search,
        'filter' => $filter,
        'filterTabs' => $filterTabs,
    ]);
})->name('hub');
