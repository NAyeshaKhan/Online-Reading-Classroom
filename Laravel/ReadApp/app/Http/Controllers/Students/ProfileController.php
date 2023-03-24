<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    public function index()
    {
        //Student can see their current profile picture
        if (Gate::denies('manage-lessons')) {
            abort(403);
        }
        $imagePath=Auth::user()->profilePic->profile_picture;
        return view('student.profile.index',compact('imagePath'));
    }

    public function edit()
    {
        if (Gate::denies('manage-lessons')) {
            abort(403);
        }
        return view('student.profile.edit');
    }

    public function update()
    {
        //Profile picture is validated updated
        request()->validate([
            'profile_picture'=>['required','file','mimes:jpg,png,jpeg','max:2048'],
        ]);
        $imagePath=request('profile_picture')->store('profile','public');

        Auth::user()->profilePic()->update([
            'profile_picture'=>'/storage/'.$imagePath,
        ]);
        return redirect('profile/');

    }

    public function show(){
        return view('students.profile.show');
    }

}
