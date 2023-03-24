<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to the Reading Progress App') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @can('manage-courses')
                    <span>Create Courses, Add Teachers and Students to your courses, and Assign Reading tasks to your students!</span>
                @endcan

                @can('manage-lessons')
                    <span>Update your Profile, and Join classrooms!</span>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
