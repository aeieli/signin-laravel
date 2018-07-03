<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\User;
use App\Models\CheckIn;

use App\PublicSDK\ApiHelper;
use App\PublicSDK\Staic;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function CheckInHandler(Request $request){
        $user = Auth::user();
        if(!$user){
            return ApiHelper::response('User Not Allow', 
            trans('message.IES_PARAM_ERROR')[Staic::MESSAGE_TEXT], 
            trans('message.IES_PARAM_ERROR')[Staic::MESSAGE_CODE]);
        }
        $query = CheckIn::where('date','>', date('Y-m-d 2:00:00',time()));
        $count = $query->count();
        $data = $query->limit(10)->orderyBy("date")->order('desc')->get();

        $check = CheckIn::create([ "user" => $user->user_id,
                                    "checkId" =>  date('Y-m-d h:M:s',time()),
                                    "count" => $count +1 ]);

        if ($check){
            $check['todaytop'] = $data;
            return ApiHelper::response($check,
            trans('message.S_OK')[Staic::MESSAGE_TEXT], 
            trans('message.S_OK')[Staic::MESSAGE_CODE]);
        } else {
            return ApiHelper::response('', 
            trans('message.IES_PARAM_ERROR')[Staic::MESSAGE_TEXT], 
            trans('message.IES_PARAM_ERROR')[Staic::MESSAGE_CODE]);
        }
    }

    public function getCheckInfo(Request $request){
        
    }
}
