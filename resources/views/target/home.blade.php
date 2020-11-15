@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
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

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">作成日時</th>
                <th scope="col">目標</th>
              </tr>
            </thead>

            <tbody>
              @foreach($targets as $target)
              <tr>
                <th scope="row">{{ $target->created_at }}</th>
                <td>{{ $target->target }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection