@foreach ($journals as $journal)
    <div class="container">
        <a href="/journal/{{ $journal->id }}">
            <div>Username: {{ $journal->user_name }}</div>
            <div>ID: {{ $journal->id }}</div>
            <div>Title: {{ $journal->title }}</div>
            <div>Year: {{ $journal->year }}</div>
        </a>
    </div>
@endforeach

<style>
    .container {
        border: 1px solid black;
    }

</style>
