<x-modal >
    <form class="space-y-6"  wire:submit="create">
        <x-slot name="header">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Create Task
            </h3>
        </x-slot>

        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Name</label>
            <input
                wire:model="name"
                type="text"
                name="name"
                id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="task name" required>
            @error('name')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea
                id="description"
                rows="4"
                wire:model="description"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
            @error('description')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button
            type="button"
            wire:click="create"
            class="
            w-full
            text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Create Task
        </button>
    </form>


</x-modal>
