<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Student can see the courses they are enrolled in
        if (Gate::denies('manage-lessons')) {
            abort(403);
        }//If you don't have ability to manage lessons, gate denies your access

        $lessons=Auth::user()->lessons;
        return view('student.lessons.index',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('manage-lessons')) {
            abort(403);
        }
        return view('student.lessons.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        /*If student enters the correct code,
          a relationship is created between the student and the corresponding course */
        $data=request()->validate([
            'code'=>'required',
        ]);
        $lessonCode=$data['code'];
        $course=DB::table('courses')->where('code','=',$lessonCode)->first();
        if($course!=NULL){
           Auth::user()->lessons()->attach([

               'course_id'=>$course->id

           ]);
            return redirect('student/lessons/');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
