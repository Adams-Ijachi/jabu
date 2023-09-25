<main class="w-full flex-grow p-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl text-black pb-6"> {{ $group_name }}   Tasks</h1>

    </div>

    @forelse($taskCollection as $group => $tasks)
        <x-task-table :group="$group" :tasks="$tasks" />
    @empty
        <div class="flex justify-between items-center">
            <h1 class="text-3xl text-black pb-6">No Tasks</h1>
        </div>
    @endforelse



</main>
