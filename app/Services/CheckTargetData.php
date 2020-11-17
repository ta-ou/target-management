<?php

namespace App\Services;

class CheckTargetData 
{
  public static function checkTargetCategory($data){
    if ($data->target_category === 1) {
      $target_category = '勉強';
    }
    if ($data->target_category === 2) {
      $target_category = '仕事';
    }
    if ($data->target_category === 3) {
      $target_category = 'スポーツ';
    }
    if ($data->target_category === 4) {
      $target_category = '健康';
    }
    if ($data->target_category === 5) {
      $target_category = '趣味';
    }
    if ($data->target_category === 6) {
      $target_category = 'その他';
    }
    return $target_category;
  }
}