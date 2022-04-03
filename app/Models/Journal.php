<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Diary;
use App\Models\User;

class Journal extends Model
{
    use HasFactory;

    // LSW - START
    public $table = 'journal';
    protected $fillable = ['title', 'year', 'user_id'];

    function getDiaries()
    {
        return $this->hasMany(Diary::class);
    }

    function getUser()
    {
        return $this->belongsTo(User::class);
    }
    // LSW - END
}
