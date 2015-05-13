<?php

class Repertoryapplylist extends Eloquent {


    protected $table = 'repertory_apply_list';

    public static function getApplyList()
    {
        $orderLists = DB::table('repertory_apply_list')->get();
        return  $orderLists ? $orderLists : "";
    }

    public static function deleteOrder($orderId = "")
    {
        if(empty($orderId))
        {
            return false;
        }
        $deleteRes = DB::table('repertory_apply_list')->where('order_id', '=', $orderId)->delete();
        return $deleteRes ? true :false;
    }

    public static function passOrder($orderId = "")
    {
        if(empty($orderId))
        {
            return false;
        }
        $res = DB::table('repertory_apply_list')->where('order_id', '=', $orderId)->update(array('status' => 2));
        return $res ? true :false;
    }

    public static function rejectOrder($orderId = "")
    {
        if(empty($orderId))
        {
            return false;
        }
        $res = DB::table('repertory_apply_list')->where('order_id', '=', $orderId)->update(array('status' => 3));
        return $res ? true :false;
    }
}
