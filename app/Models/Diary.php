<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Journal;

class Diary extends Model
{
    use HasFactory;

    // LSW - START
    public $table = 'diary';
    protected $fillable = ['title', 'year', 'journal_id'];

    function getJournal()
    {
        $this->belongsTo(Journal::class);
    }
    // LSW - END
}
