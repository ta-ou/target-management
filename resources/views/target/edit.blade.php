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

          <form method="POST" action="{{ route('target.update', ['id' => $each_target->id ]) }}">
            @csrf
            <div class="form-group">
              <label for="target">達成したい目標を入力してください</label>
              <input type="text" class="form-control" id="target" name="target" value="{{ $each_target->target }}">
            </div>

            <div class="form-group">
              <label for="reason">達成したい理由を入力してください</label>
              <input type="text" class="form-control" id="reason" name="reason" value="{{ $each_target->reason }}">
            </div>

            <div class="form-group">
              <label for="deadline">期限を入力してください</label>
              <input type="date" class="form-control" id="deadline" name="deadline" value="{{ $each_target->deadline }}" min="<?php echo date('Y-m-d'); ?>">
            </div>

            <div class=" form-group">
              <label for="small_target1">小目標1を入力してください</label>
              <input type="text" class="form-control" id="small_target1" name="small_target1" value="{{ $each_target->small_target1 }}">
            </div>
            <div class="form-group">
              <label for="small_target2">小目標2を入力してください</label>
              <input type="text" class="form-control" id="small_target2" name="small_target2" value="{{ $each_target->small_target2 }}">
            </div>
            <div class="form-group">
              <label for="small_target3">小目標3を入力してください</label>
              <input type="text" class="form-control" id="small_target3" name="small_target3" value=" {{ $each_target->small_target3 }}">
            </div>

            <div class="form-group">
              <label for="target_category">カテゴリー</label>
              <select class="form-control" id="target_category" name="target_category">
                <option value="1" @if($each_target->target_category === 1 ) selected @endif>勉強</option>
                <option value="2" @if($each_target->target_category === 2 ) selected @endif>仕事</option>
                <option value="3" @if($each_target->target_category === 3 ) selected @endif>スポーツ</option>
                <option value="4" @if($each_target->target_category === 4 ) selected @endif>健康</option>
                <option value="5" @if($each_target->target_category === 5 ) selected @endif>趣味</option>
                <option value="6" @if($each_target->target_category === 6 ) selected @endif>その他</option>
              </select>
            </div>
            <input class="btn btn-info" type="submit" value="更新する">
          </form>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection