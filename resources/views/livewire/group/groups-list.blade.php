<main class="w-full flex-grow p-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl text-black pb-6">Tasks</h1>
        <button wire:click="$dispatch('openModal', { component: 'group.create-group' })"
                class=" bg-white cta-btn font-semibold p-2 py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class="fas fa-plus mr-3"></i> New Group
        </button>

    </div>

    <x-task-group-table :groups="$groups" />

</main>

