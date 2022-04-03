<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Models\Journal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
            'user_name' => $user->name,
        ]);
    }
    // LSW - END

    // ZR - START
    public function showOne($diary_id)
    {
        $diary = Diary::find($diary_id);
        Log::debug($diary);
        return view('diary/edit', ['diary' => $diary]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'journal_id' => 'required',
        ]);
        $diary = $request->all();
        $diary['title'] = 'Title';
        return redirect('diary/' . Diary::create($diary)->id);
    }

    public function edit(Request $request)
    {
        Log::debug($request);
        $diary = Diary::find($request->id);
        Log::debug($diary);
        $diary->title = $request->title;
        $diary->updated_at = Carbon::now();
        $diary->content = $request->content;
        $diary->save();
        return back();
    }

    public function destroy(Request $request)
    {
        $diary = Diary::find($request->id);
        $journalId = $diary->journal_id;
        $diary->delete();
        return redirect('journal/' . $journalId);
    }
    // ZR - END
}
