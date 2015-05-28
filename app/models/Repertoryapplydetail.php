<?php

class Repertoryapplydetail extends Eloquent {
    protected $table = 'repertory_apply_detail';

    public static function getOrderDetail($order_id)
    {
        $res = DB::table('repertory_apply_detail')->where('order_id' , '=' , $order_id)->get();
        return $res ? $res : '';
    }
}