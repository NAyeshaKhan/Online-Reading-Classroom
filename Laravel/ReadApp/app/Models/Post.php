<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['course_id','title','pdf_file','deadline'];

    public function course()
    {
        return $this->belongsTo(Course::class);
        //A post can belong to 1 course
    }

}

