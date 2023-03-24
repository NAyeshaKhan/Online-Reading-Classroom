<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/forms.css') }}" rel="stylesheet">
    <title>Update Profile</title>

</head>
<body style="background-color: #8cd98c">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Create Your Profile!') }}
</h2>
<div class="container" style="background-image: linear-gradient(to left, #c6ecc6 , #9fdfbf );">
    <form action="/profile"	 enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group row">
            <div class="col-7 offset-2">
                <div class="row">
                    <x-jet-label for="profile_picture" value="{{ __('Add a Picture of yourself') }}" />
                    <x-jet-input id="profile_picture" class="col-form-label" type="file" name="profile_picture" :value="old('profile_picture')" required autofocus />

                    @error('profile_picture')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            </div>
        </div>
        <div class="col-7 offset-2">
            <div class="d-flex justify-content-between align-items-baseline pt-4">
                <button class="btn btn-primary pb-3">Add Profile Picture</button>
            </div>
        </div>

    </form>
    <div>
        <x-jet-button>
            <a href="/profile">Go Back</a>
        </x-jet-button>
    </div>

</div>
