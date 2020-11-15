@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">目標を作成しましょう</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          {{ $each_target->target }}
          {{ $each_target->reason }}
          {{ $each_target->deadline }}
          {{ $each_target->small_target1 }}
          {{ $each_target->small_target2 }}
          {{ $each_target->small_target3 }}
          {{ $target_category }}

        <form method="POST" action="">
          @csrf

          <input class="btn btn-info" type="submit" value="登録する">
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection