<?php

class Repertoryapplylist extends Eloquent {


    protected $table = 'repertory_apply_list';

    public static function getApplyList()
    {
        $orderLists = DB::table('repertory_apply_list')->get();
        return  $orderLists ? $orderLists : null;
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

    public function addApplyInfo()
    {
        if($_POST)
        {
            $input = Input::all();
            $num = 1;
            $dataDetail = array();
            (int)$order_id = DB::table('repertory_apply_detail')->max('order_id');
            ++$order_id;
            while(!empty($input["id".$num]))
            {
                $productId = $input["id".$num];
                $proNum = $input["num".$num];
                $price =  $input["price" . $num];

                $dataItem = array(
                    'product_id' => $productId,
                    'num' => $proNum,
                    'price' => $price,
                );

                $rules = array (
                    'product_id' => 'required|numeric',
                    'num' => 'required|integer|min:1',
                    'price' => 'required|numeric',
                );
                $validator = Validator::make($dataItem, $rules);
                if($validator->fails()) {
                    echo "please fill blanks in right rules";  ////####
                    die($validator);
                }
                $dataDetail[] = array(
                    'order_id' => $order_id, 'product_id' => $input["id" . $num], 'num' => $input["num" . $num], 'price' => $input["price" . $num]
                );
                $num++;
            }
            $result = DB::table('repertory_apply_detail')->insert($dataDetail);

            $orderList = array(
                'order_id' => $order_id, 'proposer' => Session::get('user.name'), 'status' => 1, 'apply_time' => time(), 'proposer_role' => Session::get('user.role')
            );
            $res = DB::table('repertory_apply_list')->insert($orderList);
            return $res ? true : false;

        } else {
            die("please come with right enterence");
        }
    }

    public static function viewOrderInfo()
    {
        if(Session::get('user.role') == 1)
        {
            $orderLists = DB::table('repertory_apply_list')->get();
        } else {
            $orderLists = DB::table('repertory_apply_list')->where('proposer_role' , '=' , Session::get('user.role'))->get();
        }
        return  $orderLists ? $orderLists : null;
    }
}
