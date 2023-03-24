<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/forms.css') }}" rel="stylesheet">
    <title>Edit Assignments</title>

</head>
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Edit Assignment') }}
</h2>
<body style="background-color: #fff3cd";>
<div class="container" style="background-color:#ffe8a1;">
    <form action="/posts/{{ $post->id  }}"	 enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group row">
            <div class="col-7 offset-2">
                <div class="col-7 pl-3">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="col-form-label" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="col-7 pl-3">
                    <x-jet-label for="deadline" value="{{ __('Deadline for Assignment') }}" />
                    <x-jet-input id="deadline" class="col-form-label" type="date" name="deadline" :value="old('deadline')" required autofocus />

                    @error('deadline')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            </div>
        </div>
        <br>
        <div class="col-7 offset-2">
            <div class="d-flex justify-content-between align-items-baseline pt-4">
                <button class="btn btn-primary pb-3">Update Assignment</button>
            </div>
            <br>
            <div class="d-flex justify-content-between align-items-baseline pt-4">
                <button class="btn btn-primary pb-3">
                    <a href="/courses/{{ $post->course_id  }}">Back</a>
                </button>
            </div>
        </div>

    </form>
</div>

