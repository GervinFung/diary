<div class="diaries-container">
    @php
        $i = 1;
    @endphp
    @foreach ($diaries as $diary)
        <div class="paper" style="top: calc(-{{ $i }} * 20px);">
            <a href="/diary/{{ $diary->id }}" class="diary-link">
                <div class="lines">
                    <div class="paper-content">
                        <div style="display: flex; justify-content: space-between;">
                            <text class="date">{{ $diary->title }}</text>
                            <text class="date">{{ $diary->created_at }}</text>
                        </div>
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
