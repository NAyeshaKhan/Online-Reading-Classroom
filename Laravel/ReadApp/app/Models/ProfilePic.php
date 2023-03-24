<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePic extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable = ['profile_picture'];

    public function user()
    {
        return $this->belongsTo(User::class);
        //A profile picture belongs to 1 student
    }


}
