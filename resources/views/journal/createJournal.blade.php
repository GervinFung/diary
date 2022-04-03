<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Journal</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/addJournal.css') }}">
    <link href="{{ URL::asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <x-header />
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
                <form action="/journal" method="POST">
                    @csrf
                    @method('PUT')
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
    <x-footer />
</body>

</html>
