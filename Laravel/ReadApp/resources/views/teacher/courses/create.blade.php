<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>

    <div class="form-group row">
		<form action="/teacher/courses/"	 enctype="multipart/form-data" method="post">
			@csrf
			<div class="form-group row">
				<div class="col-7 offset-2">
                    <div class="col-7 pl-3">
                        <x-jet-label for="title" value="{{ __('Course Title') }}" />
                        <x-jet-input id="title" class="block mt-1" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
				</div>
			</div>
			<div class="d-flex justify-content-between align-items-baseline pt-4">
                <x-jet-button class="btn btn-primary">Add New Classroom</x-jet-button>

			</div>

		</form>
	</div>

</x-teacher-layout>
