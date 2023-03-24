
<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Profile') }}
        </h2>
    </x-slot>
    <div class="d-flex">
    <div class="col-3 pt-3 pb-3">
        <div class="row pt-4 pb-4">
            <div>
                <x-jet-button>
                    <a href="/profile/edit">Update your profile picture</a>
                </x-jet-button>
            </div>
            <br>
            <div>
                <img src="{{ $imagePath }}" style="height:240px;weight:240px;">
            </div>
        </div>

    </div>
</div>
</x-student-layout>
