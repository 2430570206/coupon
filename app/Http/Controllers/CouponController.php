<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CouponModel;
use App\Model\CouponDetailModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

//        $uid=Auth::id();  //获取登陆用户id
//        echo 'UID:' .$uid;
//
//        $user=Auth::user()->toArray();   //获取登陆用户信息
//        echo '<pre>';print_r($user);echo '</pre>';


        $data=[];
        return view('coupon.index',$data);
    }


    public function getCoupon(Request $request)
    {

    $uid = Auth::id();   //获取用户id


        $now = time();
       // $id = intval($_GET['id']) ;
        $id = $request->get('id');
        echo 'id: '.$id;echo '</br>';

        $coupon_info = CouponModel::find($id);
       // var_dump($coupon_info);

        if($coupon_info){
            $expire_at = strtotime($coupon_info->expire_at);
            //判断有效期
            if($now > $expire_at){
                die('该优惠劵已经过期');
            }else{
                //发券
                $code = Str::random(8);
                $data = [
                    'code'=>$code,
                    'uid'=>Auth::id(),
                    'get_time'=>$now,
                    'expire_at'=>$expire_at,

                ];
               $id =  CouponDetailModel::insertGetId($data);
               if($id > 0){
                   echo "领券成功: | 券码:".$code;
               }
            }

        }
        echo '<pre>';print_r($coupon_info->toArray());echo '</pre>';


    }
}
