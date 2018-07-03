<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class CheckIn extends Authenticatable implements JWTSubject
{
    public function getThisWeek($date){
        $frist = 1;
        $w = date('w',strtotime($date));  //获取当前周的第几天 周日是 0 周一到周六是 1 - 6
        $now_start = date('Y-m-d',strtotime("$date -".($w ? $w - $first : 6).' days')); //获取本周开始日期，如果$w是0，则表示周日，减去 6 天
        $now_end=date('Y-m-d',strtotime("$now_start +6 days"));  //本周结束日期

        return ["start"=>$now_start,"end"=> $now_end];
    }


}
