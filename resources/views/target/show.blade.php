@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">目標の詳細</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <form method="GET" action="{{ route('target.edit', ['id'=> $each_target->id])}}">
            @csrf
            {{ $each_target->target }}
            {{ $each_target->reason }}
            {{ $each_target->deadline }}
            {{ $each_target->small_target1 }}
            {{ $each_target->small_target2 }}
            {{ $each_target->small_target3 }}
            {{ $target_category }}
            <!-- ログイン中のユーザーが目標の作成者の場合表示 -->
            <input class="btn btn-info" type="submit" value="変更する">
          </form>
          <form method="POST" action="{{ route('target.destroy', ['id' => $each_target->id ]) }}" id="delete_{{$each_target->id}}">
            @csrf
            <a href="#" class="btn btn-danger" data-id="{{$each_target->id}}" onclick="deletePost(this);">削除する</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script>
  function deletePost(e) {
    if (confirm('本当に削除してよろしいでしょうか？')) {
      document.getElementById('delete_' + e.dataset.id).submit();
    }
  }
</script>



@endsection