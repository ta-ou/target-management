@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
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
            <table class="table table-borderless">
              <tbody>
                <tr>
                  <th scope="row">目標</th>
                  <td>{{ $each_target->target }}</td>
                </tr>
                <tr>
                  <th scope="row">理由</th>
                  <td>{{ $each_target->reason }}</td>
                </tr>
                <tr>
                  <th scope="row">期限</th>
                  <td colspan="2">{{ $each_target->deadline }}</td>
                </tr>
                <tr>
                  <th scope="row">小目標1</th>
                  <td colspan="2">{{ $each_target->small_target1 }}</td>
                </tr>
                <tr>
                  <th scope="row">小目標2</th>
                  <td colspan="2">{{ $each_target->small_target2 }}</td>
                </tr>
                <tr>
                  <th scope="row">小目標3</th>
                  <td colspan="2">{{ $each_target->small_target3 }}</td>
                </tr>
              </tbody>
            </table>
            <input class="btn btn-info" type="submit" value="変更する">
          </form>
          <!-- ログイン中のユーザーが目標の作成者の場合表示 -->
          <form method="POST" action="{{ route('target.destroy', ['id' => $each_target->id ]) }}" id="delete_{{$each_target->id}}">
            @csrf
            <a href="#" class="btn btn-danger" data-id="{{$each_target->id}}" onclick="deletePost(this);">削除する</a>
          </form>
          <!-- ログイン中のユーザーが目標の作成者の場合 終了 -->
        </div>
      </div>
    </div>
    <!-- コメント -->
    <div>
      <form method="POST" action="{{ route('comment.store')}}">
        @csrf
        <p>この目標にコメントする</p>
        <textarea type="text" class="form-control" id="comment" name="comment" cols="30" rows="3"></textarea>
        <input class="btn btn-info" type="submit" value="登録する">
      </form>

      <div>
        <p>コメント一覧</p>
        <p class="text-muted">
          <strong>作者</strong>
          &#8901; 日時
        </p>
        <p>コメント内容</p>
        <!-- コメント作者であれば -->
        <div>
          <button class="btn btn-sm btn-outline-danger">削除</button>
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