@php
    $currentRoute = request()->route()->getName();

    $navigation = [
        \App\Classes\Navigation::getLinks(),
        \App\Classes\Navigation::getAccountDropdownLinks(),
        \App\Classes\Navigation::getDashboardLinks(),
    ];

    function findBreadcrumb($items, $currentRoute) {
        foreach ($items as $item) {
            if (isset($item['route']) && $item['route'] === $currentRoute) {
                return [$item];
            }

            if (!empty($item['children'])) {
                $childTrail = findBreadcrumb($item['children'], $currentRoute);
                if (!empty($childTrail)) {
                    return array_merge([$item], $childTrail);
                }
            }
        }

        return [];
    }

    $breadcrumbs = [];
    foreach ($navigation as $group) {
        $breadcrumbs = findBreadcrumb($group, $currentRoute);
        if (!empty($breadcrumbs)) {
            break;
        }
    }
@endphp

<nav {{ $attributes->merge(['class' => 'flex items-center gap-3 text-sm']) }}>
    @if (!empty($breadcrumbs))
        @foreach ($breadcrumbs as $index => $breadcrumb)
            @if ($index > 0)
                <div class="flex items-center gap-3">
                    <x-ri-arrow-right-s-line class="size-4 text-base/50" />
                </div>
            @endif

            @if (count($breadcrumbs) === 1)
                <h1 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                    {{ $breadcrumb['name'] ?? '' }}
                </h1>
            @elseif ($index === count($breadcrumbs) - 1)
                <span class="font-medium text-base/70">
                    {{ $breadcrumb['name'] ?? '' }}
                </span>
            @else
                <a 
                    href="{{ isset($breadcrumb['route']) ? route($breadcrumb['route'], $breadcrumb['params'] ?? []) : '#' }}"
                    class="font-medium text-primary hover:text-primary/80 transition-colors"
                >
                    {{ $breadcrumb['name'] ?? '' }}
                </a>
            @endif
        @endforeach
    @else
        <h1 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
            {{ __('navigation.home') }}
        </h1>
    @endif
</nav>