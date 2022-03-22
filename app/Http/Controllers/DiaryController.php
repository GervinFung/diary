<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Models\Journal;
use App\Models\User;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    // LSW - START
    function getDiary($id)
    {
        $diary = Diary::find($id);
        $journal = Journal::find($diary->journal_id);
        $user = User::find($journal->user_id);
        return view('diary', [
            'id' => $diary->id,
            'content' => $diary->content,
            'journal_title' => $journal->title,
            'journal_year' => $journal->year,
            'user_name' => $user->name
        ]);
    }
    // LSW - END
}
