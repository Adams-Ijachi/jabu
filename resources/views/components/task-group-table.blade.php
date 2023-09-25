<div class="w-full mt-12">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Task Group
    </p>
    <div class="bg-white overflow-auto">
        <table class="min-w-full leading-normal">
            <thead>
            <tr>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Name
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    description
                </th>

            </tr>
            </thead>
            <tbody>
            @forelse($groups as $group)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex items-center">
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                <a href="{{ route('groups.task', $group->id) }}">
                                    {{ $group->name }}
                                </a>
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $group->description }}
                        </p>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        No Group found.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $groups->links() }}

    </div>

</div>
