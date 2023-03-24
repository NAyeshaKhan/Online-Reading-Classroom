<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Join Classroom') }}
        </h2>
    </x-slot>

    <div class="form-group row">
        <form action="/student/lessons/"	 enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-7 offset-2">
                    <div class="col-7 pl-3">
                        <x-jet-label for="code" value="{{ __('Classroom Code') }}" />
                        <x-jet-input id="code" class="block mt-1" type="text" name="code" :value="old('code')" required autofocus autocomplete="code" />

                        @error('code')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
            </div>
            <br>
            <div class="col-7 pl-3 offset-2">
                <x-jet-button class="btn btn-primary">
                    Join Course Using Code
                </x-jet-button>
            </div>

        </form>
    </div>

</x-student-layout>
