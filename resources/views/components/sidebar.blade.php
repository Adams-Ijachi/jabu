<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">

    <div class="p-6">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>

    </div>

    <nav class="text-white text-base font-semibold pt-3">

        <a href="{{ route('tasks') }}" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
            <i class="fas fa-table mr-3"></i>
            Tasks
        </a>

        <a href="{{ route('groups') }}" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
            <i class="fas fa-table mr-3"></i>
            Task Groups
        </a>
    </nav>

</aside>
