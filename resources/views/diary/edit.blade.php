<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diary</title>
    <link rel="stylesheet" href="{{ URL::asset('scss/editor.css') }}">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/header.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/footer.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/home.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/diary.css') }}" rel="stylesheet" />
</head>

<body class="antialiased">
    <x-header />
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">Diary</h6>
                        @can('delete', $diary)
                            <form action="/api/diary/{{ $diary->id }}" onsubmit="return confirm('Confirm delete Diary?')"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $diary->id }}" />
                                <button type="submit" class="btn delete"><i class="fa fa-trash"></i></button>
                            </form>
                        @endcan
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/api/diary/{{ $diary->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group upper-group">
                                <input type="hidden" name="id" value="{{ $diary->id }}" />
                                <input type="hidden" name="journal_id" value="{{ $diary->journal_id }}" />
                                <div>
                                    <label><strong>Date</strong></label>
                                    <input type="date" name='date' value='{{ $diary->date }}' class="form-control"/>
                                    <span class="error-msg">
                                        @error('date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="time-date">
                                    <label><strong>Created at:</strong> {{ $diary->created_at }}</label>
                                    <label><strong>Updated at:</strong> {{ $diary->updated_at ?? '-' }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label><strong>What's on your mind:</strong></label>
                                <?php $data = str_replace('&', '&amp;', $diary->content); ?>
                                <textarea name='content' placeholder='Write something' id="editor">{{ $data }}</textarea>
                            </div>
                            <div class='btn-container-save-preview'>
                                <div class="go-to-journal form-group text-center">
                                    <div class="go-to-journal btn btn-success btn-sm">
                                        <a href="/journal/{{ $diary->journal_id }}">
                                            Go to Journal
                                        </a>
                                    </div>
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
<script src="{{ URL::asset('js/editor.js') }}"></script>

</html>
