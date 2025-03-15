@props([
    'hover' => false,
    'striped' => false,
])

<div class="relative overflow-x-auto">
    <table {{ $attributes->merge(['class' => 'w-full text-sm text-left']) }}>
        {{ $slot }}
    </table>
</div>

@pushOnce('styles')
<style>
    .table-row-hover tr:hover > * {
        @apply bg-base-200/50;
    }

    .table-row-striped tr:nth-child(odd) > * {
        @apply bg-base-200/30;
    }

    /* Table Header */
    thead tr {
        @apply bg-base-200/50 border-b border-base-300;
    }

    thead th {
        @apply px-4 py-3 font-medium text-base-content/70;
    }

    /* Table Body */
    tbody tr {
        @apply border-b border-base-200/50 transition-colors;
    }

    tbody td {
        @apply px-4 py-3 text-base-content;
    }

    /* Table Footer */
    tfoot tr {
        @apply bg-base-200/50 border-t border-base-300;
    }

    tfoot td {
        @apply px-4 py-3 font-medium text-base-content/70;
    }
</style>
@endPushOnce 