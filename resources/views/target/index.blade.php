@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">目標一覧</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <form method="GET" action="{{ route('target.create') }}">
            <button type="submit" class="btn btn-dark">
              新規登録
            </button>
          </form>

          <form method="GET" action="{{ route('target.index') }}" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" name="serch" type="search" 　aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
          </form>
          <form method="GET" action="{{ route('target.index') }}" class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">一覧表示</button>
          </form>

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">作成日時</th>
                <th scope="col">目標</th>
                <th scope="col">ユーザー名</th>
                <th scope="col">アイコン</th>
                <th scope="col">詳細</th>
              </tr>
            </thead>

            <tbody>
              @foreach($targets as $target)
              <tr>
                <th scope="row">{{ $target->created_at }}</th>
                <td>{{ $target->target }}</td>
                <td>名前
                </td>
                <td>画像</td>
                <td><a href="{{ route('target.show', ['id' => $target->id ] )}}">詳細をみる</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $targets->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection