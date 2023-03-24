<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;

class Course extends Model
{
    use HasFactory;

	protected $guarded=[];
	protected $fillable = ['title','code'];


	public function teachers(){
		return $this->belongsToMany(User::class,'course_user')->withPivot('user_id')->withTimestamps();//Many-to-Many relationship needs a pivot table
        //A course can be taught by many tecahers
	}

    public function students(){
        return $this->belongsToMany(User::class,'course_student')->withPivot('user_id')->withTimestamps();//Many-to-Many relationship needs a pivot table
        //A course can r=enrol many students
    }
    public function posts(){
        return $this->hasMany(Post::class);
        //A course can have many posts
    }

}
