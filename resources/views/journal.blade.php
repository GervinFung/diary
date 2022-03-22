<div>{{$user_name}}</div>
@foreach ($diaries_id as $diary_id)
<div class="container">
  <a href="/diary/{{$diary_id}}">
    <div>{{$diary_id}}</div>
  </a>
</div>
@endforeach

<style>
  .container {
    border: 1px solid black;
  }
</style>