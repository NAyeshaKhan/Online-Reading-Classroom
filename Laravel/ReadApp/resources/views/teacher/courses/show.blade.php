<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/card.css') }}" rel="stylesheet">
    <title>Courses</title>

</head>

<body style="background-color: seashell">
    <div class="container">
        <div class="row">
            <div class="col-9 pt-5">
                <div  class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex pb-3" style="background-image: linear-gradient(to bottom right, #cc9766, white)">
                        <div >
                            <h3>{{ $course->title}}</h3>
                            <h4>Code: {{ $course->code }}</h4>
                        </div>
                        <div style="background-image: radial-gradient(#d2a479,#ac7139)">
                            <h4 style="border-top: solid thin;border-bottom: dotted thin">
                                <span>Taught by:</span>
                                @foreach($course->teachers as $teacher)
                                    <ul style="list-style-type:circle;">
                                        <li><img src="https://img.icons8.com/windows/25/000000/manager.png" alt="Teacher"/></li>
                                        {{  $teacher->name }}
                                    </ul>
                                @endforeach
                            </h4>
                            <div class="d-flex" >
                                @can('manage-courses')
                                    <button class="align-content-center">
                                        <a href="/courses/add/{{  $course->id }}">Send Clasroom Code</a>
                                    </button>
                                @endcan

                            </div>
                            <h4 style="border-bottom: solid thin">List of Students:
                                @foreach($course->students as $student)
                                    <li>
                                        <img src="{{ $student->profilePic->profile_picture }}" style="height:35px; border-radius:50px;"></img>
                                        {{  $student->name }}
                                    </li>
                                @endforeach
                            </h4>
                            </div>

                    </div>
                </div>
                <div class="d-flex" >
                    @can('manage-courses')
                        <button class="btn btn-primary align-content-center">
                            <img src="https://img.icons8.com/color/48/000000/add-rule.png" alt="Add Assignment"/>
                            <a href="/c/{{  $course->id }}/p/create">Create Assignment</a>
                        </button>
                    @endcan
                </div>
                <div>
                @foreach($course->posts as $post)

                        <div class="cardX">
                            <img src="https://img.icons8.com/fluency/48/000000/open-book.png" alt="Assignment"/>
                            <div class="container" style="list-style-type:square">
                                <li ><b> {{$post->title}}</b></li>
                                <span class="pb-4">Due Date:</span>
                                <span>{{ $post->deadline }}</span>
                                <div>
                                    <button>
                                        <a href="/posts/{{$post->id}}">View Assignment</a>
                                    </button>

                                @can('manage-courses')
                                    <button>
                                        <a href="/posts/{{$post->id}}/edit">Edit Post</a>
                                    </button>
                                        <td>
                                            <form action="/posts/{{$post->id}}/delete" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>

        @can('manage-courses')
        <button>
            <a href="/teacher/courses">Back</a>
        </button>
        @endcan

        @can('manage-lessons')
            <button>
                <a href="/student/lessons">Back</a>
            </button>
        @endcan
    </div>
</body>
