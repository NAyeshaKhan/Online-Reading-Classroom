<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/forms.css') }}" rel="stylesheet">
    <title>Send Classroom Code</title>

</head>
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Send Classroom Code') }}
</h2>
<body  style="background-image: linear-gradient(to left, #f9ecf2 , #e6b3cc);">
<div class="container" style="background-color: #f9ecf2 ">
    <form action="/courses/adding/{{$course->id}}"	 enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group row">
            <div class="col-7 offset-2">
                <div class="col-7 pl-3">
                    <x-jet-label for="email" value="{{ __('Add Email') }}"/>
                    <x-jet-input id="email" class="block mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
            </div>
        </div>
        <br>
        <div class="col-7 pt-2 pl-3 offset-2">
            <x-jet-button class="btn btn-primary">
                Send User Classroom Code
            </x-jet-button>
        </div>
    </form>
</div>
    <br>
    <div class="d-flex justify-content-between align-items-baseline pt-4">
        <button class="btn btn-primary pb-3">
            <a href="/courses/{{ $course->id  }}">Back</a>
        </button>
    </div>
</body>
