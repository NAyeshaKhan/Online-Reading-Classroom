<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        //Student can view their assignments as a unified list
        if (Gate::denies('manage-lessons')) {
            abort(403);
        }
        $user=Auth::user()->id;
        $lessons=Auth::user()->lessons;
        $posts = Post::join('course_student', 'course_student.course_id', '=', 'posts.course_id')->where('course_student.user_id','=',$user)->select("*")->orderBy('deadline')->get();
        return view('student.posts.index',compact('posts','lessons'));

    }

    public function view(Course $course)
    {
        //Student can view their assignments on a per-class basis
        $lessons=Auth::user()->lessons;
        $posts = Post::all()->where('course_id','=',$course->id);
        return view('student.posts.view',compact('posts','lessons'));
    }

    public function create(Course $course)
    {
        return view('teacher.posts.create',compact('course'));
    }

    public function store(Course $course){

        //Teacher creates an assignment, which is stored in the database
        $data=request()->validate([
            'title'=>'required',
            'pdf_file'=>['required','file','mimes:pdf','max:2048'],
            'deadline'=>['required','date','after_or_equal:tomorrow']
        ]);

        $filePath=request('pdf_file')->store('PDFuploads','public');
        //stores file in storage/app/public/uploads
        $course->posts()->create([
            'course_id' => $course->id,
            'title' => $data['title'],
            'pdf_file' => $filePath,
            'deadline'=>$data['deadline'],
        ]);

        return redirect('courses/'.$course->id);
     }

    public function show(Post $post){
        //Assignment's PDF file is fetched and shown in a PDF viewer
        $link='storage/'.$post->pdf_file;
        return view('teacher.posts.show',compact('post','link'));

    }

    public function edit(Post $post){

        return view('teacher.posts.edit',compact('post'));
    }

    public function update(Post $post){
        //Assignment title and deadline are updated
         $data=request()->validate([
            'title'=>'required',
            'deadline'=>['required','date','after_or_equal:tomorrow']
        ]);
        $post->update([
            'title' => $data['title'],
            'deadline'=>$data['deadline'],
        ]);
        return redirect('courses/'.$post->course_id);

    }

    public function destroy(Post $post){
        //Assignment is deleted
        $post->delete();
        return redirect('courses/'.$post->course_id);

    }
}
