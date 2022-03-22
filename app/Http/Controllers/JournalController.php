<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\User;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    // LSW - START
    function getJournals()
    {
        $journals = Journal::all();
        foreach ($journals as $journal) {
            $journal['user_name'] = User::find($journal->user_id)->name;
        }
        return view('journals', ['journals' => $journals]);
    }

    function getJournal($id)
    {
        $diaries = Journal::find($id)->getDiaries;
        $user_name = User::find(Journal::find($id)->user_id)->name;
        $diaries_id = array();
        foreach ($diaries as $diary) {
            array_push($diaries_id, $diary->id);
        }
        return view('journal', [
            'diaries_id' => $diaries_id,
            'user_name' => $user_name
        ]);
    }
    // LSW - END
}
