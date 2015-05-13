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
}
