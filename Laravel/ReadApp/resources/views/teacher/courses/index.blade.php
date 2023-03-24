<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Courses List') }}
        </h2>
    </x-slot>

    <div class="d-flex">

		<div class="col-3 pt-3 pb-3">
            <div class="pt-4 pb-2">
                <x-jet-button>
                    <a href="/courses/join" style="font-style:italic">Join Classroom</a>
                </x-jet-button>
            </div>

			<div class="row pt-4 pb-4">

                    @foreach($courses as $course)
                    <div class="col pt-2 pb-4"
                         style="background-image: linear-gradient(to bottom right, #b3d7ff, white); float: left; width: 50%; padding: 15px; box-shadow: 0px 0px 5px currentcolor;">
                                 <div class="justify-content-between align-items-baseline" >
                                     <div class="align-items-center pb-3" >
                                         <img src="https://img.icons8.com/dusk/32/000000/department.png" alt="School icon"/>
                                            <span class="font-semibold">Course:</span>
                                            <span> {{ $course->title }}</span>
                                     </div>
                                     <span class="font-semibold">Code:</span>
                                     <span> {{ $course->code }}</span>
                                     <div >
                                         <span class="font-semibold">Total students:</span>
                                         <span>{{ $course->students()->count()  }}</span>
                                     </div>
                                 </div>
                                <x-jet-button>
                                    <a href="/courses/{{$course->id}}" style="font-style:italic">View Class</a>
                                </x-jet-button>
                            </div>
                    @endforeach
                <br>
			</div>
		</div>
	</div>

</x-teacher-layout>
