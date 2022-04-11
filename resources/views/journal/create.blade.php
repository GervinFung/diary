@extends('layouts.app')
<title>Create new journal</title>
<link href="{{ URL::asset('css/addJournal.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="app">

            <div class="book">
                <span class="page turn"></span>
                <span class="page turn"></span>
                <span class="page turn"></span>
                <span class="page turn"></span>
                <span class="page turn"></span>
                <span class="page turn"></span>
                <span class="cover">Journal</span>
                <span class="page"></span>
                <span class="cover turn">Journal</span>
            </div>

            <div class="card">
                <form action="api/journal" method="POST">
                    @csrf
                    <div class="input">
                        <input type="text" name="title" placeholder="Enter Journal's Title...">
                        <span class="error-msg">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="input">
                        <input type="number" name="year" placeholder="Enter Journal's Year..." min="1800">
                        <span class="error-msg">
                            @error('year')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <input type="submit" name="submit" value="Add Journal">
                </form>
            </div>
        </div>
    </div>
@endsection
