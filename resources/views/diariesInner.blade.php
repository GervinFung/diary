<div class="diaries-container">
    @php
        $i = 0;
    @endphp
    @foreach ($diaries as $diary)
        <div class="paper" style="top: calc(-{{ $i }} * 20px);">
            <a href="/diary/{{ $diary->id }}" class="diary-link">
                <div class="lines">
                    <div class="paper-content">
                        <text class="date">{{ $diary->date }}</text>
                        <text class="content">{{ substr(strip_tags($diary->content), 0, 50) }}...</text>
                    </div>
                </div>
            </a>
        </div>
        @php
            $i++;
        @endphp
    @endforeach
</div>
@if (count($diaries) > 4)
<div class="page-number-container" style="top:calc({{count($diaries) - 4}} * 100px);">
@else
<div class="page-number-container" style="top: 20px;">
@endif
    {{ $diaries->links() }}
</div>
