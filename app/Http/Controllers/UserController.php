<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Models\Journal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private function currentUser()
    {
        return User::findOrFail(Auth::user()->id);
    }

    public function delete()
    {
        if (Auth::check()) {
            return view('auth.delete-profile');
        }
        return redirect('/');
    }

    public function destroy()
    {
        $user = $this->currentUser();
        Auth::logout();
        $journalIds = Journal::where('user_id', $user->id)->pluck('id');
        Diary::whereIn('journal_id', $journalIds)->delete();
        Journal::whereIn('id', $journalIds)->delete();
        $user->delete();
        return redirect('/');
    }

    public function update()
    {
        if (Auth::check()) {
            $currentUser = Auth::user();
            $user = (object) [];
            $user->email = $currentUser->email;
            $user->name = $currentUser->name;
            $user->type = $currentUser->type;
            $oppositeType = $user->type === 'Public' ? 'Private' : 'Public';
            return view('auth.update-profile', [
                'user' => $user,
                'oppositeType' => $oppositeType,
            ]);
        }
        return redirect('/');
    }

    /**
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validation(array $data, int $id)
    {
        return Validator::make($data, [
            'name' => ['string', 'min:5', 'max:255'],
            'email' => 'unique:user,email,' . $id,
            'password' => [
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/\W/',
                'min:8',
                'nullable',
            ],
            'type' => ['required', 'string', 'in:Public,Private'],
        ]);
    }

    public function edit(Request $request)
    {
        $user = $this->currentUser();
        $isPass =
            !$this->validation($request->all(), $user->id)->fails() &&
            Hash::check($request->identity, $user->password);
        if ($isPass) {
            $user->email = $request->email;
            $user->name = $request->name;
            $user->type = $request->type;
            if (!is_null($request->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect('user/sign-in');
            }
            $user->save();
        }
        return redirect('user/update');
    }
}
