<main class="w-full flex-grow p-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl text-black pb-6">Tasks</h1>
        <button wire:click="$dispatch('openModal', { component: 'task.create-task' })"
                class=" bg-white cta-btn font-semibold p-2 py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class="fas fa-plus mr-3"></i> New Task
        </button>

        <div>
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filter :</label>
            <select
                id="status"
                wire:model.live="filter_value"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                <option value="" disabled>--Select  Status--</option>

                @foreach($filters as $filter)
                    <option value="{{$filter}}">{{$filter}}</option>
                @endforeach
            </select>
            @error('task_frequency_id')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>



    </div>


  @foreach($taskCollection as $group => $tasks)
      <x-task-table :group="$group" :tasks="$tasks" />
  @endforeach

</main>





