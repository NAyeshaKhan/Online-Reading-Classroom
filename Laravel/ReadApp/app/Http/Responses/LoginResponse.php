<?php
namespace App\Http\Responses;
use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;
class LoginResponse implements ContractsLoginResponse
{
    public function toResponse($request)
    {
       if (auth()->user()->role_id == 2) {
            return redirect('/courses');
        }else if (auth()->user()->role_id == 3) {
            return redirect('/profile');
        }else {
           return redirect('/dashboard');
       }
    }
}
