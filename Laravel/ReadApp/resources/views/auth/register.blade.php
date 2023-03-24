<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

		<form method="POST" action="{{ route('register') }}" x-data="{role_id: 2}">

            @csrf

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                @if(!empty($name))
                    <input id="name" type="text" class="form-control block mt-1 w-full" name="name" value="{{$name}}" required autofocus>
                @else
                    <input id="name" type="text" class="form-control block mt-1 w-full" name="name" value="{{ old('name') }}" required autofocus>
                @endif

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

            </div>

            <div class="mt-4 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <x-jet-label for="email" value="{{ __('Email') }}" />

                @if(!empty($email))
                    <input id="email" type="email" class="form-control block mt-1 w-full" name="email" value="{{$email}}" required>
                @else
                    <input id="email" type="email" class="form-control block mt-1 w-full" name="email" value="{{ old('email') }}" required>
                @endif
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

			<div class="mt-4">
                <x-jet-label for="role_id" value="{{ __('Register as:') }}" />
                <select name="role_id" x-model="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value='2'>Student</option>
                    <option value='3'>Teacher</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-jet-button>
                            <a href="{{ url('auth/google') }}"><i>Register With Google</i></a>
                        </x-jet-button>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
