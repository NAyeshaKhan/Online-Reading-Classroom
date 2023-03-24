<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/card.css') }}" rel="stylesheet">

</head>

<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lessons List') }}
        </h2>
    </x-slot>

    <div>
        @foreach($lessons as $course)
                <div class="row pt-2 pb-4" style="background-image: linear-gradient(to bottom right, #b3d7ff, white); box-shadow: 0px 0px 5px currentcolor; float: left; width: 50%; padding: 15px; width: 50% ">
                    <div class="col" >
                        <div class="align-items-center pb-3">
                            <img src="https://img.icons8.com/dusk/32/000000/department.png" alt="School icon"/>
                            <span class="font-semibold">Course:</span>
                            <span> {{ $course->title }}</span>
                        </div>
                        <span class="font-semibold">Code:</span>
                        <span> {{ $course->code }}</span>
                    </div>
                    <x-jet-button>
                        <a href="/courses/{{$course->id}}" style="font-style:italic">View Class</a>
                    </x-jet-button>
                </div>
            @endforeach
    </div>
</x-student-layout>
<script>
    import Button from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/Button";
    export default {
        components: {Button}
    }
</script>
