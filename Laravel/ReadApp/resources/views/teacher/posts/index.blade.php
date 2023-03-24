<x-teacher-layout>
    <div class="d-flex">
        <div class="col-3 pt-3 pb-3">
            <div class="row pt-4 pb-4">
                @foreach($posts as $post)
                    <li>
                        {{ $post->title }}
                    </li>
                    <span>Complete By:{{ $post->deadline }}</span>
                @endforeach
            </div>
        </div>
    </div>

</x-teacher-layout>
