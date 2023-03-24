<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/forms.css') }}" rel="stylesheet">
    <title>Join Classroom</title>

</head>

<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Join Classroom') }}
</h2>

<body  style="background-color:#cce5ff">
    <div class="container" style="background-image: linear-gradient(to left, #e6f2ff , #b3d7ff);">
        <form action="/courses/joining/"	 enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-7 offset-2">
                    <div class="col-7 pl-3">
                        <x-jet-label for="code" value="{{ __('Classroom Code') }}" style="background-color: #f9fafb" />
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
            <div class="col-7 pt-2 pl-3 offset-2">
                <x-jet-button class="btn btn-primary">
                    Join Course Using Code
                </x-jet-button>
            </div>
        </form>
    </div>
</body>
