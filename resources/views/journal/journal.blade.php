<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Diaries</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/journal.css') }}" rel="stylesheet">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body>
    <x-header />
    @if (Session::has('journal_updated'))
        <div class="popup show">
            <div>
                <h2>{{ Session::get('journal_updated') }}</h2>
                <button name="close" onclick="closePopup()">Close</button>
            </div>
        </div>
    @endif
    <div class="single-journal-container">
        <div class="journal-cover">
            <div class="journal-detail">
                <form action="/api/journal/{{ $journal['id'] }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" value="{{ $journal['title'] }}" readonly />
                    <span class="error-msg">
                        @error('title')
                            <i class='fas fa-exclamation-triangle'></i>
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="number" name="year" value="{{ $journal['year'] }}" readonly />
                    <span class="error-msg">
                        @error('year')
                            <i class='fas fa-exclamation-triangle'></i>
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="hidden" name="id" value="{{ $journal['id'] }}" />
                    @can('update', $journal)
                        <div name="edit" class="btn edit" onclick="toggleEditMode()"><i class="fa fa-edit"></i><i
                                class="fa fa-close"></i></div>
                        <button type="submit" name="save" class="btn save edit-mode-btn">Save</button>
                    @endcan
                </form>
                @can('delete', $journal)
                    <form action="/api/journal/{{ $journal['id'] }}" onsubmit="return confirm('Confirm delete Journal?')"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $journal['id'] }}" />
                        <button type="submit" class="btn delete"><i class="fa fa-trash"></i></button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
    </div>
    @include('diariesInner')
    @can('create', $journal)
        <div class="add-button-container">
            <a href="{{ $journal['id'] }}/create-diary"><i class="fa fa-plus"></i></a>
        </div>
    @endcan
    @if (count($diaries) > 4)
        <div style="height:calc({{ count($diaries) - 4 }} * 100px + 20px);">
        @else
            <div style="height: 30px;">
    @endif
    </div>
    <x-footer />
</body>
<script type="text/javascript">
    const original_title = "<?php print $journal['title']; ?>";
    const original_year = "<?php print $journal['year']; ?>";

    function toggleEditMode() {
        if (document.getElementsByName('title')[0].readOnly) {
            document.getElementsByName('title')[0].readOnly = false;
        } else {
            document.getElementsByName('title')[0].value = original_title;
            document.getElementsByName('title')[0].readOnly = true;
        }

        if (document.getElementsByName('year')[0].readOnly) {
            document.getElementsByName('year')[0].readOnly = false;
        } else {
            document.getElementsByName('year')[0].value = original_year;
            document.getElementsByName('year')[0].readOnly = true;
        }

        document.getElementsByName('title')[0].classList.toggle('bottom-border');
        document.getElementsByName('year')[0].classList.toggle('bottom-border');
        document.getElementsByName('edit')[0].childNodes[0].classList.toggle('fade-out');
        document.getElementsByName('edit')[0].childNodes[1].classList.toggle('fade-in');
        document.getElementsByName('save')[0].classList.toggle('slide-out');
    }

    function closePopup() {
        document.getElementsByClassName('popup')[0].classList.toggle('show');
    }
</script>

</html>
