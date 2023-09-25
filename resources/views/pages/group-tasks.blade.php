<x-dashboard-layout>
    <x-slot name="title">
        {{ __('Group Tasks') }}
    </x-slot>

    <livewire:group-tasks.group-tasks-list  :group="$group"  />

</x-dashboard-layout>

