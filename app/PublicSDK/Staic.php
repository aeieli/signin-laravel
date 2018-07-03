<?php

namespace App\PublicSDK;

class Staic {
    const MESSAGE_CODE = 0; //自定义message消息返回数组 下标对应值
    const MESSAGE_TEXT = 1;//自定义message消息返回数组 下标对应值

    const LIMIT_MAX = 100; //列表接口返回结果最大数量值
    const LIMIT_DEFAULT = 20; //列表接口默认返回结果数量

    const STORE_STATUS_OFF = 0;
    const STORE_STATUS_NORMAL = 1;
    const STORE_STATUS_WAITAPPROVE = 2;
    
    
    const ADMIN_STATUS_OFF =  0;
    const ADMIN_STATUS_NORMAL =  1;
    const ADMIN_STATUS_WAITAPPROVE =  2;
    
    //订单状态：1(默认)2(删除)10(已取消):未付 款;20:已付款;30:已发货;40:已收货;
    const ORDER_CANCLE = 10;
    const ORDER_DEFAULT = 1;
    const ORDER_NO_PAY = 20;
    const ORDER_TRUE_PAY = 11;
    const ORDER_DELVIER = 30;
    const ORDER_TAKE_DELIVERY = 40;
    const ORDER_DELETE = 2;
    
    //仓库删除状态
    const WATEHOUSE_DELETE = 1;
}
