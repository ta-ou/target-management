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

          @if ($errors->any())
          <div class="alrrt alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form method="POST" action="{{ route('target.store')}}">
            @csrf
            <div class="form-group">
              <label for="target">達成したい目標を入力してください</label>
              <input type="text" class="form-control" id="target" name="target">
            </div>

            <div class="form-group">
              <label for="reason">達成したい理由を入力してください</label>
              <input type="text" class="form-control" id="reason" name="reason">
            </div>

            <div class="form-group">
              <label for="deadline">期限を入力してください</label>
              <input type="date" class="form-control" id="deadline" name="deadline" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">
            </div>

            <p>小目標の重要性</p>

            <div class=" form-group">
              <label for="small_target1">小目標1を入力してください</label>
              <input type="text" class="form-control" id="small_target1" name="small_target1">
            </div>
            <div class="form-group">
              <label for="small_target2">小目標2を入力してください</label>
              <input type="text" class="form-control" id="small_target2" name="small_target2">
            </div>
            <div class="form-group">
              <label for="small_target3">小目標3を入力してください</label>
              <input type="text" class="form-control" id="small_target3" name="small_target3">
            </div>

            <div class="form-group">
              <label for="target_category">カテゴリー</label>
              <select class="form-control" id="target_category" name="target_category">
                <option value="">選択してください</option>
                <option value="1">勉強</option>
                <option value="2">仕事</option>
                <option value="3">スポーツ</option>
                <option value="4">健康</option>
                <option value="5">趣味</option>
                <option value="6">その他</option>
              </select>
            </div>

            <input class="btn btn-info" type="submit" value="登録する">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection