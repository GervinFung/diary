<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Models\Journal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DateTime;
use Illuminate\Support\Facades\Validator;

class DiaryController extends Controller
{
    protected function validator(array $data, $acceptedYear)
    {
        $min_date = DateTime::createFromFormat(
            'Y-m-d',
            $acceptedYear . '-01-01'
        )->format('Y-m-d');
        $max_date = DateTime::createFromFormat(
            'Y-m-d',
            $acceptedYear . '-12-31'
        )->format('Y-m-d');
        return Validator::make($data, [
            'journal_id' => 'required',
            'date' =>
                'required | date | after_or_equal:' .
                $min_date .
                ' | before_or_equal:' .
                $max_date,
        ]);
    }

    public function showOne($diary_id)
    {
        $diary = Diary::find($diary_id);
        Log::debug($diary);
        return view('diary/edit', ['diary' => $diary]);
    }

    public function create(Request $request)
    {
        $acceptedYear = Journal::find($request->journal_id)->value('year');
        $this->validator($request->all(), $acceptedYear)->validate();
        $diary = $request->all();
        return redirect('diary/' . Diary::create($diary)->id);
    }

    public function edit(Request $request)
    {
        $acceptedYear = Journal::find($request->journal_id)->year;
        $this->validator($request->all(), $acceptedYear)->validate();
        Log::debug($request);
        $diary = Diary::find($request->id);
        Log::debug($diary);
        $diary->date = $request->date;
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
}
