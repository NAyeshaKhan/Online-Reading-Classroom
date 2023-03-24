<?php


namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Mail\SendCodeEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

use App\Models\Course;
use Illuminate\Support\Str;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Teacher is shown the courses that they teach
		if (Gate::denies('manage-courses')) {
            abort(403);
        }//If you don't have ability to manage courses, gate denies your access

        $courses=Auth::user()->courses;
		return view('teacher.courses.index',compact('courses'));
    }

     /* @return \Illuminate\Http\Response
     */
    public function create()
    {
		if (Gate::denies('manage-courses')) {
            abort(403);
        }
        return view('teacher.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        /*Teacher creates a course and a random string is generated for that course.
         A relationship is then created between the teacher and the course*/

        $data=request()->validate([
            'title'=>'required',
        ]);
        $code = Str::random(7);
        auth()->user()->courses()->create([
            'title'=>$data['title'],
            'code'=>$code,
        ]);
        return redirect('/courses/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

	public function show(Course $course){

        return view('teacher.courses.show', compact('course'));
	}

    public function join(){
        if (Gate::denies('manage-courses')) {
            abort(403);
        }
        return view('teacher.courses.join');
    }

    public function joining()
    {
        /*If the teacher enters the correct course code,
        a relationship is created between the teacher and the corresponding course*/
        $data = request()->validate([
            'code' => 'required',
        ]);
        $lessonCode = $data['code'];
        $course = DB::table('courses')->where('code', '=', $lessonCode)->first();
        if ($course != NULL) {
            Auth::user()->courses()->attach([
                'course_id' => $course->id
            ]);
        }
        return redirect('teacher/courses/');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Course $course){
        if (Gate::denies('manage-courses')) {
            abort(403);
        }
        return view('teacher.courses.addTeacher',compact('course'));
    }

    public function adding(Course $course)
    {
        //A mail is sent along with the class code to the email address entered by the teacher
        $data = request()->validate([
            'email' => 'required',
        ]);
        $user=Auth::user();
        $email=$data['email'];

        Mail::to($email)->send(new SendCodeEmail($course,$user));
        return redirect('teacher/courses/'.$course->id);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
