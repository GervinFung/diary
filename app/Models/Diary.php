<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Journal;

class Diary extends Model
{
    use HasFactory;

    public $table = 'diary';
    protected $fillable = ['date', 'content', 'journal_id'];

    function getJournal()
    {
        return $this->belongsTo(Journal::class);
    }
}
