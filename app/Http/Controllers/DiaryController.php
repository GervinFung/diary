<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Models\Journal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    
    // ZR - START
    public function showOne($diary_id) {
        $diary = Diary::find($diary_id);
        return view('diary', ['diary' => $diary]);
    }

    public function create(Request $request) {
        $request->validate([
            'journal_id' => 'required',
            'date' => 'required'
        ]);
        $data = $req -> all();
        Diary::create($data);
        return redirect('/journal/'.$request->id);
    }

    public function edit(Request $request)
    {
        $diary = Diary::find($request->id);
        $diary->date = $request->date;
        $diary->content = $request->content;
        $diary->save();
        return redirect('view-diary/'.$request->id);
    }

    public function destroy(Request $request)
    {
        $diary = Diary::find($request->id);
        $journalId = $diary->journal_id;
        $diary->delete();
        return redirect('/journal/'.$journalId);
    }
    // ZR - END
}
