<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;


class SerchTargetData
{
  public static function serchTarget($data)
  {
    $query = DB::table('targets');

    if ($data !== null) {
      // 全角を半角に
      $serch_split = mb_convert_kana($data, 's');
      // 空白を区切る
      $serch_split2 = preg_split('/[\s]+/', $serch_split, -1, PREG_SPLIT_NO_EMPTY);

      foreach ($serch_split2 as $value) {
        $query->where('target', 'like', '%' . $value . '%');
      }
    }

  
    $query->select('id', 'target', 'created_at', 'author_id');
    $query->orderBy('created_at', 'desc');
    $serched_target = $query->paginate(15);

    return $serched_target;

  }
}
