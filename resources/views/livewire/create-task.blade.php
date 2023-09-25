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
        <div>
            <label for="iteration_count" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No of Iterations</label>
            <input
                type="number"
                name="iteration_count"
                id="iteration_count"
                wire:model="iteration_count"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
            @error('iteration_count')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>




        <div class="flex items-center">
            <div>
                <label for="start">Start date:</label>
                <input type="date"
                       id="start"
                       name="start"
                       wire:model="start_date"
                       value="01-01-2021"
                       timezone="UTC"

                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">

            </div>
            <span class="mx-2">to</span>
            <div>
                <label for="start">End date:</label>
                <input type="date"
                       id="start"
                       name="end"
                       wire:model="end_date"
                       value="01-01-2021"
                       timezone="UTC"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">

            </div>

        </div>
        @error('start_date')
        <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
        @error('end_date')
        <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="task_group" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Group</label>
            <select
                id="task_group"
                name="task_group"
                wire:model="task_group_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                <option value="" disabled>--Select Task Group--</option>
                @foreach($groups as $group)
                    <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
            </select>
            @error('task_group_id')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="task_frequency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Frequency</label>
            <select
                id="task_frequency"
                name="task_frequency"
                wire:model="task_frequency_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                <option value="" disabled>--Select Task Frequency--</option>
                @foreach($frequencies as $frequency)
                    <option value="{{$frequency->id}}">{{$frequency->pattern}}</option>
                @endforeach
            </select>
            @error('task_frequency_id')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button
            type="submit"
            class="
            w-full
            text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Create Task
        </button>
    </form>


</x-modal>
