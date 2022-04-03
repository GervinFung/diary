<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <link data-n-head="ssr" rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/journal.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="antialiased">
    <x-header />
    <div class='journals-container'>
        @foreach ($journals as $journal)
            @can('view', $journal)
                <div class="journal-container">
                    <a href="journal/{{ $journal->id }}">
                        <div class="journal-title">Title: {{ $journal->title }}</div>
                        <div class="journal-year">Year: {{ $journal->year }}</div>
                    </a>
                </div>
            @endcan
        @endforeach
    </div>
</body>

</html>
        <title>Home</title>
        
        <link data-n-head="ssr" rel="icon" type="image/x-icon" href="/favicon.ico">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/header.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/footer.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/home.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/journals.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <x-header/>
    <div class="journals-container">
    @foreach($journals as $journal)
        @can('viewPublic', $journal)
        <div class="journal-container">
        <a class="book" href="/journal/{{$journal->id}}">
			<div class="front">
				<div class="cover">
                    <div class="num-up">{{$journal->title}}</div>
                    <div class="author">{{$journal->year}}</div>
                </div>
            </div>
        </a>
        </div>
        @endcan
    @endforeach
    </div>
    </body>
</html>
