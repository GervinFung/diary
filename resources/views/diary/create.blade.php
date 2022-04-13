<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New diary</title>
    <link href="{{ URL::asset('scss/diary/editor.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/header.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/footer.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/home.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/diary.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" />
</head>

<body class="antialiased">
    <x-header />
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">Diary</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/api/diary" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group upper-group">
                                <input type="hidden" name="journal_id" value="{{ $journal_id }}" />
                                <div>
                                    <label><strong>Date</strong></label>
                                    <input type="date" name='date' class="form-control" />
                                    <span class="error-msg">
                                        @error('date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label><strong>What's on your mind:</strong></label>
                                <textarea name='content' placeholder='Write something' id="editor"></textarea>
                            </div>
                            <div class='btn-container-save-preview'>
                                <div class="go-to-journal form-group text-center">
                                    <a href="/journal/{{ $journal_id }}">
                                        <div class="go-to-journal btn btn-success btn-sm">
                                            Go to Journal
                                        </div>
                                    </a>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.getElementById('editor'))
        .catch(alert);
</script>
<script src="{{ URL::asset('js/diary/editor.js') }}"></script>

</html>
