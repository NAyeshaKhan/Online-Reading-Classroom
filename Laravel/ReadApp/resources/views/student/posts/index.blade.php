<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/navbar.css') }}" rel="stylesheet">
    <title>View Assignments</title>

</head>

<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Assignments') }}
        </h2>
    </x-slot>

    <div class="navbar">
        <div class="dropdown">
            <button class="dropbtn">
                <a href="/posts">View All Assignments</a>
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                @foreach($lessons as $lesson)
                    <a href="/c/{{$lesson->id}}/view">{{ $lesson->title  }}</a>

                @endforeach
            </div>
        </div>
    </div>

    <div>
        @foreach($posts as $post)
            <div>
                <img src="https://img.icons8.com/office/50/000000/saving-book.png" alt="Homework icon"/>
                <div>
                    <span style="font-weight:bolder">{{ $post->title }}</span>
                </div>

                <div>
                    <span style="border-bottom: solid thin">Due Date:</span>
                    <span>{{ $post->deadline }}</span>
                </div>

                <div>
                    <span style="border-bottom: solid thin">Course:</span>
                    <span>{{ $post->course->title}}</span>
                </div>
            </div>
        @endforeach
    </div>
    <div>
    </div>
</x-student-layout>
<script>
    import Button from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/Button";
    export default {
        components: {Button}
    }
</script>
