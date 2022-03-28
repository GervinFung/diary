<div class="diaries-container">
    @php
    $i = 1
    @endphp
    @foreach($diaries as $diary)
    <div class="paper" style="top: calc(-{{ $i }} * 20px);">
        <a href="/diary/{{$diary->id}}" class="diary-link">
            <div class="lines">
                <div class="paper-content">
                    <text class="date">{{ $diary['date'] }}</text>
                    <text class="content">Hello world ! Here's a paper textarea tag...</text>
                </div>
            </div>
        </a>
    </div>
    @php
    $i++
    @endphp
    @endforeach
</div>