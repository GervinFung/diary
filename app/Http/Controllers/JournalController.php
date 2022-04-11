<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Diary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    /**
     * Get a validator for an incoming create/edit request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $cur_year = date('Y');

        return Validator::make($data, [
            'year' => "required | integer | digits:4 | min:1800 | max:$cur_year",
            'title' => 'required',
        ]);
    }

    public function index()
    {
        if (Auth::check()) {
            $journals = Journal::orderBy('year', 'desc')
                                ->get();
            return view('journal/publicJournals', ['journals' => $journals]);
        }
        return redirect('sign-in');
    }

    public function showMyJournals()
    {
        if (Auth::check()) {
            $journals = Journal::orderBy('year', 'desc')
                                ->get();
            return view('journal/myJournals', ['journals' => $journals]);
        }
        return redirect('sign-in');
    }

    public function showOne($journal_id)
    {
        $journal = Journal::find($journal_id);
        $diaries = Diary::where('journal_id', $journal_id)
                        ->orderBy('date', 'desc')
                        ->get();
        if (!isset($journal)) {
            return redirect('/');
        }
        return view('journal/journal', [
            'journal' => $journal,
            'diaries' => $diaries,
        ]);
    }

    public function create(Request $request)
    {
        $this->validator($request->all())->validate();
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Journal::create($data);
        return redirect('my-journals');
    }

    public function edit(Request $request)
    {
        $this->validator($request->all())->validate();
        $journal = Journal::find($request->id);

        if (!isset($journal)) {
            return redirect('/');
        }

        $journal->year = $request->year;
        $journal->title = $request->title;
        $journal->save();
        $request->session()->flash('journal_updated', 'Journal updated');
        return redirect('journal/' . $request->id);
    }

    public function destroy($id)
    {
        $diary = Journal::findOrFail($id);
        $diary->delete();
        return redirect('my-journals');
    }
}
