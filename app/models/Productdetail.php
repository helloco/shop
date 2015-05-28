<?php

class Productdetail extends Eloquent {


    protected $table = 'product_detail';

    public static function addProduct($id , $name , $maker = '' , $addTime = null)
    {
        if(empty($id) || empty($name))
        {
            return false;
        }
        $result = DB::table('product_detail')->insert(
            array('id' => $id, 'name' => $name , 'maker' => $maker , 'add_time' => $addTime )
        );
        return $result ? true : false;
    }

    public static function viewProduct()
    {
        $result = DB::table('product_detail')->get();
        return  $result ? $result : null;
    }

    public static function checkProId($id)
    {
        $res = DB::table('product_detail')->where('id' , $id)->get();
        if($res)
        {
            return false;
        }else{
            return true;
        }
    }

    public function deleteProduct($id)
    {
        $res = DB::table('product_detail')->where('id' , $id)->delete();
        if($res)
        {
            return true;
        }else{
            return false;
        }
    }
}
